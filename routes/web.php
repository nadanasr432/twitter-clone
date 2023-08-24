<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserPostController;
use App\Http\Middleware\Authenticate;
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

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);
Route::post('/login',[LoginController::class,'store']);
Route::get('/login',[LoginController::class,'index'])->name('login');

Route::middleware(['auth'])->group(function () {
    
Route::get('/posts', function () {
    return view('posts.index');
});
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/profile/edit',[ProfileController::class ,'edit'])->name('profile.edit');
Route::put('/profile/update',[ProfileController::class ,'update'])->name('profile.update');
Route::get('/Followers/{user}',[FollowerController::class,'ShowFollowers'])->name('profile.followers');
Route::get('/Followings/{user}',[FollowerController::class,'ShowFollowings'])->name('profile.followings');
Route::post('follow-unfollow-user/{user}', [FollowerController::class, 'store'])->name('profile.follower');

Route::get('/Users',[UsersController::class,'ShowUsers'])->name('profile.users');
Route::get('/users/{user:username}',[UserPostController::class,'index'])->name('users.post');
Route::put('/users/{user:username}',[ProfileController::class,'update'])->name('users.post');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->withoutMiddleware([Authenticate::class]);
Route::post('/logout',[LogoutController::class,'store'])->name('logout')->withoutMiddleware([Authenticate::class]);
Route::get('PostImages/{id}', [PostController::class, 'PostImage']);

});



