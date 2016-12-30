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

Route::get('/', function () {
    return view('welcome');
});

//************API路由

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Api\Controllers'], function ($api) {
        //用户登录
        $api->post('user/login','AuthController@authenticate');
        //用户注册
        $api->post('user/register','AuthController@register');
        //已被中间件保护过滤
        $api->group(['middleware' => 'jwt.auth'], function ($api) {
            //获取用户，传递Token值
            $api->get('user/me','AuthController@getAuthenticatedUser');
            //显示信息
            $api->get('lesson','LessonsController@index');
            //显示信息带ID并且，传递Token值
            $api->get('lesson/{id}','LessonsController@show');
        });
    });
});
