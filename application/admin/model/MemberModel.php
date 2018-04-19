<?php
namespace app\admin\model;

use think\Model;

class MemberModel extends BaseModel
{
    protected $name = 'member';                           //设置数据表
    protected $autoWriteTimestamp = true;                 //开启自动写入时间戳

    /**
     * [getAllMember  [ 取出所有会员到控制器 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id           会员类型Id
     * @field account           会员账号
     * @field password          会员密码（使用Comment 重的 getPass 方法加密）
     * @field nickname          会员昵称
     * @field photo             会员头像
     * @field login_num         会员登录次数
     * @field status            会员状态  显示 ：1   不显示 ：0
     * @field reg_ip            会员注册ip
     * @field create_time       会员添加时间
     * @field update_time       会员更新时间
     */
    public function getAllMember()
    {
       return  $this    ->alias('a')
                        ->join('__MEMBER_CATE__ b','a.cate_id = b.id')
                        ->field('a.*,b.name')
                        ->order('a.id desc')
                        ->paginate(10);

    }

    /**
     * insertOneMember [ 添加新会员 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id           会员类型Id
     * @field account           会员账号
     * @field password          会员密码（使用Comment 重的 getPass 方法加密）
     * @field nickname          会员昵称
     * @field photo             会员头像
     * @field login_num         会员登录次数
     * @field status            会员状态  显示 ：1   不显示 ：0
     * @field reg_ip            会员注册ip
     * @field create_time       会员添加时间
     * @field update_time       会员更新时间
     */
    public function insertOneMember($param)
    {
        try{
            $param['reg_ip']         =  get_client_ip();
            $param['password']       = getPass($param['password']);

            $isOK                    = $this->allowField(true)->save($param);
            if ($isOK == true){
                $info                = '成功';
                $id                  = 1;
            }else{
                $info                = '失败';
                $id                  = 0;
            }
        }catch( PDOException $e){
            $info                    = $e->getMessage();
            $id                      = 0;
        }
        $this                       ->writeLog('添加','会员 ',$info);
        return $this                ->returnMsg($id);
    }

    /**
     * [deleteOneMember  [ 根据传值id删除当前会员 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id           会员类型Id
     * @field account           会员账号
     * @field password          会员密码（使用Comment 重的 getPass 方法加密）
     * @field nickname          会员昵称
     * @field photo             会员头像
     * @field login_num         会员登录次数
     * @field status            会员状态  显示 ：1   不显示 ：0
     * @field reg_ip            会员注册ip
     * @field create_time       会员添加时间
     * @field update_time       会员更新时间
     */
    public function deleteOneMember($id)
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
        $this                           ->writeLog('删除','会员',$info);
        return $this                    ->returnMsg($id);
    }

    /**
     * updateStatusMember [ 更新会员状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array
     * @param $id
     * @field cate_id           会员类型Id
     * @field account           会员账号
     * @field password          会员密码（使用Comment 重的 getPass 方法加密）
     * @field nickname          会员昵称
     * @field photo             会员头像
     * @field login_num         会员登录次数
     * @field status            会员状态  显示 ：1   不显示 ：0
     * @field reg_ip            会员注册ip
     * @field create_time       会员添加时间
     * @field update_time       会员更新时间
     */
    public function updateStatusMember($id)
    {
        try{
            $IsId                           = $this->where('id',$id)->find();
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
        $this                               ->writeLog('更新','会员 ',$info);
        return $this                        ->returnMsg($id);
    }

    /**
     * fetchOneMember [ 查找当前id会员 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id           会员类型Id
     * @field account           会员账号
     * @field password          会员密码（使用Comment 重的 getPass 方法加密）
     * @field nickname          会员昵称
     * @field photo             会员头像
     * @field login_num         会员登录次数
     * @field status            会员状态  显示 ：1   不显示 ：0
     * @field reg_ip            会员注册ip
     * @field create_time       会员添加时间
     * @field update_time       会员更新时间
     */
    public function fetchOneMember($id)
    {
       return  $this ->where('id',$id)->find();
    }

    /**
     * updateOneMember [ 修改会员信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id           会员类型Id
     * @field account           会员账号
     * @field password          会员密码（使用Comment 重的 getPass 方法加密）
     * @field nickname          会员昵称
     * @field photo             会员头像
     * @field login_num         会员登录次数
     * @field status            会员状态  显示 ：1   不显示 ：0
     * @field reg_ip            会员注册ip
     * @field create_time       会员添加时间
     * @field update_time       会员更新时间
     */
    public function updateOneMember($param,$id)
    {
        try{
            $param['reg_ip']                =  get_client_ip();
            $isOK                           = $this->allowField(true)->save($param,['id' => $id]);
            if ($isOK == true){
                $info                       = '成功';
                $id                         = 1;
            }else{
                $info                       = '失败';
                $id                         = 0;
            }
        }catch( PDOException $e){
            $info                           = $e->getMessage();
            $id                             = 0;
        }
        $this                               ->writeLog('更新','用户 ',$info);
        return $this                        ->returnMsg($id);
    }
}