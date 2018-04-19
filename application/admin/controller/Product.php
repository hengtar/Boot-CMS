<?php
namespace app\admin\controller;

use app\admin\model\ProductCateModel;
use app\admin\model\ProductModel;


class Product extends Base
{
    //-------------------------------------------------------------------------------//
    //---------------------------------------产品列表---------------------------------//
    //-------------------------------------------------------------------------------//


    /**
     * [listProduct  [ 产品列表 ]
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
    public function list_product()
    {
        $ProductModel               = New ProductModel();
        $list                       = $ProductModel ->getAllProduct();
        $page                       = $list->render();                                     //分页
        $this                       ->assign('list',$list);                           //注册传值
        $this                       ->assign('page',$page);
                                                                     //带入模板
        return $this                ->fetch();
    }

    /**
     * [insertProduct  [ 添加产品 ]
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
    public function insert_product()
    {
        if(request()->isAjax()){
            $param                  = input('param.');
            $param['content']       = $_POST['content'];
            $ProductModel           = New ProductModel();
            $isOk                   = $ProductModel -> insertOneProduct($param);

            return json($isOk);
        }else{

            $CateModel              = New ProductCateModel();
            $lists                  = $CateModel -> fetchAllCate();
            $list                   = tree($lists);
            //dump($list);die;
            $this                   ->assign('list',$list);

            return $this            ->fetch();
        }

    }

    /**
     * [updateProduct  [ 更新产品信息 ]
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
    public function update_product()
    {

        if(request()->isAjax()){
            $param                  = input('param.');
            $param['content']       = $_POST['content'];
            $ProductModel           = New ProductModel();
            $isOk                   = $ProductModel -> updateOneProduct($param);

            return json($isOk);
        }else{
            $id                     = input('param.id');
            $ProductModel           = New ProductModel();
            $Product                = $ProductModel->fetchOneProduct($id);
            $this                   ->assign('Product', $Product);
           // dump($Product);die;
            //类型
            $CateModel              = New ProductCateModel();
            $list                   = $CateModel -> fetchAllCate();
            $this                   ->assign('list',$list);

            return $this            ->fetch();
        }

    }

    /**
     * [deleteProduct  [ 删除产品 ]
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
    public function delete_product()
    {
        $id                     = input('param.id');
        $ProductModel           = New ProductModel();
        $isOk                   = $ProductModel -> deleteOneProduct($id);

        return json($isOk);
    }

    /**
     * [statusProduct  [ 更新产品状态 ]
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
    public function status_product()
    {
        $id                     = input('param.id');
        $ProductModel           = New ProductModel();
        $isOk                   = $ProductModel -> updateStatusProduct($id);

        return json($isOk);

    }

    /**
     * isTui_product [ 更新推荐产品状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return \think\response\Json
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
    public function isTui_product()
    {
        $id                     = input('param.id');
        $ProductModel           = New ProductModel();
        $isOk                   = $ProductModel -> updateIsTuiProduct($id);

        return json($isOk);
    }

    //-------------------------------------------------------------------------------//
    //---------------------------------------产品分类---------------------------------//
    //-------------------------------------------------------------------------------//

    /**
     * [listCate  [ 分类列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   产品分类标题
     * @field order                  产品分类排序
     * @field p_id                   产品分类的父级Id
     * @field status                 产品分类状态
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function list_cate()
    {

        $CateModel              = New ProductCateModel();
        $lists                  = $CateModel -> getAllCate();
        $list                   = tree($lists);
       // dump($list);die;
        $this                   ->assign('list',$list);                          //注册传值


        return $this            ->fetch();
    }

    /**
     * [insertCate  [ 添加分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   产品分类标题
     * @field order                  产品分类排序
     * @field p_id                   产品分类的父级Id
     * @field status                 产品分类状态
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function insert_cate()
    {
        $CateModel              = New ProductCateModel();
        if(request()            ->isAjax()){
            $param              = input('param.');
            $isOk               = $CateModel->insertOneCate($param);
            return json($isOk);
        }else{
            $product_cates      = $CateModel->fetchAllCate();
            $product_cate       = tree($product_cates);
            $this               ->assign('product_cate',$product_cate);
            return $this        ->fetch();
        }
    }

    /**
     * [updateCate  [ 更新分类信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   产品分类标题
     * @field order                  产品分类排序
     * @field p_id                   产品分类的父级Id
     * @field status                 产品分类状态
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function update_cate()
    {

        $id                     = input('param.id');
        $CateModel              = New ProductCateModel();
        if (request()           ->isAjax()){
            $param              = input('param.');
            $isOk               = $CateModel -> doUpdateCate($param);

            return json($isOk);
        }else{

            $cate               = $CateModel -> findOneCateUpdate($id);
            $this               ->assign('cate',$cate);

            return $this        ->fetch();
        }
    }

    /**
     * [deleteCate  [ 删除分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   产品分类标题
     * @field order                  产品分类排序
     * @field p_id                   产品分类的父级Id
     * @field status                 产品分类状态
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function delete_cate()
    {
        $id                 = input('param.id');
        $CateModel          = New ProductCateModel();
        $isOk               = $CateModel -> deleteOneCate($id);

        return json($isOk);
    }

    /**
     * [statusCate  [ 更新分类状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   产品分类标题
     * @field order                  产品分类排序
     * @field p_id                   产品分类的父级Id
     * @field status                 产品分类状态
     * @field create_time            产品分类添加时间
     * @field update_time            产品分类更新时间
     */
    public function status_cate()
    {
        $id                 = input('param.id');
        $CateModel          = New ProductCateModel();
        $isOk               = $CateModel -> updateStatusCate($id);

        return json($isOk);
    }


}