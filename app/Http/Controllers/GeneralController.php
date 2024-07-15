<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BannerAndTitle;
use App\Models\FooterDetail;
use App\Models\Logo;
use App\Models\MemberDetails;
use App\Models\PaymentNumber;
use App\Models\WebsiteLinks;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class GeneralController extends Controller
{
    public function tech_web_general_settings()
    {
        return view('admin.general.general',[
            'banner_titles'=>BannerAndTitle::get(),
            'logo'=>Logo::latest()->first(),
            'links'=>WebsiteLinks::latest()->first(),
            'footer'=>FooterDetail::latest()->first(),
            'number'=>PaymentNumber::latest()->first(),
            'banners'=>Banner::get(),
        ]);
    }
    public function tech_web_profile_settings()
    {
//        return User::where('id',Auth::user()->id)->first();
        return view('admin.profile.profile',[
            'user'=>User::where('id',Auth::user()->id)->first(),
        ]);
    }



    public function tech_web_update_profile(Request $request)
    {

        User::update_profile($request);
        return back()->with('message','profile updated successfully');
    }

    public function tech_web_user_profile_settings()
    {
        return view('frontend.profile.profile',[
            'user'=>User::where('id',Auth::user()->id)->first(),
            'banner'=>BannerAndTitle::where('page','enrollment')->latest()->first(),
        ]);
    }


    public function tech_web_user_member_details(){

        // $user = Auth::user(); // Get the currently authenticated user

        // $userDetails = $user->memberDetails;

        $user = Auth::user(); // Get the currently authenticated user

    $userDetails = $user->memberDetails; // Get the associated member details

        return view('frontend.profile.member_details',[
            'user'=>User::where('id',Auth::user()->id)->first(),
            'banner'=>BannerAndTitle::where('page','enrollment')->latest()->first(),
             'user_details'=>$userDetails,
        ]);
    }

    public function tech_web_user_member_details_store(Request $request){
                // Validate the request
    $request->validate([
        'facebook' => 'nullable',
        'twitter' => 'nullable',
        'instagram' => 'nullable',
        'youtube' => 'nullable',
        'details' => 'nullable',
        // Add more validation rules as necessary
    ]);

   // Find the user by ID or create a new instance
//    $user =$request->input('id');
        $user = Auth::user();

    // Fetch the existing account details
    $account = MemberDetails::where('user_id', $user->id)->first();//fetch ডাটা for update specific user info


    // Create or update the AccountDetail instance and save it to the database
    $account = MemberDetails::updateOrCreate( //ইউজার আইডি চেক করে যদি েইউজার আইডি থাকে তাহলে সুধু আপডেট করে । আর না থাকলে ক্রেইট করে।
        ['user_id' => $user->id],//ইউজার আইডি চেক করে যদি েইউজার আইডি থাকে তাহলে সুধু আপডেট করে । আর না থাকলে ক্রেইট করে।
        [
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'details' => $request->details,

        ]
    );

    // Optionally, return a response or redirect somewhere
    return back()->with('message','Member details added successfully');
    // return redirect()->back()->with('success', 'Account details updated successfully!');
}



    public function tech_web_user_update_profile(Request $request)
    {
        User::update_profile($request);
        return back()->with('message','profile updated successfully');
    }


   
}
