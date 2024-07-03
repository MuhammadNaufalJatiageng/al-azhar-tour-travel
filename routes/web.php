<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AffiliateProfileController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PacketController;
use App\Http\Controllers\RegistrantController;
use App\Models\Product;
use Carbon\Carbon;

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
    $products = Product::all();

    foreach ($products as $product) {
        if ($product->departureDate < Carbon::now()) {
            $updateStatus['status'] = false;

            $product->update($updateStatus);
        }
    }
    
    return view('pages.index', [
        "products" => Product::all(),
    ]);
    
})->name('home');

Route::get('/admin/login', [AuthenticationController::class, 'adminLoginIndex']);
Route::post('/login/{role}', [AuthenticationController::class, 'login']);

Route::get('/daftar/{affiliateCode?}', [RegistrantController::class, 'index']);
Route::post('/daftar', [RegistrantController::class, 'register']);
Route::get('/daftar/submit', [RegistrantController::class, 'secondForm']);
Route::post('/daftar/submit', [RegistrantController::class, 'submitForm']);

Route::get('/affiliate/register', [AuthenticationController::class, 'affiliateRegisterIndex']);
Route::post('/affiliate/register',[ AuthenticationController::class, 'affiliateRegister']);
Route::get('/affiliate/login',[ AuthenticationController::class, 'affiliateLoginIndex']);


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    // Admin
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    // Admin Category
    Route::post('/admin/category', [CategoryController::class, 'store']);
    // Admin Schedule
    Route::get('/admin/schedule', [AdminController::class, 'scheduleIndex']);
    Route::post('/admin/schedule/store', [AdminController::class, 'scheduleStore']);
    Route::get('/admin/schedule/detail/{id}', [AdminController::class, 'scheduleDetail']);
    Route::post('/admin/schedule/update/{id}', [AdminController::class, 'scheduleUpdate']);
    Route::post('/admin/schedule/delete/{id}', [AdminController::class, 'scheduleDestroy']);
    // Admin Pendaftar
    Route::get('/admin/pendaftar', [AdminController::class, 'registrantIndex']);
    Route::get('/admin/pendaftar/{id}', [AdminController::class, 'registrantShow']);
    Route::post('/admin/pendaftar/search', [AdminController::class, 'registrantSearch']);
    //  Admin Affiliate
    Route::get('/admin/affiliate', [AdminController::class, 'affiliateIndex']);
    // Affiliate
    Route::get('/affiliate/dashboard', [AffiliateProfileController::class, 'index']);
    Route::post('/login/affiliate',[ AuthenticationController::class, 'login']);
});
