<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarProduct;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Storage;

class DaftarProductController extends Controller
{
    
    public function index()  
    {
        $data = DaftarProduct::with('categoryProduct')->get();
        return view('product.daftar-product', ["title" => "Daftar Product" , "data" => $data]);
    }

    public function create()  
    {
        $data = CategoryProduct::with('daftarProduct')->get();
        return view('product.daftar-create', ["title" => "Daftar Create" , "data" => $data]);
    }

    public function store( Request $request)  
    {
        
        // validate
        $this->validate($request,[
            'name' => 'required|max:255',
            'category_id' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' =>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        // Cek apakah upload file
        if ($request->hasFile('image')) {
            $name = $request->file('image');
            $fileName = 'Product_' . time() . '.' . $name->getClientOriginalExtension();
            $path = Storage::putFileAs('public/gambar_product', $request->file('image'), $fileName);
        }

        // create ke database
        DaftarProduct::create([
            "name" => $request->name,
            "category_id" => $request->category_id,
            "qty" => $request->qty,
            "price" => $request->price,
            "description" => $request->description,
            "image" => $fileName
        ]);

        // Rederect
        return redirect('/daftar-product')->with('succes','Data Berhasil di Tambahkan!!');

    }

    public function edit($id) 
    {
        $data = DaftarProduct::where('id' , $id)->first();
        $dataCategory = CategoryProduct::with('daftarProduct')->get(['id','name']);
        return view('product.daftar-edit',["title" => "daftar-edit","data" => $data , "dataCategory" => $dataCategory]);
    }

    public function update(Request $request)
    {
        
        // validate
         $this->validate($request,[
            'name' => 'required|max:255',
            'category_id' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' =>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $data = DaftarProduct::where('id', $request->id)->first();

            // Cek apakah upload file
        if ($request->hasFile('image')) {

                // Menghapus file lama dari storage
                $delete = Storage::delete('public/gambar_product/' . $data->image);

                // Upload file baru dengan format nama ditentukan
                $name = $request->file('image');
                $fileName = 'Produk_' . time() . '.' . $name->getClientOriginalExtension();
                $path = Storage::putFileAs('public/gambar_product', $request->file('image'), $fileName);

                // Update file di database
                $data->update([
                    'image' => $fileName,
                ]);

                // create ke database
                $data->update([
                "name" => $request->name,
                "category_id" => $request->category_id,
                "qty" => $request->qty,
                "price" => $request->price,
                "description" => $request->description,
                "image" => $fileName
                ]);
        }

        // Rederect
        return redirect('/daftar-product')->with('succes','Data Berhasil di Update!!');
    }

    public function delete($id)
    {
        $data = DaftarProduct::where('id', $id)->first()->delete();

        return Redirect('/daftar-product');
    }

}
