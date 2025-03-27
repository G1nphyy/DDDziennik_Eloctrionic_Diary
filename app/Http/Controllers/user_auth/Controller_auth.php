<?php

namespace App\Http\Controllers\user_auth;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class Controller_auth extends Controller
{
    public  function index_login() : object
    {
        return view('user_auth.login');
    }
    public function login() : object
    {
        $email = request('email');
        $password = request('password');

        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::all()->where('email', $email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Some data are incorrect.']);
        }
        if (!password_verify($password, $user->password)) {
            return back()->withErrors(['password' => 'Password is incorrect.']);
        }

        $role_id = UserRole::where('user_id', $user->id)->first();
        if (!$role_id) {
            return back()->withErrors(['email' => 'We didn\'t find your role.']);
        }

        Auth::login($user);

        $role_name = Roles::where('id', $role_id->role_id)->first();

        session(['role_name' => $role_name->name]);

        request()->session()->regenerate();

        return redirect('/dashboard');

    }

    function index_register() : object
    {
        return view('user_auth.register');
    }
    function register() : object
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'password_confirmation' => ['required', 'confirmed:password', 'min:6'],
            'first_name' => ['required'],
            'last_name' => ['required'],
        ]);
        $user = User::create($attributes);
        Auth::login($user);

        request()->session()->regenerate();

        return redirect('/');

    }
    function logout() : object
    {
        Auth::logout();
        return redirect('/');
    }
}
