<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\DaftarProduct;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $category = CategoryProduct::count();
        $product = DaftarProduct::count();
        $user = User::count();
        return view('dashboard.dashboard',["title" => "Dashboard" , "category" => $category , "product" => $product, "user" => $user] , compact(["category","product","user"]));
    }
}
