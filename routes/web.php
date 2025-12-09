<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ClarifiesController;
use App\Http\Controllers\Backend\UsabilityController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\AppController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\BlogPostController;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');

Route::middleware('auth')->group(function () {
    Route::get('/profile',[AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('/profile/store',[AdminController::class,'profileStore'])->name('profile.store');
    Route::post('/admin/password/update', [AdminController::class, 'adminPasswordUpdate'])->name('admin.password.update');
});

Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
Route::get('/verify', [AdminController::class, 'showVerification'])->name('custom.verification.form');
Route::get('/verify', [AdminController::class, 'verificationVerify'])->name('custom.verification.verify');

Route::middleware('auth')->group(function()
{
    Route::controller(ReviewController::class)->group(function()
    {
        Route::get('/all/review', 'allReview')->name('all.review');
        Route::get('/add/review', 'addReview')->name('add.review');
        Route::post('/store/review', 'storeReview')->name('store.review');
        Route::get('/edit/review/{id}', 'editReview')->name('edit.review');
        Route::post('/update/review', 'updateReview')->name('update.review');
        Route::get('/delete/review/{id}', 'deleteReview')->name('delete.review');
    });
    Route::controller(SliderController::class)->group(function() 
    {
        Route::get('/get/slider', 'getSlider')->name('get.slider');
        Route::post('/update/slider', 'updateSlider')->name('update.slider');
        Route::post('/edit/slider/{id}', 'editSlider');
        Route::post('/edit-features/{id}', 'editFeatures');
        Route::post('/edit/reviews/{id}', 'editReviews');
        Route::post('/edit/answers/{id}', 'editAnswers');
    });
    Route::controller(HomeController::class)->group(function()
    {
        Route::get('/all/feature', 'allFeature')->name('all.feature');
        Route::get('/add/feature', 'addFeature')->name('add.feature');
        Route::post('/store/feature', 'storeFeature')->name('store.feature');
        Route::get('/edit/feature/{id}', 'editFeature')->name('edit.feature');
        Route::post('/update/feature', 'UpdateFeature')->name('update.feature');
        Route::get('/delete/feature/{id}', 'deleteFeature')->name('delete.feature');
    });
    Route::controller(ClarifiesController::class)->group(function()
    {
        Route::get('/all/clarifies', 'allClarifies')->name('all.clarifies');
        Route::post('/update/clarifies', 'updateClarifies')->name('update.clarifies');
    });
    Route::controller(UsabilityController::class)->group(function() 
    {
        Route::get('/get/usability', 'getUsability')->name('get.usability');
        Route::post('/update/usability', 'updateUsability')->name('update.usability');
        Route::get('/all/connect', 'allConnect')->name('all.connect');
        Route::get('/add/connect', 'addConnect')->name('add.connect');
        Route::post('/store/connect', 'storeConnect')->name('store.connect');
    });
    Route::controller(FaqController::class)->group(function() 
    {
        Route::get('/all/faqs','allFaqs')->name('all.faqs');
        Route::get('/add/faqs', 'addFaqs')->name('add.faqs');
        Route::post('/store/faqs', 'storeFaqs')->name('store.faqs');
        Route::get('/edit/faqs/{id}', 'editFaqs')->name('edit.faqs');
        Route::post('/update/faqs', 'updateFaqs')->name('update.faqs');
        Route::get('/delete/faqs/{id}', 'deleteFaqs')->name('delete.faqs');
    });
    Route::controller(AppController::class)->group(function()
    {
        Route::post('/update-app/{id}','updateApps');
        Route::post('/update-app-image/{id}','updateAppsImage');
    });
    Route::controller(TeamController::class)->group(function()
    {
        Route::get('/all/team', 'allTeam')->name('all.team');
        Route::get('/add/team', 'addTeam')->name('add.team');
        Route::post('/store/team', 'storeTeam')->name('store.team');
        Route::get('/edit/team/{id}', 'editTeam')->name('edit.team');
        Route::post('/update/team', 'updateTeam')->name('update.team');
        Route::get('/delete/team/{id}', 'deleteTeam')->name('delete.team');
    });
    Route::controller(AboutController::class)->group(function()
    {
        Route::get('/get/aboutus', 'getAboutus')->name('get.aboutus');
        Route::post('/update/about', 'updateAbout')->name('update.about');
    });
    Route::controller(BlogController::class)->group(function()
    {
        Route::get('/blog/category', 'blogCategory')->name('all.blog.category');
        Route::post('/store/blog/category', 'storeBlogCategory')->name('store.blog.category');
        Route::get('/edit/blog/category/{id}', 'editBlogCategory')->name('edit.blog.category');
        Route::post('/update/blog/category', 'updateBlogCategory')->name('update.blog.category');
        Route::get('/delete/blog/category/{id}', 'deleteBlogCategory')->name('delete.blog.category');    
    });
    Route::controller(BlogPostController::class)->group(function()
    {
        Route::get('/all/blog/post', 'allBlogPost')->name('all.blog.post');
        Route::get('/add/blog/post', 'addBlogPost')->name('add.blog.post');
        Route::post('/store/blog/post','storeBlogPost')->name('store.blog.post');
        Route::get('/edit/blog/post/{id}', 'editBlogPost')->name('edit.blog.post');
        Route::post('/update/blog/post', 'updateBlogPost')->name('update.blog.post');
        Route::get('/delete/post/blog/{id}','deleteBlogPost')->name('delete.blog.post');
    });
});

Route::get('/team', [FrontendController::class,'ourTeam'])->name('our.team');
Route::get('/about', [AboutController::class, 'about'])->name('about.us');