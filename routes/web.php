<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
Route::get('/', function () {
    return view('welcome');
});


//test routing
Route::get('/testTamplate', function () {
    return view('panel.layout.app');
});



// tasks routeları star
Route::get('/panel/tasks/create', [TaskController::class,'createPage'])->name('panel.CreateTasksPage');
Route::post('/panel/tasks/add', [TaskController::class,'addTask'])->name('panel.addTask');
// tasks touteları end
