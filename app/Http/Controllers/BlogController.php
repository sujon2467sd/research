<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Receipt;
use App\Models\Service;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function tech_web_add_blogs()
    {
        return view('admin.blogs.blogs',[
            'blogs'=>Blog::get()
        ]);

    }

    public function tech_web_store_blogs(Request $request)
    {
        
        Blog::save_blogs($request);
        return back()->with('message','Blogs added successfully');
    }

    public function tech_web_edit_blogs($id)
    {
        return view('admin.blogs.edit_blogs',[
            'blog'=>Blog::find($id),
        ]);
    }

    public function tech_web_update_blogs(Request $request)
    {


        Blog::update_blogs($request);
        return back()->with('message','Blogs update successfully');
    }

//    sponsor start

    public function tech_web_add_sponsor()
    {
        return view('admin.sponsor.sponsor',[
            'sponsors'=>Sponsor::get()
        ]);

    }

    public function tech_web_store_sponsor(Request $request)
    {
        Sponsor::save_sponsor($request);
        return back()->with('message','Sponsor added successfully');
    }

    public function tech_web_store_receipt(Request $request)
    {
        Receipt::save_receipt($request);
        return back()->with('message','Receipt added successfully');
    }

    public function tech_web_view_receipt($id)
    {
        return view('admin.receipt.view_receipt',[
            'receipt'=>Receipt::find($id),
        ]);
    }

    public function tech_web_edit_sponsor($id)
    {
        return view('admin.sponsor.edit_sponsor',[
            'sponsor'=>Sponsor::find($id),
        ]);
    }

    public function tech_web_update_sponsor(Request $request)
    {
        Sponsor::update_sponsor($request);
        return back()->with('message','Sponsor update successfully');
    }


//    receipt
    public function tech_web_add_receipt()
    {
        return view('admin.receipt.receipt',[

        'receipts'=>Receipt::get(),
        'services'=>Service::get(),
        ]);

}
}
