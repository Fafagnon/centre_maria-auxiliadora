<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Public Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admissions', [PageController::class, 'admissions'])->name('admissions');
Route::get('/a-propos', [PageController::class, 'about'])->name('about');
Route::get('/galerie', [GalleryController::class, 'index'])->name('gallery');

// Actualités
Route::get('/actualites', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/actualites/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Contact
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
