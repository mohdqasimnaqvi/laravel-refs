<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function destroy() {
        //Auth//->logout();
        Auth::logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
    public function login() {
        return view('login');
    }
    public function store() {
        $jeff = request()->validate([
            'email' => 'required|max:255|email',
            'password' => 'required|max:255'
        ]);
        if (!Auth::attempt($jeff)) {
            return back()->withErrors(['email' => 'Your credential could not be verified.']);
        }
        return redirect('/')->with('success', "Welcome Back!");
    }
}
