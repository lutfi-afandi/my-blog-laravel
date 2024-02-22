<?php

use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\User;
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

Route::get('/', [PostController::class, 'index']);
Route::get('/about', function () {
    return view('about', ['title' => 'Tentang Saya', 'active' => 'posts']);
});
Route::get('/home', function () {
    return view('home', ['title' => 'Home', 'active' => 'posts']);
});
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/categories', function (Category $category) {
    return view('categories', [
        'title' => 'Semua Categories',
        'active' => 'categories',
        'categories'  => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('post', [
        'title' => "Kategori Postingan : " . $category->name,
        'posts' => $category->posts->load('category', 'author'),
        'active' => 'categories',
        'category'  => $category->name
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('post', [
        'title' => 'Postingan User : ' . $author->name,
        'posts' => $author->posts->load('category', 'author'),
    ]);
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware(['guest']);
Route::post('/register', [RegisterController::class, 'store']);


// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth']);
Route::get('/dashboard', function () {
    return view('dashboard.index', ['title' => 'Dashboard', 'active' => '']);
})->middleware(['auth']);


Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', DashboardCategoryController::class)->except('show');
