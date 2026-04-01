<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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


        $category =Category::all();
        
       return view('admin.viewcategory', compact('category'));
    }


    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('deletecategory_message', 'Deleted successfully');

    }



    
}
