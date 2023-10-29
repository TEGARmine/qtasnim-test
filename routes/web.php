<?php

use App\Http\Livewire\Barang\Index;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/{id}/edit', \App\Http\Livewire\Barang\Update::class)->name('edit');
    // Route::get('/edit', [Index::class, 'edit'])->name('edit');
    // Route::get('/post', \App\Http\Livewire\Post::class)->name('post');
    // Route::get('/{productId}/edit', \App\Http\Livewire\Product\Update::class)->name('edit');
});
