<?php

namespace App\Http\Controllers;

use App\Models\BannerAndTitle;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use ShoppingCart;
use Validator;

class CheckoutController extends Controller
{
    //
    private $customer,$order,$orderDetail;
    public function index()
    {
        return view('frontend.medicine.checkout',[
            'banner'=>BannerAndTitle::where('page','appointment')->latest()->first(),
        ]);
    }
//    private function orderCustomerValidate($request){
//        $this->validate($request,[
//            'name'=>'required',
//            'email'=>'required|unique:customers,email',
//            'mobile'=>'required|unique:customers,mobile',
//            'delivery_address'=>'required',
//        ]);
//    }

    public function confirm_order(Request $request)
    {
//        return ShoppingCart::all();
        $order=Order::newOrder($request);

        OrderDetails::newOrderDetail($order->id);
        Alert::toast('Order Place successfully','success');
        return back();
    }

//    public function newCashOrder(Request $request)
//    {
////        return $request;
//        if (Session::get('customer_id')){
//            $this->customer = Customer::find(Session::get('customer_id'));
//        }
//        else{
//            $this->orderCustomerValidate($request); //validation function
//
//            $this->customer = Customer::newCustomer($request);
//
//            Session::put('customer_id',$this->customer->id);
//            Session::put('customer_name',$this->customer->name);
//        }
//
//
//        $this->order = Order::newOrder($request,$this->customer->id);
//
//        OrderDetail::newOrderDetail($this->order->id);
//
//
//        return redirect('/complete-order')->with('message','Congratulation... your order info post successfully. please wait, we will contact with you soon.');
//
//    }
//
//    public function completeOrder()
//    {
//        return view('website.checkout.complete-order');
//
//    }
}
