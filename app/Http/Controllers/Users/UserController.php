<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserRequest;
use App\Models\Users\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __(":name profile", ['name' => Auth::user()->persona->formated_name]);
        $description = __(":name profile", ['name' => Auth::user()->persona->formated_name]);

        $lists['states'] = [
            ['value' => 'CBA', 'title' => 'Córdoba'],
            ['value' => 'BSAS', 'title' => 'Buenos Aires'],
        ];
        $lists['countries'] = [
            ['value' => 'AR', 'title' => 'Argentina'],
            ['value' => 'US', 'title' => 'United States'],
        ];
        $lists['languages'] = [
            ['value' => 'en', 'title' => 'English'],
            ['value' => 'es', 'title' => 'Español'],
            ['value' => 'fr', 'title' => 'Français'],
        ];
        // Days filled array
        for ($i = 1; $i <= 31; $i++) {
            $default = false;
            $lists['days'][] = ['value' => $i, 'title' => $i, 'default' => $default];
        }
        // Months filled array
        for ($i = 2; $i <= 13; $i++) {
            $default = false;
            $lists['months'][] = ['value' => ($i - 1), 'title' => date('M.', strtotime('00-' . $i . '-0000')), 'default' => $default];
        }
        // Years filled array
        $initYear = date('Y', strtotime('-110 years'));
        for ($i = $initYear; $i <= date('Y'); $i++) {
            ($i == date('Y', strtotime('-50 years'))) ? $default = true : $default = false;
            $lists['years'][] = ['value' => $i, 'title' => $i, 'default' => $default];
        }

        return view('pages.users.profile', compact('title', 'description', 'lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        // Master array
        $data = $request->all();

        /* ***** HANDLE Profile Photo ***** */
        if ($request->hasFile('persona.profile_photo')) {
            // Get the uploaded image and resize it with aspect ratio change it to jpg in 75% quality
            $resizeupload = Image::make($request->file('persona.profile_photo')->path())->fit(150)->encode('jpg', 75);
            // Create the new name
            $filename = md5(uniqid(time(), true)) . '.jpg';
            // Store the file in the system and prepare reference for db
            if (Storage::put(env('USR_FILE_STO') . DIRECTORY_SEPARATOR . $filename, $resizeupload)) {
                // Delete the old image
                if (User::findOrFail(Auth::user()->id)->persona->profile_photo) {
                    $oldprofpho = User::findOrFail(Auth::user()->id)->persona->profile_photo;
                    $oldprofpho = explode(env('USR_FILE_LOC') . DIRECTORY_SEPARATOR, $oldprofpho);
                    Storage::delete(env('USR_FILE_STO') . DIRECTORY_SEPARATOR . $oldprofpho[1]);
                }
                // New image location
                $data['persona']['profile_photo'] = env('USR_FILE_LOC') . DIRECTORY_SEPARATOR . $filename;
            }
        }

        // Join birthdate
        $data['persona']['birthdate'] = Carbon::createFromDate($data['persona']['birthdate']['year'], $data['persona']['birthdate']['month'], $data['persona']['birthdate']['day'])->format(config('app.dbdateformat'));

        // Update models
        $user = User::findOrFail(Auth::user()->id);
        $user->update($data['user']);
        $user->persona->update($data['persona']);
        $user->persona->address->update($data['address']);
        $user->persona->phone->first()->update($data['phone']);

        return redirect(route('users.profile'))
            ->with('success', __('<strong>:name</strong> profile, updated successfully.', ["name" => Auth::user()->persona->formated_name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
