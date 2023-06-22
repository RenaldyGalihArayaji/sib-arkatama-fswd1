<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use App\Models\DaftarProduct;
use Illuminate\Support\Facades\Storage;

class DaftarProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DaftarProduct::latest()->get();
        return view('/products.daftar-product', [ "title" => "daftar-product", "data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = CategoryProduct::all();
        return view('/products.product-create', [ "title" => "product-create", "data" => $data] , compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:255',
            'category_id' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'description' => 'required|min:10',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);


        if( $request->hasFile('image')){
            $name = $request->file('image');
            $fileName = 'Product_' . time() . '.' . $name->getClientOriginalExtension();
            Storage::putFileAs('public/gambar_product', $request->file('image'), $fileName);
        }


        // // create ke database
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = DaftarProduct::with('category')->findOrFail($id);
        $dataCategory = CategoryProduct::where('id','!=', $data->category_id)->get(['id','name']);
        return view('/products.product-edit', [ "title" => "product-edit", "data" => $data ,"dataCategory" => $dataCategory] , compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
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
            $delete = Storage::delete('public/gambar_product' . $data->image);

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DaftarProduct::where('id', $id)->delete();
        return redirect('/daftar-product')->with('succes','Data Berhasil di Delete!!');
    }

    public function approve($id)
    {
        $data = DaftarProduct::where('id', $id)->first();
        $data->status = 'approve';
        $data->save();
        return redirect('/daftar-product')->with('succes','Approve Success!!');

    }

}
