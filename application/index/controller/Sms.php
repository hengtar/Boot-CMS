<?php

namespace app\index\controller;

use alisms\AliSms;
use think\captcha\Captcha;
use think\Controller;
class Sms extends Base
{

    public function sendSms()
    {
        if (request()->isAjax())
        {
            $param = input('param.');
            if(!captcha_check($param['captcha'])){
                $phone = $param['phone'];
                if ($this->send($phone) === true){
                    return json(['pass' => 1,'msg' => '发送成功']);
                }else{
                    return json(['pass' => 0,'msg' => '发送失败']);
                }
            }else{
                return json(['pass' => -1,'msg' => '验证码输入错误']);
            }
        }else{
            return json(['pass' => -2,'msg' => '提交错误']);
        }
    }

    /**
     * send [ 发短信 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return bool
     */
    private function send($phone)
    {
        $mobile             = $phone;
        $AliSms             = new AliSms();
        $code               = rand (111111,999999);
        cookie('code',$code);
        return  $AliSms     -> send_verify($mobile, $code);
    }
}