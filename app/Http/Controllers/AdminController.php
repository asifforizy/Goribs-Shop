<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;


class AdminController extends Controller
{
    public function addCategory()
    {
        return view('admin.addcategory');
    }

    public function postAddCategory(Request $request)
    {
        $category = new Category();
        $category->category = $request->category;
        $category->save();
        return redirect()->back()->with('category_message', 'Category added successfully!');
    }

    public function viewCategory()
    {
        $category = Category::all();
        return view('admin.viewcategory', compact('category'));
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('deletecategory_message', 'Deleted successfully');
    }

    public function updateCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.updatecategory', compact('category'));
    }

    public function postUpdateCategory(Request $request,  $id)
    {
        $category = Category::findOrFail($id);
        $category->category = $request->category;
        $category->save();
        return redirect()->back()->with('category_updated_message', 'Category Updated successfully!');
    }

    public function addProduct()
    {
        $categories = Category::all();
        return view('admin.addproduct', compact('categories'));
    }


    public function postAddProduct(Request $request)
    {
        $request->validate([
            'product_title' => 'required',
            'product_quantity' => 'required|numeric',
            'product_price' => 'required|numeric',
            'product_category' => 'required',
            'product_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $product = new Product();
        $product->product_title = $request->product_title;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->product_category = $request->product_category;

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);
            $product->product_image = $imagename;
        }

        $product->save();

        return redirect()->back()->with('product_message', 'Product added successfully');
    }

    public function viewProduct()
    {
        $products = Product::paginate(10);
        return view('admin.viewproduct', compact('products'));
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $image_path = public_path('products/' . $product->product_image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $product->delete();
        return redirect()->back()->with('delete_product_message', 'Deleted successfully');
    }


    public function updateProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.updateproduct', compact('product', 'categories'));
    }


    public function postUpdateProduct(Request $request, $id)
    {
        $request->validate([
            'product_title' => 'required',
            'product_quantity' => 'required|numeric',
            'product_price' => 'required|numeric',
            'product_category' => 'required',
            'product_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $product = Product::findOrFail($id);

        $product->product_title = $request->product_title;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->product_category = $request->product_category;

        // Update image (optional)
        if ($request->hasFile('product_image')) {

            // Delete old image
            if ($product->product_image) {
                $old_path = public_path('products/' . $product->product_image);
                if (file_exists($old_path)) {
                    unlink($old_path);
                }
            }

            $image = $request->file('product_image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);

            $product->product_image = $imagename;
        }

        $product->save();

        return redirect()->route('admin.viewproduct')
            ->with('product_message', 'Product updated successfully');
    }


    public function viewOrder(){
        $orders = Order::all();
        return view('admin.vieworders', compact('orders'));
    }
}
