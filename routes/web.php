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
//Index route
Route::get("/", "PagesController@index");

// registration and login Controllers
Route::post("/register", "MainController@register");
Route::post('/login_in', 'MainController@login_in');

//Booking post routes
Route::post('/addbooking', 'BookingController@booking');

//Main get routes
Route::get('/main', 'PagesController@main');
Route::get('/logout', "MainController@logout");

//Admin get routes
Route::get('/admin', 'PagesController@admin');

//Admin post routes
Route::post('/addservice', "AdminController@add");
Route::post('/addmasters', 'AdminController@addmasters');
