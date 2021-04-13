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

Route::get('', 'ItemsController@index')->name('top');
Route::get('search', 'ItemsController@search')->name('search');

Auth::routes();

Route::get('items/{item}', 'ItemsController@showItemDetail')
	->name('item');

Route::middleware('auth')
	->group(function () {
		Route::get('items/{item}/buy', 'ItemsController@showBuyItemForm')
			->name('item.buy');
		Route::post('items/{item}/buy', 'ItemsController@buyItem')
			->name('item.buy');

		Route::get('sell', 'SellController@index')->name('sell');
		Route::post('sell', 'SellController@store')->name('sell');

		Route::get('items/{item}/sell-edit', 'SellController@edit')->name('sell-edit');
		Route::put('items/{item}/sell-edit', 'SellController@update')->name('sell-edit');
		Route::delete('items/{item}/sell-edit', 'SellController@destroy')->name('sell-destroy');

		Route::post('ajaxlike', 'ItemsController@ajaxlike')->name('items.ajaxlike');
		Route::post('likeitem', 'LikeController@showLikeItems')->name('likeitem');
		
	});

Route::prefix('mypage')
	->namespace('Mypage')
	->middleware('auth')
	->group(function () {
		Route::get('edit-profile','ProfileController@showProfileEditForm')
			->name('edit-profile');
		Route::post('edit-profile','ProfileController@editProfile')
			->name('edit-profile');
		Route::get('bought-items', 'BoughtItemsController@showBoughtItems')
			->name('bought-items');
		Route::get('sold-items', 'SoldItemsController@showSoldItems')
			->name('sold-items');
		Route::get('cart-items', 'CartItemController@index')
			->name('cart-items');
		Route::post('cart-items', 'CartItemController@store')->name('cart-items');
		Route::delete('cart-items/{item}', 'CartItemController@destroy')
			->name('cart-destroy');
		

		Route::get('like-items', 'LikeController@showLikeItems')
			->name('like-items');
	});
