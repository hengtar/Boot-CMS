<?php
namespace app\admin\model;

use think\Model;

class AdminModel extends BaseModel
{
    protected $name = 'admin';                      //设置数据表
    protected $autoWriteTimestamp = true;           //开启自动写入时间戳

    /**
     * [getAllAuthGroup  [ 取出所有的角色组列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field user              管理员用户名
     * @field pass              管理员密码
     * @field nickname          管理员昵称
     * @field logi_num          管理员登录次数
     * @field last_login_time   管理员上一次登录时间
     * @field last_login_ip     管理员上次登录地点
     * @field status            管理员状态
     * @field header_image      管理员头像
     * @field logi_num          管理员登录次数
     * @field logi_num          管理员登录次数
     * @field create_time       管理员添加时间
     * @field update_time       管理员更新时间
     */
    public function getAllAuthUser()
    {

        return $this -> alias('a')
                     ->join('__AUTH_GROUP_ACCESS__ b','a.id = b.uid','LEFT')
                     ->join('__AUTH_GROUP__ c','b.group_id = c.id ','LEFT')
                     ->field('a.*,c.title')
                     ->select();
    }

    /**
     * updateStatusUser [ 更改用户状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field user              管理员用户名
     * @field pass              管理员密码
     * @field nickname          管理员昵称
     * @field logi_num          管理员登录次数
     * @field last_login_time   管理员上一次登录时间
     * @field last_login_ip     管理员上次登录地点
     * @field status            管理员状态
     * @field header_image      管理员头像
     * @field logi_num          管理员登录次数
     * @field logi_num          管理员登录次数
     * @field create_time       管理员添加时间
     * @field update_time       管理员更新时间
     */
    public function updateStatusUser($id)
    {
        try{
            $IsId               = $this->where('id',$id)->find();
            if ($IsId['status'] == 1){
                if ($this->update(['status' => 0],['id'=> $id])) {
                    $info       = '成功';
                    $id         = 1;
                }else{
                    $info       = '失败';
                    $id         = 0;
                }
            }else if ($IsId['status'] == 0){
                if ($this->update(['status' => 1],['id'=> $id])) {
                    $info       = '成功';
                    $id         = 1;
                }else{
                    $info       = '失败';
                    $id         = 0;
                }
            }
        }catch(PDOException $e){
            $info               = $e->getMessage();
            $id                 = 0;

        }
        $this                   ->writeLog('更新用户状态','用户 ',$info);
        return $this            ->returnMsg($id);
    }


    /**
     * deleteUser [ 删除管理员 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field user              管理员用户名
     * @field pass              管理员密码
     * @field nickname          管理员昵称
     * @field logi_num          管理员登录次数
     * @field last_login_time   管理员上一次登录时间
     * @field last_login_ip     管理员上次登录地点
     * @field status            管理员状态
     * @field header_image      管理员头像
     * @field logi_num          管理员登录次数
     * @field logi_num          管理员登录次数
     * @field create_time       管理员添加时间
     * @field update_time       管理员更新时间
     */
    public function deleteUser($id)
    {
        try{
            if ($this->where('id',$id)->delete()){
               $info                = '成功';
               $id                  = 1;
            }else{
                $info               = '失败';
                $id                 = 0;
            }
        }catch(PDOException $e){
            $info                   = $e->getMessage();
            $id                     = 0;
        }
        $this                       ->writeLog('删除','用户 ',$info);
        return $this                ->returnMsg($id);

    }

    /**
     * insertOneUser [ 添加管理员 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field user              管理员用户名
     * @field pass              管理员密码
     * @field nickname          管理员昵称
     * @field logi_num          管理员登录次数
     * @field last_login_time   管理员上一次登录时间
     * @field last_login_ip     管理员上次登录地点
     * @field status            管理员状态
     * @field header_image      管理员头像
     * @field logi_num          管理员登录次数
     * @field logi_num          管理员登录次数
     * @field create_time       管理员添加时间
     * @field update_time       管理员更新时间
     *
     */
    public function insertOneUser($param)
    {
        try{
            $data = array(
                'user'                    => $param['username'],
                'status'                  => $param['status'],
                'pass'                    => getPass($param['password']),
                'nickname'                => $param['real_name'],
            );
            $this                         ->save($data);
            $uid                          =  $this->id;
            $group                        = array(
                                            'group_id' => $param['p_id'],
                                                'uid' => $uid,
                                            );
            if (!$this->table('__AUTH_GROUP_ACCESS__')->insert($group)){
                $this                     ->where('id',$uid)->delete();

                return false;
            }else{

                return true;
            }
        }catch(PDOException $e){

            return ['pass' => -1,'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * [findOneUser  [ 查找用户 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field user              管理员用户名
     * @field pass              管理员密码
     * @field nickname          管理员昵称
     * @field logi_num          管理员登录次数
     * @field last_login_time   管理员上一次登录时间
     * @field last_login_ip     管理员上次登录地点
     * @field status            管理员状态
     * @field header_image      管理员头像
     * @field logi_num          管理员登录次数
     * @field logi_num          管理员登录次数
     * @field create_time       管理员添加时间
     * @field update_time       管理员更新时间
     */
    public function findOneUser($id)
    {
        return $this -> alias('a')
                     -> join('__AUTH_GROUP_ACCESS__ b','a.id = b.uid','LEFT')
                     -> join('__AUTH_GROUP__ c','b.group_id = c.id ','LEFT')
                     -> field('a.*,c.title,b.group_id')
                     -> where('a.id',$id)
                     -> find();
    }

    /**
     * [updateOneUser  [ 更新用户信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field user              管理员用户名
     * @field pass              管理员密码
     * @field nickname          管理员昵称
     * @field logi_num          管理员登录次数
     * @field last_login_time   管理员上一次登录时间
     * @field last_login_ip     管理员上次登录地点
     * @field status            管理员状态
     * @field header_image      管理员头像
     * @field logi_num          管理员登录次数
     * @field logi_num          管理员登录次数
     * @field create_time       管理员添加时间
     * @field update_time       管理员更新时间
     */
    public function updateOneUser($param,$id)
    {


        if ($param['pass'] == ''){
            try{
                $data = array(
                    'user'                    => $param['username'],
                    'status'                  => $param['status'],
                    'pass'                    => $param['password'],
                    'nickname'                => $param['real_name'],
                );
                $group = array(
                    'group_id'                => $param['p_id'],
                );
                if (!$this->table('__AUTH_GROUP_ACCESS__ ')->where('uid',$id)->update($group)){
                    if ( $this->where('id',$id)->update($data)){

                        return true;
                    }else{

                        return false;
                    }
                }else{

                    return true;
                }
            }catch(PDOException $e){
                return ['pass' => -1,'data' => '', 'msg' => $e->getMessage()];
            }
        }else{
            try{
                $data = array(
                    'user'                    => $param['username'],
                    'status'                  => $param['status'],
                    'pass'                    => getPass($param['pass']),
                    'nickname'                => $param['real_name'],
                );
                $group = array(
                    'group_id'                => $param['p_id'],
                );
                if (!$this->table('__AUTH_GROUP_ACCESS__ ')->where('uid',$id)->update($group)){
                    if ( $this->where('id',$id)->update($data)){

                        return true;
                    }else{

                        return false;
                    }
                }else{

                    return true;
                }
            }catch(PDOException $e){
                return ['pass' => -1,'data' => '', 'msg' => $e->getMessage()];
            }
        }


    }


    /**
     * updateHeadImgOfUser [ 个人中心：更新角色信息 密码 以及头像 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field user              管理员用户名
     * @field pass              管理员密码
     * @field nickname          管理员昵称
     * @field logi_num          管理员登录次数
     * @field last_login_time   管理员上一次登录时间
     * @field last_login_ip     管理员上次登录地点
     * @field status            管理员状态
     * @field header_image      管理员头像
     * @field logi_num          管理员登录次数
     * @field logi_num          管理员登录次数
     * @field create_time       管理员添加时间
     * @field update_time       管理员更新时间
     */
    public function updateHeadImgOfUser($param,$id)
    {
        try{
            if ($this->where('id',$id)->update($param)) {
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
        $this                           ->writeLog('更新','用户 ',$info);
        return $this                    ->returnMsg($id);
    }


}