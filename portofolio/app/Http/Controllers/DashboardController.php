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
        $productWaiting = DaftarProduct::where('status', 'waiting')->count();
        $users = User::where('role_id',2)->count();
        $userStaff = User::where('role_id',3)->count();
        return view('dashboard.dashboard',["title" => "Dashboard" , "category" => $category , "product" => $product, "users" => $users , "userStaff" => $userStaff , "productWaiting" => $productWaiting] , compact(["category","product","users","userStaff","productWaiting"]));
    }
}
