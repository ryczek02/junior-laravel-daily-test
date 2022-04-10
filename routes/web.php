<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
 * Resource Routes for Companies and Employees
 */
Route::group(['middleware' => 'auth'], function()
{
    Route::resources([
        'companies' => \App\Http\Controllers\CompanyController::class,
        'employees' => \App\Http\Controllers\EmployeeController::class,
    ]);
});


require __DIR__.'/auth.php';
