<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AffiliateProfileController;
use App\Http\Controllers\AggrementController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingPage;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\RegistrantController;
use App\Models\Banner;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;
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
Route::get("/migrate", function(){
    // Run migrations and seed database
        Artisan::call('migrate:fresh --seed');

        // Return a response
        return response()->json(['message' => 'Database migrated and seeded successfully']);
});

Route::get('/', function () {
    $products = Product::all();

    foreach ($products as $product) {
        if ($product->departureDate < Carbon::now()) {
            $updateStatus['status'] = false;

            $product->update($updateStatus);
        }
    }

    function getProduct($category_id) {

        $product = Product::where('category_id', $category_id)->orderBy('departureDate', "ASC")->first();

        return $product;
    }

    return view('pages.index', [
        "haji" => getProduct(2),
        "umrah" => getProduct(1),
        "partners" => Partner::where('banner', 0)->get(),
        "desktop" => Banner::where('version', 'desktop')->first(),
        "mobile" => Banner::where('version', 'mobile')->first(),
        "documentations" => Video::where('section', "documentation")->get(),
        "testimonials" => Video::where('section', "testimonial")->get(),
    ]);
    
})->name('home');

Route::get('/tour-package', [LandingPage::class, 'tourPackage']);
Route::get('/about-us', [LandingPage::class, 'aboutUs']);

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
    // Admin Aggrement
    Route::put('/admin/aggrement/{id}', [AggrementController::class, 'update']);
    // Admin Category
    Route::post('/admin/category', [CategoryController::class, 'store']);
    Route::delete('/admin/category/{id}', [CategoryController::class, 'destroy']);
    // Admin Airline
    Route::post('/admin/airline', [PartnerController::class, 'airlineStore']);
    Route::delete('/admin/airline/{id}', [PartnerController::class, 'airlineDestroy']);
    // Admin Banner
    Route::post('/admin/banner', [PartnerController::class, 'bannerStore']);
    // Admin Video
    Route::post('/admin/video/documentation', [PartnerController::class, 'documentationStore']);
    Route::post('/admin/video/testimonial', [PartnerController::class, 'testimonialStore']);
    Route::delete('/admin/video/{id}', [PartnerController::class, 'videoDestroy']);
    // Admin Mitra
    Route::post('/admin/partner', [PartnerController::class, 'partnerStore']);
    Route::delete('/admin/partner/{id}', [PartnerController::class, 'partnerDestroy']);
    // Admin Schedule
    Route::get('/admin/schedule', [AdminController::class, 'scheduleIndex']);
    Route::post('/admin/schedule', [AdminController::class, 'scheduleStore']);
    Route::get('/admin/schedule/detail/{id}', [AdminController::class, 'scheduleDetail']);
    Route::put('/admin/schedule/update/{id}', [AdminController::class, 'scheduleUpdate']);
    Route::delete('/admin/schedule/delete/{id}', [AdminController::class, 'scheduleDestroy']);
    // Admin Pendaftar
    Route::get('/admin/pendaftar', [AdminController::class, 'registrantIndex']);
    Route::get('/admin/pendaftar/{id}', [AdminController::class, 'registrantShow']);
    //  Admin Affiliate
    Route::get('/admin/affiliate', [AdminController::class, 'affiliateIndex']);
    Route::post('/admin/affiliate/search', [AdminController::class, 'affiliateSearch']);
    // Affiliate
    Route::get('/affiliate/dashboard', [AffiliateProfileController::class, 'index']);
    Route::post('/login/affiliate',[ AuthenticationController::class, 'login']);
});
