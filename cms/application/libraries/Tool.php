<?php
/**
 * 自定义工具类
 * Created by xLong.
 * User: DOU
 * Date: 2018/1/4
 * Time: 21:22
 */

class Tool
{

    /**
     * 返回JSON数据 - 常规
     * @param int    $code
     * @param string $msg
     * @param null   $data
     */
    public static function json($code = 0, $msg = 'success', $data = null)
    {
        header('Content-Type:application/json; charset=utf-8');
        $arr['code'] = $code;
        $arr['msg'] = empty($msg) ? 'success' : $msg;
        $arr['data'] = $data;
        echo json_encode($arr);
        exit();
    }

    /**
     * 获取当前毫秒时间
     * @return float
     */
    public static function microtime()
    {
        list($msec, $sec) = explode(' ', microtime());
        $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        return $msectime;
    }

    /**
     * 把返回的数据集转换成Tree
     * @param array  $list 要转换的数据集
     * @param string $pk   自增字段（栏目id）
     * @param string $pid  parent标记字段
     * @return array
     */
    public static function makeTree($list, $pk = 'node_id', $pid = 'node_parent_id', $child = 'child', $root = 0)
    {
        $tree = array();
        $packData = array();
        foreach ($list as $data) {
            $data[$child] = [];
            $packData[$data[$pk]] = $data;
        }
        foreach ($packData as $key => $val) {
            if ($val[$pid] == $root) {
                //代表跟节点, 重点一
                $tree[] = &$packData[$key];
            } else {
                //找到其父类,重点二
                $packData[$val[$pid]][$child][] = &$packData[$key];
            }
        }
        return $tree;
    }

    /**
     * 递归创建文件夹
     * @param string $dir 路径:dir1/dir2
     */
    public static function createDirs($dir)
    {
        if (is_dir($dir) || @mkdir($dir, 0777)) {
            // 创建成功
            chmod($dir, 0777);
        } else {
            $dirArr = explode('/', $dir);
            array_pop($dirArr);
            $newDir = implode('/', $dirArr);
            Tool::createDirs($newDir);
            if (@mkdir($dir, 0777)) {
                chmod($dir, 0777);
            }
        }
    }

    /**
     * 移动临时文件到正式路径
     */
    public static function moveTempFile($urlPath, $path = '')
    {
        if (empty($urlPath)) {
            return $urlPath;
        }
        $tempFile = Tool::url2cdn($urlPath);
        $nowFile = Tool::url2cdn(str_replace(FILE_URL.'temp/', FILE_URL.$path, $urlPath));
        if (file_exists($nowFile)) {
            return Tool::cdn2url($nowFile);
        } else {
            Tool::createDirs(dirname($nowFile));
            copy($tempFile, $nowFile);
            return Tool::cdn2url($nowFile);
        }

    }

    public static function url2cdn($urlPath)
    {
        return str_replace(FILE_URL, FILE_DIR, $urlPath);
    }

    public static function cdn2url($filePath)
    {
        return str_replace(FILE_DIR, FILE_URL, $filePath);
    }
}