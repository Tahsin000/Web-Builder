<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }
    public function register_view()
    {
        return view('auth.register');
    }
    public function login(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/create');
        }
        return redirect('login')->withErrors(['custom_error' => 'Invalid credentials. Please try again.']);


    }
    public function register (Request $request) {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/create');
        }
        return redirect('register')->withErrors('Error');
    }

    public function logout(){
        session()->flash('success', 'You have been logged out successfully.');
        Auth::logout();
        return view('auth.login');
    }
    public function home () {
        return view('');
    }
    
}
