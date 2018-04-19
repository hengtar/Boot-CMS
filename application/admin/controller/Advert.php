<?php

namespace app\admin\controller;

use app\admin\model\AdvertCateModel;
use app\admin\model\AdvertModel;



class Advert extends Base
{
    //-------------------------------------------------------------------------------//
    //---------------------------------------广告列表---------------------------------//
    //-------------------------------------------------------------------------------//


    /**
     * [listAdvert  [ 广告列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id      广告组分类id
     * @field title        广告标题
     * @field photo        广告图片链接
     * @field url          广告链接地址
     * @field status       广告状态
     * @field create_time  广告添加时间
     * @field update_time  广告更新时间
     */
    public function list_advert()
    {
        $AdvertModel     = New AdvertModel();
        $list            = $AdvertModel->getAllAdvert();
        $page            = $list->render();                                          //分页
        $this            ->assign('list', $list);                                //注册传值
        $this            ->assign('page', $page);

        return $this->fetch();
    }

    /**
     * [insertAdvert  [ 添加广告 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id      广告组分类id
     * @field title        广告标题
     * @field photo        广告图片链接
     * @field url          广告链接地址
     * @field status       广告状态
     * @field create_time  广告添加时间
     * @field update_time  广告更新时间
     */
    public function insert_advert()
    {
        if (request()->isAjax()) {
            $param       = input('param.');
            $AdvertModel = New AdvertModel();
            $isOk        = $AdvertModel->insertOneAdvert($param);

            return json($isOk);
        } else {
            $CateModel   = New AdvertCateModel();
            $list        = $CateModel->fetchAllCate();
            $this        ->assign('list', $list);

            return $this ->fetch();
        }

    }

    /**
     * [updateAdvert  [ 更新广告 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id      广告组分类id
     * @field title        广告标题
     * @field photo        广告图片链接
     * @field url          广告链接地址
     * @field status       广告状态
     * @field create_time  广告添加时间
     * @field update_time  广告更新时间
     */
    public function update_advert()
    {
        if (request()->isAjax()) {
            $param          = input('param.');
            $id             = input('param.id');
            $AdvertModel    = New AdvertModel();
            $isOk           = $AdvertModel->updateOneAdvert($param, $id);

            return json($isOk);
        } else {

            $id             = input('param.id');
            $AdvertModel    = New AdvertModel();
            $advert         = $AdvertModel->fetchOneAdvert($id);
            $this           ->assign('advert', $advert);
            //广告类型
            $CateModel      = New AdvertCateModel();
            $list           = $CateModel->fetchAllCate();
            $this           ->assign('list', $list);

            return $this    ->fetch();
        }
    }

    /**
     * [deleteAdvert  [ 删除广告 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id      广告组分类id
     * @field title        广告标题
     * @field photo        广告图片链接
     * @field url          广告链接地址
     * @field status       广告状态
     * @field create_time  广告添加时间
     * @field update_time  广告更新时间
     */
    public function delete_advert()
    {
        $id             = input('param.id');
        $AdvertModel    = New AdvertModel();
        $isOk           = $AdvertModel->deleteOneAdvert($id);

        return json($isOk);
    }

    /**
     * [statusAdvert  [ 广告状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id      广告组分类id
     * @field title        广告标题
     * @field photo        广告图片链接
     * @field url          广告链接地址
     * @field status       广告状态
     * @field create_time  广告添加时间
     * @field update_time  广告更新时间
     */
    public function status_advert()
    {
        $id             = input('param.id');
        $AdvertModel    = New AdvertModel();
        $isOk           = $AdvertModel->updateStatusAdvert($id);

        return json($isOk);

    }



    //-------------------------------------------------------------------------------//
    //---------------------------------------广告分类---------------------------------//
    //-------------------------------------------------------------------------------//

    /**
     * [listCate  [ 广告分类列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name         广告组标题
     * @field order        广告分类排序
     * @field status       广告分类状态
     * @field create_time  广告分类添加时间
     * @field update_time  广告分类更新时间
     */
    public function list_cate()
    {
        $CateModel          = New AdvertCateModel();
        $list               = $CateModel->getAllCate();
        $page               = $list->render();                                              //分页
        $this               ->assign('list', $list);                                 //注册传值
        $this               ->assign('page', $page);

        return $this->fetch();
    }

    /**
     * [insertCate  [ 添加广告分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name         广告组标题
     * @field order        广告分类排序
     * @field status       广告分类状态
     * @field create_time  广告分类添加时间
     * @field update_time  广告分类更新时间
     */
    public function insert_cate()
    {
        if (request()->isAjax()) {
            $param          = input('param.');
            $CateModel      = New AdvertCateModel();
            $isOk           = $CateModel->insertOneCate($param);

            return json($isOk);
        } else {

            return $this    ->fetch();
        }
    }

    /**
     * [updateCate  [ 编辑广告分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name         广告组标题
     * @field order        广告分类排序
     * @field status       广告分类状态
     * @field create_time  广告分类添加时间
     * @field update_time  广告分类更新时间
     */
    public function update_cate()
    {

        $id             = input('param.id');
        $CateModel      = New AdvertCateModel();
        if (request()->isAjax()) {
            $param      = input('param.');
            $isOk       = $CateModel->doUpdateCate($param);

            return json($isOk);
        } else {
            $cate       = $CateModel->findOneCateUpdate($id);
            $this       ->assign('cate', $cate);

            return $this->fetch();
        }
    }

    /**
     * [deleteCate  [ 删除广告分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name         广告组标题
     * @field order        广告分类排序
     * @field status       广告分类状态
     * @field create_time  广告分类添加时间
     * @field update_time  广告分类更新时间
     */
    public function delete_cate()
    {
        $id             = input('param.id');
        $CateModel      = New AdvertCateModel();
        $isOk           = $CateModel->deleteOneCate($id);

        return json($isOk);
    }

    /**
     * [statusCate  [ 更新分类状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name         广告组标题
     * @field order        广告分类排序
     * @field status       广告分类状态
     * @field create_time  广告分类添加时间
     * @field update_time  广告分类更新时间
     */
    public function status_cate()
    {
        $id             = input('param.id');
        $CateModel      = New AdvertCateModel();
        $isOk           = $CateModel->updateStatusCate($id);

        return json($isOk);
    }
}