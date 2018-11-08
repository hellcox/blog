<?php
/**
 * User: hellcox
 * Date: 2018/6/1
 * Time: 22:58
 */

class Test extends Base
{
    public function test1(){
        // echo Tool::url2cdn("http://127.0.0.1/blog/blog_cms/upload/temp/2018/06/01/c9c8d5baeb962b1e442e3ee3590135b6.jpg");
        // echo '<hr>';
        // echo Tool::cdn2url("F:/www/blog/blog_cms/upload/temp/2018/06/01/c9c8d5baeb962b1e442e3ee3590135b6.jpg");
        // echo '<hr>';
        echo Tool::moveTempFile("http://127.0.0.1/blog/blog_cms/upload/temp/2018/06/01/c9c8d5baeb962b1e442e3ee3590135b6.jpg",'cover/');
    }
}