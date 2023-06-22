<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CategoryProduct::latest()->with('product')->get();
        return view('/products.category-product', [ "title" => "category-product", "data" => $data] , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.category-create',[ "title" => "category-create"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // form validasi
        $this->validate($request,[
            'name' => 'required|min:5|max:150|unique:category_products'
        ]);

        // tambah data
        CategoryProduct::create($request->all());
        
        // redirect
        return redirect('/category-product')->with('succes','Data Berhasi di Tambahkan');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = CategoryProduct::where('id' , $id)->first();
        return view('/products.category-edit', [ "title" => "category-edit", "data" => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // form validasi
        $this->validate($request,[
            'name' => 'required|min:5|max:150|unique:category_products'
        ]);

        // tambah data
        CategoryProduct::find($request->id)->update($request->all());
        
        // redirect
        return redirect('/category-product')->with('succes','Data Berhasi di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CategoryProduct::where('id' , $id)->delete();
        return redirect('/category-product');
    }

    public function approve($id)
    {
        $data = CategoryProduct::where('id', $id)->first();
        $data->status = 'approve';
        $data->save();
        return redirect('/category-product')->with('succes','Approve Success!!');

    }
}
