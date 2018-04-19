<?php

namespace app\index\controller;

use think\Controller;
use alisms\AliSms;
use think\Db;
use app\index\controller\Sms;

class Member extends Base
{
    /**
     * login [ 登录 ]
     * @author [Boot.Z] [852952656@qq.com]
     */
    public function login()
    {
        if (request()->isPost()){
            $param = input('param.');
            //验证验证码字段
            if(!captcha_check($param['captcha'])){
                $account = [
                    'account'  => $param['account'],
                    'password' => getPass($param['param.password'])
                ];
                $check =  Db::name('member')->where($account)  ->find();
                if ($check){
                    session('userId'         ,   $check['id']);
                    session('userNickname'   ,   $check['nickname']);
                    return [
                        'pass'   =>     1,
                        'msg'    =>     '登录成功',
                    ];
                }else{
                    return [
                        'pass'  =>      0,
                        'msg'   =>      '用户名或密码不正确'
                    ];
                }
            }else{
                return json(['pass' => -1,'msg' => '验证码输入错误']);
            }
        }else{
            return $this->fetch();
        }
    }

    /**
     * register [ 注册 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return mixed
     */
    public function register()
    {
        if (request()->isPost()){
            $param = input('param.');
            if ($param['phoneCode'] == cookie('code')){
                $account = [
                    'account'  => $param['phone'],
                    'password' => getPass($param['param.password'])
                ];
                $check =  Db::name('member')->where($account)  ->insert();
                if ($check){
                    session('userId'         ,   $check['id']);
                    session('userNickname'   ,   $check['nickname']);
                    return [
                        'pass'   =>     'y',
                        'msg'    =>     '注册成功',
                    ];
                }else{
                    return [
                        'pass'  =>      'n',
                        'msg'   =>      '注册失败'
                    ];
                }
            }else{
                return json(['pass' => -5,'msg' => '手机验证码输入错误']);
            }
        }else{
            return $this->fetch();
        }
    }
}