<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Admin\ParcelController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Staff\StaffParcelController;
use App\Http\Controllers\Admin\BranchMasterController;


Route::get('/', function () {
    return view('auth/login');
});
// new

Auth::routes();

Route::group(['as' => 'admin.','prefix' => 'admin','namespace' => 'Admin', 'middleware' => ['auth','admin']],function(){
   Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
   Route::get('company-master', [CompanyController::class, 'index'])->name('company.view');
   Route::post('company-master', [CompanyController::class, 'store'])->name('company.store');
   Route::put('company-master/update', [CompanyController::class, 'update'])->name('company.update');
   Route::get('branch-master', [BranchMasterController::class, 'index'])->name('branch.view');
   Route::get('branch-master/add', [BranchMasterController::class, 'add'])->name('branch.add');
   Route::get('branch-master/edit/{id}', [BranchMasterController::class, 'edit'])->name('branch.edit');
   Route::delete('branch-master/delete/{id}', [BranchMasterController::class, 'delete'])->name('branch.delete');
   Route::get('members', [MembersController::class, 'index'])->name('members.view');
   Route::get('members/add', [MembersController::class, 'add'])->name('members.add');
   Route::get('members/edit/{id}', [MembersController::class, 'edit'])->name('members.edit');
   Route::get('members/view-member/{id}', [MembersController::class, 'view'])->name('members.view-member');
   Route::delete('members/delete/{id}', [MembersController::class, 'delete'])->name('members.delete');
   Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
   Route::get('profile-pic', [DashboardController::class, 'picture'])->name('profile-pic');
   Route::post('profile-pic', [DashboardController::class, 'upload'])->name('profile.upload');
   Route::get('profile/change-password', [DashboardController::class, 'password'])->name('profile.password');
   Route::post('profile/change-password', [DashboardController::class, 'change'])->name('profile.password.change');
   Route::get('parcel', [ParcelController::class, 'index'])->name('parcel');
   Route::get('parcel/add', [ParcelController::class, 'add'])->name('parcel.add');
   Route::post('parcel/add/new', [ParcelController::class, 'new'])->name('parcel.add.new');
   Route::get('parcel/view/{id}', [ParcelController::class, 'view'])->name('parcel.view');
   Route::delete('parcel/delete/{id}', [ParcelController::class, 'delete'])->name('parcel.delete');
   Route::get('parcel/edit/{id}', [ParcelController::class, 'edit'])->name('parcel.edit');
   Route::get('parcel/track', [ParcelController::class, 'track'])->name('parcel.track');
   Route::post('parcel/track', [ParcelController::class, 'show'])->name('parcel.show');
   Route::get('report', [ParcelController::class, 'report'])->name('report');
   Route::post('generate', [ParcelController::class, 'generate'])->name('generate');

});
Route::group(['as' => 'staff.','prefix' => 'staff','namespace' => 'Staff', 'middleware' => ['auth','staff']],function(){
    Route::get('dashboard', [StaffController::class, 'index'])->name('dashboard');
    Route::get('profile', [StaffController::class, 'profile'])->name('profile');
    Route::get('profile-pic', [StaffController::class, 'picture'])->name('profile-pic');
    Route::post('profile-pic', [StaffController::class, 'upload'])->name('profile.upload');
    Route::get('profile/change-password', [StaffController::class, 'password'])->name('profile.password');
    Route::post('profile/change-password', [StaffController::class, 'change'])->name('profile.password.change');
    Route::get('parcel', [StaffParcelController::class, 'index'])->name('parcel');
    Route::get('parcel/add', [StaffParcelController::class, 'add'])->name('parcel.add');
    Route::post('parcel/add/new', [StaffParcelController::class, 'new'])->name('parcel.add.new');
    Route::get('parcel/view/{id}', [StaffParcelController::class, 'view'])->name('parcel.view');
    Route::get('parcel/edit/{id}', [StaffParcelController::class, 'edit'])->name('parcel.edit');
    Route::get('parcel/track', [StaffParcelController::class, 'track'])->name('parcel.track');
    Route::post('parcel/track', [StaffParcelController::class, 'show'])->name('parcel.show');
});

Route::get('/home', 'HomeController@index')->name('home');
