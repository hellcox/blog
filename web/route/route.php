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

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');


// Index
Route::rule('','index/index');
Route::rule('detail/:uuid','index/detail');
Route::rule('new','index/latest');
Route::rule('test','test/test');
Route::rule('tools','index/tools');
Route::rule('tool/timestamp','tool/timestamp');
Route::rule('tool/changeTime','tool/changeTime');
Route::rule('tool/md5','tool/md5');
Route::rule('tool/encodeMd5','tool/encodeMd5');
Route::rule('bill','tool/bill');
Route::rule('addBill','tool/addBill');

return [

];
