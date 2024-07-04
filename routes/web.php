<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    if(auth()->user()->hasRole('admin')){
        return redirect()->route('admin.dashboard');
    }elseif(auth()->user()->hasRole('staff')){
        return redirect()->route('staff.dashboard');
    }elseif(auth()->user()->hasRole('user')){
        return redirect()->route('user.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/proposal/show/{id}', [StaffController::class, 'show'])->name('show.proposal');
    Route::get('/show_proposal/{id}', [SuratController::class, 'show_proposal'])->name('showy.proposal');
    Route::get('/cetak/{id}', [SuratController::class, 'cetak'])->name('cetak.surat');
    Route::get('/sp_inovator/{id}/download', [SuratController::class, 'sp_inovator'])->name('sp_inovator');
    Route::get('/sp_replikasi/{id}/download', [SuratController::class, 'sp_replikasi'])->name('sp_replikasi');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/detail_proposal/{id}', [SuratController::class, 'detail_proposal'])->name('detail.proposal');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/proposal/create', [UserController::class, 'create'])->name('create.proposal');
    Route::post('/proposal/create', [UserController::class, 'store'])->name('store.proposal');
    // Route::get('/proposal/{id}/show', [UserController::class, 'show'])->name('show.proposal');
    Route::get('/proposal/draft', [UserController::class, 'draft'])->name('draft.proposal');
    Route::get('/proposal/sent', [UserController::class, 'sent'])->name('sent.proposal');
    Route::delete('/proposal/{id}/delete', [UserController::class, 'destroy'])->name('delete.proposal');
    Route::get('/proposal/{id}/edit', [UserController::class, 'edit'])->name('edit.proposal');
    Route::put('/proposal/{id}/edit', [UserController::class, 'update'])->name('update.proposal');
    Route::put('/proposal/{id}/send', [UserController::class, 'send'])->name('send.proposal');
    Route::get('/proposal/dinovator/{id}', [UserController::class, 'dinovator'])->name('dinovator');
    Route::get('/proposal/dinovasi/{id}', [UserController::class, 'dinovasi'])->name('dinovasi');

});

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff', [StaffController::class, 'dashboard'])->name('staff.dashboard');
    Route::get('/proposal/list', [StaffController::class, 'list'])->name('list.proposal');
    Route::get('/proposal/history', [StaffController::class, 'history'])->name('history.proposal');
    Route::post('/proposal/tolak/{id}', [StaffController::class, 'tolak'])->name('tolak.proposal');
    Route::post('/proposal/ttd/{id}', [StaffController::class, 'ttd'])->name('ttd.proposal');
    Route::post('/proposal/revisi/{id}', [StaffController::class, 'revisi'])->name('revisi.proposal');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('create.users');
    Route::post('/users/create', [AdminController::class, 'store'])->name('store.users');
    Route::get('/users/{id}/edit', [AdminController::class, 'edit'])->name('edit.users');
    Route::put('/users/{id}/edit', [AdminController::class, 'update'])->name('update.users');
    Route::get('/users/list', [AdminController::class, 'listUser'])->name('list.users');
    Route::delete('/users/{id}/delete', [AdminController::class, 'destroy'])->name('delete.users');
});


require __DIR__.'/auth.php';
