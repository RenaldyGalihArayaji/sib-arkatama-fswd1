<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataPenggunaController extends Controller
{
    public function index(){
        $data = User::latest()->with('role')->where('role_id', 2)->get();
        return view('pengguna.data-user' ,["title" => "Data-User" , "data" => $data] , compact('data'));
    }

    public function staff(){
        $data = User::latest()->with('role')->where('role_id', 3)->get();
        return view('pengguna.data-staff' ,["title" => "Data-staff" , "data" => $data ] , compact('data'));
    }

    public function staff_create(){
        $data = Role::all();
        return view('pengguna.staff-create' ,["title" => "Staff-Createf" , "data" => $data ] , compact('data'));
    }

    public function staff_store(Request $request)
    {
        // Validasi
        $this->validate($request, [
            'name' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
        ]);
    
        // Enkripsi password
        $password = Hash::make($request->password);
    
        // Masukkan data ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'role_id' => 3,
        ]);
    
        return redirect('/data-staff')->with('success', 'Data Berhasil ditambahkan!!');
    }

    public function user_destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('/data-user')->with('succes','Data Berhasil di Delete!!');
    }

    public function staff_destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('/data-staff')->with('succes','Data Berhasil di Delete!!');
    }


   
}
