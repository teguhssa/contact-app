<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


// show all contacts 
Route::get('/', [ContactController::class, 'index'])->name('contact.index');
// show form page to add contact
Route::get('/add', [ContactController::class, 'create'])->name('contact.create');
// process of inserting to database
Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
// detail information contact with param id
Route::get('/contact/{id}', [ContactController::class, 'show'])->name('contact.show');
// detail information contact before update contact with param id
Route::get('/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
// process of updating contact
Route::put('/update/{id}', [ContactController::class, 'update'])->name('contact.update');
// process of deleting contact
Route::get('/delete/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');