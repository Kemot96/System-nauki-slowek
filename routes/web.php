<?php

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
    return view('backend/welcome');
});

Route::resource('backend/categories', 'CategorieController');

Route::resource('backend/editors', 'EditorController');

Route::resource('backend/languages', 'LanguageController');

Route::resource('backend/roles', 'RoleController');

Route::resource('backend/sets', 'SetController');

Route::resource('backend/subcategories', 'SubcategorieController');

Route::resource('backend/users', 'UserController');

Route::resource('backend/userRoles', 'UserRoleController');

Route::resource('backend/results', 'ResultController');


Auth::routes();

Route::get('home', 'HomeController@index')->name('home');


Route::get('/frontwelcome', function () {
    $categories = \App\Categorie::all();
    return view('frontend/frontwelcome', compact('categories'));
});

Route::get('/category/{id}', 'FrontController@getCategorieID');

Route::get('/subcategory/{id}', 'FrontController@getSubcategorieID');

Route::get('/set/{id}', 'FrontController@getSetID');

Route::get('/setContent/{id}', 'FrontController@setContent');

Route::get('/setExam/{id}', 'FrontController@setExam');

Route::get('/study1/{id}', 'FrontController@study1');

Route::get('/study2/{id}', 'FrontController@study2');

Route::get('/study4/{id}', 'FrontController@study4');

Route::get('/study5/{id}', 'FrontController@study5');

Route::get('/exam1/{id}', 'FrontController@exam1');

Route::get('/exam2/{id}', 'FrontController@exam2');

Route::get('/result/{id}', 'FrontController@result')->middleware('auth');

Route::resource('frontend/set', 'FrontSetController');

Route::post('/score1/{id}', 'FrontController@score');

Route::post('/score2/{id}', 'FrontController@score2');

Route::post('/score4/{id}', 'FrontController@score4');

Route::post('/score5/{id}', 'FrontController@score5');

Route::post('/scoreExam1/{id}', 'FrontController@scoreExam1');

Route::post('/scoreExam2/{id}', 'FrontController@scoreExam2');

Route::resource('frontend/subcatRoles', 'SubcatRoleController');

