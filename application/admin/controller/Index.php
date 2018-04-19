<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\MessageModel;
use org;
class Index extends Base
{
    /**
     * [index  [ 首页Base ]
     * @author [Boot.Z] [852952656@qq.com]
     */
    public function index()
    {
        return  $this       ->fetch('/index');
    }

    /**
     * [home  [ 首页 ]
     * @author [Boot.Z] [852952656@qq.com]
     */
    public function home()
    {
        $MessageModel                       = New MessageModel();
        $NewMessage                         =  $MessageModel ->fetchFiveMessage();
        $IpLocation                         = New org\IpLocation();
        $NewList                            = array();
        foreach ($NewMessage as $key => $value) {
            $arr                            = $IpLocation ->getlocation($value['ip']);
            $NewList[$key]                  = $NewMessage[$key];
            $NewList[$key]['address']       = $arr['country'].$arr['area'];
        }
        $this                               ->assign('NewMessage',$NewList);

        return  $this                       ->fetch();
    }

}
