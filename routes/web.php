<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::controller(ManagementController::class)->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/customers', 'customerList')->name('customers');
    Route::get('/customer/add', 'addCustomer')->name('add-customer');
    Route::post('/customer/post', 'addCustomerPost')->name('add-customer-post');
    Route::get('/customer/edit/{id}', 'editCustomer')->name('edit-customer');
    Route::post('/customer/update/{id}', 'editCustomerPost')->name('edit-customer-post');
    Route::get('/customer/delete/{id}', 'deleteCustomer')->name('delete-customer');
});

Route::controller(MailController::class)->group(function () {
    Route::get('/compose-email', 'index')->name('compose-email');
    Route::post('/compose-email/post', 'addMailPost')->name('compose-email-post');
});
