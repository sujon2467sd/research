<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Logo;

use App\Models\Team;
use App\Models\User;
use App\Models\About;
use App\Models\Author;
use App\Models\Banner;
use App\Models\Notice;
use App\Models\Counter;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Service;
use App\Models\Sponsor;
use App\Models\Category;
use App\Models\Research;
use App\Models\Enrollment;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\MemberDetails;
use App\Models\PaymentNumber;
use App\Models\BannerAndTitle;
use App\Models\Enrollmentform;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\EnrollCertificate;
use App\Models\EnrollmentformInfo;
use App\Models\OrderTable;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class WebsiteController extends Controller
{
    public function tech_web_home()
    {
        return view('frontend.home.home',[
            'services'=>Service::where('status',1)->where('service_home',1)->get(),
            'galleries'=>Gallery::where('status',1)->where('add_home',1)->take(6)->get(),
            'banners'=>Banner::get(),
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first(),
            'testimonial_title'=>BannerAndTitle::where('page','testimonial')->latest()->first(),
            'testimonials'=>Testimonial::where('status',1)->where('add_home',1)->get(),
            'blogs'=>Blog::where('status',1)->where('add_home',1)->get(),
            'footer_blogs'=>Blog::where('status',1)->where('add_home',1)->take(2)->get(),
            'about'=>DB::table('abouts')->latest()->first(),
            'titles'=>BannerAndTitle::get(),
            'notices'=>Notice::where('status',1)->take(6)->get(),
            'counter'=>Counter::where('status',1)->latest()->first(),


        ]);
    }



    public function tech_web_sub_menu_details($id)
    {
        return view('frontend.consultancy.consultancy_page',[
            'consultancy'=>DB::table('sub_menus')->find($id),
        ]);
    }
    public function tech_web_services_details($id)
    {
        return view('frontend.services.service_details',[
            'service'=>Service::find($id),
            'services'=>Service::where('status',1)->where('service_home',1)->get(),
        ]);
    }



    public function tech_web_all_services()
    {
        return view('frontend.services.all_services',[
            'services'=>Service::where('status',1)->paginate(8),
            'banner'=>BannerAndTitle::where('page','courses')->latest()->first(),
        ]);
    }
//
    public function tech_web_about_page($id)
    {
        return view('frontend.about.about_page',[
            'about'=>DB::table('abouts')->find($id),
            'testimonials'=>Testimonial::where('status',1)->where('add_home',1)->get(),
            'teams'=>Team::where('status',1)->get(),
            'banner'=>BannerAndTitle::where('page','instructor')->latest()->first(),

        ]);
    }

    public function tech_web_about_us(){
           return view('frontend.about.about_us_page',[
            'about_us'=>About::latest()->first(),

           ]);
    }

    public function tech_web_consultancy_page()
    {
        return view('frontend.consultancy.consultancy_page',[
            'consultancy'=>DB::table('consultancies')->latest()->first(),
        ]);
    }
    public function tech_web_team_page()
    {
        return view('frontend.team.team_page',[
            // 'teams'=>Team::where('status',1)->paginate(8),
            'banner'=>BannerAndTitle::where('page','instructor')->latest()->first(),
            'teams'=>User::where('is_admin',0)->with('memberDetails')->latest()->paginate(10),
            // 'details'=>MemberDetails::get(),

        ]);
    }


    public function tech_web_team_single_publication($id){
        return view('frontend.team.single_publication',[
            'banner'=>BannerAndTitle::where('page','enrollment')->latest()->first(),
            'teams'=>User::with('memberDetails')->findOrFail($id),




        ]);

    }




    public function managingcommitte ()
    {
        return view('frontend.team.team_page',[
            'teams'=>Team::where('status',0)->where('committe','1')->paginate(8),
            'banner'=>BannerAndTitle::where('page','instructor')->latest()->first(),
        ]);
    }
    public function advisercommitte ()
    {
        return view('frontend.team.team_page',[
            'teams'=>Team::where('status',1)->where('committe','2')->paginate(8),
            'banner'=>BannerAndTitle::where('page','instructor')->latest()->first(),
        ]);
    }

    public function tech_web_blogs_page()
    {
        return view('frontend.blogs.blogs_page',[
            'banner'=>BannerAndTitle::where('page','enrollment')->latest()->first(),
            // 'blogs'=>Blog::where('status',1)->paginate(6),
            // 'banner'=>BannerAndTitle::where('page','blogs')->latest()->first(),


        ]);
    }

    public function tech_web_blogs_page_store(Request $request){

        Blog::save_blogs($request);
        return back()->with('message','Blogs added successfully');
    }

    public function tech_web_blogs_publications(){

        return view('frontend.blogs.publish_blog',[
            'banner'=>BannerAndTitle::where('page','enrollment')->latest()->first(),
            'blogs' => Blog::where('status', 1)->latest()->paginate(4),
            'recent_blogs' => Blog::orderBy('created_at', 'desc')->where('status',1)->take(5)->get(),
            // 'authors'=>Author::get(),



            // 'order'=>OrderTable::where('status',1)

        ]);
    }

public function tech_web_order_author(Request $request){

    $request->validate([

        'name' => 'required|string|max:255',
        'number' => 'required',
        'payment' => 'required|string|max:255',
        'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

    ]);



    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('admin/payment'), $imageName);
    } else {
        $imageName = null;
    }

    $user = Auth::user();
    $order = new OrderTable();
    $order->user_id=$user->id;
    $order->publication_id=$request->publication_id;
    $order->author_id= $request->author_id;
    $order->name = $request->name;
    $order->number = $request->number;
    $order->img=$imageName;
    $order->payment= $request->payment;

    $order->save();

    // Optionally, you may return a response or redirect somewhere
    return redirect()->route('order.success')->with('message', 'Order  successfully done');
}

public function tech_web_order_success(){
    return view('frontend.blogs.order_success',[
        'banner'=>BannerAndTitle::where('page','enrollment')->latest()->first(),
        'congress'=>OrderTable::latest()->first(),
    ]);
}


    public function tech_web_blogs_details($id)
    {
        return view('frontend.blogs.blogs_details',[
            'blog'=>Blog::find($id),
            'authors'=>Author::get(),

        ]);
    }




    public function sponsor_page()
    {
        return view('frontend.sponsor.sponsor_page',[
            'sponsors'=>Sponsor::where('status',1)->paginate(12),
            'banner'=>BannerAndTitle::where('page','sponsor')->latest()->first(),
        ]);
    }

    public function certificate_verify()
    {
        return view('frontend.certificate.certificate_verify',[
            'services'=>Service::where('status',1)->get(),
            'users'=>User::where('is_admin',0)->get(),
            'banner'=>BannerAndTitle::where('page','sponsor')->latest()->first(),
            'data'=>null,
        ]);
    }

    public function check_certificate(Request $request)
    {
//        dd();
        $user_id= User::where('roll_no',$request->roll)->first();
        if($user_id) {
            return view('frontend.certificate.certificate_verify', [
                'services' => Service::where('status', 1)->get(),
                'users' => User::where('is_admin', 0)->get(),
                'banner' => BannerAndTitle::where('page', 'sponsor')->latest()->first(),
                'data' => EnrollCertificate::where('user_id', $user_id->id)->where('service_id', $request->service_id)->first()->enroll_certificate ?? null,
            ]);
        }else{
            return redirect()->route('certificate.verify')->with('message','Not found');
        }

    }


    public function tech_web_research_page()
    {
        return view('frontend.research.research_page',[
            'researches'=>Research::where('status',1)->paginate(6),
            'banner'=>BannerAndTitle::where('page','research')->latest()->first(),
        ]);
    }
    public function tech_web_research_details($id)
    {
        return view('frontend.research.research_details',[
            'research'=>Research::find($id),

        ]);
    }
//
    public function tech_web_contacts()
    {
        return view('frontend.contact.contact',[
            'banner'=>BannerAndTitle::where('page','contacts')->latest()->first(),
        ]);

    }

    public function tech_web_enrollment($id)
    {
        return view('frontend.enrollment.enrollment',[
            'service'=>Service::find($id),
            'enrollment_info'=>EnrollmentformInfo::latest()->first(),
            'numbers'=>PaymentNumber::latest()->first(),
        ]);
    }
    public function admissionnow()
    {
        return view('frontend.enrollment.admission',[
            'services'=>Service::all(),
            'enrollment_info'=>EnrollmentformInfo::latest()->first(),
            'numbers'=>PaymentNumber::latest()->first(),
        ]);
    }

    public function tech_web_enrollment_page()
    {
        return view('frontend.enrollment.enrollment_page',[
            'enroll_data' => Enrollmentform::where('user_id',Auth::user()->id)->with('service','user')->get(),
            'enrollments'=>EnrollCertificate::where('user_id',Auth::user()->id)->with('service','user')->get(),
            'banner'=>BannerAndTitle::where('page','enrollment')->latest()->first(),
        ]);

    }

    public function tech_web_enroll(Request $request)
    {
        Enrollment::save_enrollment($request);
        Alert::toast('Enrollment Request Sent','success');
        return back();
    }

    public function tech_web_gallery()
    {
        return view('frontend.gallery.gallery_page',[
            'galleries'=>Gallery::where('status',1)->get(),
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first(),

        ]);
    }

    public function tech_web_manage_enrollment()
    {
        return view('admin.enrollment.manage_enrollment',[
            'enrollments'=>Enrollmentform::with('service','user')->get(),

        ]);
    }

    public function tech_web_update_enrollment($id)
    {
        $enrollment = Enrollmentform::find($id);
        if ($enrollment->status == 0){
            $enrollment->status = 1;
        }else{
            $enrollment->status = 0;
        }
        $enrollment->save();
        return back();
    }

    // store enrollment form data from the user site
    public function tech_web_store_enrollment_form_data(Request $request){

        $user_roll = Auth::user();
        $user_id = Auth::user()->id;

        $file = $request->file('photo');
        $fileName = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('enrollmentimage/student'),$fileName);
        $save_url = 'enrollmentimage/student/'.$fileName; //insert photo into database

// return $request;

        Enrollmentform::insert([
            'b_name' => $request->b_name,
            'service_id' => $request->service_id,
            'english_name' => $request->english_name,
            'user_id' => $user_id,
            'roll_no' => $user_roll->roll_no,
            'division' => $request->division,
            'school_name' => $request->school_name,
            'father_name' => $request->father_name,
            'father_profession' => $request->father_profession,
            'mother_name' => $request->mother_name,
            'mother_profession' => $request->mother_profession,
            'alter_guardian' => $request->alter_guardian,
            'relation' => $request->relation,
            'dob' => $request->dob,
            'religion' => $request->religion,
            'personal_mobile' => $request->personal_mobile,
            'guardian_mobile' => $request->guardian_mobile,
            'present_address' => $request->present_address,
            'post_office' => $request->post_office,
            'upzilla_name' => $request->upzilla_name,
            'district_name' => $request->district_name,
            'photo' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();

    }

    public function tech_web_add_enrollment_info(){

        $enrollment_info = EnrollmentformInfo::latest()->first();
        return view('admin.enrollment.add_enrollment_info',compact('enrollment_info'));
    }

    public function tech_web_store_enrollment_info(Request $request){
// dd($request);

        if($request->id){

            $enrollform_id = $request->id;

            EnrollmentformInfo::findOrFail($enrollform_id)->update([
                'institute_name' => $request->institute_name,
                'institute_address' => $request->institute_address,
                'institute_owner' => $request->institute_owner,
                'institute_Instructions' => $request->institute_Instructions,
                'updated_at' => Carbon::now(),
            ]);

        }else{
            EnrollmentformInfo::insert([
                'institute_name' => $request->institute_name,
                'institute_address' => $request->institute_address,
                'institute_owner' => $request->institute_owner,
                'institute_Instructions' => $request->institute_Instructions,
                'created_at' => Carbon::now(),
            ]);

        }
        return redirect()->back();

    }

    public function tech_web_download_enrollment($id){

        $enroll_data = Enrollmentform::with('user','service')->find($id);
        // dd($enroll_data);
        $logo = Logo::find(1);

        $pdf = Pdf::loadView('admin.enrollment.enrollment_invoice_pdf', compact('enroll_data','logo'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

    }

    public function tech_web_enroll_certificate($id){

               $enroll_data = Enrollmentform::find($id);
        // dd($enroll_data);
        return view('admin.enrollment.enroll_certificate',compact('enroll_data'));
    }
    public function allnoticepage(){

                $notices = Notice::where('status',1)->paginate(20);
        // dd($enroll_data);
        return view('frontend.notice.notice',compact('notices'));
    }

    public function tech_web_store_enroll_certificate(Request $request){
        $enroll_data = Enrollmentform::find($request->id);
        // dd($enroll_data);

        $file = $request->file('enroll_certificate');
        $fileName = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('enroll_certificate/certificate'),$fileName);
        $save_url = 'enroll_certificate/certificate/'.$fileName; //insert photo into database

        EnrollCertificate::insert([
            'service_id' => $enroll_data->service_id,
            'user_id' => $enroll_data->user_id,
            'mobile' => $enroll_data->personal_mobile,
            'enroll_certificate' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->to('manage-enrollment')->with('message','Enrollment Certificate Upload Successfully');
    }

    public function tech_web_product_page()
    {
        return view('frontend.product.product_page',[
            'banner' => BannerAndTitle::where('page', 'sponsor')->latest()->first(),
            'products'=>Product::where('status',1)->where('add_home',1)->paginate(9),
            'categories'=>Category::get(),
        ]);
    }

    public function tech_web_product_details($id)
    {
        return view('frontend.product.product_details',[
            'banner' => BannerAndTitle::where('page', 'sponsor')->latest()->first(),
            'product'=>Product::find($id),

        ]);
    }


}
