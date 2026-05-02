<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ThemeController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


/* This code snippet is defining routes for a controller named `ThemeController`. */
Route::controller(ThemeController::class)->name('theme.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/category/{id}', 'category')->name('category');
    Route::get('/contact', 'contact')->name('contact');
    // Route::get('/blog-details', 'blog_details')->name('blog_details');
});

//Subscriber Routes
Route::post('/subscriber/store', [SubscriberController::class, 'store'])->name('subscriber.store');
Route::post('/subscriber-footer/store', [SubscriberController::class, 'storeSubscriberFooter'])->name('subscriber-footer.store');

//Contact Routes
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

/* The code `Route::resource('blogs', BlogController::class);` is creating multiple routes for the
`BlogController` class. Specifically, it generates the following routes: */
Route::resource('blogs', BlogController::class);
Route::get('my-blogs', [BlogController::class, 'myBlogs'])->name('blogs.my-blogs');

//Comment Routes
Route::post('/comments/store', [CommentController::class, 'store'])->name('comments.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
