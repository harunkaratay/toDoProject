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
Route::get('/panel/tasks/index', [TaskController::class,'index'])->name('panel.Index');
Route::get('/panel/tasks/create', [TaskController::class,'createPage'])->name('panel.createTasksPage');
Route::post('/panel/tasks/add', [TaskController::class,'addTask'])->name('panel.addTask');
// tasks routes end


//kategori routes start
Route::get('/panel/categories/index', [CategoryController::class,'index'])->name('panel.categoryIndex');
Route::get('/panel/categories/create', [CategoryController::class,'createPage'])->name('panel.categoryCreatePage');
Route::post('/panel/categories/addCategory', [CategoryController::class,'addCategory'])->name('panel.addCategory');
Route::get('/panel/categories/update/{id}' , [CategoryController::class, 'updatePage'])->name('panel.categoryUpdatePage');
Route::post('/panel/categories/updatePost' , [CategoryController::class, 'updateCategory'])->name('panel.updateCategory');
Route::get('/panel/categories/deleteCategory/{id}' , [CategoryController::class, 'deleteCategory'])->name('panel.deleteCategory');
//kategori routes end

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
