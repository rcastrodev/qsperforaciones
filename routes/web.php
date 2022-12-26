<?php

use App\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');
Route::get('/quienes-somos', 'PagesController@quienesSomos')->name('quienes-somos');
Route::get('/servicios', 'PagesController@servicios')->name('servicios');
Route::get('/maquinarias', 'PagesController@maquinarias')->name('maquinarias');
Route::get('/maquinaria/{id}', 'PagesController@maquinaria')->name('maquinaria');
Route::get('/obras-realizadas', 'PagesController@obrasRealizadas')->name('obras-realizadas');
Route::get('/obra-realizada/{id}', 'PagesController@obraRealizada')->name('obra-realizada');
Route::get('/clientes', 'PagesController@clientes')->name('clientes');
Route::get('/videos', 'PagesController@videos')->name('videos');
Route::get('/solicitar-presupuesto', 'PagesController@solicitarPresupuesto')->name('solicitar-presupuesto');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');
Route::post('enviar-cotizacion', 'MailController@quote')->name('send-quote');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');
Route::post('newsletter', 'NewsLetterController@storeNewsletter')->name('newsletter.store');

Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');

Route::get('/ficha-tecnica/{id}', 'PagesController@fichaTecnica')->name('ficha-tecnica');
Route::delete('/ficha-tecnica/{id}', 'PagesController@borrarFichaTecnica')->name('borrar-ficha-tecnica');

Route::middleware('auth')->prefix('admin')->group(function () {
    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/store', 'HomeController@store')->name('home.store');
    Route::post('home/content/update', 'HomeController@update')->name('home.update');
    Route::post('home/content/update1', 'HomeController@update1')->name('home.update1');
    Route::delete('home/content/{id}', 'HomeController@destroy')->name('home.destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/
    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/content/update-ribbon', 'CompanyController@updateRibbon')->name('company.content.updateRibbon');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::post('company/content/generic-section/update', 'CompanyController@updateHomeGenericSection')->name('company.content.generic-section.update');
    Route::delete('company/content/{id}', 'CompanyController@destroy')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    /** Fin company*/
    /** Page Service */
    Route::get('service/content', 'ServiceController@content')->name('service.content');
    Route::get('service/content/find/{id?}', 'ServiceController@find')->name('service.content.find');
    Route::get('service/content/get-list', 'ServiceController@getList')->name('service.content.get-list');
    Route::get('service/content/create', 'ServiceController@create')->name('service.create');
    Route::post('service/content/store', 'ServiceController@store')->name('service.store');
    Route::get('service/content/edit/{id}', 'ServiceController@edit')->name('service.edit');
    Route::post('service/content/update', 'ServiceController@update')->name('service.update');
    Route::delete('service/content/{id}', 'ServiceController@destroy')->name('service.content.destroy');
    /** Fin Service*/
    /** Page Machinery */
    Route::get('machinery/content', 'MachineryController@content')->name('machinery.content');
    Route::get('machinery/content/find/{id?}', 'MachineryController@find')->name('machinery.content.find');
    Route::get('machinery/content/get-list', 'MachineryController@getList')->name('machinery.content.get-list');
    Route::get('machinery/content/create', 'MachineryController@create')->name('machinery.create');
    Route::post('machinery/content/store', 'MachineryController@store')->name('machinery.store');
    Route::get('machinery/content/edit/{id}', 'MachineryController@edit')->name('machinery.edit');
    Route::post('machinery/content/update', 'MachineryController@update')->name('machinery.update');
    Route::delete('machinery/content/{id}', 'MachineryController@destroy')->name('machinery.content.destroy');
    /** Fin Machinery*/
    /** Page Works made */
    Route::get('works-made/content', 'WorksMadeController@content')->name('worksmade.content');
    Route::get('works-made/content/find/{id?}', 'WorksMadeController@find')->name('worksmade.content.find');
    Route::get('works-made/content/get-list', 'WorksMadeController@getList')->name('worksmade.content.get-list');
    Route::get('works-made/content/create', 'WorksMadeController@create')->name('worksmade.create');
    Route::post('works-made/content/store', 'WorksMadeController@store')->name('worksmade.store');
    Route::get('works-made/content/edit/{id}', 'WorksMadeController@edit')->name('worksmade.edit');
    Route::post('works-made/content/update', 'WorksMadeController@update')->name('worksmade.update');
    Route::delete('works-made/content/{id}', 'WorksMadeController@destroy')->name('worksmade.content.destroy');
    /** Fin Works made*/
    /** Page Client */
    Route::get('client/content', 'ClientController@content')->name('client.content');
    Route::post('client/content/store', 'ClientController@store')->name('client.store');
    Route::post('client/content/update', 'ClientController@update')->name('client.update');
    Route::delete('client/content/{id}', 'ClientController@destroy')->name('client.destroy');
    Route::get('client/content/slider/get-list', 'ClientController@getList')->name('client.slider.get-list');
    /** Fin Client*/
    /** Page Video */
    Route::get('video/content', 'VideoController@content')->name('video.content');
    Route::post('video/content/store', 'VideoController@store')->name('video.store');
    Route::post('video/content/update', 'VideoController@update')->name('video.update');
    Route::delete('video/content/{id}', 'VideoController@destroy')->name('video.destroy');
    Route::get('video/content/slider/get-list', 'VideoController@getList')->name('video.slider.get-list');
    /** Fin Video*/
    /** Page company */
    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    /** Fin company*/
    /** Page newsletter */
    Route::get('newsletter/content', 'NewsLetterController@content')->name('newsletter.content');
    Route::get('newsletter/content/get-list', 'NewsLetterController@getList')->name('newsletter.content.get-list');
    Route::delete('newsletter/content/{id}', 'NewsLetterController@destroy')->name('newsletter.content.destroy');
    /** Fin newsletter*/
    /** Page newsletter */
    Route::get('page/content', 'AdminPageController@content')->name('page.content');
    Route::put('page/content', 'AdminPageController@update')->name('page.content.update');
    /** Fin newsletter*/

    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');
    /** Page Product Picture */
    Route::delete('product-picture/content/destroy/{id}', 'ImageController@destroy')->name('product-picture.content.destroy');
    /** Fin product picture*/

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
