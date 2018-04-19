<?php
namespace app\admin\model;

use think\Db;
use think\Model;

class AuthRuleModel extends BaseModel
{
    protected $name = 'auth_rule';                                       //设置数据表
    protected $autoWriteTimestamp = true;                                //开启自动写入时间戳


    /**
     * [getAllAuthMenu  [ 取出全部的菜单列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              权限链接
     * @field title             权限名称
     * @field type
     * @field status            权限名称
     * @field condition         权限名称
     * @field p_id              权限名称
     * @field sort              权限名称
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function getAllAuthMenu()
    {

        return $this    ->order('sort desc')
                        ->select();
    }

    /**
     * insertOneAuthRule [ 添加权限 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              权限链接
     * @field title             权限名称
     * @field type
     * @field status            权限名称
     * @field condition         权限名称
     * @field p_id              权限名称
     * @field sort              权限名称
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function insertOneAuthRule($param)
    {
        //try  catch检测
        try{
            if ($this->allowField(true)->save($param) == true){
                $info                   = '成功';
                $id                     = 1;
            }else{
                $info                   = '失败';
                $id                     = 0;
            }
        }catch( PDOException $e){

            $info                       = $e->getMessage();
            $id                         = 0;

        }
        $this                           ->writeLog('增加','权限菜单',$info);
        return $this                    ->returnMsg($id);
    }


    /**
     * updateStatusMenu [ 修改菜单的状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array
     * @param $id
     * @field name              权限链接
     * @field title             权限名称
     * @field type
     * @field status            权限名称
     * @field condition         权限名称
     * @field p_id              权限名称
     * @field sort              权限名称
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function updateStatusMenu($id)
    {
        try{
            $IsId = $this->where('id',$id)->find();
            if ($IsId['status'] == 1){
                if ($this->update(['status' => 0],['id'=> $id])) {
                    $info                   = '成功';
                    $id                     = 1;
                }else{
                    $info                   = '失败';
                    $id                     = 0;
                }
            }else if ($IsId['status'] == 0){
                if ($this->update(['status' => 1],['id'=> $id])) {
                    $info                   = '成功';
                    $id                     = 1;
                }else{
                    $info                   = '失败';
                    $id                     = 0;
                }
            }
        }catch(PDOException $e){

            $info                           = $e->getMessage();
            $id                             = 0;
        }

        $this                               ->writeLog('更新','权限菜单 ',$info);
        return $this                        ->returnMsg($id);
    }


    /**
     * deleteStatusMenu [ 删除传值id的权限 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              权限链接
     * @field title             权限名称
     * @field type
     * @field status            权限名称
     * @field condition         权限名称
     * @field p_id              权限名称
     * @field sort              权限名称
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function deleteStatusMenu($id)
    {
        try{
            if ($this->where('id',$id)->delete()){
                $info                   = '成功';
                $id                     = 1;
            }else{
                $info                   = '失败';
                $id                     = 0;
            }
        }catch(PDOException $e){
            $info                       = $e->getMessage();
            $id                         = 0;
        }
        $this                           ->writeLog('删除','权限菜单 ',$info);
        return $this                    ->returnMsg($id);
    }

    /**
     * findOneMenu [根据传值id查询当前id  ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array|false|\PDOStatement|string|Model
     * @param $id
     * @field name              权限链接
     * @field title             权限名称
     * @field type
     * @field status            权限名称
     * @field condition         权限名称
     * @field p_id              权限名称
     * @field sort              权限名称
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function findOneMenu($id)
    {
            $list            =  $this->where('id',$id)
                                     ->find();
            $p_title         =  $this->field('title')
                                     ->where('id',$list['p_id'])
                                     ->find();
            $list['p_title'] = $p_title['title'];

            return $list;
    }

    /**
     * updateOneAuthRule [ 更改权限配置 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              权限链接
     * @field title             权限名称
     * @field type
     * @field status            权限名称
     * @field condition         权限名称
     * @field p_id              权限名称
     * @field sort              权限名称
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function updateOneAuthRule($param,$id)
    {
        try{
            if ($this->where('id',$id)->update($param) == true){
                         //如果开启写入时间戳 必须使用sava添加
                $info                   = '成功';
                $id                     = 1;
            }else{

                $info                   = '失败';
                $id                     = 0;
            }
        }catch( PDOException $e){
            $info                       = $e->getMessage();
            $id                         = 0;
        }
        $this                           ->writeLog('更新','权限菜单 ',$info);
        return $this                    ->returnMsg($id);
    }


    /**
     * findThisAllAuth [ 查出所有的权限列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return false|mixed|\PDOStatement|string|\think\Collection
     * @field name              权限链接
     * @field title             权限名称
     * @field type
     * @field status            权限名称
     * @field condition         权限名称
     * @field p_id              权限名称
     * @field sort              权限名称
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function findThisAllAuth()
    {
       return Db::name('auth_rule')->where('status' , 1)->field('id,title,p_id')->select();
    }


}