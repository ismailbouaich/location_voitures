<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ContactController;
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

Route::get('test1', function () {
    return view('test1');
});





Auth::routes();
//admin

Route::prefix('admin')->middleware(['auth', 'IsAdmin'])->group(function () {

    //charts


    Route::get('/home_admin',[ChartsController::class,'index'])->name('home_admin');
    Route::get('/home_admin',[ChartsController::class,'Count'])->name('Count');


    //events

    Route::get('/listUsers', [App\Http\Controllers\AdminController::class, 'listUsers'])->name('listUsers');
    Route::resources([
        'table_voiture'=>VoitureController::class,
        'table_user'=>AdminController::class, 
        'table_demand'=> DemandController::class,
        'table_client'=>ClientController::class,
        'table_categorie'=>CategorieController::class,
        'table_location'=>LocationController::class,
        
    ]);

    //archieve

    Route::get('/voitures/archieve',[VoitureController::class,'archieve']);
    Route::get('/user/archieve',[AdminController::class,'archieve']);
    Route::get('/demand/archieve',[DemandController::class,'archieve']);
    Route::get('/client/archieve',[ClientController::class,'archieve']);
    Route::get('/categorie/archieve',[CategorieController::class,'archieve']);
    Route::get('/location/archieve',[LocationController::class,'archieve']);

    //restore

   Route::get('users/restore/one/{id}', [AdminController::class, 'restore'])->name('users.restore');
   Route::get('clients/restore/one/{id}', [ClientController::class, 'restore'])->name('clients.restore');
   Route::get('demands/restore/one/{id}', [DemandController::class, 'restore'])->name('demands.restore');
   Route::get('voitures/restore/one/{id}', [VoitureController::class, 'restore'])->name('voitures.restore');
   Route::get('categorie/restore/one/{id}', [CategorieController::class, 'restore'])->name('categorie.restore');
   Route::get('location/restore/one/{id}', [LocationController::class, 'restore'])->name('location.restore');
});



Route::get('type/filterEssence', [CategorieController::class, 'filterEssence'])->name('type.filterEssence');

// Route::get('{category}/{categorie}',['uses' => 'FooController@bar']);
Route::post('/contact',[ContactController::class, 'store'])->name('contact.store');
Route::get('/contact',[ContactController::class, 'store'])->name('contact.store');
   
Route::resource('categorie', CategorieController::class);

Route::get('home',[ HomeController::class,'voitureBycategory'])->name('cars.category');

Route::get('test',[ LocationController::class,'index']);
Route::resource('home', HomeController::class);


Route::get('search', [App\Http\Controllers\HomeController::class,'search']);

Route::get('/', [App\Http\Controllers\HomeController::class,'list'])->name('list');
