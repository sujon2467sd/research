<?php

namespace App\Http\Controllers;

use App\Models\OrderTable;
use Illuminate\Http\Request;

class OrderAuthorController extends Controller
{
    public function tech_web_order_author(){
           return view('admin.order.order_author',[
           'orders' => OrderTable::with(['user', 'author','publication'])->latest()->get(),
           ]);
    }

    public function tech_web_order_author_status($id){

        $getstatus= OrderTable::select('status')->where('id',$id)->first();//take value from status
        if($getstatus->status==1){
            $status=0;//any type variable
         }else{
            $status=1;//any type variable
         }

         OrderTable::where('id',$id)->update(['status'=>$status]);//updated value status

         return redirect()->back()->with('success', 'Order  status change successfully!');

    }
}
