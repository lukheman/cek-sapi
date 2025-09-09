<?php

use Illuminate\Support\Facades\Route;

Route::get('/landing', \App\Livewire\Landing::class)->name('landing');
Route::get('/', \App\Livewire\Index::class)->name('index')->middleware('auth');
Route::get('/diagnosis', \App\Livewire\Diagnosis\Flow::class)->name('diagnosis');
Route::get('/landing/profile-pakar', \App\Livewire\ProfilePakarCard::class)->name('landing.profile-pakar');
Route::get('/profile', \App\Livewire\Profile::class)->name('profile')->middleware('auth');
Route::get('/users', \App\Livewire\UserTable::class)->name('user-table')->middleware('auth');
Route::get('/penyakit', \App\Livewire\PenyakitTable::class)->name('penyakit.table')->middleware('auth');
Route::get('/gejala', \App\Livewire\GejalaTable::class)->name('gejala.table')->middleware('auth');
Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard')->middleware('auth');
Route::get('/login', \App\Livewire\Login::class)->name('login');
Route::get('/logout', App\Http\Controllers\LogoutController::class)->name('logout');
Route::get('/basis-pengetahuan', \App\Livewire\BasisPengetahuan::class)->name('basis-pengetahuan')->middleware('auth');
Route::get('/riwayat-diagnosis', \App\Livewire\RiwayatDiagnosisTable::class)->name('riwayat-diagnosis')->middleware('auth');
