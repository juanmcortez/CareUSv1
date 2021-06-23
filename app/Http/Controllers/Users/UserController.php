<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserRequest;
use App\Models\Users\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Preformat data received.
        $data           = $request->all();
        $userData       = $data['user'];
        $personaData    = $data['user']['persona'];
        $addressData    = $data['user']['persona']['address'];
        $phoneData      = $data['user']['persona']['phone'];
        unset($userData['persona']);
        unset($personaData['phone']);
        unset($personaData['address']);

        // Parse date
        //$personaData['birthdate'] = date('Y-m-d', strtotime($personaData['birthdate']));

        /* ***** HANDLE Profile Photo ***** */
        if ($request->hasFile('user.persona.profile_photo')) {
            $filename = 'usrID_' . auth()->user()->id . '_' . time() . '.' . $request->file('user.persona.profile_photo')->extension();
            $storeimage = $request->file('user.persona.profile_photo')->storeAs('images/users', $filename, 'public');
            if ($storeimage) {
                $personaData['profile_photo'] = 'images/users/' . $filename;
            }
        }

        // Update models
        $user = User::findOrFail(Auth::user()->id);
        $user->update($userData);
        $user->persona->update($personaData);
        $user->persona->address->update($addressData);
        $user->persona->phone->first()->update($phoneData);

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
