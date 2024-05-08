<?php

use App\Http\Controllers\SubtitleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('downloadsub/{id}', [SubtitleController::class, 'download'])->name('all-subs.download');