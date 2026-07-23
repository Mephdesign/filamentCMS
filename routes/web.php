<?php

use App\Http\Controllers\BlogGeneratorController;
use App\Http\Controllers\CmsController;

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Http;

Route::get('/', [CmsController::class, 'home'])->name('home');
Route::get('/blog', [CmsController::class, 'posts'])->name('posts.index');
Route::get('/blog/{slug}', [CmsController::class, 'post'])->name('posts.show');
Route::get('/galeria', [CmsController::class, 'galleries'])->name('galleries.index');

Route::get('/blog-generator', [BlogGeneratorController::class, 'index'])->name('blog.index');
Route::post('/blog-generator', [BlogGeneratorController::class, 'generate'])->name('blog.generate');

Route::get('/publish-to-instagram', [SocialController::class, 'publishToInstagram'])->name('publish-to-instagram');

Route::post('/kontakt', [ContactFormController::class, 'store'])
    ->name('contact.store')
    ->middleware('throttle:5,1'); // max 5 prób na minutę - ochrona przed spamem
