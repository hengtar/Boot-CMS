<?php
namespace app\admin\controller;


use alisms\AliSms;
use think\Controller;

class Login extends Controller
{
    /**
     * [login  [ 登录 ]
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
    public function login()
    {
        if (request()->isAjax()){

            $data = [
                'user'               =>          input('param.user'),
                'pass'               =>          getPass(input('param.pass'))
            ];
            $check = db('admin')    ->where($data)
                                    ->find();
             if ($check){
                 session('admin_id'         ,   $check['id']);
                 session('admin_nickname'   ,   $check['nickname']);
                 session('admin_photo'      ,   $check['head_image']);
                 return [   'pass'   =>     1,
                            'msg'    =>     '登录成功',
                            'url'    =>     url('Index/index')
                 ];
             }else{
                 return [
                             'pass'  =>      0,
                             'msg'   =>      '用户名或密码不正确'
                 ];
             }
        }else{
            return  $this            ->fetch('/login');
        }
    }



    /**
     * logout [ 退出系统 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field user              管理员用户名
     * @field pass              管理员密码
     * @field nickname          管理员昵称
     * @field logi_num          管理员登录次数
     * @field last_login_time   管理员上一次登录时间
     * @field last_login_ip     管理员上次登录地点 return $this->fetch();
     * @field status            管理员状态
     * @field header_image      管理员头像
     * @field logi_num          管理员登录次数
     * @field logi_num          管理员登录次数
     * @field create_time       管理员添加时间
     * @field update_time       管理员更新时间
     */
    public function loginout()
    {
        session(null);
        $this               ->redirect('Login/login');
    }



}
