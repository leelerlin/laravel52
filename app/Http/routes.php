<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
class BazLin
{}

Route::get('/', function () {
    //return view('welcome');

    app()->bind('linlei',function() {
        echo 'hello,linlei!';
    });

    app()->make('linlei');
    dd(app());
});

