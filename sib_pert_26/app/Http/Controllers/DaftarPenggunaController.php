<?php

namespace App\Http\Controllers;

use App\Models\DaftarPengguna;
use App\Models\GroupPengguna;
use Illuminate\Http\Request;

class DaftarPenggunaController extends Controller
{
    public function index() {
        $data = DaftarPengguna::with('groupPengguna')->get();
        return view('pengguna.daftar-pengguna',["title" => "Daftar-Pengguna", "data" => $data] );
    }

    public function create() 
    {
        $data = DaftarPengguna::with('groupPengguna')->get();
        $dataGroup = GroupPengguna::with('daftarPengguna')->get();
        return view('pengguna.daftar-create',["title" => "Daftar-Create", "data" => $data , "dataGroup" => $dataGroup]);
    }
    
    public function store(Request $request) 
    {
        
        // Valadation
        $this->validate($request,[
            'name' => 'required|max:255',
            'gender' => 'required',
            'address' => 'required',
            'group_id' => 'required'
        ]);

        DaftarPengguna::create([
            "name" => $request->name,
            "gender" => $request->gender,
            "address" => $request->address,
            "group_id" => $request->group_id
        ]);

    

        return redirect('/daftar-pengguna')->with('succes','Data Berhasil ditambahkan ');
    }

    public function edit($id)
    {
        $data = DaftarPengguna::where('id' , $id)->first();
        $dataGroup = GroupPengguna::with('daftarPengguna')->get(['id','name']);;
        return view('pengguna.daftar-edit',["title" => "Daftar-edit", "data" => $data ,"dataGroup" => $dataGroup ]);
    }

    public function update(Request $request)
    {
         // Valadation
         $this->validate($request,[
            'name' => 'required|max:255',
            'gender' => 'required',
            'address' => 'required',
            'group_id' => 'required'
        ]);

        // updata data ke database
        DaftarPengguna::where('id' , $request->id)->first()->update($request->all());

        // Redirect
        return redirect('/daftar-pengguna')->with('succes','Data Berhasil ditambahkan ');
    }

    public function delete($id)
    {
        DaftarPengguna::where('id' , $id)->first()->delete();

        return redirect('/daftar-pengguna');
    }


}
