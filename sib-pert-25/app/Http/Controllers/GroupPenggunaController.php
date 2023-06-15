<?php

namespace App\Http\Controllers;

use App\Models\GroupPengguna;
use Illuminate\Http\Request;

class GroupPenggunaController extends Controller
{
    public function index(){
        $data = GroupPengguna::with('daftarPengguna')->get();
        return view('pengguna.group-pengguna', ["title" => "Group Pengguna" , "data" => $data] );
    }

    public function create(){
        $data = GroupPengguna::all();
        return view('pengguna.group-create', ["title" => "Group-create" , "data" => $data]);
    }

    public function store( Request $request){
        
        // validate
        $this->validate($request,[
            'name' => 'required|min:3|unique:group_pengguna'
        ]);

        // tambah data ke database
        GroupPengguna::create([
            "name" => $request->name
        ]);

        return redirect('/group-pengguna')->with('succes','Data Berhasil di Tambahkan!!');
    }

    public function edit($id){
        $data = GroupPengguna::where('id' , $id)->first();
        return view('pengguna.group-edit',["title" => "group-edit","data" => $data]);
    }

    public function update(Request $request){
         // validate
         $this->validate($request,[
            'name' => 'required|min:3|unique:category_products'
        ]);

        // Update ke database
        GroupPengguna::find($request->id)->update($request->all());

        return redirect('/group-pengguna')->with('succes','Data Berhasil di Edit!!');
    }

    public function delete($id)
    {
        $data = GroupPengguna::where('id', $id)->first()->delete();

        return Redirect('/group-pengguna');
    }


    

}
