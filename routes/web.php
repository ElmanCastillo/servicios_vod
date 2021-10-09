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
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('welcome');
})->name('dashboard');

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('actors')->name('actors/')->group(static function() {
            Route::get('/',                                             'ActorsController@index')->name('index');
            Route::get('/create',                                       'ActorsController@create')->name('create');
            Route::post('/',                                            'ActorsController@store')->name('store');
            Route::get('/{actor}/edit',                                 'ActorsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ActorsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{actor}',                                     'ActorsController@update')->name('update');
            Route::delete('/{actor}',                                   'ActorsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('repartos')->name('repartos/')->group(static function() {
            Route::get('/',                                             'RepartosController@index')->name('index');
            Route::get('/create',                                       'RepartosController@create')->name('create');
            Route::post('/',                                            'RepartosController@store')->name('store');
            Route::get('/{reparto}/edit',                               'RepartosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RepartosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{reparto}',                                   'RepartosController@update')->name('update');
            Route::delete('/{reparto}',                                 'RepartosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tipopagos')->name('tipopagos/')->group(static function() {
            Route::get('/',                                             'TipopagosController@index')->name('index');
            Route::get('/create',                                       'TipopagosController@create')->name('create');
            Route::post('/',                                            'TipopagosController@store')->name('store');
            Route::get('/{tipopago}/edit',                              'TipopagosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TipopagosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tipopago}',                                  'TipopagosController@update')->name('update');
            Route::delete('/{tipopago}',                                'TipopagosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('generos')->name('generos/')->group(static function() {
            Route::get('/',                                             'GenerosController@index')->name('index');
            Route::get('/create',                                       'GenerosController@create')->name('create');
            Route::post('/',                                            'GenerosController@store')->name('store');
            Route::get('/{genero}/edit',                                'GenerosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'GenerosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{genero}',                                    'GenerosController@update')->name('update');
            Route::delete('/{genero}',                                  'GenerosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('peliculas')->name('peliculas/')->group(static function() {
            Route::get('/',                                             'PeliculasController@index')->name('index');
            Route::get('/create',                                       'PeliculasController@create')->name('create');
            Route::post('/',                                            'PeliculasController@store')->name('store');
            Route::get('/{pelicula}/edit',                              'PeliculasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PeliculasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{pelicula}',                                  'PeliculasController@update')->name('update');
            Route::delete('/{pelicula}',                                'PeliculasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('directors')->name('directors/')->group(static function() {
            Route::get('/',                                             'DirectorsController@index')->name('index');
            Route::get('/create',                                       'DirectorsController@create')->name('create');
            Route::post('/',                                            'DirectorsController@store')->name('store');
            Route::get('/{director}/edit',                              'DirectorsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DirectorsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{director}',                                  'DirectorsController@update')->name('update');
            Route::delete('/{director}',                                'DirectorsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('listapeliculas')->name('listapeliculas/')->group(static function() {
            Route::get('/',                                             'ListapeliculasController@index')->name('index');
            Route::get('/create',                                       'ListapeliculasController@create')->name('create');
            Route::post('/',                                            'ListapeliculasController@store')->name('store');
            Route::get('/{listapelicula}/edit',                         'ListapeliculasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ListapeliculasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{listapelicula}',                             'ListapeliculasController@update')->name('update');
            Route::delete('/{listapelicula}',                           'ListapeliculasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('ventas')->name('ventas/')->group(static function() {
            Route::get('/',                                             'VentasController@index')->name('index');
            Route::get('/create',                                       'VentasController@create')->name('create');
            Route::post('/',                                            'VentasController@store')->name('store');
            Route::get('/{ventum}/edit',                                'VentasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'VentasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{ventum}',                                    'VentasController@update')->name('update');
            Route::delete('/{ventum}',                                  'VentasController@destroy')->name('destroy');
        });
    });
});