<?php

use App\Http\Controllers\AnalyticsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerAdController;
use App\Http\Controllers\HorseAdsController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\RealEstateAdsController;
use App\Http\Controllers\StableAdsController;
use App\Http\Controllers\TransportAdsController;
use App\Http\Controllers\UserController;

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


// Public routes
// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Horse Ads
Route::get('/horses', [HorseAdsController::class, 'index']);
Route::get('/horses/search', [HorseAdsController::class, 'search']);
Route::get('/horses/{id}', [HorseAdsController::class, 'show']);

// Transport Ads
Route::get('/transport', [TransportAdsController::class, 'index']);
Route::get('/transport/search', [TransportAdsController::class, 'search']);
Route::get('/transport/{id}', [TransportAdsController::class, 'show']);

// Stable Ads
Route::get('/stable', [StableAdsController::class, 'index']);
Route::get('/stable/search', [StableAdsController::class, 'search']);
Route::get('/stable/{id}', [StableAdsController::class, 'show']);

// Real Estate Ads
Route::get('/real-estate', [RealEstateAdsController::class, 'index']);
Route::get('/real-estate/search', [RealEstateAdsController::class, 'search']);
Route::get('/real-estate/{id}', [RealEstateAdsController::class, 'show']);

// Banner Ads
Route::get('/banners', [BannerAdController::class, 'index']);
Route::get('/banners/search', [BannerAdController::class, 'search']);
Route::get('/banners/{id}', [BannerAdController::class, 'show']);

// Analytics
Route::post('/analytics/{adType}/{id}', [AnalyticsController::class, 'log_view']);

// Invoices
Route::get('/invoice/download/{id}', [InvoiceController::class, 'download']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);

    // User Profile
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    // Horse Ads
    Route::put('/horses/{id}', [HorseAdsController::class, 'update']);
    Route::delete('/horses/{id}', [HorseAdsController::class, 'destroy']);
    Route::post('/horses', [HorseAdsController::class, 'store']);

    // Transport Ads
    Route::put('/transport/{id}', [TransportAdsController::class, 'update']);
    Route::delete('/transport/{id}', [TransportAdsController::class, 'destroy']);
    Route::post('/transport', [TransportAdsController::class, 'store']);

    // Stable Ads
    Route::put('/stable/{id}', [StableAdsController::class, 'update']);
    Route::delete('/stable/{id}', [StableAdsController::class, 'destroy']);
    Route::post('/stable', [StableAdsController::class, 'store']);

    // Real Estate Ads
    Route::put('/real-estate/{id}', [RealEstateAdsController::class, 'update']);
    Route::delete('/real-estate/{id}', [RealEstateAdsController::class, 'destroy']);
    Route::post('/real-estate', [RealEstateAdsController::class, 'store']);

    // Banner Ads
    Route::put('/banners/{id}', [BannerAdController::class, 'update']);
    Route::delete('/banners/{id}', [BannerAdController::class, 'destroy']);
    Route::post('/banners', [BannerAdController::class, 'store']);
});
