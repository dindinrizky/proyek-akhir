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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){
    echo "Hello World";
});

Route::get('/name/{name}', function ($name){
    return "Hello " . $name;
});

Route::get('/data/{data?}', function ($data = "Kosong"){
    return "Isi Parameter = " . $data;
});

Route::get('/name/{name}', function ($name){
    return "Hello " . $name;
})->where('name', '[A-Za-z]+');

Route::get('/name/{name}/{nrp}', function($name, $nrp){
    return "Nama : " . $name . "<br>" . "NRP : " . $nrp;
})->where('name', '[A-Za-z]+', 'nrp', '[0-9]+');

Route::get('person/show/{param}', 'PersonController@show');

Route::resource('student', 'StudentController');

Route::get('person', 'PersonController@index')->name('person.index');

Route::get('/person/send-data', 'PersonController@sendData');

Route::get('person/my-course/{course}/{task}/{quiz}/{mid_term}/{final}/', 'PersonController@myCourse');

Route::get('/person/create', 'PersonController@create')->name('person.create');

Route::post('/person/store', 'PersonController@store')->name('person.store');