<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
    });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/videos', App\Http\Controllers\VideoController::class) 
->except(['show']) 
->middleware('auth'); 

Route::get('delete-video/{video_id}',[
    'as' => 'delete-video',
    'middleware' => 'auth',
    'uses'=> 'App\Http\Controllers\VideoController@delete_video'
    ]);
    
Route::get('/miniatura/{filename}', array(
    'as' => 'imageVideo',
    'uses' => 'App\Http\Controllers\VideoController@getImage'
    ));
        
Route::get('/videos/details/{video_id}', [App\Http\Controllers\VideoController::class, 'show'])->name('videos.show');
Route::get('/video-file/{filename}', array(
'as' => 'fileVideo',
'uses' => 'App\Http\Controllers\VideoController@getVideo'
));

Route::resource('/comentarios', App\Http\Controllers\ComentarioController::class);
