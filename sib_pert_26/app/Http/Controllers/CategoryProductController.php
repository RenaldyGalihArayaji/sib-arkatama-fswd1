<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryProductController extends Controller
{
    
    public function index()
    {
        $data = CategoryProduct::with('daftarProduct')->get();
        return view('product.category-product',["title" => "Category-Product","data" => $data]);
    }

    public function create()
    {
        return view('product.category-create',["title" => "category-create"]);
    }

    public function store(Request $request) 
    {
        
        // validate
        $this->validate($request,[
            'name' => 'required|min:3|unique:category_products'
        ]);

        // tambah data ke database
        CategoryProduct::create([
            "name" => $request->name
        ]);

        return redirect('/category-product')->with('succes','Data Berhasil di Tambahkan!!');
    }

    public function edit($id)
    {
        $data = CategoryProduct::where('id' , $id)->first();
        return view('product.category-edit',["title" => "Category-edit","data" => $data]);
    }

    public function update(Request $request )
    {   
        // validate
        $this->validate($request,[
            'name' => 'required|min:3|unique:category_products'
        ]);

        // Update ke database
        CategoryProduct::find($request->id)->update($request->all());

        return redirect('/category-product')->with('succes','Data Berhasil di Edit!!');
    }

    public function delete($id)
    {
        $data = CategoryProduct::where('id', $id)->first()->delete();

        return Redirect('/category-product');
    }
}
