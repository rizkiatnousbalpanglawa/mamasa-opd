<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Beranda::class);
Route::get('/tentang-kami', \App\Livewire\TentangKami::class);
Route::get('/galeri', \App\Livewire\Galeri::class);
Route::get('/informasi', \App\Livewire\Informasi::class);
Route::get('/berita', \App\Livewire\Berita\Index::class);
