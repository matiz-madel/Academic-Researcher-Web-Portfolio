<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ExternalLinkController;

// Home Orchestrator (The ONLY view rendered)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Resource Downloads (Backend Actions)
Route::get('/download', [PublicProfileController::class, 'downloadResume'])->name('resume.download');
Route::get('/downloads/publication/{work}/{index}', [WorkController::class, 'downloadAttachment'])->name('work.download');

// External Link Tracking (Backend Action)
Route::get('/out/{link}', [ExternalLinkController::class, 'click'])->name('link.click');

// Language Service (Backend Action)
Route::get('/{locale}', [LanguageController::class, 'switch'])
    ->where('locale', '[a-zA-Z\_]+')
    ->name('lang.switch');
