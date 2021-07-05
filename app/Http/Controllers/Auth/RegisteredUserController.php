<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Database\Factories\Personas\PersonaFactory;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'      => 'required|string|max:32|unique:users',
            'email'         => 'required|string|email|max:255|unique:users',
            'first_name'    => 'required|string|max:32',
            'middle_name'   => 'nullable|string|max:32',
            'last_name'     => 'required|string|max:32',
            'password'      => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'last_login_at' => now(),
        ]);

        $persona = PersonaFactory::new()
            ->count(1)
            ->createAddressPhone(1)
            ->create([
                'owner_id'      => $user->id,
                'owner_type'    => 'user',
                'first_name'    => $request->first_name,
                'middle_name'   => $request->middle_name,
                'last_name'     => $request->last_name,
                'birthdate'     => Carbon::now()->subYears(30)->format(config('app.dbdateformat')),
            ]);

        event(new Registered($user));

        Auth::login($user);

        // After registering, go to profile page.
        return redirect(route('user.profile'));
    }
}
