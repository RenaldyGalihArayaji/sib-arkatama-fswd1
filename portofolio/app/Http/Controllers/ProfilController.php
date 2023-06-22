<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil.profil',["title" => "Profil" ]);
    }

    public function edit()
    {
        return view('profil.profil-edit',["title" => "Profil-edit" ]);
    }

    
    public function update(Request $request)
    {
            $request->validate([
                'no_hp' => 'required|max:15',
                'alamat' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ]);
        
            $data = Auth::user();
        
            if ($request->hasFile('image')) {
                // Simpan file gambar baru
                $image = $request->file('image');
                $fileName = 'Product_' . time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/foto-profil', $fileName);
        
            }
        
            // Update atribut lainnya
            $data->update([
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'image' => $fileName
            ]);
        
            // Redirect
            return redirect('/profil')->with('succes', 'Data Berhasil di Perbarui!');
    }


    // Profil user


    public function user()
    {
        return view('home-page.profil-user',["title" => "Profil"]);
    }

    public function userEdit()
    {
        return view('home-page.profilUser-edit',["title" => "Profil-edit" ]);
    }

    
    public function userUpdate(Request $request)
    {
            $request->validate([
                'no_hp' => 'required|max:15',
                'alamat' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ]);
        
            $data = Auth::user();
        
            if ($request->hasFile('image')) {
                // Simpan file gambar baru
                $image = $request->file('image');
                $fileName = 'Product_' . time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/foto-profil_user', $fileName);
        
            }
        
            // Update atribut lainnya
            $data->update([
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'image' => $fileName
            ]);
        
            // Redirect
            return redirect('/profil-user')->with('succes', 'Data Berhasil di Perbarui!');
    }


}
