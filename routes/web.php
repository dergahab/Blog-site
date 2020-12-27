<?php

/*
|--------------------------------------------------------------------------
| Admin route
|--------------------------------------------------------------------------
|
*/
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function(){

Route::get('login','backend\AuthController@login')->name('login');
Route::post('login','backend\AuthController@loginPost')->name('login.post');
});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function(){
	Route::get('panel','backend\DashboardController@index')->name('dashboard');

	//Article routes
	Route::get('article/softdeleted','backend\ArtikleController@trashed')->name('trashed.article');
	Route::resource('artikle','backend\ArtikleController');
	Route::get('/deletearticle/{id}','backend\ArtikleController@delete')->name('delete.article');
	Route::get('/hardDeletearticle/{id}','backend\ArtikleController@hardDelete')->name('hard.delete.article');
	Route::get('/deleterecover/{id}','backend\ArtikleController@recover')->name('recover.article');
	// Category routes
	Route::get('/category','backend\CategoryController@index')->name('category.index');
	Route::post('/category/create','backend\CategoryController@create')->name('category.create');
	Route::post('/category/update','backend\CategoryController@update')->name('category.update');
	Route::post('/category/delete','backend\CategoryController@delete')->name('category.delete');
	Route::get('/category/switch','backend\CategoryController@switch')->name('category.switch');
	Route::get('/category/getData','backend\CategoryController@getData')->name('category.getData');
	//

	//page routes
	Route::resource('/page','backend\PageController');

	//Config rout

	Route::get('/config','backend\ConfigController@index')->name('config.index');
	Route::post('/config/update','backend\ConfigController@update')->name('config.update');

	//
	Route::get('logout','backend\AuthController@logout')->name('logout');


});


/*
|--------------------------------------------------------------------------
| Front route
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/','Front\HomepageController@index')->name('homepage');
Route::get('/blog/{slug?}','Front\HomepageController@single')->name('single');
Route::get('/contact','Front\HomepageController@contact')->name('contact');
Route::post('/contact','Front\HomepageController@contactpost')->name('contact.post');
Route::get('/kategory/{catetegory}','Front\HomepageController@category')->name('category');
Route::get('/haqqimizda','Front\HomepageController@about')->name('about');

Route::get('/{sayfa}','Front\HomepageController@page')->name('page');
