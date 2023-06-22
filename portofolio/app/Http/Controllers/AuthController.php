<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() 
    {
        return view('login.login');
    }

    public function login(Request $request) 
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if (Auth::user()->role_id != 2) {
                return redirect()->intended('/dashboard');
            }else {
                return redirect()->intended('/');
            }

        }

        return redirect('/login')->with('errorLogin','Login is Invalid!!');
    }


    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function registrasi() 
    {
        return view('login.registrasi');
    }


    public function store(Request $request) 
    {
        $validate = $request->validate([
            'name' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
        ]);

        $request['password'] = Hash::make($request->password);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 2
        ]);

        return redirect('/login')->with('succes' , 'Registrasi Berhasil . Silakan Login!!');
    }






}
