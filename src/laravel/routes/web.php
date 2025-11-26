<?php

use Illuminate\Support\Facades\Route;

/* TaskControllerクラスを名前空間でインポートする */
use App\Http\Controllers\TaskController;

use App\Http\Controllers\FolderController;

/* index page */
Route::get("/folders/{id}/tasks", [TaskController::class,"index"])->name("tasks.index");
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

/* tasks new create page */
Route::get('/folders/{id}/tasks/create', [TaskController::class,"showCreateForm"])->name('tasks.create');
Route::post('/folders/{id}/tasks/create', [TaskController::class,"create"]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/folders/create', [FolderController::class,"showCreateForm"])->name('folders.create');
Route::post('/folders/create', [FolderController::class,"create"]);