<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Company\Employee\AddEmployeeComponent;
use App\Http\Livewire\Company\Employee\AddEmployee2Component;
use App\Http\Livewire\Company\Employee\AddEmployee3Component;
use App\Http\Livewire\Company\Employee\ContractComponent;
use App\Http\Livewire\Company\Employee\ShowEmployeeComponent;
use App\Http\Livewire\Company\Employee\ShowPayrollsComponent;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/home',HomeComponent::class)->name('home');
    Route::get('/company/add-employee',AddEmployeeComponent::class)->name('add.employee');
    Route::get('/company/add-employeee/{id}',AddEmployee2Component::class)->name('add2.employee');
    Route::get('/company/add-employeee/{id}/{section}',AddEmployee3Component::class)->name('add3.employee');
    Route::get('/company/contract/{id}',ContractComponent::class)->name('add.contract');
    Route::get('/employees',ShowEmployeeComponent::class)->name('show.employees');
    Route::get('/payrolls',ShowPayrollsComponent::class)->name('show.payrolls');
});
