<?php
namespace app\admin\controller;

use app\admin\model\MenuAdminModel;

class MenuAdmin extends Base
{
    /**
     * list_menu [ 后台菜单列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field pid               后端菜单的父级
     * @field name              后端菜单名称
     * @field url               后端菜单链接
     * @field ico               后端菜单一级的ico标
     * @field sort              后端菜单排序
     * @field create_time       后端菜单添加时间
     * @field update_time       后端菜单更新时间
     */
    public function list_menu()
    {
        // +----------------------------------------------------------------------
        // | 查询权限菜单
        // +----------------------------------------------------------------------
        $MenuModel              = New MenuAdminModel();
        $list                   =  $MenuModel ->getAllMenuForBack();
        $listRule               = $this->rule($list);
        $this                   ->assign('listRule',$listRule);
        $this                   ->assign('list',$listRule);

        return $this->fetch();
    }

    /**
     * insert_menu [ 添加后台菜单 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field pid               后端菜单的父级
     * @field name              后端菜单名称
     * @field url               后端菜单链接
     * @field ico               后端菜单一级的ico标
     * @field sort              后端菜单排序
     * @field create_time       后端菜单添加时间
     * @field update_time       后端菜单更新时间
     */
    public function insert_menu()
    {
        if (request()->isPost()) {
            $param          = input('param.');
            // +----------------------------------------------------------------------
            // | 添加菜单
            // +----------------------------------------------------------------------
            $MenuModel      = New MenuAdminModel();
            $isOk           = $MenuModel->insertOneMenu($param);


            if ($isOk){

                $this       ->success('新增成功',url('MenuAdmin/list_menu'));
            }else{

                $this       ->error('新增失败',url('MenuAdmin/list_menu'));
            }
        }else{

            return $this    ->fetch();
        }
    }

    /**
     * delete_menu [ 删除后端菜单 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field pid               后端菜单的父级
     * @field name              后端菜单名称
     * @field url               后端菜单链接
     * @field ico               后端菜单一级的ico标
     * @field sort              后端菜单排序
     * @field create_time       后端菜单添加时间
     * @field update_time       后端菜单更新时间
     */
    public function delete_menu()
    {
        if (request()->isAjax()){
            $id             = input('param.id');
            // +----------------------------------------------------------------------
            // | 接受传值ID删除权限
            // +----------------------------------------------------------------------
            $MenuModel      = New MenuAdminModel();
            $isOk           = $MenuModel -> deleteMenu($id);

            return json($isOk);
        }else{

            return $this    ->fetch();
        }
    }

    /**
     * update_menu [ 更新后台菜单信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field pid               后端菜单的父级
     * @field name              后端菜单名称
     * @field url               后端菜单链接
     * @field ico               后端菜单一级的ico标
     * @field sort              后端菜单排序
     * @field create_time       后端菜单添加时间
     * @field update_time       后端菜单更新时间
     */
    public function update_menu()
    {
        if (request()->isPost()) {
            $param              = input('param.');
            $id                 = $param['id'];
            $MenuModel          = New MenuAdminModel();
            // +----------------------------------------------------------------------
            // | 接受传值ID进行查询传值
            // +----------------------------------------------------------------------
            $isOk               = $MenuModel->updateOneMenu($param,$id);
            if ($isOk){

                $this           ->success('修改成功',url('MenuAdmin/list_menu'));
            }else{

                $this           ->error('修改失败',url('MenuAdmin/list_menu'));
            }

        }else{
            // +----------------------------------------------------------------------
            // | 接受传值ID进行查询传值
            // +----------------------------------------------------------------------
            $id                     = input('param.id');
            $MenuModel              = New MenuAdminModel();
            $menu                   = $MenuModel -> findOneMenu($id);
            $this                   ->assign('menu',$menu);
            // +----------------------------------------------------------------------
            // | 查询权限菜单
            // +----------------------------------------------------------------------
            $MenuModel              = New MenuAdminModel();
            $list                   =  $MenuModel ->getAllMenuForBack();
            $listRule               = $this->rule($list);
            $this                   ->assign('list',$listRule);

            return $this            ->fetch();
        }
    }

    // +-------------------------------------------------------------------------------------------------------------
    // | 调用分类函数
    // +-------------------------------------------------------------------------------------------------------------

    /**
     * tree [ 无限极分类函数 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array
     * @param $list
     * @param int $pid
     * @param int $level
     * @param string $html
     */

    private function rule($cate , $lefthtml = ' — — ' , $pid=0 , $lvl=0, $leftpin=0 ){
        $arr                            =array();
        foreach ($cate as $v){
            if($v['pid']==$pid){
                $v['lvl']               =$lvl + 1;
                $v['leftpin']           =$leftpin + 0;//左边距
                $v['lefthtml']          =str_repeat($lefthtml,$lvl);
                $arr[]                  =$v;
                $arr                    = array_merge($arr,self::rule($cate,$lefthtml,$v['id'],$lvl+1 , $leftpin+20));
            }
        }
        return $arr;
    }



}