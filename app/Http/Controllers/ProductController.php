<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function tech_web_add_product()
    {
        return view('admin.product.product',[
            'products'=>Product::get(),
            'categories'=>Category::get(),
        ]);

    }

    public function tech_web_store_product(Request $request)
    {

        Product::save_product($request);
        return back()->with('message','Product added successfully');
    }

    public function tech_web_edit_product($id)
    {

        return view('admin.product.edit_product',[
            'product'=>Product::find($id),
            'categories'=>Category::get(),

        ]);
    }

    public function tech_web_update_product(Request $request)
    {
//        return $request;
        Product::update_product($request);
        return back()->with('message','Product update successfully');
    }
}
