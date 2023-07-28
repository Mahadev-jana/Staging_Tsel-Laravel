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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('login');
    Route::post('/submit', 'AdminController@create');
    Route::get('/logout', 'AdminController@logout');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', 'AdminController@dashboard');

        Route::prefix('prediction')->group(function() {

            Route::get('/', 'PredictionsController@index');
            Route::post('/store', 'PredictionController@store')->name('store');
            Route::get('/add', 'PredictionsController@create')->name('create');
            Route::get('/edit/{id}', 'PredictionsController@editprediction')->name('editprediction');
            Route::post('/delete', 'PredictionsController@delete')->name('delete');
            Route::post('/getmatches', 'PredictionsController@getmatches')->name('getmatches');
            Route::post('/sumbitprediction','PredictionsController@sumbitprediction')->name('sumbitprediction');
            Route::post('/updateprediction','PredictionsController@updateprediction')->name('updateprediction');
        Route::post('/togglestatus','PredictionsController@update_status');

          });  
    


        Route::prefix('reward')->group(function(){

            Route::get('/', 'RewardController@index')->name('reward');

        });

        Route::prefix('predictionquestion')->group(function(){
           
            Route::get('/', 'PredictionquestionController@index')->name('predictionquestion');
            Route::post('/sumbit','PredictionquestionController@insert')->name('insert');
            Route::get('/edit/{id}', 'PredictionquestionController@edit')->name('edit');
            Route::post('/save','PredictionquestionController@save')->name('save');
            Route::get('/destroy/{id}','PredictionquestionController@destroy')->name('destroy');
            
        });

        Route::prefix('banner')->group(function(){

            Route::get('/', 'BannerController@index')->name('banner');
            Route::get('/add','BannerController@show')->name('addbanner');
            Route::post('/sumbit','BannerController@store')->name('store');
            Route::get('/edit/{id}', 'BannerController@edit')->name('edit');
            Route::post('/update','BannerController@update')->name('save');
            Route::get('/destroy/{id}','BannerController@destroy')->name('destroy');

        });

        Route::prefix('userreward')->group(function(){

            Route::get('/', 'UserrewardController@index')->name('userreward');
            Route::get('/add','UserrewardController@create')->name('adduserreward');
            Route::post('/sumbit','UserrewardController@store')->name('store');

        });

        Route::prefix('prizelist')->group(function(){

            Route::get('/', 'PrizelistController@index')->name('prizelist');
            
        });

        Route::prefix('winnermanagment')->group(function(){

            Route::get('/', 'WinnermanagementController@index')->name('name');
            Route::get('/add','WinnermanagementController@add')->name('addnew');
            Route::post('/sumbit','WinnermanagementController@sumbit')->name('sumbit');
            Route::get('/edit/{id}', 'WinnermanagementController@edit')->name('edit');
            Route::post('/update','WinnermanagementController@update')->name('update');
            Route::get('/destroy/{id}','WinnermanagementController@destroy')->name('destroy');

        });

        Route::prefix('newsmanagement')->group(function(){

            Route::get('/','NewsmanagementController@index')->name('news');
            Route::get('/edit/{id}', 'NewsmanagementController@edit')->name('edit');
            Route::post('/update','NewsmanagementController@changes')->name('changes');
            Route::get('/delete/{id}','NewsmanagementController@delete')->name('delete');

        });

        Route::prefix('tremservices')->group(function(){

            Route::get('/', 'TermservicesController@index')->name('termservices');

        });

       

    
    Route::post('/set_cookie', 'AdminController@set_cookie');

    });
});
    