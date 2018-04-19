<?php
namespace app\admin\controller;

use app\admin\model\AdminModel;
use think\Db;
use app\admin\model\ConfigModel;

class Config extends Base
{
    /**
     * AllConfig [ 取出所有配置数据 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array
     * @field name              配置名称
     * @field value             配置值
     */
    public function AllConfig()
    {
        $ConfigModel                    = New ConfigModel();
        $list                           = $ConfigModel ->getAllConfig();
        $config                         = [];
        foreach ($list as $k => $v) {
            $config[trim($v['name'])]   = $v['value'];
        }

        return $config;
    }

    /**
     * getAllConfigSave [ 精简代码 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              配置名称
     * @field value             配置值
     * @return array
     */
    public function getAllConfigSave()
    {
        $configModel                = New ConfigModel();
        $param                      = input('param.');
        foreach ($param as $key => $value) {
            foreach ($value as $k => $v) {
                $map                = array('name' => $k);
                $result             =  $configModel->SaveConfig($map,$v);
            }
        }

        return $result;
    }
    /**
     * [seo  [ 网站配置 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              配置名称
     * @field value             配置值
     */
    public function seo()
    {
        if (request()->isAjax()){
            $param                           = input('param.');
            //dump($param);die;
            if ($param['photo'] == ''){
                $param['config']['web_logo'] = $param['data_photo'];
            }else{
                $param['config']['web_logo'] = $param['photo'];
            }
            $param['config']['web_statis']   = $_POST['config']['web_statis'];

            unset($param['photo']);
            unset($param['file']);
            unset($param['data_photo']);
            $configModel                     = New ConfigModel();
            foreach ($param as $key => $value) {
                foreach ($value as $k => $v) {
                    $map                     = array('name' => $k);
                    $result                  = $configModel->SaveConfig($map,$v);
                }
            }

            return $result;
        }else{
            $config                          = $this->AllConfig();
            $this                            ->assign('config',$config);

            return  $this                    ->fetch();
        }
    }
    /**
     * [sms  [ 网站短信配置 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              配置名称
     * @field value             配置值
     */
    public function sms()
    {
        if (request()->isAjax()){

            return  $this       ->getAllConfigSave();
        }else{
            $config = $this     ->AllConfig();
            $this               ->assign('config',$config);

            return  $this       ->fetch();
        }
    }


    /**
     * [email  [ 网站邮箱验证配置 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              配置名称
     * @field value             配置值
     */
    public function email()
    {
        if (request()->isAjax()){

            return  $this           ->getAllConfigSave();
        }else{
            $config                 = $this->AllConfig();
            $this                   ->assign('config',$config);

            return  $this           ->fetch();
        }
    }

    /**
     * administrator [ 管理员的个人中心 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return mixed
     * @field name              配置名称
     * @field value             配置值
     */
    public function administrator()
    {
        $id                         = session('admin_id');
        $adminUserModel             = New AdminModel();
        if (request()->isAjax()){
            $param                  = input('param.');
             //修改头像（如果有需要就打开）
//            if ($param['photo'] == ''){
//                $param['head_image'] = $param['data_photo'];
//            }else{
//                $param['head_image'] = $param['photo'];
//            }

            if ($param['password'] == ''){
                unset($param['password']);
            }else{
                $param['pass']      = getPass($param['password']);
            }
            unset($param['password']);
            unset($param['data_photo']);
            unset($param['photo']);
            unset($param['file']);

            return $adminUserModel -> updateHeadImgOfUser($param,$id);
        }else{
            $user                   = $adminUserModel -> findOneUser($id);
            $this                   ->assign('user',$user);

            return  $this           ->fetch();
        }
    }

}