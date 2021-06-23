<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserRequest;
use App\Models\Users\User;
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

        return view('pages.users.profile', compact('title', 'description'));
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
