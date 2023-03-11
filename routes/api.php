<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('/email/send', \App\Http\Controllers\API\Mobile\User\v1\Auth\SendCodeMailController::class);
    Route::post('/email/verify', \App\Http\Controllers\API\Mobile\User\v1\Auth\VerifyMailController::class);
    Route::post('/login/company', \App\Http\Controllers\API\Mobile\User\v1\Auth\CompanyLoginController::class);
    Route::post('/register/company', \App\Http\Controllers\API\Mobile\User\v1\Auth\CompanyStoreController::class);
    Route::post('/login', \App\Http\Controllers\API\Mobile\User\v1\Auth\PeopleLoginController::class);
    Route::post('/register', \App\Http\Controllers\API\Mobile\User\v1\Auth\PeopleStoreController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile/{user}', \App\Http\Controllers\API\Mobile\User\v1\User\ProfileController::class);
    Route::post('/profile/{user}/follow', \App\Http\Controllers\API\Mobile\User\v1\User\FollowContoller::class);
    Route::post('/profile/{user}/unfollow', \App\Http\Controllers\API\Mobile\User\v1\User\UnfollowContoller::class);
    Route::post('/profile/{user}/posts', \App\Http\Controllers\API\Mobile\User\v1\User\ProfilePostsController::class);
    Route::post('/me', \App\Http\Controllers\API\Mobile\User\v1\User\MeController::class);
    Route::post('/me/posts', \App\Http\Controllers\API\Mobile\User\v1\User\MePostsController::class);

    Route::get('/posts', \App\Http\Controllers\API\Mobile\User\v1\Post\IndexController::class);
    Route::get('/posts/{post}', \App\Http\Controllers\API\Mobile\User\v1\Post\ShowController::class);
    Route::post('/posts/{post}/additional', \App\Http\Controllers\API\Mobile\User\v1\Post\StoreAdditionalController::class);
    Route::post('/posts/{post}/like', \App\Http\Controllers\API\Mobile\User\v1\Post\LikeController::class);
    Route::post('/posts/{post}/unlike', \App\Http\Controllers\API\Mobile\User\v1\Post\UnlikeController::class);
    Route::post('/posts', \App\Http\Controllers\API\Mobile\User\v1\Post\StoreController::class);

    Route::get('/vacancies', \App\Http\Controllers\API\Mobile\User\v1\Vacancy\IndexController::class);
    Route::get('/vacancies/{vacancy}', \App\Http\Controllers\API\Mobile\User\v1\Vacancy\ShowController::class);
    Route::post('/vacancy', \App\Http\Controllers\API\Mobile\User\v1\Vacancy\StoreController::class);
});

