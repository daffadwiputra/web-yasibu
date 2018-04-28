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
    $config['center'] = 'Panti Asuhan Yasibu, Jalan Babatan III, RT.2/RW.3, Arjowinangun, Malang City, East Java';
    $config['zoom'] = '16';
    $config['map_height'] = '500px';
    // $config['map_width'] = '500px';
    
    GMaps::initialize($config);

    $marker['position'] = 'Panti Asuhan Yasibu, Jalan Babatan III, RT.2/RW.3, Arjowinangun, Malang City, East Java';
    $marker['infowindow_content'] = 'Panti Asuhan Yasibu';
    
    GMaps::add_marker($marker);

    $map['map'] = GMaps::create_map();

    return view('welcome',$map);
});

Route::group(['middleware' => 'guest'], function(){
    //route login
    Route::get('/login', 'LoginController@showLoginForm');
    Route::post('/login', 'LoginController@login');
});


Route::post('/logout', 'LoginController@logout')->middleware('auth');
Route::resource('donations','DonationsController');
Route::resource('products','ProductsController');