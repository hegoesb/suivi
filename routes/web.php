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

Route::get('/', 'PagesController@index');
/*
|--------------------------------------------------------------------------
| Ajouter
|--------------------------------------------------------------------------
*/

Route::get('ajouter/{entreprise_id}/{table}', 'AjouterController@viewTable');
Route::post('ajouter/{entreprise_id}/{table}', 'AjouterController@postTable');

/*
|--------------------------------------------------------------------------
| Tableau
|--------------------------------------------------------------------------
*/
Route::get('tableau/{entreprise_id}/{table}', 'TableauController@viewTable');



// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/crud/datatables/basic/basic', 'PagesController@datatables');
Route::get('/ktdatatable', 'PagesController@ktDatatables');
Route::get('/crud/ktdatatable/base/html-table', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/jquerymask', 'PagesController@jQueryMask');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');
