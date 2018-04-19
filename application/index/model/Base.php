<?php
namespace app\index\model;

use think\Model;
use think\Db;
class Base extends Model
{

    public function getAllConfig()
    {
        $list = Db::name('config') ->select();
        $config = [];
        foreach ($list as $k => $v) {
            $config[trim($v['name'])] = $v['value'];
        }


        return $config;
    }

}