<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\DaftarProduct;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $product = DaftarProduct::latest()->with('category')->paginate(12);
        $slider = Slider::all();
        $category = CategoryProduct::count();
        $user = User::count();
        return view('home-page.index', ["title" => "Home-Page" , "product" => $product , "slider" => $slider , "category" => $category , "user" => $user], compact(['product','slider','category','user']));
    }

    public function show($id)
    {
        $data = DaftarProduct::with('category')->where('id',$id)->first();
        return view('home-page.detail-product', ["title" => "Home-Page" , "product" => $data ], compact('data'));
    }

    public function all_product(Request $request)
    {
        $search = $request->input('search');

        $data = DaftarProduct::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate(25);

        return view('home-page.all-product', ["title" => "All-Product" , "data" => $data ], compact('data'));
    }

}
