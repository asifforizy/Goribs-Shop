<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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


    public function  postAddProduct(Request $request)
    {
        $product = new Product();
        $product->product_title = $request->product_title;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->product_category = $request->product_category;

        $image = $request->product_image;
        if ($image) {
            $imagename = time() .'.'. $image->getClientOriginalExtension();
            $product->product_image = $imagename;
        }
        $product->save();


        if($image &&$product->save()){
            $request->product_image->move('products',$image);
        }

        return redirect()->back()->with('product_message','Product added successfully');
    }
}
