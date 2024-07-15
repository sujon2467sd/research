<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\ConsultancyController;
use App\Http\Controllers\OrderAuthorController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BannerAndTitleController;
use App\Http\Controllers\WebsiteSettingsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[WebsiteController::class,'tech_web_home'])->name('front.page');
Route::get('/services-details/{id}', [WebsiteController::class, 'tech_web_services_details'])->name('services.details');
Route::get('/all-services', [WebsiteController::class, 'tech_web_all_services'])->name('services');

Route::get('/about-page/{id}', [WebsiteController::class, 'tech_web_about_page'])->name('about.page');
Route::get('/about-us', [WebsiteController::class, 'tech_web_about_us'])->name('about.us');

Route::get('/tech-web-team_page', [WebsiteController::class, 'tech_web_team_page'])->name('team.page');
Route::get('/testimonial-page', [WebsiteController::class, 'tech_web_testimonial_page'])->name('testimonial.page');
Route::get('/team-single-publication/{id}', [WebsiteController::class, 'tech_web_team_single_publication'])->name('team.single.publication');

//blog route start
Route::get('/blogs-page', [WebsiteController::class, 'tech_web_blogs_page'])->name('blogs.page');
Route::post('/blogs-page-store', [WebsiteController::class, 'tech_web_blogs_page_store'])->name('blogs.page.store');
Route::get('/blogs-publications', [WebsiteController::class, 'tech_web_blogs_publications'])->name('blogs.page.publications');
Route::get('/blogs-details/{id}', [WebsiteController::class, 'tech_web_blogs_details'])->name('blogs.details');
//blog route end

// order author start
Route::post('/order-author', [WebsiteController::class, 'tech_web_order_author'])->name('order.author');
Route::get('/order-success', [WebsiteController::class, 'tech_web_order_success'])->name('order.success');
// order author end

Route::get('/consultancy-page', [WebsiteController::class, 'tech_web_consultancy_page'])->name('consultancy.page');
Route::get('/research-page', [WebsiteController::class, 'tech_web_research_page'])->name('research.page');
Route::get('/research-details/{id}', [WebsiteController::class, 'tech_web_research_details'])->name('research.details');
Route::get('/sub-menu-details/{id}', [WebsiteController::class, 'tech_web_sub_menu_details'])->name('submenu.details');
Route::get('/managing/committe', [WebsiteController::class, 'managingcommitte']);
Route::get('/advisor/committe', [WebsiteController::class, 'advisercommitte']);
Route::get('/all/notice', [WebsiteController::class, 'allnoticepage'])->name('allnotice.page');
Route::get('/admission/now', [WebsiteController::class, 'admissionnow'])->name('admission.page');

Route::get('/sponsor-page', [WebsiteController::class, 'sponsor_page'])->name('sponsor.page');
Route::get('/certificate-verify', [WebsiteController::class, 'certificate_verify'])->name('certificate.verify');
Route::get('/check-certificate', [WebsiteController::class, 'check_certificate'])->name('check.certificate');

Route::get('/product-page', [WebsiteController::class, 'tech_web_product_page'])->name('product.page');
Route::get('/product-details/{id}', [WebsiteController::class, 'tech_web_product_details'])->name('product.details');

//cart start
Route::post('/add-to-cart/{id}',[CartController::class,'index'])->name('add-to-cart');
Route::get('/show-cart',[CartController::class,'show'])->name('show-cart');
Route::get('/remove-cart-product/{id}',[CartController::class,'remove'])->name('remove-cart-product');
Route::get('/update-cart-product',[CartController::class,'update'])->name('update-cart-product');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout')->middleware('is_user');
Route::post('/confirm-order',[CheckoutController::class,'confirm_order'])->name('confirm.order')->middleware('is_user');
//cart end




//---
Route::get('/gallery-page', [WebsiteController::class, 'tech_web_gallery'])->name('gallery.page');
Route::get('/contacts', [WebsiteController::class, 'tech_web_contacts'])->name('contacts');

Route::get('/user-profile-settings', [GeneralController::class, 'tech_web_user_profile_settings'])->name('user.profile.settings')->middleware('is_user');
Route::get('/user-member-details', [GeneralController::class, 'tech_web_user_member_details'])->name('user.member.details')->middleware('is_user');
// Route::get('/user-publish-post', [GeneralController::class, 'user_publish_post'])->name('user.publish.post')->middleware('is_user');

Route::post('/user-member-details-store', [GeneralController::class, 'tech_web_user_member_details_store'])->name('user.member.details.store')->middleware('is_user');
Route::post('/user-update-profile', [GeneralController::class, 'tech_web_user_update_profile'])->name('user.update.profile')->middleware('is_user');

//team mate


Route::get('/enrollment/{id}', [WebsiteController::class, 'tech_web_enrollment'])->name('enrollment')->middleware('is_user');
Route::get('/enrollment-page', [WebsiteController::class, 'tech_web_enrollment_page'])->name('enrollment.page')->middleware('is_user');
Route::post('/enroll', [WebsiteController::class, 'tech_web_enroll'])->name('enroll')->middleware('is_user');
Route::post('/enrollment_data', [WebsiteController::class, 'tech_web_store_enrollment_form_data'])->name('store.enrollment.form.data')->middleware('is_user');



//contact start
Route::post('/contact', [WebsiteSettingsController::class, 'tech_web_contact'])->name('contact');
//contact end

Auth::routes();

Route::get('/home', [HomeController::class, 'tech_web_index'])->name('home');
Route::get('admin/home', [HomeController::class, 'tech_web_adminHome'])->name('admin.home')->middleware('is_admin');

//gallery start
Route::get('/add-gallery', [GalleryController::class, 'tech_web_add_gallery'])->name('add.gallery')->middleware('is_admin');
Route::post('/store-gallery', [GalleryController::class, 'tech_web_store_gallery'])->name('store.gallery')->middleware('is_admin');
Route::get('/edit-gallery/{id}', [GalleryController::class, 'tech_web_edit_gallery'])->name('edit.gallery')->middleware('is_admin');
Route::post('/update-gallery', [GalleryController::class, 'tech_web_update_gallery'])->name('update.gallery')->middleware('is_admin');
//gallery end

//service start
Route::get('/add-services', [ServiceController::class, 'tech_web_add_services'])->name('add.services')->middleware('is_admin');
Route::post('/store-services', [ServiceController::class, 'tech_web_store_services'])->name('store.services')->middleware('is_admin');
Route::get('/edit-services/{id}', [ServiceController::class, 'tech_web_edit_services'])->name('edit.services')->middleware('is_admin');
Route::post('/update-services', [ServiceController::class, 'tech_web_update_services'])->name('update.services')->middleware('is_admin');
//service end

//about start
Route::get('/add-about', [AboutController::class, 'add_about'])->name('add.about')->middleware('is_admin');
Route::post('/store-about', [AboutController::class, 'store_about'])->name('store.about')->middleware('is_admin');
Route::get('/edit-about/{id}', [AboutController::class, 'edit_about'])->name('edit.about')->middleware('is_admin');
Route::post('/update-about', [AboutController::class, 'update_about'])->name('update.about')->middleware('is_admin');
Route::get('/delete-about/{id}', [AboutController::class, 'delete_about'])->name('delete.about')->middleware('is_admin');
//about end

//team start
Route::get('/add-team', [TeamController::class, 'tech_web_add_team'])->name('add.team')->middleware('is_admin');
Route::post('/store-team', [TeamController::class, 'tech_web_store_team'])->name('store.team')->middleware('is_admin');
Route::get('/edit-team/{id}', [TeamController::class, 'tech_web_edit_team'])->name('edit.team')->middleware('is_admin');
Route::post('/update-team', [TeamController::class, 'tech_web_update_team'])->name('update.team')->middleware('is_admin');
//team end
//team start
Route::get('/add-menu', [TeamController::class, 'tech_web_add_menu'])->name('add.menu')->middleware('is_admin');
Route::post('/store-menu', [TeamController::class, 'tech_web_store_menu'])->name('store.menu')->middleware('is_admin');
Route::get('/edit-menu/{id}', [TeamController::class, 'tech_web_edit_menu'])->name('edit.menu')->middleware('is_admin');
Route::post('/update-menu', [TeamController::class, 'tech_web_update_menu'])->name('update.menu')->middleware('is_admin');
//team end
//team start
Route::get('/add-sub-menu', [TeamController::class, 'tech_web_add_sub_menu'])->name('add.sub.menu')->middleware('is_admin');
Route::post('/store-sub-menu', [TeamController::class, 'tech_web_store_sub_menu'])->name('store.sub.menu')->middleware('is_admin');
Route::get('/edit-sub-menu/{id}', [TeamController::class, 'tech_web_edit_sub_menu'])->name('edit.sub.menu')->middleware('is_admin');
Route::post('/update-sub-menu', [TeamController::class, 'tech_web_update_sub_menu'])->name('update.sub.menu')->middleware('is_admin');
//team end

//testimonial start
Route::get('/add-testimonial', [TestimonialController::class, 'tech_web_add_testimonial'])->name('add.testimonial')->middleware('is_admin');
Route::post('/store-testimonial', [TestimonialController::class, 'tech_web_store_testimonial'])->name('store.testimonial')->middleware('is_admin');
Route::get('/edit-testimonial/{id}', [TestimonialController::class, 'tech_web_edit_testimonial'])->name('edit.testimonial')->middleware('is_admin');
Route::post('/update-testimonial', [TestimonialController::class, 'tech_web_update_testimonial'])->name('update.testimonial')->middleware('is_admin');
//testimonial end

//Order Author
Route::get('/order-author', [OrderAuthorController::class, 'tech_web_order_author'])->name('order.author')->middleware('is_admin');
Route::get('/order-status/{id}', [OrderAuthorController::class, 'tech_web_order_author_status'])->name('order.author.status')->middleware('is_admin');
// end order author

//Blogs start
Route::get('/add-blogs', [BlogController::class, 'tech_web_add_blogs'])->name('add.blogs')->middleware('is_admin');
Route::post('/store-blogs', [BlogController::class, 'tech_web_store_blogs'])->name('store.blogs')->middleware('is_admin');
Route::get('/edit-blogs/{id}', [BlogController::class, 'tech_web_edit_blogs'])->name('edit.blogs')->middleware('is_admin');
Route::post('/update-blogs', [BlogController::class, 'tech_web_update_blogs'])->name('update.blogs')->middleware('is_admin');
//Blogs end

//author start
Route::resource('/author', AuthorController::class);
Route::get('/author-assign', [AuthorController::class, 'tech_web_authors_assign'])->name('author.assign')->middleware('is_admin');
Route::post('/author-assign-store', [AuthorController::class, 'tech_web_authors_assign_store'])->name('author.assign.store')->middleware('is_admin');
//author end

//Sponsor start
Route::get('/add-sponsor', [BlogController::class, 'tech_web_add_sponsor'])->name('add.sponsor')->middleware('is_admin');
Route::post('/store-sponsor', [BlogController::class, 'tech_web_store_sponsor'])->name('store.sponsor')->middleware('is_admin');
Route::get('/edit-sponsor/{id}', [BlogController::class, 'tech_web_edit_sponsor'])->name('edit.sponsor')->middleware('is_admin');
Route::post('/update-sponsor', [BlogController::class, 'tech_web_update_sponsor'])->name('update.sponsor')->middleware('is_admin');
//Sponsor end


//Category start
Route::get('/add-category', [CategoryController::class, 'tech_web_add_category'])->name('add.category')->middleware('is_admin');
Route::post('/store-category', [CategoryController::class, 'tech_web_store_category'])->name('store.category')->middleware('is_admin');
Route::get('/edit-category/{id}', [CategoryController::class, 'tech_web_edit_category'])->name('edit.category')->middleware('is_admin');
Route::post('/update-category', [CategoryController::class, 'tech_web_update_category'])->name('update.category')->middleware('is_admin');
//Category end

//Brand start
Route::get('/add-product', [ProductController::class, 'tech_web_add_product'])->name('add.product')->middleware('is_admin');
Route::post('/store-product', [ProductController::class, 'tech_web_store_product'])->name('store.product')->middleware('is_admin');
Route::get('/edit-product/{id}', [ProductController::class, 'tech_web_edit_product'])->name('edit.product')->middleware('is_admin');
Route::post('/update-product', [ProductController::class, 'tech_web_update_product'])->name('update.product')->middleware('is_admin');
//Brand end

//Sponsor start
Route::get('/add-receipt', [BlogController::class, 'tech_web_add_receipt'])->name('add.receipt')->middleware('is_admin');
Route::post('/store-receipt', [BlogController::class, 'tech_web_store_receipt'])->name('store.receipt')->middleware('is_admin');
Route::get('/view-receipt/{id}', [BlogController::class, 'tech_web_view_receipt'])->name('view.receipt')->middleware('is_admin');
//Sponsor end

//Research start
Route::get('/add-research', [ResearchController::class, 'tech_web_add_research'])->name('add.research')->middleware('is_admin');
Route::post('/store-research', [ResearchController::class, 'tech_web_store_research'])->name('store.research')->middleware('is_admin');
Route::get('/edit-research/{id}', [ResearchController::class, 'tech_web_edit_research'])->name('edit.research')->middleware('is_admin');
Route::post('/update-research', [ResearchController::class, 'tech_web_update_research'])->name('update.research')->middleware('is_admin');
//Research end

//Consultancy start
Route::get('/add-consultancy', [ConsultancyController::class, 'tech_web_add_consultancy'])->name('add.consultancy')->middleware('is_admin');
Route::post('/store-consultancy', [ConsultancyController::class, 'tech_web_store_consultancy'])->name('store.consultancy')->middleware('is_admin');
//Consultancy end

//manage enrollment start
Route::get('/manage-enrollment', [WebsiteController::class, 'tech_web_manage_enrollment'])->name('mange.enrollment')->middleware('is_admin');
Route::get('/update-enrollment/{id}', [WebsiteController::class, 'tech_web_update_enrollment'])->name('update.enrollment')->middleware('is_admin');
Route::get('/download_enrollment/{id}', [WebsiteController::class, 'tech_web_download_enrollment'])->name('download.enrollment')->middleware('is_user');
Route::get('/enroll_certificate/{id}', [WebsiteController::class, 'tech_web_enroll_certificate'])->name('upload.enrollment.certificate')->middleware('is_admin');
Route::post('/store_enroll_certificate', [WebsiteController::class, 'tech_web_store_enroll_certificate'])->name('store.enrollment.certificate')->middleware('is_admin');
Route::get('/add_enrollment_info', [WebsiteController::class, 'tech_web_add_enrollment_info'])->name('add.enrollment.info')->middleware('is_admin');
Route::post('/store_enrollment_info', [WebsiteController::class, 'tech_web_store_enrollment_info'])->name('store.enrollmetn.info')->middleware('is_admin');
//manage enrollment end

//Result start
Route::get('/add_result', [ResultController::class, 'tech_web_add_result'])->name('add.result')->middleware('is_admin');
Route::post('/store_result', [ResultController::class, 'tech_web_store_result'])->name('store.result')->middleware('is_admin');
Route::get('/add_subject', [ResultController::class, 'tech_web_add_subject'])->name('add.subject')->middleware('is_admin');
Route::post('/store_subject', [ResultController::class, 'tech_web_store_subject'])->name('store.subject')->middleware('is_admin');
Route::get('/edit_subject/{id}', [ResultController::class, 'tech_web_edit_subject'])->name('edit.subject')->middleware('is_admin');
Route::post('/updae_subject', [ResultController::class, 'tech_web_update_subject'])->name('update.subject')->middleware('is_admin');
Route::get('/add_result_type', [ResultController::class, 'tech_web_add_result_type'])->name('add.result.type')->middleware('is_admin');
Route::post('/store_result_type', [ResultController::class, 'tech_web_store_result_type'])->name('store.result.type')->middleware('is_admin');
Route::get('/upload_result/{id}', [ResultController::class, 'tech_web_upload_result'])->name('upload.result')->middleware('is_admin');
Route::post('/store_uploaded_result', [ResultController::class, 'tech_web_store_uploaded_result'])->name('store.uploaded.result')->middleware('is_admin');
Route::get('/show_result/{id}', [ResultController::class, 'tech_web_show_result'])->name('show.result')->middleware('is_user');
//Result  end

//Notice start
Route::get('/add_notice', [NoticeController::class, 'tech_web_add_notice'])->name('add.notice')->middleware('is_admin');
Route::post('/store_notice', [NoticeController::class, 'tech_web_store_notice'])->name('store.notice')->middleware('is_admin');
Route::get('/edit_notice/{id}', [NoticeController::class, 'tech_web_edit_notice'])->name('edit.notice')->middleware('is_admin');
Route::post('/update_notice', [NoticeController::class, 'tech_web_update_notice'])->name('update.notice')->middleware('is_admin');
Route::get('/notice_details/{id}', [NoticeController::class, 'tech_web_notice_details'])->name('notice.details');
//Notice  end

//counter start
Route::get('/add_counter', [CounterController::class, 'tech_web_add_counter'])->name('add.counter')->middleware('is_admin');
Route::post('/store_counter', [CounterController::class, 'tech_web_store_counter'])->name('store.counter')->middleware('is_admin');
Route::get('/edit_notice/{id}', [NoticeController::class, 'tech_web_edit_notice'])->name('edit.notice')->middleware('is_admin');
Route::post('/update_notice', [NoticeController::class, 'tech_web_update_notice'])->name('update.notice')->middleware('is_admin');
Route::get('/notice_details/{id}', [NoticeController::class, 'tech_web_notice_details'])->name('notice.details');
//counter  end

//language start
Route::get('/english_language', [LanguageController::class, 'tech_web_english_language'])->name('english.language');
Route::get('/bangla_language', [LanguageController::class, 'tech_web_bangla_language'])->name('bangla.language');

//language  end



//Banner and Tile
Route::post('/store-banner-title', [BannerAndTitleController::class, 'tech_web_store_banner_tile'])->name('store.banner.title')->middleware('is_admin');
Route::get('/edit-banner-title/{id}', [BannerAndTitleController::class, 'tech_web_edit_banner_tile'])->name('edit.banner.title')->middleware('is_admin');
Route::post('/update-banner-title', [BannerAndTitleController::class, 'tech_web_update_banner_tile'])->name('update.banner.title')->middleware('is_admin');
//Banner and title

//Logo start
Route::post('/store-logo', [WebsiteSettingsController::class, 'tech_web_store_logo'])->name('store.logo')->middleware('is_admin');
//Logo end

//links start
Route::post('/store-links', [WebsiteSettingsController::class, 'tech_web_store_links'])->name('store.links')->middleware('is_admin');
//Links end


//payment numbers start
Route::post('/store-number', [WebsiteSettingsController::class, 'tech_web_store_numbers'])->name('store.numbers')->middleware('is_admin');
//payment numbers end

//footer start
Route::post('/store-footer', [WebsiteSettingsController::class, 'tech_web_store_footer'])->name('store.footer')->middleware('is_admin');

//footer end

//banner start
Route::post('/store-main-banner', [WebsiteSettingsController::class, 'tech_web_store_main_banner'])->name('store.main.banner')->middleware('is_admin');
Route::get('/edit-main-banner/{id}', [WebsiteSettingsController::class, 'tech_web_edit_main_banner'])->name('edit.main.banner')->middleware('is_admin');
Route::post('/update-main-banner/{id}', [WebsiteSettingsController::class, 'tech_web_update_main_banner'])->name('update.main.banner')->middleware('is_admin');
//banner end




//general settings start
Route::get('/general-settings', [GeneralController::class, 'tech_web_general_settings'])->name('general.settings')->middleware('is_admin');
//general settings end


//profile settings start
Route::get('/profile-settings', [GeneralController::class, 'tech_web_profile_settings'])->name('profile.settings')->middleware('is_admin');
Route::post('/update-profile', [GeneralController::class, 'tech_web_update_profile'])->name('update.profile')->middleware('is_admin');
//profile settings end
