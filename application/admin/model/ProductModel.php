<?php
namespace app\admin\model;

use think\Model;

class ProductModel extends BaseModel
{
    protected $name = 'product';                            //设置数据表
    protected $autoWriteTimestamp = true;                   //开启自动写入时间戳


    /**
     * [getAllProduct  [ 取出所有文章到控制器 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id                   产品分类Id
     * @field title                  产品标题
     * @field content                产品详情
     * @field photo                  产品主图
     * @field views                  产品浏览量
     * @field photo                  产品主图
     * @field keywords               产品关键词
     * @field description            产品描述
     * @field is_tui                 产品推荐  推荐：1   不推荐： 0
     * @field status                 产品状态  显示：1   不显示： 0
     * @field ip                     产品发布时的ip地址
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function getAllProduct()
    {

       return  $this    ->alias('a')
                        ->join('__PRODUCT_CATE__ b','a.cate_id = b.id')
                        ->field('a.*,b.name')
                        ->order('a.id desc')
                        ->paginate(10);
    }

    /**
     * insertOneProduct [ 添加一片文章 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id                   产品分类Id
     * @field title                  产品标题
     * @field content                产品详情
     * @field photo                  产品主图
     * @field views                  产品浏览量
     * @field photo                  产品主图
     * @field keywords               产品关键词
     * @field description            产品描述
     * @field is_tui                 产品推荐  推荐：1   不推荐： 0
     * @field status                 产品状态  显示：1   不显示： 0
     * @field ip                     产品发布时的ip地址
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function insertOneProduct($param)
    {
        try{
            $param['ip']    =  get_client_ip();
            $isOK           = $this->allowField(true)->save($param);
            if ($isOK == true){
                $info       = '成功';
                $id         = 1;
            }else{
                $info       = '失败';
                $id         = 0;
            }
        }catch( PDOException $e){
            $info           = $e->getMessage();
            $id             = 0;
        }
        $this               ->writeLog('添加','产品',$info);
        return $this        ->returnMsg($id);
    }

    /**
     * [deleteOneProduct  [ 根据传值id删除当前文章 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id                   产品分类Id
     * @field title                  产品标题
     * @field content                产品详情
     * @field photo                  产品主图
     * @field views                  产品浏览量
     * @field photo                  产品主图
     * @field keywords               产品关键词
     * @field description            产品描述
     * @field is_tui                 产品推荐  推荐：1   不推荐： 0
     * @field status                 产品状态  显示：1   不显示： 0
     * @field ip                     产品发布时的ip地址
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function deleteOneProduct($id)
    {
        try{
            if ($this->where('id',$id)->delete()){
                $info           = '成功';
                $id             = 1;
            }else{
                $info           = '失败';
                $id             = 0;
            }
        }catch(PDOException $e){
            $info               = $e->getMessage();
            $id                 = 0;
        }
        $this                   ->writeLog('删除','产品 ',$info);
        return $this            ->returnMsg($id);
    }

    /**
     * updateStatusProduct [ 更新产品状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array
     * @param $id
     * @field cate_id                产品分类Id
     * @field title                  产品标题
     * @field content                产品详情
     * @field photo                  产品主图
     * @field views                  产品浏览量
     * @field photo                  产品主图
     * @field keywords               产品关键词
     * @field description            产品描述
     * @field is_tui                 产品推荐  推荐：1   不推荐： 0
     * @field status                 产品状态  显示：1   不显示： 0
     * @field ip                     产品发布时的ip地址
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function updateStatusProduct($id)
    {
        try{
            $IsId                   = $this->where('id',$id)->find();
            if ($IsId['status'] == 1){
                if ($this->update(['status' => 0],['id'=> $id])) {
                    $info           = '成功';
                    $id             = 1;
                }else{
                    $info           = '失败';
                    $id             = 0;
                }
            }else if ($IsId['status'] == 0){
                if ($this->update(['status' => 1],['id'=> $id])) {
                    $info           = '成功';
                    $id             = 1;
                }else{
                    $info           = '失败';
                    $id             = 0;
                }
            }
        }catch(PDOException $e){
            $info                   = $e->getMessage();
            $id                     = 0;
        }
        $this                       ->writeLog('更新','产品状态 ',$info);
        return $this                ->returnMsg($id);


    }

    /**
     * updateIsTuiProduct [ 更新产品推荐 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array
     * @param $id
     * @field cate_id                   产品分类Id
     * @field title                  产品标题
     * @field content                产品详情
     * @field photo                  产品主图
     * @field views                  产品浏览量
     * @field photo                  产品主图
     * @field keywords               产品关键词
     * @field description            产品描述
     * @field is_tui                 产品推荐  推荐：1   不推荐： 0
     * @field status                 产品状态  显示：1   不显示： 0
     * @field ip                     产品发布时的ip地址
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function updateIsTuiProduct($id)
    {
        try{
            $IsId                   = $this->where('id',$id)->find();
            if ($IsId['is_tui'] == 1){
                if ($this->update(['is_tui' => 0],['id'=> $id])) {
                    $info           = '成功';
                    $id             = 1;
                }else{
                    $info           = '失败';
                    $id             = 0;
                }
            }else if ($IsId['is_tui'] == 0){
                if ($this->update(['is_tui' => 1],['id'=> $id])) {
                    $info           = '成功';
                    $id             = 1;
                }else{
                    $info           = '失败';
                    $id             = 0;
                }
            }
        }catch(PDOException $e){
            $info                   = $e->getMessage();
            $id                     = 0;
        }
        $this                       ->writeLog('更新','产品推荐状态 ',$info);
        return $this                ->returnMsg($id);

    }


    /**
     * fetchOneProduct [ 查找文章信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id                   产品分类Id
     * @field title                  产品标题
     * @field content                产品详情
     * @field photo                  产品主图
     * @field views                  产品浏览量
     * @field photo                  产品主图
     * @field keywords               产品关键词
     * @field description            产品描述
     * @field is_tui                 产品推荐  推荐：1   不推荐： 0
     * @field status                 产品状态  显示：1   不显示： 0
     * @field ip                     产品发布时的ip地址
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function fetchOneProduct($id)
    {
        return $this->where('id',$id) -> find();
    }

    /**
     * updateOneProduct [ 更新文章信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id                   产品分类Id
     * @field title                  产品标题
     * @field content                产品详情
     * @field photo                  产品主图
     * @field views                  产品浏览量
     * @field photo                  产品主图
     * @field keywords               产品关键词
     * @field description            产品描述
     * @field is_tui                 产品推荐  推荐：1   不推荐： 0
     * @field status                 产品状态  显示：1   不显示： 0
     * @field ip                     产品发布时的ip地址
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function updateOneProduct($param)
    {
        try{
            $param['ip']            =  get_client_ip();
            $id                     = $param['id'];
            $isOK                   = $this->allowField(true)->save($param,['id' => $id]);
            if ($isOK == true){

                $info               = '成功';
                $id                 = 1;
            }else{

                $info               = '失败';
                $id                 = 0;
            }
        }catch( PDOException $e){

            $info                   = $e->getMessage();
            $id                     = 0;
        }
        $this                       ->writeLog('更新','产品 ',$info);
        return $this                ->returnMsg($id);

    }

}