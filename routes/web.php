<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AffiliateProfileController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\RegistrantController;
use App\Models\Product;

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
    return view('pages.index', [
        "products" => Product::all(),
    ]);
});


Route::get('/admin/login', [AuthenticationController::class, 'adminLoginIndex'])->name('adminLogin');
Route::post('/login/{role}', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'logout']);



Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware('auth');

Route::get('/admin/schedule', [AdminController::class, 'scheduleIndex']);
Route::post('/admin/schedule/store', [AdminController::class, 'scheduleStore']);
Route::get('/admin/schedule/detail/{id}', [AdminController::class, 'scheduleDetail']);
Route::post('/admin/schedule/update/{id}', [AdminController::class, 'scheduleUpdate']);
Route::post('/admin/schedule/delete/{id}', [AdminController::class, 'scheduleDestroy']);

Route::get('/admin/pendaftar', [AdminController::class, 'registrantIndex']);




Route::get('/daftar/{affiliateCode?}', [RegistrantController::class, 'index']);
Route::post('/daftar', [RegistrantController::class, 'register']);




Route::get('/affiliate/register', [AuthenticationController::class, 'affiliateRegisterIndex']);

Route::get('/affiliate/login',[ AuthenticationController::class, 'affiliateLoginIndex']);

Route::post('/login/affiliate',[ AuthenticationController::class, 'login']);
Route::post('/affiliate/register',[ AuthenticationController::class, 'affiliateRegister']);

Route::get('/affiliate/dashboard', [AffiliateProfileController::class, 'index']);