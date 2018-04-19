<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件


/**
 * getPass [ 取出加密过后密码 ]
 * @author [Boot.Z] [852952656@qq.com]
 * @return string
 * @param $pass
 */
function getPass($pass)
{
    return sha1(md5($pass . 'laozhang'));
}



/**
 * get_client_ip [ 取出用户ip ]
 * @author [Boot.Z] [852952656@qq.com]
 * @return array|false|string
 */
function get_client_ip()
{
    if ($_SERVER['REMOTE_ADDR']) {
        $cip = $_SERVER['REMOTE_ADDR'];
    } elseif (getenv("REMOTE_ADDR")) {
        $cip = getenv("REMOTE_ADDR");
    } elseif (getenv("HTTP_CLIENT_IP")) {
        $cip = getenv("HTTP_CLIENT_IP");
    } else {
        $cip = "unknown";
    }
    return $cip;
}


/**
 * msubstr [ 字符串截取，支持中文和其他编码  ]
 * @author [Boot.Z] [852952656@qq.com]
 * @return string
 * @param $str
 * @param int $start
 * @param $length
 * @param string $charset
 * @param bool $suffix
 */
function msubstr($str, $start = 0, $length, $charset = "utf-8", $suffix = true) {
    if (function_exists("mb_substr"))
        $slice = mb_substr($str, $start, $length, $charset);
    elseif (function_exists('iconv_substr')) {
        $slice = iconv_substr($str, $start, $length, $charset);
        if (false === $slice) {
            $slice = '';
        }
    } else {
        $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("", array_slice($match[0], $start, $length));
    }
    return $suffix ? $slice . '...' : $slice;
}



/**
 * prepareMenu [ 整理菜单树方法  ]
 * @author [Boot.Z] [852952656@qq.com]
 * @return array
 * @param $param
 */
function prepareMenu($param)
{
    $parent = []; //父类
    $child = [];  //子类

    foreach($param as $key=>$vo){

        if($vo['pid'] == 0){
            $vo['href'] = '#';
            $parent[] = $vo;
        }else{
            $vo['href'] = url($vo['name']); //跳转地址
            $child[] = $vo;
        }
    }

    foreach($parent as $key=>$vo){
        foreach($child as $k=>$v){

            if($v['pid'] == $vo['id']){
                $parent[$key]['child'][] = $v;
            }
        }
    }
    unset($child);
    return $parent;
}



function getMenu($controller){
    if ($controller == "menuadmin"){
        return $controller = "menu_admin";
    }else if($controller == "menuhome") {
        return $controller = "menu_home";
    }else{
        return $controller;
    }
}


/**
 * tree [ 无限极分类函数 ]
 * @author [Boot.Z] [852952656@qq.com]
 * @return array
 * @param $list
 * @param int $pid
 * @param int $level
 * @param string $html
 */

function tree($cate , $lefthtml = ' — — ' , $pid=0 , $lvl=0, $leftpin=0 ){
    $arr=array();
    foreach ($cate as $v){
        if($v['p_id']==$pid){
            $v['lvl']=$lvl + 1;
            $v['leftpin']=$leftpin + 0;//左边距
            $v['lefthtml']=str_repeat($lefthtml,$lvl);
            $arr[]=$v;
            $arr= array_merge($arr,tree($cate,$lefthtml,$v['id'],$lvl+1 , $leftpin+20));
        }
    }
    return $arr;
}






?>