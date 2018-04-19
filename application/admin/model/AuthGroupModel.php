<?php
namespace app\admin\model;

use think\Model;

class AuthGroupModel extends BaseModel
{
    protected $name = 'auth_group';                                  //设置数据表
    protected $autoWriteTimestamp = true;                            //开启自动写入时间戳

    /**
     * [getAllAuthGroup  [ 所有的角色组列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field title             用户组名称
     * @field status            用户组状态
     * @field rules             用户组权限Id
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function getAllAuthGroup()
    {
        return $this -> order('create_time desc')
                     -> select();
    }

    /**
     * updateStatusGroup [ 更新角色状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field title             用户组名称
     * @field status            用户组状态
     * @field rules             用户组权限Id
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function updateStatusGroup($id)
    {
        try{
            $IsId                       = $this->where('id',$id)->find();
            if ($IsId['status'] == 1){
                if ($this->update(['status' => 0],['id'=> $id])) {
                    $info               = '成功';
                    $id                 = 1;
                }else{
                    $info               = '失败';
                    $id                 = 0;
                }
            }else if ($IsId['status'] == 0){
                if ($this->update(['status' => 1],['id'=> $id])) {
                    $info               = '成功';
                    $id                 = 1;
                }else{
                    $info               = '失败';
                    $id                 = 0;
                }
            }
        }catch(PDOException $e){
            $info                       = $e->getMessage();
            $id                         = 0;
        }
        $this                           ->writeLog('更新状态','用户组 ',$info);
        return $this                    ->returnMsg($id);

    }

    /**
     * deleteGroup [ 删除组 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field title             用户组名称
     * @field status            用户组状态
     * @field rules             用户组权限Id
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function deleteGroup($id)
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

        $this                           ->writeLog('更新状态','用户组 ',$info);
        return $this                    ->returnMsg($id);
    }


    /**
     * insertOneGroup [ 插入一个角色组 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field title             用户组名称
     * @field status            用户组状态
     * @field rules             用户组权限Id
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function insertOneGroup($param)
    {

        //try  catch检测
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
        $this                           ->writeLog('增加','用户组 ',$info);
        return $this                    ->returnMsg($id);
    }

    /**
     * findOneGroup [ 根据id 查找当前id的组 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field title             用户组名称
     * @field status            用户组状态
     * @field rules             用户组权限Id
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function findOneGroup($id)
    {
        return $this->where('id',$id)->find();
    }

    /**
     * updateOneGroup [ 更新角色 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field title             用户组名称
     * @field status            用户组状态
     * @field rules             用户组权限Id
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function updateOneGroup($param,$id)
    {
        try{
            if ($this->where('id',$id)->update($param) == true){
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
        $this                           ->writeLog('更新','用户组 ',$info);
        return $this                    ->returnMsg($id);
    }

    /**
     * findTheIdHaveAuth [ 查出当前Id所有的权限 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field title             用户组名称
     * @field status            用户组状态
     * @field rules             用户组权限Id
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function findTheIdHaveAuth($id)
    {
       return $this -> where('id',$id)->field('rules')->find();
    }

    /**
     * updateTheIdAuth [ 分配权限 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field title             用户组名称
     * @field status            用户组状态
     * @field rules             用户组权限Id
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function updateTheIdAuth($id,$rule_ids)
    {

        return $this->where('id',$id)->update($rule_ids);

    }





}