<?php
namespace app\admin\model;

use think\Model;

class TemplateModel extends BaseModel
{
    protected $name = 'template';                            //设置数据表
    protected $autoWriteTimestamp = true;                   //开启自动写入时间戳


    /**
     * [getAllTemplate  [ 取出所有模板到控制器 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id                模板类型Id
     * @field title                  模板标题
     * @field utl                    模板链接
     * @field status                 模板显示  1：显示  0：不显示
     * @field create_time            模板的添加时间
     * @field update_time            模板的更新时间
     */
    public function getAllTemplate()
    {

       return  $this    ->alias('a')
                        ->join('__TEMPLATE_CATE__ b','a.cate_id = b.id')
                        ->field('a.*,b.name')
                        ->order('a.id desc')
                        ->paginate(10);
    }

    /**
     * insertOneTemplate [ 添加模板页面 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id                模板类型Id
     * @field title                  模板标题
     * @field utl                    模板链接
     * @field status                 模板显示  1：显示  0：不显示
     * @field create_time            模板的添加时间
     * @field update_time            模板的更新时间
     */
    public function insertOneTemplate($param)
    {
        try{
            $param['ip']                =  get_client_ip();
            $isOK                       = $this->allowField(true)->save($param);
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
        $this                           ->writeLog('添加','模板 ',$info);
        return $this                    ->returnMsg($id);
    }

    /**
     * [deleteOneTemplate  [ 根据传值id删除当前模板 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id                模板类型Id
     * @field title                  模板标题
     * @field utl                    模板链接
     * @field status                 模板显示  1：显示  0：不显示
     * @field create_time            模板的添加时间
     * @field update_time            模板的更新时间
     */
    public function deleteOneTemplate($id)
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
        $this                           ->writeLog('删除','模板 ',$info);
        return $this                    ->returnMsg($id);
    }

    /**
     * updateStatusTemplate [ 更新模板状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array
     * @param $id
     * @field cate_id                模板类型Id
     * @field title                  模板标题
     * @field utl                    模板链接
     * @field status                 模板显示  1：显示  0：不显示
     * @field create_time            模板的添加时间
     * @field update_time            模板的更新时间
     */
    public function updateStatusTemplate($id)
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
        $this                           ->writeLog('更新','模板状态 ',$info);
        return $this                    ->returnMsg($id);
    }

    /**
     * fetchOneTemplate [ 查找模板信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id                模板类型Id
     * @field title                  模板标题
     * @field utl                    模板链接
     * @field status                 模板显示  1：显示  0：不显示
     * @field create_time            模板的添加时间
     * @field update_time            模板的更新时间
     */
    public function fetchOneTemplate($id)
    {
        return $this->where('id',$id) -> find();
    }

    /**
     * updateOneTemplate [ 更新模板 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id                模板类型Id
     * @field title                  模板标题
     * @field utl                    模板链接
     * @field status                 模板显示  1：显示  0：不显示
     * @field create_time            模板的添加时间
     * @field update_time            模板的更新时间
     */
    public function updateOneTemplate($param)
    {
        try{
            $param['ip']        =  get_client_ip();
            $id                 = $param['id'];
            $isOK               = $this->allowField(true)->save($param,['id' => $id]);
            if ($isOK == true){

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
        $this                   ->writeLog('更新','模板 ',$info);
        return $this            ->returnMsg($id);

    }


    /**
     * findThisIdAllTemplate [  ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return false|\PDOStatement|string|\think\Collection
     * @param $id
     * @field cate_id                模板类型Id
     * @field title                  模板标题
     * @field utl                    模板链接
     * @field status                 模板显示  1：显示  0：不显示
     * @field create_time            模板的添加时间
     * @field update_time            模板的更新时间
     */
    public function findThisIdAllTemplate ($id)
    {
        return   $this->where('cate_id',$id)->select();
    }

}