<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()  {
        $data = CategoryProduct::count();
        return view('dashboard.dashboard',["title" => "Dashboard","data" => $data]);
    }
}
