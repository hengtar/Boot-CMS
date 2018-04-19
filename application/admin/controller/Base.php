<?php
namespace app\admin\controller;


use auth\Auth;
use Symfony\Component\Yaml\Dumper;
use think\Controller;

class Base extends Controller
{
    /**
     * [_initialize  [ 执行首要方法 ]
     * @author [Boot.Z] [852952656@qq.com]
     */
    public function _initialize()
    {
        if (session('admin_id') == ''){
            $this->redirect('Login/login');
        }
        $auth                   =        new Auth();                               // 实例化auth类库
        $module                 =        strtolower(request()->module());          // 获取模块 并转化成小写
        $controller             =        strtolower(request()->controller());      // 获取控制器 并转化成小写
        $action                 =        strtolower(request()->action());          // 获取方法 并转化成小写
        $controller             =        getMenu($controller);                     // 判断控制器是否是menuadmin/menuhome
        $url                    =        $module."/".$controller."/".$action;      // 获取当前url
        //dump($url);die;
        if(!in_array($url, ['admin/index/index','admin/index/home','admin/upload/upload'])){


                    if(!$auth   ->  check($url,session('admin_id'))){
                        $this   ->  error('抱歉，您没有操作权限');
                    }
        }
        $Menu = new \app\admin\model\MenuAdminModel();                                 // 实例化$Menu  对前端菜单进行渲染
        $this->assign([
            'admin_nickname'    =>      session('admin_nickname'),
            'menu'              =>      $Menu->getAllMenu(session('admin_id'))
        ]);
    }
}