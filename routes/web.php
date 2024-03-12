<?php
use App\Models\Car;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/cars', [CarController::class, 'index']);

Route::get('/car/{id}', [CarController::class, 'show'])->name('car.detail');

// Route::resource('cars', CarController::class);

Route::get('cars/create' ,[CarController::class, 'create']);
Route::post('cars/create' ,[CarController::class, 'store']);

Route::get('cars/{id}/edit',[CarController::class, 'edit']);
Route::put('cars/{id}/edit',[CarController::class, 'update']);


Route::get('cars/{id}/delete',[CarController::class, 'destroy']);