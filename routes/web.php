<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortofolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('frontend.index');
})->name('home.index');


// Admin All Route
Route::controller(AdminController::class)->middleware(['auth', 'verified'])->group(function() {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});

// Home Slide All Route
Route::controller(HomeSliderController::class)->middleware(['auth', 'verified'])->group(function() {
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
});

// About All Route
Route::controller(AboutController::class)->group(function() {
    Route::get('/about/page', 'AboutPage')->name('about.page')->middleware(['auth', 'verified']);
    Route::get('/about', 'HomeAbout')->name('home.about');
    Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image')->middleware(['auth', 'verified']);
    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image')->middleware(['auth', 'verified']);

    Route::post('/update/about', 'UpdateAbout')->name('update.about')->middleware(['auth', 'verified']);
    Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image')->middleware(['auth', 'verified']);
    Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image')->middleware(['auth', 'verified']);

    Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image')->middleware(['auth', 'verified']);
    Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image')->middleware(['auth', 'verified']);
});

// Home Portofolio All Route
Route::controller(PortofolioController::class)->group(function() {
    Route::get('/all/portfolio', 'AllPortofolio')->name('all.portofolio')->middleware(['auth', 'verified']);
    Route::get('/add/portfolio', 'AddPortofolio')->name('add.portofolio')->middleware(['auth', 'verified']);
    Route::get('/edit/portfolio/{id}', 'EditPortofolio')->name('edit.portofolio')->middleware(['auth', 'verified']);
    Route::get('/delete/portfolio/{id}', 'DeletePortofolio')->name('delete.portofolio')->middleware(['auth', 'verified']);
    Route::get('/portfolio/details/{id}', 'PortofolioDetails')->name('portofolio.details');
    Route::get('/portfolio', 'HomePortfolio')->name('home.portfolio');

    Route::post('/store/portfolio', 'StorePortofolio')->name('store.portofolio')->middleware(['auth', 'verified']);
    Route::post('/update/portfolio', 'UpdatePortofolio')->name('update.portofolio')->middleware(['auth', 'verified']);

});

// Blog Category All Route
Route::controller(BlogCategoryController::class)->group(function() {
    Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category')->middleware(['auth', 'verified']);
    Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category')->middleware(['auth', 'verified']);
    Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category')->middleware(['auth', 'verified']);
    Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category')->middleware(['auth', 'verified']);

    Route::post('/store/blogcategory', 'StoreBlogCategory')->name('store.blogcategory')->middleware(['auth', 'verified']);
    Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category')->middleware(['auth', 'verified']);


});

// Blog All Route
Route::controller(BlogController::class)->middleware(['auth', 'verified'])->group(function() {
    Route::get('/all/blogs', 'AllBlog')->name('all.blogs');
    Route::get('/add/blogs', 'AddBlog')->name('add.blogs');
    Route::get('/edit/blogs/{id}', 'EditBlog')->name('edit.blogs');
    Route::get('/delete/blogs/{id}', 'DeleteBlog')->name('delete.blogs');



    Route::post('/store/blogs', 'StoreBlog')->name('store.blogs');
    Route::post('/update/blogs', 'UpdateBlog')->name('update.blogs');
});

Route::controller(BlogController::class)->group(function() {
    Route::get('/blog', 'HomeBlog')->name('home.blog');
    Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');
    Route::get('/category/blogs/{id}', 'CategoryBlogs')->name('category.blogs');
});

Route::controller(FooterController::class)->middleware(['auth', 'verified'])->group(function() {
    Route::get('/footer/setup', 'FooterSetup')->name('footer.setup');

    Route::post('/footer/update', 'UpdateFooter')->name('update.footer');

});

Route::controller(ContactController::class)->group(function() {
    Route::get('/contact', 'Contact')->name('contact.me');
    Route::get('/contact/message', 'ContactMessage')->name('contact.message')->middleware(['auth', 'verified']);
    Route::get('/contact/show/{id}', 'ShowMessage')->name('show.message')->middleware(['auth', 'verified']);
    Route::get('/delete/contact/{id}', 'DeleteContact')->name('delete.contact')->middleware(['auth', 'verified']);

    Route::post('/store/message', 'StoreMessage')->name('store.message')->middleware(['auth', 'verified']);

});

Route::get('/justforadmin', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
