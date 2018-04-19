<?php

namespace app\index\controller;

use app\index\model\MenuHome;
use think\Controller;
class Page extends Base
{
    /**
     * index [ 详情页 ]
     * @author [Boot.Z] [852952656@qq.com]
     */
    public function index()
    {
        $id = input('param.page');
        $MenuHomeModel = New MenuHome();
        $MenuInfo = $MenuHomeModel -> getTheIdMenuInfo($id);
        $this->assign('MenuInfo',$MenuInfo);
        return $this->fetch();
    }

    public function server()
    {
        $id = input('param.page');
        $MenuHomeModel = New MenuHome();
        $MenuInfo = $MenuHomeModel -> getTheIdMenuInfo($id);
        $this->assign('MenuInfo',$MenuInfo);
        return $this->fetch();
    }

    public function us()
    {
        $id = input('param.page');
        $MenuHomeModel = New MenuHome();
        $MenuInfo = $MenuHomeModel -> getTheIdMenuInfo($id);
        $this->assign('MenuInfo',$MenuInfo);
        return $this->fetch();
    }
}