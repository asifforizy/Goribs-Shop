<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\Order;


class UserController extends Controller
{
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->user_type == "admin") {
            return view("admin.dashboard");
        } else if ($user->user_type == "user") {
            return view("dashboard");
        }
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

            $cart = ProductCart::with('product')
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

    public function orderDetails()
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



    public function confirmOrder(Request $request)
    {

        $cart_product_id = ProductCart::where('user_id', Auth::id())->get();
        $name = $request->receiver_name;
        $address = $request->receiver_address;
        $phone = $request->receiver_phone;


        foreach ($cart_product_id as  $cart_product) {
            $order = new Order();
            $order->receiver_name = $name;
            $order->receiver_address = $address;
            $order->receiver_phone = $phone;
            $order->user_id  =  Auth::id();
            $order->product_id =  $cart_product->product_id;
            $order->save();
        }
        $cart = ProductCart::where('user_id', Auth::id())->get();
        foreach ($cart as $cart) {

            $cart_id = ProductCart::findOrFail($cart->id);
            $cart_id->delete();
        }

        return redirect()->back()->with("confirm_message", "Order confirmed");
    }

    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('viewmyorders', compact('orders'));
    }

    public function shop()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }
        $products = Product::all();
        return view('allproducts', compact('products', 'count'));
    }

    public function whyUs()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }
        $products = Product::all();
        return view('why', compact('products', 'count'));
    }


    public function testimonial()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }
        $products = Product::all();
        return view('testimonial', compact('products', 'count'));
    }
    public function contact()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }
        $products = Product::all();
        return view('contact', compact('products', 'count'));
    }




}
