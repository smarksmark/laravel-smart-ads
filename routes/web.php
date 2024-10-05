<?php

use Illuminate\Support\Facades\Route;
use Smarksmark\LaravelSmartAds\Http\Controllers\SmartAdManagerController;


$prefix = config('smart-ads.route.prefix');
$middleware = config('smart-ads.route.middleware');

Route::group(['prefix' => $prefix, 'middleware' => $middleware], function () {
    Route::get('/smart-ad-manager', [Smarksmark\LaravelSmartAds\Http\Controllers\SmartAdManagerController::class, 'dashboard'])->name('smart-ads-dashboard');
    Route::get('/smart-ad-manager/ads', [Smarksmark\LaravelSmartAds\Http\Controllers\SmartAdManagerController::class, 'index'])->name('smart-ads-index');
    Route::get('/smart-ad-manager/ads/create', [Smarksmark\LaravelSmartAds\Http\Controllers\SmartAdManagerController::class, 'create'])->name('smart-ads-create');
    Route::get('/smart-ad-manager/ads/{smartAd}', [Smarksmark\LaravelSmartAds\Http\Controllers\SmartAdManagerController::class, 'show'])->name('smart-ads-show');
    Route::post('/smart-ad-manager/ads/store', [Smarksmark\LaravelSmartAds\Http\Controllers\SmartAdManagerController::class, 'store'])->name('smart-ads-store');
    Route::get('/smart-ad-manager/ads/edit/{smartAd}', [Smarksmark\LaravelSmartAds\Http\Controllers\SmartAdManagerController::class, 'edit'])->name('smart-ads-edit');
    Route::put('/smart-ad-manager/ads/update/{smartAd}', [Smarksmark\LaravelSmartAds\Http\Controllers\SmartAdManagerController::class, 'update'])->name('smart-ads-update');
    Route::delete('/smart-ad-manager/ads/delete/{smartAd}', [Smarksmark\LaravelSmartAds\Http\Controllers\SmartAdManagerController::class, 'delete'])->name('smart-ads-delete');
    Route::post('/smart-ad-manager/ads/disable/{smartAd}', [Smarksmark\LaravelSmartAds\Http\Controllers\SmartAdManagerController::class, 'disable'])->name('smart-ads-disable');
    Route::post('/smart-ad-manager/ads/enable/{smartAd}', [Smarksmark\LaravelSmartAds\Http\Controllers\SmartAdManagerController::class, 'enable'])->name('smart-ads-enable');
});
Route::get('/smart-banner-auto-placements', [Smarksmark\LaravelSmartAds\Http\Controllers\SmartAdManagerController::class, 'autoAds']);
Route::post('/smart-banner-update-clicks', [Smarksmark\LaravelSmartAds\Http\Controllers\SmartAdManagerController::class, 'updateClicks']);
