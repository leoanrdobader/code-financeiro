<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/user',function () {
    \Illuminate\Support\Facades\Auth::LoginUsingID(2);
});

Route::get('/', function () {
    //\Illuminate\Support\Facades\Auth::LoginUsingID(2);
    /*if(\Illuminate\Support\Facades\Gate::allows('access-admin')){
        return 'Usuário com permissão de admin';
    }else{
        return 'Usuário sem permissão de admin';
    }*/
    return view('welcome');
    //return view(var_dump(bcrypt('cy271285')));
});


Route::get('/app', function(){
    return view('layouts.spa');
});

Route::get('/home', function(){
    return redirect()->route('admin.home');
});

Route::group([
        'prefix'=>'admin',
        'as'=>'admin.'
    ], function(){

    Auth::routes();

    Route::group(['middleware'=>'can:access-admin'], function (){
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('banks','Admin\BanksController', ['except'=> 'show']);
    });

});