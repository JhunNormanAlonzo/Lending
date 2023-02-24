<?php

use App\Http\Controllers\GroupsController;
use App\Http\Controllers\LoanOfficersController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SavingsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WeeklyController;
use App\Http\Livewire\Notification;


use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/', function (){
    return view('admin.index');
});



Route::group(['middleware' => ['role:super-admin']], function(){
    Route::post('admin/groups/payment', [GroupsController::class, 'payment'])->name('groups.payment');
    Route::resource('admin/groups', GroupsController::class);
    Route::resource('admin/members', MembersController::class);
    Route::resource('admin/loan_officers', LoanOfficersController::class);
    Route::resource('admin/transactions', TransactionController::class);
    Route::resource('admin/savings', SavingsController::class);
    Route::resource('admin/weekly', WeeklyController::class);
    Route::get('admin/reports/daily_over_due', [ReportsController::class, 'daily_over_due'])->name('reports.daily_over_due');
});

