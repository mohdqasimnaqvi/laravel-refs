<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create() {
        return view('register-create');
    }
    public function store() {
        $user = request()->validate([
            'email' => 'required|max:255|email|unique:users,email',
            'password' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username',
            'name' => 'required|max:255|unique:users,name',
        ]);

        $user['password'] = bcrypt($user['password']);
        $newUser = User::create($user);
        Auth::login($newUser);
        session()->flash('success', 'Your account has been created');
        return redirect('/');
    }
}
