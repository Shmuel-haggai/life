<?php


use App\Models\emplacement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\DataTables\Admin\ListeDataTable;

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

//filtre select
Route::get('/admin/listes/emplacement/{id}', function(ListeDataTable $dataTable, $id){
    $dataemplacement = emplacement::all();
    return $dataTable->with('id', $id)
            ->render('listes.index', ['dataemplacement' => $dataemplacement]);
 })->name('listes.custom');

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('listes', App\Http\Controllers\Admin\ListeController::class, ["as" => 'admin']);

    Route::resource('liens', App\Http\Controllers\Admin\LienController::class, ["as" => 'admin']);
    Route::resource('photos', App\Http\Controllers\Admin\PhotoController::class, ["as" => 'admin']);
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('accueil');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


