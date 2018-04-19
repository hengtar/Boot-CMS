<?php
namespace app\index\controller;
use think\Controller;

class Base extends Controller
{
    /**
     * _initialize [ 构造方法 ]
     * @author [Boot.Z] [852952656@qq.com]
     */
    public function _initialize()
    {
        $MenuHomeModel = New \app\index\model\MenuHome();
        $AllMenu =  $MenuHomeModel -> getAllMenu();
        $Menu = $this->getTree($AllMenu);
        $this->assign('Menu',$Menu);

        //取出所有配置文件（网站信息）
        $BaseModel = New \app\index\model\Base();
        $config =  $BaseModel->getAllConfig();
        $this->assign('config',$config);

    }

    /**
     * getTree [ 取出菜单列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array|string
     * @param $data
     * @param int $pId
     */
    protected function getTree($data, $pId = 0)
    {
        $tree = '';
        foreach($data as $k => $v)
        {
            if($v['p_id'] == $pId)
            {
                $v['son'] = $this->getTree($data, $v['id']);
                $tree[] = $v;
            }
        }
        return $tree;
    }





}