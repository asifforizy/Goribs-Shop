<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class UserController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->user_type == "admin") {
            return view("admin.dashboard");
        }

        return view("dashboard");
    }


    public function home(){
        $products = Product::all();
        return view('index', compact('products'));
    }



    public function productDetails($id){
        $product = Product::findOrFail($id);
        return view('product_details',compact("product"));

    }
}
