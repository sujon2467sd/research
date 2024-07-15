<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function tech_web_add_category()
    {
        return view('admin.category.category',[
            'categories'=>Category::get()
        ]);

    }

    public function tech_web_store_category(Request $request)
    {
        Category::save_category($request);
        return back()->with('message','Category added successfully');
    }

    public function tech_web_edit_category($id)
    {
        return view('admin.category.edit_category',[
            'category'=>Category::find($id),
        ]);
    }

    public function tech_web_update_category(Request $request)
    {
        Category::update_category($request);
        return back()->with('message','Category update successfully');
    }
}
