<?php
namespace app\admin\model;

use think\Model;

class MessageModel extends BaseModel
{
    protected $name = 'message';                             //设置数据表
    protected $autoWriteTimestamp = true;                  //开启自动写入时间戳

    public function getAllMessage()
    {
        return  $this   ->field('*,id')
                        ->order('id desc')
                        ->paginate(10);
    }

    /**
     * deleteOneMessage [ 删除留言 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array
     * @param $id
     * @field email                  留言的邮箱
     * @field nick_name              留言的昵称
     * @field content                留言的内容
     * @field is_ok                  留言是否通过审核  1：通过  0：未通过
     * @field ip                     留言的IP
     * @field create_time            留言的添加时间
     * @field update_time            留言的更新时间
     */
    public function deleteOneMessage($id)
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
        $this                   ->writeLog('删除','留言 ',$info);
        return $this            ->returnMsg($id);
    }

    /**
     * [updateStatusMessage  [ 更新留言状态状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field email                  留言的邮箱
     * @field nick_name              留言的昵称
     * @field content                留言的内容
     * @field is_ok                  留言是否通过审核  1：通过  0：未通过
     * @field ip                     留言的IP
     * @field create_time            留言的添加时间
     * @field update_time            留言的更新时间
     */
    public function updateStatusMessage($id)
    {
        try{
            $IsId                   = $this->where('id',$id)->find();
            if ($IsId['is_ok'] == 1){
                if ($this->update(['is_ok' => 0],['id'=> $id])) {
                    $info           = '成功';
                    $id             = 1;
                }else{
                    $info           = '失败';
                    $id             = 0;
                }
            }else if ($IsId['is_ok'] == 0){
                if ($this->update(['is_ok' => 1],['id'=> $id])) {
                    $info           = '成功';
                    $id             = 1;
                }else{
                    $info           = '失败';
                    $id             = 0;
                }
            }
        }catch(PDOException $e){
            $info                   = $e->getMessage();
            $id                     = 0;
        }
        $this                       ->writeLog('更新','留言状态 ',$info);
        return $this                ->returnMsg($id);

    }

    /**
     * [fetchFiveMessage  [ 查找最新的五条留言 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field email                  留言的邮箱
     * @field nick_name              留言的昵称
     * @field content                留言的内容
     * @field is_ok                  留言是否通过审核  1：通过  0：未通过
     * @field ip                     留言的IP
     * @field create_time            留言的添加时间
     * @field update_time            留言的更新时间
     */
    public function fetchFiveMessage()
    {

        return  $this   ->field('content,ip,update_time,id,nick_name')
                        ->order('id desc')
                        ->select();
    }

}