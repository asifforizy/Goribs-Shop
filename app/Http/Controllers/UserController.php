<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\Order;

class UserController extends Controller
{
    // ✅ Reusable function (BEST PRACTICE)
    private function getCartCount()
    {
        return Auth::check()
            ? ProductCart::where('user_id', Auth::id())->count()
            : 0;
    }

    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->user_type == "admin") {
            return view("admin.dashboard");
        } else {
            return view("dashboard");
        }
    }

    public function home()
    {
        $count = $this->getCartCount();

        $products = Product::latest()->take(4)->get();
        return view('index', compact('products', 'count'));
    }

    public function productDetails($id)
    {
        $count = $this->getCartCount();

        $product = Product::findOrFail($id);
        return view('product_details', compact("product", 'count'));
    }

    public function allProducts()
    {
        $count = $this->getCartCount();

        $products = Product::all();
        return view('allproducts', compact('products', 'count'));
    }

    public function addToCart($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $product = Product::findOrFail($id);

        $product_cart = new ProductCart();
        $product_cart->user_id = Auth::id();
        $product_cart->product_id = $product->id;
        $product_cart->save();

        return redirect()->back()->with('cart_message', 'Added to cart');
    }

    public function cartProducts()
    {
        $count = $this->getCartCount();

        if (Auth::check()) {
            $cart = ProductCart::with('product')
                ->where('user_id', Auth::id())
                ->get();
        } else {
            $cart = [];
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
        $count = $this->getCartCount();

        if (Auth::check()) {
            $cart = ProductCart::where('user_id', Auth::id())->get();
        } else {
            $cart = [];
        }

        return view('checkout', compact('cart', 'count'));
    }

    public function confirmOrder(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cart_products = ProductCart::where('user_id', Auth::id())->get();

        foreach ($cart_products as $cart_product) {
            $order = new Order();
            $order->receiver_name = $request->receiver_name;
            $order->receiver_address = $request->receiver_address;
            $order->receiver_phone = $request->receiver_phone;
            $order->user_id = Auth::id();
            $order->product_id = $cart_product->product_id;
            $order->save();
        }

        // Clear cart
        ProductCart::where('user_id', Auth::id())->delete();

        return redirect()->back()->with("confirm_message", "Order confirmed");
    }

    public function myOrders()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $orders = Order::where('user_id', Auth::id())->get();
        return view('viewmyorders', compact('orders'));
    }

    public function shop()
    {
        $count = $this->getCartCount();

        $products = Product::all();
        return view('allproducts', compact('products', 'count'));
    }

    public function whyUs()
    {
        $count = $this->getCartCount();

        return view('why', compact('count'));
    }

    public function testimonial()
    {
        $count = $this->getCartCount();

        return view('testimonial', compact('count'));
    }

    public function contact()
    {
        $count = $this->getCartCount();

        return view('contact', compact('count'));
    }
}