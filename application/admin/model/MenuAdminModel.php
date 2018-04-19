<?php
namespace app\admin\model;

use auth\Auth;
use think\Db;
use think\Model;

class MenuAdminModel extends BaseModel
{
    protected $name                 =       'menu_admin';                  // 设置数据表
    protected $autoWriteTimestamp   =        true;                        // 开启自动写入时间戳


    /**
     * getAllMenu [ 跟去当前后端菜单权限生成二维数组 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array
     * @param $admin_id         后端菜单id
     * @field pid               后端菜单的父级
     * @field name              后端菜单名称
     * @field url               后端菜单链接
     * @field ico               后端菜单一级的ico标
     * @field sort              后端菜单排序
     * @field create_time       后端菜单添加时间
     * @field update_time       后端菜单更新时间
     */
    public function getAllMenu($admin_id)
    {
        $list =              Db::name('menu_admin')
                                    ->order('sort')
                                    ->select();
            $MenuExtend             = $this->MenuTree($list);
            $auth                   = New Auth();
            foreach ($MenuExtend as $key => $value){
                if ($auth -> check($value['url'],$admin_id)){
                    if(!empty($value['_child'])){
                        foreach ($value['_child'] as $v => $o) {
                            if (!$auth->check($o['url'],$admin_id)){
                                //删除没用的子菜单
                                unset($MenuExtend[$key]['_child'][$v]);
                            }
                        }
                    }
                }else{
                    //删除没用的主菜单
                    unset($MenuExtend[$key]);
                }
            }
            return  $MenuExtend;
    }

    /**
     * getAllMenuForBack [ 查出所有的菜单 到后台 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field pid               后端菜单的父级
     * @field name              后端菜单名称
     * @field url               后端菜单链接
     * @field ico               后端菜单一级的ico标
     * @field sort              后端菜单排序
     * @field create_time       后端菜单添加时间
     * @field update_time       后端菜单更新时间
     */
    public function getAllMenuForBack()
    {
        return $this  ->order('sort')                    //取出所有的菜单
                      ->select();

    }

    /**
     * insertOneMenu [ 添加菜单 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field pid               后端菜单的父级
     * @field name              后端菜单名称
     * @field url               后端菜单链接
     * @field ico               后端菜单一级的ico标
     * @field sort              后端菜单排序
     * @field create_time       后端菜单添加时间
     * @field update_time       后端菜单更新时间
     */
    public function insertOneMenu($param)
    {
        //字段检测
        $where = array(
            'pid'                => $param['p_id'],
            'name'               => $param['title'],
            'url'                => $param['name'],
            'sort'               => $param['sort'],
        );
        //try  catch检测
        try{
            if ($this->allowField(true)->save($where) == true){
                //如果开启写入时间戳 必须使用sava添加
                $info           = '成功';
                $id             = 1;
            }else{
                $info           = '失败';
                $id             = 0;
            }
        }catch( PDOException $e){

            $info               = $e->getMessage();
            $id                 = 0;
        }
        $this                   ->writeLog('添加','后端菜单 ',$info);
        return $this            ->returnMsg($id);


    }


    /**
     * deleteMenu [ 删除菜单 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field pid               后端菜单的父级
     * @field name              后端菜单名称
     * @field url               后端菜单链接
     * @field ico               后端菜单一级的ico标
     * @field sort              后端菜单排序
     * @field create_time       后端菜单添加时间
     * @field update_time       后端菜单更新时间
     */
    public function deleteMenu($id)
    {
        try{
            if ($this->where('id',$id)->delete()){
                $info           = '成功';
                $id             = 1;
            }else{
                $info           = '失败';
                $id             = 0;
            }
        }catch(PDOException $e){
            $info               = $e->getMessage();
            $id                 = 0;
        }
        $this                   ->writeLog('删除','后端菜单 ',$info);
        return $this            ->returnMsg($id);
    }


    /**
     * findOneMenu [ 查找一条菜单 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field pid               后端菜单的父级
     * @field name              后端菜单名称
     * @field url               后端菜单链接
     * @field ico               后端菜单一级的ico标
     * @field sort              后端菜单排序
     * @field create_time       后端菜单添加时间
     * @field update_time       后端菜单更新时间
     */
    public function findOneMenu($id)
    {
        //return $this->where('id',$id)->find();
        $list            =  $this->where('id',$id)
                                 ->find();
        $p_title         =  $this->field('name')
                                 ->where('id',$list['pid'])
                                 ->find();
        $list['p_name'] = $p_title['name'];

        return $list;
    }

    /**
     * updateOneMenu [ 更新菜单 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field pid               后端菜单的父级
     * @field name              后端菜单名称
     * @field url               后端菜单链接
     * @field ico               后端菜单一级的ico标
     * @field sort              后端菜单排序
     * @field create_time       后端菜单添加时间
     * @field update_time       后端菜单更新时间
     */
    public function updateOneMenu($param,$id)
    {
        $where = array(                                                     //字段检测
            'pid'               => $param['p_id'],
            'name'              => $param['title'],
            'url'               => $param['name'],
            'sort'              => $param['sort'],
        );
        try{
            if ($this->where('id',$id)->update($where) == true){
                //如果开启写入时间戳 必须使用sava添加
                $info           = '成功';
                $id             = 1;
            }else{
                $info           = '失败';
                $id             = 0;
            }
        }catch( PDOException $e){
            $info               = $e->getMessage();
            $id                 = 0;
        }
        $this                   ->writeLog('更新','后端菜单 ',$info);
        return $this            ->returnMsg($id);
    }


    /**
     * MenuTree [ 获取菜单的分类树 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array
     * @param $list
     * @param int $pid
     * @param string $child
     * @field pid               后端菜单的父级
     * @field name              后端菜单名称
     * @field url               后端菜单链接
     * @field ico               后端菜单一级的ico标
     * @field sort              后端菜单排序
     * @field create_time       后端菜单添加时间
     * @field update_time       后端菜单更新时间
     */
    private function MenuTree($list,$pid=0,$child='_child'){
        $tree=array();
        foreach($list as $key => $val){
            if($val['pid'] == $pid){
                                                                            //获取当前$pid所有子类
                unset($list[$key]);
                if(!empty($list)){
                    $child = $this -> MenuTree($list,$val['id'],$child);    //来来来 找北京的子栏目 递归 空
                    if(!empty($child)){
                        $val['_child']=$child;
                    }
                }
                $tree[]=$val;
            }
        }
        return $tree;
    }







}