<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// www.la5.8api.com/api/user1

Route::get('/user5','Api\V1\UserController@index');
#例子 https://www.cnblogs.com/zzdylan/p/6002503.html
# https://github.com/dingo/api/wiki
#前台---------带版本控制的--------api
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {

    $api->get('/user4',' App\Api\V1\Controllers\UserController@index');

    $api->group(['namespace' => ' App\Api\V1'], function ($api) {
               //namespace声明路由组的命名空间，因为上面设置了"prefix"=>"api",所以以下路由都要加一个api前缀，
               //比如请求/api/user 才能访问到用户列表接口

                #用户列表api http://www.la5.8api.com/api/user
                $api->get('/user','UserController@index');

    });
});

#v2






//后台路由文件
include_once __DIR__.'/Admin/api.php';





/*$api = app(\Dingo\Api\Routing\Router::class);

#默认配置指定的是v1版本，可以直接通过 {host}/api/version 访问到
$api->version('v1', function ($api) {
    $api->get('version', function () {
        return 'v1';
    });
});

#如果v2不是默认版本，需要设置请求头
#Accept: application/[配置项 standardsTree].[配置项 subtype].v2+json
$api->version('v2', function ($api) {
    $api->get('version', function () {
        return 'v2';
    });
});*/