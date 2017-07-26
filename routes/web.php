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


$active_multilang = defined('CNF_MULTILANG') ? CNF_LANG : 'en';
\App::setLocale($active_multilang);
if (defined('CNF_MULTILANG') && CNF_MULTILANG == '1') {

    $lang = (\Session::get('lang') != "" ? \Session::get('lang') : CNF_LANG);
    \App::setLocale($lang);
}

Route::get('/',     'HomeController@index');
Route::resource('home',  'HomeController@index');


// 用户路由
Route::get('user/profile', 'UserController@getProfile');
Route::get('user/login', 'UserController@getLogin');
Route::get('user/register', 'UserController@getRegister');
Route::post('user/signin', 'UserController@postSignin');
Route::post('user/request', 'UserController@postRequest');
Route::get('user/logout', 'UserController@getLogout');

// 路由拆分
include('backend/pageRoutes.php');
include('backend/moduleRoutes.php');

Route::get('/restric',function(){

    return view('errors.blocked');

});

Route::resource('sximoapi', 'SximoapiController');
Route::group(['middleware' => 'auth'], function()
{

    Route::get('core/elfinder', 'Core\ElfinderController@getIndex');
    Route::post('core/elfinder', 'Core\ElfinderController@getIndex');
    Route::resources([
        'core/users'		=> 'Core\UsersController',
        'notification'		=> 'NotificationController',
        'core/logs'			=> 'Core\LogsController',
        'core/pages' 		=> 'Core\PagesController',
        'core/groups' 		=> 'Core\GroupsController',
        'core/template' 	=> 'Core\TemplateController',
    ]);

});

Route::group(['middleware' => 'auth' , 'middleware'=>'haoSoftAuth'], function()
{
    Route::get('dashboard', 'DashboardController@getIndex');
    
//    Route::resources([
//        'dashboard/'		=> 'DashboardController',
//        'admin/'		    => 'DashboardController',
//        'admin/menu'		=> 'Backend\MenuController',
//        'admin/config' 		=> 'Backend\ConfigController',
//        'admin/module' 		=> 'Backend\ModuleController',
//        'admin/tables'		=> 'Backend\TablesController',
//        'admin/code'		=> 'Backend\CodeController',
//        'admin/test'		=> 'Backend\DashboardController'
//    ]);

});