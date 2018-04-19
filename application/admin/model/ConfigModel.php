<?php
namespace app\admin\model;

use think\Model;

class ConfigModel extends BaseModel
{
    protected $name = 'config';                 // 设置数据表

    /**
     * getAllConfig [ 取出全部的配置文件 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              配置名称
     * @field value             配置值
     */
    public function getAllConfig()
    {

        return $this->select();
    }

    /**
     * updateOneConfig [ 更新一条配置信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              配置名称
     * @field value             配置值
     */
    public function SaveConfig($key,$value)
    {
        try{
            if($this->allowField(true)->where($key)->setField('value', $value)){
                $info                   = '失败';
                $id                     = 0;
            }else{
                $info                   = '成功';
                $id                     = 1;
            }
        }catch( PDOException $e){
            $info                       = $e->getMessage();
            $id                         = 0;
        }
        $this                           ->writeLog('更新','配置信息 ',$info);
        return $this                    ->returnMsg($id);
    }
}