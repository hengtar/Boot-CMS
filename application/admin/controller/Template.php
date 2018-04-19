<?php
namespace app\admin\controller;

use app\admin\model\TemplateCateModel;
use app\admin\model\TemplateModel;


class Template extends Base
{
    //-------------------------------------------------------------------------------//
    //---------------------------------------模板列表---------------------------------//
    //-------------------------------------------------------------------------------//


    /**
     * [listTemplate  [ 模板列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id                模板类型Id
     * @field title                  模板标题
     * @field utl                    模板链接
     * @field status                 模板显示  1：显示  0：不显示
     * @field create_time            模板的添加时间
     * @field update_time            模板的更新时间
     */
    public function list_template()
    {
        $TemplateModel                  = New TemplateModel();
        $list                           = $TemplateModel ->getAllTemplate();
        $page                           = $list->render();                                     //分页
        $this                           ->assign('list',$list);                           //注册传值
        $this                           ->assign('page',$page);
                                                                     //带入模板
        return $this                    ->fetch();
    }

    /**
     * [insertTemplate  [ 添加模板 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id                模板类型Id
     * @field title                  模板标题
     * @field utl                    模板链接
     * @field status                 模板显示  1：显示  0：不显示
     * @field create_time            模板的添加时间
     * @field update_time            模板的更新时间
     */
    public function insert_template()
    {
        if(request()->isAjax()){
            $param                      = input('param.');
            $TemplateModel              = New TemplateModel();
            $isOk                       = $TemplateModel -> insertOneTemplate($param);

            return json($isOk);
        }else{

            $CateModel                  = New TemplateCateModel();
            $list                       = $CateModel -> fetchAllCate();
            $this                       ->assign('list',$list);

            return $this                ->fetch();
        }

    }

    /**
     * [updateTemplate  [ 更新模板信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id                模板类型Id
     * @field title                  模板标题
     * @field utl                    模板链接
     * @field status                 模板显示  1：显示  0：不显示
     * @field create_time            模板的添加时间
     * @field update_time            模板的更新时间
     */
    public function update_template()
    {

        if(request()->isAjax()){
            $param                      = input('param.');
            $TemplateModel              = New TemplateModel();
            $isOk                       = $TemplateModel -> updateOneTemplate($param);

            return json($isOk);
        }else{
            $id                         = input('param.id');
            $TemplateModel              = New TemplateModel();
            $Template                   = $TemplateModel->fetchOneTemplate($id);
            $this                       ->assign('Template', $Template);
            //类型
            $CateModel                  = New TemplateCateModel();
            $list                       = $CateModel -> fetchAllCate();
            $this                       ->assign('list',$list);

            return $this                ->fetch();
        }

    }

    /**
     * [deleteTemplate  [ 删除模板 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id                模板类型Id
     * @field title                  模板标题
     * @field utl                    模板链接
     * @field status                 模板显示  1：显示  0：不显示
     * @field create_time            模板的添加时间
     * @field update_time            模板的更新时间
     */
    public function delete_template()
    {
        $id                     = input('param.id');
        $TemplateModel          = New TemplateModel();
        $isOk                   = $TemplateModel -> deleteOneTemplate($id);

        return json($isOk);
    }

    /**
     * [statusTemplate  [ 更新模板状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id                模板类型Id
     * @field title                  模板标题
     * @field utl                    模板链接
     * @field status                 模板显示  1：显示  0：不显示
     * @field create_time            模板的添加时间
     * @field update_time            模板的更新时间
     */
    public function status_template()
    {
        $id                     = input('param.id');
        $TemplateModel          = New TemplateModel();
        $isOk                   = $TemplateModel -> updateStatusTemplate($id);

        return json($isOk);

    }



    //-------------------------------------------------------------------------------//
    //---------------------------------------模板类型---------------------------------//
    //-------------------------------------------------------------------------------//

    /**
     * [listCate  [ 模板类型列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   模板类型标题
     * @field status                 模板类型状态 显示：1  不显示：0
     * @field order                  模板类型后台排序
     * @field create_time            模板类型的添加时间
     * @field update_time            模板类型的更新时间
     */
    public function list_cate()
    {

        $CateModel                  = New TemplateCateModel();
        $list                       = $CateModel -> getAllCate();
        $page                       = $list -> render();                                  //分页
        $this                       ->assign('list',$list);                          //注册传值
        $this                       ->assign('page',$page);

        return $this                ->fetch();
    }

    /**
     * [insertCate  [ 增加模板类型 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   模板类型标题
     * @field status                 模板类型状态 显示：1  不显示：0
     * @field order                  模板类型后台排序
     * @field create_time            模板类型的添加时间
     * @field update_time            模板类型的更新时间
     */
    public function insert_cate()
    {
        if(request()->isAjax()){
            $param                  = input('param.');
            $CateModel              = New TemplateCateModel();
            $isOk                   = $CateModel->insertOneCate($param);

            return json($isOk);
        }else{

            return $this            ->fetch();
        }
    }

    /**
     * [updateCate  [ 更新模板类型信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   模板类型标题
     * @field status                 模板类型状态 显示：1  不显示：0
     * @field order                  模板类型后台排序
     * @field create_time            模板类型的添加时间
     * @field update_time            模板类型的更新时间
     */
    public function update_cate()
    {

        $id                         = input('param.id');
        $CateModel                  = New TemplateCateModel();
        if (request()->isAjax()){
            $param                  = input('param.');
            $isOk                   = $CateModel -> doUpdateCate($param);

            return json($isOk);
        }else{

            $cate                   = $CateModel -> findOneCateUpdate($id);
            $this                   ->assign('cate',$cate);

            return $this            ->fetch();
        }
    }

    /**
     * [deleteCate  [ 删除模板类型 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   模板类型标题
     * @field status                 模板类型状态 显示：1  不显示：0
     * @field order                  模板类型后台排序
     * @field create_time            模板类型的添加时间
     * @field update_time            模板类型的更新时间
     */
    public function delete_cate()
    {
        $id                     = input('param.id');
        $CateModel              = New TemplateCateModel();
        $isOk                   = $CateModel -> deleteOneCate($id);

        return json($isOk);
    }

    /**
     * [statusCate  [ 更新模板类型状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name                   模板类型标题
     * @field status                 模板类型状态 显示：1  不显示：0
     * @field order                  模板类型后台排序
     * @field create_time            模板类型的添加时间
     * @field update_time            模板类型的更新时间
     */
    public function status_cate()
    {
        $id                     = input('param.id');
        $CateModel              = New TemplateCateModel();
        $isOk                   = $CateModel -> updateStatusCate($id);

        return json($isOk);
    }
}