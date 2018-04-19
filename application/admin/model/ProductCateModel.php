<?php
namespace app\admin\model;

use think\Model;

class ProductCateModel extends BaseModel
{
    protected $name = 'product_cate';                            //设置数据表
    protected $autoWriteTimestamp = true;                        //开启自动写入时间戳


    /**
     * fetchAllCate [ 查出所有分类到产品添加页面 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   产品分类标题
     * @field order                  产品分类排序
     * @field p_id                   产品分类的父级Id
     * @field status                 产品分类状态
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function fetchAllCate()
    {

        return  $this   ->field('id,name,p_id')
                        ->select();
    }

    /**
     * [getAllArticle  [ 取出所有分类到控制器 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   产品分类标题
     * @field order                  产品分类排序
     * @field p_id                   产品分类的父级Id
     * @field status                 产品分类状态
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function getAllCate()
    {

       return  $this    ->field('id,name,create_time,update_time,status,order,p_id')
                        ->order('id desc')
                        ->paginate(10);
    }

    /**
     * [insertOneCate  [ 添加一条分类信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   产品分类标题
     * @field order                  产品分类排序
     * @field p_id                   产品分类的父级Id
     * @field status                 产品分类状态
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function insertOneCate($param)
    {
        if (empty($param['id'])){
            $data = array(
                'name'      => $param['name'],
                'status'    => $param['status'],
                'order'     => $param['order'],
                'p_id'      => $param['p_id'],
            );
        }else{
            $data = array(
                'id'        => $param['id'],
                'name'      => $param['name'],
                'status'    => $param['status'],
                'order'     => $param['order'],
                'p_id'      => $param['p_id'],
            );
        }
        //try  catch检测
        try{
            if ($this->save($data) == true){
                //如果开启写入时间戳 必须使用sava添加
                $info           = '成功';
                $id             = 1;
            }else{
                $info           = '失败';
                $id             = 0;
            }
        }catch( PDOException $e){
            $info               = $e->getMessage();
            $id                 = 0;
        }
        $this                   ->writeLog('增加','产品分类 ',$info);
        return $this            ->returnMsg($id);

    }

    /**
     * [deleteCate  [ 删除当前id的分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   产品分类标题
     * @field order                  产品分类排序
     * @field p_id                   产品分类的父级Id
     * @field status                 产品分类状态
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function deleteOneCate($id)
    {
        try{
            if ($this->where('id',$id)->delete()){
                $info               = '成功';
                $id                 = 1;
            }else{
                $info               = '失败';
                $id                 = 0;
            }
        }catch(PDOException $e){
            $info                   = $e->getMessage();
            $id                     = 0;
        }
        $this                       ->writeLog('删除','产品分类 ',$info);
        return $this                ->returnMsg($id);

    }

    /**
     * [updateStatusCate  [ 修改分类状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   产品分类标题
     * @field order                  产品分类排序
     * @field p_id                   产品分类的父级Id
     * @field status                 产品分类状态
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function updateStatusCate($id)
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

        $this                           ->writeLog('修改','产品分类 ',$info);
        return $this                    ->returnMsg($id);
    }

    /**
     * getOneCateUpdate [ 查出一条分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   产品分类标题
     * @field order                  产品分类排序
     * @field p_id                   产品分类的父级Id
     * @field status                 产品分类状态
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function findOneCateUpdate($id)
    {
        return  $this   ->where('id',$id)
                        ->field('id,name,order,status')
                        ->find();
    }

    /**
     * doUpdateCate [ 根据传值来的param 条件 进行更新分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   产品分类标题
     * @field order                  产品分类排序
     * @field p_id                   产品分类的父级Id
     * @field status                 产品分类状态
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function doUpdateCate($param)
    {
        if ($this->isUpdate(true)->save($param) == true){


            $info               = '成功';
            $id                 = 1;
        }else{

            $info               = '失败';
            $id                 = 0;
        }

        $this                   ->writeLog('更新','产品分类 ',$info);
        return $this            ->returnMsg($id);
    }

    /**
     * updateWhereIdAndName [ 列表页  变到列表页  更新， 首页  变到列表页  增加]
     * @author [Boot.Z] [852952656@qq.com]
     * @return false|int
     * @param $param
     * @field name                   产品分类标题
     * @field order                  产品分类排序
     * @field p_id                   产品分类的父级Id
     * @field status                 产品分类状态
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function updateWhereIdAndName($param)
    {

        if ($this->where('id',$param['id'])->find()){   //如果是由列表页  变到列表页  更新

            return  $this->isUpdate(true)->save(['name' => $param['name']],['id' => $param['id']]);
        }else{                                                //如果是由首页  变到列表页  增加

            $this->data([
                        'status'  =>  1,
                        'id'      =>  $param['id'],
                        'name'    =>  $param['name'],
            ]);

            return $this->save();
        }
    }

    /**
     * findTheIdDelete [ 找到并删除 如果没找到就返回 ture ]
     * @author [Boot.Z] [852952656@qq.com]
     * @param $param
     */
    public function findTheIdDelete($param)
    {
        //dump($param);die;
        if($this->where('id',$param['id'])->find()){
            if ( $this->where('id',$param['id'])->delete()){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }

    }


}