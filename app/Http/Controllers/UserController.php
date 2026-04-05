<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductCart;


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

        return redirect()->route('home');
    }


    public function home()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }

        $products = Product::latest()->take(4)->get();
        return view('index', compact('products', 'count'));
    }



    public function productDetails($id)
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }


        $product = Product::findOrFail($id);
        return view('product_details', compact("product", 'count'));
    }


    public function allProducts()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }
        $products = Product::all();
        return view('allproducts', compact('products', 'count'));
    }



    public function  addToCart($id)
    {
        $product = Product::findOrFail($id);
        $product_cart = new ProductCart();
        $product_cart->user_id = Auth::id();
        $product_cart->product_id = $product->id;

        $product_cart->save();
        return redirect()->back()->with('cart_message', 'added to the cart');
    }


    public function cartProducts()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();

            $cart = ProductCart::with('product') // ✅ IMPORTANT
                ->where('user_id', Auth::id())
                ->get();
        } else {
            $count = '';
        }

        return view('viewcartproducts', compact('count', 'cart'));
    }

    public function removeCartProduct($id)
    {
        $product_cart = ProductCart::findOrFail($id);
        $product_cart->delete();
        return redirect()->back();
    }

    public function confirmOrder()
{
    if (Auth::check()) {
        $count = ProductCart::where('user_id', Auth::id())->count();

        $cart = ProductCart::where('user_id', Auth::id())->get();
    } else {
        $count = 0;
        $cart = [];
    }

    return view('checkout', compact('cart', 'count'));
}
}
