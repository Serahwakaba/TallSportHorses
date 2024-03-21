<?php

use App\Models\HorseAd;
use App\Models\BannerAd;
use App\Models\StableAd;
use App\Livewire\ManageAd;
use App\Livewire\Settings;
use App\Livewire\MyAdsList;
use App\Models\TransportAd;
use App\Livewire\Auth\Login;
use App\Livewire\ManageUser;
use App\Models\RealEstateAd;
use App\Livewire\Auth\Verify;
use App\Livewire\ListAdFeeds;
use App\Livewire\Subscription;
use App\Livewire\Auth\Register;
use App\Livewire\ManageInvoice;
use App\Livewire\MyInvoicesList;
use App\Livewire\MyFavoritesList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\ListAdvertisingAddons;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\ListAdvertisingPackages;
use App\Livewire\ListSubscriptionPackages;
use App\Http\Controllers\XMLFeedController;
use App\Http\Controllers\DeleteAdController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\EmailVerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Redirect home page to dashboard
Route::get('/', function () {
    return redirect()->to('/dashboard');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::post('/language-switch', [LanguageController::class, 'languageSwitch'])->name('language.switch');

Route::get('feed', [XMLFeedController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/my-favorites', MyFavoritesList::class)->name('my-favorites');

    Route::get('/invoice', MyInvoicesList::class)->name('invoice');
    Route::get('/invoice/{id}', ManageInvoice::class)->name('invoice.manage');

    Route::get('/subscription', Subscription::class)->name('subscription');

    Route::get('/my-ads', MyAdsList::class)->name('my-ads');

    // New Ad
    Route::view('/place-advertisement', 'ads.place-advertisement')->name('place-advertisement');

    // New Ad Form
    Route::get('/place-advertisement/{adType}', function (string $adType) {
        //
        return view('ads.ad-wrapper', ['category' => $adType]);
    })->name('new-advertisement');

    // Edit Ad
    Route::get('/ads/{adType}/{id}', function (string $adType, string $id) {
        //
        switch ($adType) {
            case "horses":
                return view('ads.edit-ad-wrapper', ['ad' => HorseAd::find($id), 'category' => $adType]);
                break;
            case "ponies":
                return view('ads.edit-ad-wrapper', ['ad' => HorseAd::find($id), 'category' => $adType]);
                break;
            case "stable":
                return view('ads.edit-ad-wrapper', ['ad' => StableAd::find($id), 'category' => $adType]);
                break;
            case "transport":
                return view('ads.edit-ad-wrapper', ['ad' => TransportAd::find($id), 'category' => $adType]);
                break;
            case "real-estate":
                return view('ads.edit-ad-wrapper', ['ad' => RealEstateAd::find($id), 'category' => $adType]);
                break;
            case "banner":
                return view('ads.edit-ad-wrapper', ['ad' => BannerAd::find($id), 'category' => $adType]);
                break;
                // additional cases as needed
            default:
                return view('ads.edit-ad-wrapper', ['ad' => HorseAd::find($id), 'category' => $adType]);
        }
    })->name('edit-advertisement');

    // Delete ad
    Route::post('/delete-ad', [DeleteAdController::class, 'handleDelete'])->name('ads.delete');


    // Profile
    Route::view('/profile', 'profile.show')->name('profile');

    // 
    // 
    // ADMIN ROUTES
    // ===========================

    // All Users
    Route::view('/all-users', 'all-users')->name('all-users');
    Route::get('/all-users/{id}', ManageUser::class)->name('all-users.manage');

    Route::get('/settings', Settings::class)->name('settings');
    Route::get('/settings/subscription-packages', ListSubscriptionPackages::class)->name('settings.subscription-packages');
    Route::get('/settings/ad-packages', ListAdvertisingPackages::class)->name('settings.ad-packages');
    Route::get('/settings/ad-addons', ListAdvertisingAddons::class)->name('settings.ad-addons');
    Route::get('/settings/feeds', ListAdFeeds::class)->name('settings.feeds');

    Route::view('/all-ads', 'all-ads')->name('all-ads');
    Route::get('/all-ads/{adType}/{id}', ManageAd::class)->name('all-ads.manage');

    Route::view('/all-invoices', 'all-invoices')->name('all-invoices');
    Route::view('/analytics', 'admin-analytics')->name('admin-analytics');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
