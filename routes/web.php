<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use  App\Http\Controllers\CategoryController;
use  App\Http\Controllers\BrandController;
use  App\Http\Controllers\MultiImageController;
use  App\Http\Controllers\SliderController;
use  App\Http\Controllers\AboutController;
use  App\Http\Controllers\PortfolioController;
use  App\Http\Controllers\ContactController;
use  App\Http\Controllers\MessageController;
use  App\Http\Controllers\ChangePass;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $about = DB::table('abouts')->first();
    $multi_images = DB::table('multipics')->get();
    return view('home' , compact('brands', 'about', 'multi_images'));
});



//category Controller

Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::POST('/store/category', [CategoryController::class, 'AddCat'])->name('store.category');
Route::get('/edit/category/{id}', [CategoryController::class,'EditCategory'])->name('edit.category');
Route::POST('/category/update/{id}', [CategoryController::class, 'Update'])->name('category.update');
Route::get('/softdelete/category/{id}', [CategoryController::class,'SoftdeleteCategory'])->name('softdelete.category');
Route::get('/restore/category/{id}', [CategoryController::class,'RestoreCategory'])->name('restore.category');
Route::get('/pdelete/category/{id}', [CategoryController::class,'PdeleteCategory'])->name('pdelete.category');


//Brand Controller group

Route::controller(BrandController::class)->group(function(){
    Route::get('brand/all', 'AllBrand')->name('all.brand');
    Route::POST('brand/add', 'BrandStore')->name('store.brand');
    Route::get('brand/edit/{id}', 'EditBrand')->name('brand.edit');
    Route::POST('brand/update/{id}', 'BrandUpdate')->name('update.brand');
    Route::get('brand/delete/{id}', 'DeleteBrand')->name('brand.delete');
});
// Multi image controller
Route::controller(MultiImageController::class)->group(function(){
    Route::get('multi/image', 'MultiImage')->name('multi.image');
    Route::post('store/multi/image', 'StoreImage')->name('store.image');
    Route::get('user/logout', 'UserLogout')->name('user.logout');
  


});

// Slider controller
Route::controller(SliderController::class)->group(function(){
    Route::get('home/slider', 'HomeSlider')->name('home.slider');
    Route::get('add/slider', 'AddSlider')->name('add.slider');
    Route::POST('store/slider', 'StoreSlider')->name('store.slider');
    Route::get('slider/edit/{id}', 'EditSlider')->name('slider.edit');
    Route::POST('update/slider/{id}', 'UpdateSlider')->name('update.slider');
    Route::get('slider/delete/{id}', 'DeleteSlider')->name('slider.delete');


});

// About controller
Route::controller(AboutController::class)->group(function(){
    Route::get('about/us', 'AboutUs')->name('about.us');
    Route::get('add/about', 'AddAbout')->name('add.about');
    Route::POST('store/about', 'StoreAbout')->name('store.about');
    Route::get('about/edit/{id}', 'EditAbout')->name('aboutus.edit');
    Route::POST('update/about/{id}', 'UpdateAbout')->name('aboutus.update');
    Route::get('about/delete/{id}', 'DeleteAbout')->name('aboutus.delete');
    
   


});

// Portfolio controller
Route::controller(PortfolioController::class)->group(function(){
    Route::get('/portfolio', 'Portfolio')->name('portfolio');
    Route::get('/contact', 'Contact')->name('contact');
    
});

// contact controller
Route::controller(ContactController::class)->group(function(){
    Route::get('admin/contact', 'AdminContact')->name('admin.contact');
    Route::get('add/contact', 'AddContact')->name('add.contact');
    Route::POST('store/contact', 'StoreContact')->name('store.contact');
    Route::get('contact/edit/{id}', 'EditContact')->name('contact.edit');
    Route::POST('update/contact/{id}', 'UpdateContact')->name('contact.update');
    Route::get('contact/delete/{id}', 'DeleteContact')->name('contact.delete');
    
});

// Message controller
Route::controller(MessageController::class)->group(function(){
    
    Route::get('contact/message', 'ContactMessage')->name('contact.message');
    Route::POST('/message', 'Message')->name('message');
    Route::get('message/delete/{id}', 'MessageDeleted')->name('message.deleted');
    Route::get('/pricing', 'Pricing')->name('pricing');
    Route::get('/service', 'Services')->name('services');
    Route::get('/blog', 'Blog')->name('blog');
    Route::get('about/home', 'HomeAbout')->name('home.about');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
       // $users = User::all();
       
       $users = DB::table('users')->get();  //Query builder
        return view('admin.index');
    })->name('dashboard');

    
});

// change password and user route
Route::get('/user/password', [ChangePass::class, 'ChangePassword'])->name('change.password');
Route::POST('/update/password', [ChangePass::class, 'PasswordUpdate'])->name('password.update');

//user profile
Route::get('/user/profile', [ChangePass::class, 'ProfileUpdate'])->name('profile.update');

Route::POST('update/user/profile', [ChangePass::class, 'UpdateUser'])->name('store.profile');