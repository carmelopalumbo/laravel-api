<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\ProfileController;
use App\Models\Technology;
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

//rotta della home con controller dedicato
Route::get('/', [PageController::class, 'index'])->name('home');


//controlli con middleware (protezione dati) per la sezione admin con aggiunta di prefix e name
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('settings', [DashboardController::class, 'settings'])->name('settings');
        Route::resource('projects', ProjectController::class);
        Route::get('projects/orderby/{column}/{direction}', [ProjectController::class, 'orderby'])->name('orderby');
        Route::get('ordertypes', [ProjectController::class, 'ordertypes'])->name('projects.ordertypes');
        Route::resource('types', TypeController::class)->except(['show', 'create', 'edit']);
        Route::resource('technologies', TechnologyController::class)->except(['show', 'create', 'edit']);
    });

require __DIR__ . '/auth.php';

//rotta per gestire tutte le rotte di Vue tramite router
Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*')->name('home');
