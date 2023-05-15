<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchemeController;
use App\Http\Controllers\SettingsController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('admin/dashboard', [LoginController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('admin/logout', [LoginController::class, 'logout'])->name('admin-logout');

    //Profile
    Route::get('admin/profile', [ProfileController::class, 'index'])->name('admin-profile');
    Route::post('admin/profile', [ProfileController::class, 'profileUpdate'])->name('admin-profile-update');
    Route::post('password-update', [ProfileController::class, 'passwordUpdate'])->name('password-update');

    //Settings
    Route::get('admin/settings', [SettingsController::class, 'index'])->name('admin-settings');
    Route::post('admin/settings', [SettingsController::class, 'settingsUpdate'])->name('admin-settings-update');

    //Branch
    Route::get('admin/branch-manage', [BranchController::class, 'index'])->name('branch-manage');
    Route::get('admin/branch-create', [BranchController::class, 'create'])->name('branch-create');
    Route::post('admin/branch-save', [BranchController::class, 'save'])->name('branch-save');
    Route::get('admin/branch-edit/{id}', [BranchController::class, 'edit'])->name('branch-edit');
    Route::post('admin/branch-update/{id}', [BranchController::class, 'update'])->name('branch-update');
    Route::post('admin/branch-changeStatus/{id}', [BranchController::class, 'changeStatus'])->name('branch-changeStatus');
    Route::post('admin/branch-delete/{id}', [BranchController::class, 'delete'])->name('branch-delete');

    //Scheme
    Route::get('admin/scheme-manage', [SchemeController::class, 'index'])->name('scheme-manage');
    Route::get('admin/scheme-create', [SchemeController::class, 'create'])->name('scheme-create');
    Route::post('admin/scheme-save', [SchemeController::class, 'save'])->name('scheme-save');
    Route::get('admin/scheme-edit/{id}', [SchemeController::class, 'edit'])->name('scheme-edit');
    Route::post('admin/scheme-update/{id}', [SchemeController::class, 'update'])->name('scheme-update');
    Route::post('admin/scheme-changeStatus/{id}', [SchemeController::class, 'changeStatus'])->name('scheme-changeStatus');
    Route::post('admin/scheme-delete/{id}', [SchemeController::class, 'delete'])->name('scheme-delete');

    Route::get('admin/scheme-create-list/{id}', [SchemeController::class, 'createList'])->name('scheme-create-list');
    Route::post('admin/scheme-list-save/{id}', [SchemeController::class, 'listSave'])->name('scheme-list-save');
    Route::get('admin/scheme-list-view/{id}', [SchemeController::class, 'listView'])->name('scheme-list-view');
    Route::get('admin/scheme-list-edit/{id}', [SchemeController::class, 'listEdit'])->name('scheme-list-edit');
    Route::post('admin/scheme-list-update/{id}', [SchemeController::class, 'listUpdate'])->name('scheme-list-update');
    Route::post('admin/scheme-list-changeStatus/{id}', [SchemeController::class, 'listChangeStatus'])->name('scheme-list-changeStatus');
    Route::post('admin/scheme-list-delete/{id}', [SchemeController::class, 'listDelete'])->name('scheme-list-delete');
});


Route::get('/', [LoginController::class, 'login'])->name('admin');
Route::post('admin-login', [LoginController::class, 'loginPost'])->name('login.admin');
