<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserNotificationsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::post('/user/{user}/follow-request',[FollowerController::class, 'store'])->name('profile.follower');

Route::get('/Users',[UsersController::class,'ShowUsers'])->name('profile.users');
Route::get('/users/{user:username}',[UserPostController::class,'index'])->name('users.post');
Route::put('/users/{user:username}',[ProfileController::class,'update'])->name('users.post');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::get('/requests',[UsersController::class,'ShowRequests'])->name('user.requests');
Route::post('accepts/{user}', [FollowerController::class, 'acceptFollowRequest'])->name('user.accept');
Route::get('/follow-requests', [FollowerController::class, 'ShowFollowRequests'])->name('follow-requests');
// Route::get('/comments/{post:parent_id}',[PostController::class, 'showComment'])->name('posts.replies');
// Route::get('/comments', [PostController::class, 'parentReplies'])->name('posts.replies');
Route::post('/comment/{post}/comment',[PostController::class,'storeComment'])->name('post.comments.store');
Route::get('/comments/{post}/comments', [PostController::class,'showComments'])->name('post.comments.show');
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->withoutMiddleware([Authenticate::class]);
Route::post('/logout',[LogoutController::class,'store'])->name('logout')->withoutMiddleware([Authenticate::class]);
Route::get('PostImages/{id}', [PostController::class, 'PostImage']);
Route::get('notifications',[UserNotificationsController::class,'index'])->name('notifications.index');
Route::get('/notifications/mark-as-read/{id}', [UserNotificationsController::class, 'markAsRead'])->name('notifications.markAsRead');
Route::patch('/fcm-token', [UserNotificationsController::class, 'saveToken'])->name('save-token');
Route::get('/hashtags', [PostController::class, 'showHashtag'])->name('hashtag.show');
Route::get('posts/by-hashtag/{hashtag}', [PostController::class, 'showPostsByHashtag'])->name('posts.by.hashtag');
Route::post('/store-token', [HomeController::class, 'storeToken'])->name('store.token');
});
