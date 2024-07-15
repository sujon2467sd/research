<?php

namespace App\Http\Controllers;

use App\Models\BannerAndTitle;
use App\Models\Product;
use Illuminate\Http\Request;
use ShoppingCart;


class CartController extends Controller
{
    private $product;
    //
    public function index($id,Request $request)
    {

        $this->product = Product::find($id);


        ShoppingCart::add($id, $this->product->name, $request->qty, $this->product->price, ['image' => $this->product->image1,'category'=>$this->product->category->name]);
        return redirect('/show-cart');
    }

    public function show()
    {
        return view('frontend.product.cart',[
            'cart_products'=>ShoppingCart::all(),
            'banner'=>BannerAndTitle::where('page','sponsor')->latest()->first(),
        ]);
    }

    public function remove($id)
    {
        ShoppingCart::remove($id);
        return redirect('/show-cart')->with('message','Cart product removed');

    }

//    public function update($id, Request $request)
//    {
//
//
//        ShoppingCart::update($id, $request->qty);
//        return redirect('/show-cart')->with('message','Cart product updated');
//
//    }
    public function update()
    {


        ShoppingCart::update($_GET['id'], $_GET['qty']);
//        ShoppingCart::find($_GET['id']);
//        return redirect('/show-cart')->with('message','Cart product updated');
//        return ShoppingCart::total();
         $updated = ['total'=>ShoppingCart::total(),'single_total'=>ShoppingCart::get($_GET['id'])->total];
        return $updated;

    }
}
