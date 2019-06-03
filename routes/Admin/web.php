<?php

/**
 * Created by PhpStorm.
 * User: mcj
 * Date: 2019-03-31
 * Time: 15:20
 * Desc: 后台路由
 */

/**
后台路由  admin
 */
//1、路由前缀 prefix
//可以用 prefix 方法为路由组中给定的 URL 增加前缀。例如，你可以为组中所有路由的 URI 加上 admin 前缀
/*Route::group(['prefix' => 'admin'], function (){
    Route::get('/write', function (){
        return '闭包路由';//URL：http://www.la5.8study.com/admin/write
    });
    Route::get('/index','Admin\IndexController@index');//URL：http://www.la5.8study.com/admin/index
});*/

//2、命名空间 namespace
//2-1 暂时bug 不能用
// 在 "App\Http\Controllers\Admin" 命名空间下的控制器  可少写 Admin https://laravelacademy.org/post/7769.html
/*Route::namespace('admin')->group(['prefix' => 'admin'], function (){
    Route::get('/index','IndexController@index');//URL：http://www.la5.8study.com/admin/index
});*/
//2-2、 等价于 1
// 在 "App\Http\Controllers\Admin" 命名空间下的控制器  可少写 Admin
Route::group(['prefix' => 'admin','namespace'=>'Admin'], function (){
    Route::get('/write', function (){//测试
        return '闭包路由';//URL：http://www.la5.8study.com/admin/write
    });
    Route::get('/entry','EntryController@pwd');//加密 pwd


    Route::get('/index','EntryController@index');//首页       URL：http://www.la5.8study.com/admin/index
    Route::get('/login','EntryController@loginForm');//登录界面
    Route::post('/login','EntryController@login');//登录处理
    Route::get('/logout','EntryController@logout');//退出处理
    //修改密码
    Route::get('/changePassword', 'MyController@passwordForm');
    Route::post('/changePassword', 'MyController@changePassword');

    //标签管理
    Route::resource('tag', 'TagController');
    //课程管理
    Route::resource('lesson', 'LessonController');


});


