<?php

use App\Http\Controllers\PostController;
use App\Http\Livewire\CrudCategory;
use App\Http\Livewire\CrudTag;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('post/{post}',[PostController::class,'show'])->name('posts.show');
Route::get('category/{category}',[PostController::class,'search'])->name('posts.search');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/categories',CrudCategory::class)->name('categories');
    Route::get('/tags',CrudTag::class)->name('tags');
});
