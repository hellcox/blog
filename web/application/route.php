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

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]' => [
        ':id' => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

    '/' => 'index/index',
    'new/[:page]' => 'index/new',
    'update/[:page]' => 'index/update',
    'search' => 'index/search',
    'tools' => 'index/tool',
    'tool/timestamp' => 'tool/timestamp',
    'tool/ip' => 'tool/ip',
    'tool/ipAction' => 'tool/ipAction',
    'tool/timeToDate' => 'tool/timeToDate',
    'tool/dateToTime' => 'tool/dateToTime',
    'tool/mi' => 'tool/mi',
    'tool/miRun' => 'tool/miRun',
    'about' => 'index/about',


    'test' => 'index/test',

    'article/:id' => 'index/detail',

];
