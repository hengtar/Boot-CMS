<?php
namespace app\admin\model;

use think\Log;
use think\Model;

class AdvertModel extends BaseModel
{
    protected $name = 'advert';                     //设置数据表
    protected $autoWriteTimestamp = true;           //开启自动写入时间戳



    /**
     * [getAllAdvert  [ 取出所有广告 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id      广告组分类id
     * @field title        广告标题
     * @field photo        广告图片链接
     * @field url          广告链接地址
     * @field status       广告状态
     * @field create_time  广告添加时间
     * @field update_time  广告更新时间
     */
    public function getAllAdvert()
    {

       return  $this->alias('a')
                    ->join('__ADVERT_CATE__ b','a.cate_id = b.id')
                    ->field('a.*,b.name')
                    ->order('a.id desc')
                    ->paginate(10);
    }

    /**
     * insertOneAdvert [ 添加广告 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id      广告组分类id
     * @field title        广告标题
     * @field photo        广告图片链接
     * @field url          广告链接地址
     * @field status       广告状态
     * @field create_time  广告添加时间
     * @field update_time  广告更新时间
     */
    public function insertOneAdvert($param)
    {
        try{
            $isOK = $this->allowField(true)->save($param);
            if ($isOK == true){
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
        $this                           ->writeLog('添加','广告 ',$info);
        return $this                    ->returnMsg($id);

    }

    /**
     * [deleteOneAdvert  [ 根据传值id删除当前文章 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id      广告组分类id
     * @field title        广告标题
     * @field photo        广告图片链接
     * @field url          广告链接地址
     * @field status       广告状态
     * @field create_time  广告添加时间
     * @field update_time  广告更新时间
     */
    public function deleteOneAdvert($id)
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
        $this                           ->writeLog('删除','广告 ',$info);
        return $this                    ->returnMsg($id);
    }

    /**
     * updateStatusAdvert [ 根据id更新广告状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array
     * @param $id
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id      广告组分类id
     * @field title        广告标题
     * @field photo        广告图片链接
     * @field url          广告链接地址
     * @field status       广告状态
     * @field create_time  广告添加时间
     * @field update_time  广告更新时间
     */
    public function updateStatusAdvert($id)
    {
        try{
            $IsId                       = $this->where('id',$id)->find();
            if ($IsId['status'] == 1){
                if ($this->update(['status' => 0],['id'=> $id])) {
                    $info               = '成功';
                    $id                 = 1;
                }else{
                    $info               = '失败';
                    $id                  = 0;
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
        $this                           ->writeLog('更新状态','广告 ',$info);
        return $this                    ->returnMsg($id);

    }


    /**
     * fetchOneAdvert [ 查找一条广告 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id      广告组分类id
     * @field title        广告标题
     * @field photo        广告图片链接
     * @field url          广告链接地址
     * @field status       广告状态
     * @field create_time  广告添加时间
     * @field update_time  广告更新时间
     */
    public function fetchOneAdvert($id)
    {

        return $this->where('id',$id) ->find();
    }

    /**
     * updateOneAdvert [ 更新广告信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id      广告组分类id
     * @field title        广告标题
     * @field photo        广告图片链接
     * @field url          广告链接地址
     * @field status       广告状态
     * @field create_time  广告添加时间
     * @field update_time  广告更新时间
     */
    public function updateOneAdvert($param,$id)
    {
        try{
            $isOK                       = $this->allowField(true)->save($param,['id' => $id]);
            if ($isOK == true){
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
        $this                           ->writeLog('编辑','广告 ',$info);
        return $this                    ->returnMsg($id);

    }


}