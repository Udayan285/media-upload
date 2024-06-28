<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('media.upload');
// });

route::get('/',[UploadController::class,'index'])->name('home');
route::post('store',[UploadController::class,'store'])->name('store');

route::get('edit/{id}',[UploadController::class,'edit'])->name('edit');
route::put('update/{id}',[UploadController::class,'update'])->name('update');


route::delete('delete/{id}',[UploadController::class,'destroy'])->name('destroy');

