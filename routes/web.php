<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
Route::get('/', function () {
    return view('welcome');
});


//test routing
Route::get('/testTamplate', function () {
    return view('panel.layout.app');
});



// tasks routes start
Route::get('/panel/tasks/create', [TaskController::class,'createPage'])->name('panel.CreateTasksPage');
Route::post('/panel/tasks/add', [TaskController::class,'addTask'])->name('panel.AddTask');
// tasks routes end


//kategori routes start
Route::get('/panel/categories/index', [CategoryController::class,'index'])->name('panel.categoryIndex');
Route::get('/panel/categories/create', [CategoryController::class,'createPage'])->name('panel.categoryCreatePage');
Route::post('/panel/categories/addCategory', [CategoryController::class,'addCategory'])->name('panel.addCategory');
//kategori routes end
