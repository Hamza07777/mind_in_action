<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('email_verify', [App\Http\Controllers\UserController::class, ''])->name('email_verify');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('email/resend', [App\Http\Controllers\VerificationController::class, 'resend']);

// Route::post('verify', [App\Http\Controllers\UserController::class, 'verify'])->name('verify');
Route::post('social_store', [App\Http\Controllers\UserController::class, 'social_store'])->name('social_store');

Route::post('user_store', [App\Http\Controllers\UserController::class, 'store'])->name('user_store');

Route::post('user_login', [App\Http\Controllers\UserController::class, 'login'])->name('user_login');

Route::post('user_social_login', [App\Http\Controllers\UserController::class, 'user_social_login'])->name('user_social_login');

Route::post('email_verify', [App\Http\Controllers\UserController::class, 'response'])->name('email_verify');

Route::get('user_edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user_edit');

Route::get('edit_country/{id}', [App\Http\Controllers\UserController::class, 'edit_country'])->name('edit_country');

Route::get('edit_age/{id}', [App\Http\Controllers\UserController::class, 'edit_age'])->name('edit_age');

Route::post('user_detail_age/{id}', [App\Http\Controllers\UserController::class, 'user_detail_age'])->name('user_detail_age');

Route::post('user_detail_country/{id}', [App\Http\Controllers\UserController::class, 'user_detail_country'])->name('user_detail_country');

Route::post('user_update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user_update');

Route::post('user_detail_age_update/{id}', [App\Http\Controllers\UserController::class, 'user_detail_age_update'])->name('user_detail_age_update');

Route::post('user_detail_country_update/{id}', [App\Http\Controllers\UserController::class, 'user_detail_country_update'])->name('user_detail_country_update');


Route::post('feedback_store', [App\Http\Controllers\feedbackController::class, 'store'])->name('feedback_store');

Route::post('evaluation_store', [App\Http\Controllers\subjectController::class, 'store'])->name('evaluation_store');

Route::post('/verify', [App\Http\Controllers\UserController::class, 'verify'])->name('verify');

Route::post('/password_reset_link', [App\Http\Controllers\UserController::class, 'password_reset_link'])->name('password_reset_link');


Route::post('/password_reset_link_verify', [App\Http\Controllers\UserController::class, 'password_reset_link_verify'])->name('password_reset_link_verify');

Route::post('/password_update', [App\Http\Controllers\UserController::class, 'password_update'])->name('password_update');
