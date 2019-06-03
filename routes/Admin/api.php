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

#例子 https://www.cnblogs.com/zzdylan/p/6002503.html
Route::post('/test','AdminController@test');
Route::post('/hook','HookController@hook');

#后台管理员可见--------视图
Route::group(['middleware' => ['role:admin']], function () {
    #用户列表视图
    Route::get('/users','AdminController@users');
    #添加用户视图
    Route::get('/add_user','AdminController@addUserView');
    #机修列表视图
    Route::get('/mechanics_list','MechanicsController@dataList');
    #配件列表视图
    Route::get('/parts_list','PartsController@dataList');
    #添加配件视图
    Route::get('/add_part','PartsController@addView');
    Route::match(['get','post'],'/mechanics_add', 'MechanicsController@add');
    Route::get('/edit_user/{id}','AdminController@editUserView');
    Route::get('/video',function(){
        return view('video',['title'=>"视频播放"]);
    });
});

#带版本控制的后台--------api
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Http\Controllers\Admin\Api'], function ($api) {
               //namespace声明路由组的命名空间，因为上面设置了"prefix"=>"api",所以以下路由都要加一个api前缀，比如请求/api/users_list才能访问到用户列表接口

            $api->group(['middleware'=>'admin'], function ($api) { #后台管理员可用接口
           //$api->group(['middleware'=>['role:admin']], function ($api) { #后台管理员可用接口
                #用户列表api
                $api->get('/users_list','AdminApiController@usersList');
                #添加用户api
                $api->post('/add_user','AdminApiController@addUser');
                #编辑用户api
                $api->post('/edit_user','AdminApiController@editUser');
                #删除用户api
                $api->post('/del_user','AdminApiController@delUser');
                #上传头像api
                $api->post('/upload_avatar','UserApiController@uploadAvatar');
        });

    });
});