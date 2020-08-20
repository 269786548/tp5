<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// Route::get('think', function () {
//     return 'hello,ThinkPHP5!';
// });

// Route::get('hello/:name', 'index/hello');

// return [

// ];


// Route::rule('v1/hello/:id','index/Index/hello','GET')
// 	->middleware('Check')->name('new_read');

// Route::rule('v1/hello/:id','index/Index/hello','GET')->name('new_read');

Route::group('v1', function(){
	Route::rule('order','index/Order/index');
})->middleware('Check');

