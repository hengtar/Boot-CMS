<?php
namespace app\admin\model;

use think\Model;

class MemberCateModel extends BaseModel
{
    protected $name = 'member_cate';                                //设置数据表
    protected $autoWriteTimestamp = true;                          //开启自动写入时间戳


    /**
     * fetchAllCate [ 查出所有分类到文章添加页面 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name            会员类型名称
     * @field status          会员类型状态           1：显示  0：不显示
     * @field order           会员类型后台排序
     * @field create_time     会员类型添加时间
     * @field update_time     会员类型更新时间
     */
    public function fetchAllCate()
    {
        return  $this->field('id,name')
                     ->select();
    }

    /**
     * [getAllmember  [ 取出所有分类到控制器 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name            会员类型名称
     * @field status          会员类型状态           1：显示  0：不显示
     * @field order           会员类型后台排序
     * @field create_time     会员类型添加时间
     * @field update_time     会员类型更新时间
     */
    public function getAllCate()
    {

       return  $this    ->field('id,name,create_time,update_time,status,order')
                        ->order('id desc')
                        ->paginate(10);
    }

    /**
     * [insertOneCate  [ 添加一条分类信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name            会员类型名称
     * @field status          会员类型状态           1：显示  0：不显示
     * @field order           会员类型后台排序
     * @field create_time     会员类型添加时间
     * @field update_time     会员类型更新时间
     */
    public function insertOneCate($param)
    {
        try{
            if ($this->allowField(true)->save($param) == true){
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
        $this                           ->writeLog('增加','会员分类 ',$info);
        return $this                    ->returnMsg($id);
    }

    /**
     * [deleteCate  [ 删除当前id的分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name            会员类型名称
     * @field status          会员类型状态           1：显示  0：不显示
     * @field order           会员类型后台排序
     * @field create_time     会员类型添加时间
     * @field update_time     会员类型更新时间
     */
    public function deleteOneCate($id)
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
        $this                           ->writeLog('删除','会员分类 ',$info);
        return $this                    ->returnMsg($id);
    }

    /**
     * [updateStatusCate  [ 修改分类状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name            会员类型名称
     * @field status          会员类型状态           1：显示  0：不显示
     * @field order           会员类型后台排序
     * @field create_time     会员类型添加时间
     * @field update_time     会员类型更新时间
     */
    public function updateStatusCate($id)
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
        $this                               ->writeLog('更新','用户分类状态 ',$info);
        return $this                        ->returnMsg($id);
    }

    /**
     * getOneCateUpdate [ 查出一条分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name            会员类型名称
     * @field status          会员类型状态           1：显示  0：不显示
     * @field order           会员类型后台排序
     * @field create_time     会员类型添加时间
     * @field update_time     会员类型更新时间
     */
    public function findOneCateUpdate($id)
    {
        return  $this   ->where('id',$id)
                        ->field('id,name,order,status')
                        ->find();
    }

    /**
     * doUpdateCate [ 根据传值来的param 条件 进行更新分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name            会员类型名称
     * @field status          会员类型状态           1：显示  0：不显示
     * @field order           会员类型后台排序
     * @field create_time     会员类型添加时间
     * @field update_time     会员类型更新时间
     */
    public function doUpdateCate($param)
    {
        if ($this->isUpdate(true)->save($param) == true){
            $info                   = '成功';
            $id                     = 1;
        }else{

            $info                   = '失败';
            $id                     = 0;
        }
        $this                       ->writeLog('更新','用户分类状态 ',$info);
        return $this                ->returnMsg($id);
    }

}