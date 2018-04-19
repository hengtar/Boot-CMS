<?php
namespace app\admin\controller;

use app\admin\model\ArticleCateModel;
use app\admin\model\ArticleModel;


class Article extends Base
{
    //-------------------------------------------------------------------------------//
    //---------------------------------------文章列表---------------------------------//
    //-------------------------------------------------------------------------------//


    /**
     * [listArticle  [ 文章列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id         文章分类id
     * @field title           文章标题
     * @field content         文章内容
     * @field author          文章作者
     * @field photo           文章图片链接
     * @field views           文章阅读量
     * @field keywords        文章关键词
     * @field description     文章描述
     * @field is_tui          文章是否推荐       1：推荐  0：不推荐
     * @field status          文章状态           1：显示  0：不显示
     * @field ip              文章发布Ip
     * @field create_time     文章添加时间
     * @field update_time     文章更新时间
     */
    public function list_article()
    {
        $ArticleModel       = New ArticleModel();
        $list               = $ArticleModel ->getAllArticle();
        $page               = $list->render();                                     //分页
        $this               ->assign('list',$list);                         //注册传值
        $this               ->assign('page',$page);                         //带入模板
        return $this        ->fetch();
    }

    /**
     * [insertArticle  [ 添加文章 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id         文章分类id
     * @field title           文章标题
     * @field content         文章内容
     * @field author          文章作者
     * @field photo           文章图片链接
     * @field views           文章阅读量
     * @field keywords        文章关键词
     * @field description     文章描述
     * @field is_tui          文章是否推荐       1：推荐  0：不推荐
     * @field status          文章状态           1：显示  0：不显示
     * @field ip              文章发布Ip
     * @field create_time     文章添加时间
     * @field update_time     文章更新时间
     */
    public function insert_article()
    {
        if(request()->isAjax()){
            $param              = input('param.');
            $param['content']   = $_POST['content'];
            $ArticleModel       = New ArticleModel();
            $isOk               = $ArticleModel -> insertOneArticle($param);

            return json($isOk);
        }else{

            $CateModel          = New ArticleCateModel();
            $list               = $CateModel -> fetchAllCate();
            $this               ->assign('list',$list);

            return $this        ->fetch();
        }

    }

    /**
     * [updateArticle  [ 更新文章 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id         文章分类id
     * @field title           文章标题
     * @field content         文章内容
     * @field author          文章作者
     * @field photo           文章图片链接
     * @field views           文章阅读量
     * @field keywords        文章关键词
     * @field description     文章描述
     * @field is_tui          文章是否推荐       1：推荐  0：不推荐
     * @field status          文章状态           1：显示  0：不显示
     * @field ip              文章发布Ip
     * @field create_time     文章添加时间
     * @field update_time     文章更新时间
     */
    public function update_article()
    {

        if(request()->isAjax()){
            $param              = input('param.');
            $param['content']   = $_POST['content'];
            $ArticleModel       = New ArticleModel();
            $id                 = $param['id'];
            $isOk               = $ArticleModel -> updateOneArticle($param,$id);

            return json($isOk);
        }else{
            $id                 = input('param.id');
            $ArticleModel       = New ArticleModel();
            $article            = $ArticleModel->fetchOneArticle($id);
            $this               ->assign('article', $article);
            //类型
            $CateModel          = New ArticleCateModel();
            $list               = $CateModel -> fetchAllCate();
            $this               ->assign('list',$list);

            return $this->fetch();
        }

    }

    /**
     * [deleteArticle  [ 删除文章 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id         文章分类id
     * @field title           文章标题
     * @field content         文章内容
     * @field author          文章作者
     * @field photo           文章图片链接
     * @field views           文章阅读量
     * @field keywords        文章关键词
     * @field description     文章描述
     * @field is_tui          文章是否推荐       1：推荐  0：不推荐
     * @field status          文章状态           1：显示  0：不显示
     * @field ip              文章发布Ip
     * @field create_time     文章添加时间
     * @field update_time     文章更新时间
     */
    public function delete_article()
    {
        $id                  = input('param.id');
        $ArticleModel        = New ArticleModel();
        $isOk                = $ArticleModel -> deleteOneArticle($id);

        return json($isOk);
    }

    /**
     * [statusArticle  [ 更新文章状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id         文章分类id
     * @field title           文章标题
     * @field content         文章内容
     * @field author          文章作者
     * @field photo           文章图片链接
     * @field views           文章阅读量
     * @field keywords        文章关键词
     * @field description     文章描述
     * @field is_tui          文章是否推荐       1：推荐  0：不推荐
     * @field status          文章状态           1：显示  0：不显示
     * @field ip              文章发布Ip
     * @field create_time     文章添加时间
     * @field update_time     文章更新时间
     */
    public function status_article()
    {
        $id                     = input('param.id');
        $ArticleModel           = New ArticleModel();
        $isOk                   = $ArticleModel -> updateStatusArticle($id);

        return json($isOk);

    }

    /**
     * isTui_article [ 更新是否推荐文章 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return \think\response\Json
     * @field cate_id         文章分类id
     * @field title           文章标题
     * @field content         文章内容
     * @field author          文章作者
     * @field photo           文章图片链接
     * @field views           文章阅读量
     * @field keywords        文章关键词
     * @field description     文章描述
     * @field is_tui          文章是否推荐       1：推荐  0：不推荐
     * @field status          文章状态           1：显示  0：不显示
     * @field ip              文章发布Ip
     * @field create_time     文章添加时间
     * @field update_time     文章更新时间
     */
    public function isTui_article()
    {
        $id                 = input('param.id');
        $ArticleModel       = New ArticleModel();
        $isOk               = $ArticleModel -> updateIsTuiArticle($id);

        return json($isOk);
    }

    //-------------------------------------------------------------------------------//
    //---------------------------------------文章分类---------------------------------//
    //-------------------------------------------------------------------------------//

    /**
     * [listCate  [ 文章分类列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return \think\response\Json
     * @field name            文章分类标题
     * @field status          文章分类状态           1：显示  0：不显示
     * @field order           文章分类后台排序
     * @field create_time     文章分类添加时间
     * @field update_time     文章分类更新时间
     * @field p_id            父级分类Id
     */
    public function list_cate()
    {

        $CateModel              = New ArticleCateModel();
        $lists                  = $CateModel -> getAllCate();
        $list                   = tree($lists);
        $this                   ->assign('list',$list);                          //注册传值


        return $this->fetch();
    }

    /**
     * [insertCate  [ 插入文章分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return \think\response\Json
     * @field name            文章分类标题
     * @field status          文章分类状态           1：显示  0：不显示
     * @field order           文章分类后台排序
     * @field create_time     文章分类添加时间
     * @field update_time     文章分类更新时间
     * @field p_id            父级分类Id
     */
    public function insert_cate()
    {
        if(request()->isAjax()){
            $param              = input('param.');
            $CateModel          = New ArticleCateModel();
            $isOk               = $CateModel->insertOneCate($param);

            return json($isOk);
        }else{

            return $this->fetch();
        }
    }

    /**
     * [updateCate  [ 编辑文章分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return \think\response\Json
     * @field name            文章分类标题
     * @field status          文章分类状态           1：显示  0：不显示
     * @field order           文章分类后台排序
     * @field create_time     文章分类添加时间
     * @field update_time     文章分类更新时间
     * @field p_id            父级分类Id
     */
    public function update_cate()
    {

        $id                     = input('param.id');
        $CateModel              = New ArticleCateModel();
        if (request()->isAjax()){
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
     * [deleteCate  [ 删除文章分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return \think\response\Json
     * @field name            文章分类标题
     * @field status          文章分类状态           1：显示  0：不显示
     * @field order           文章分类后台排序
     * @field create_time     文章分类添加时间
     * @field update_time     文章分类更新时间
     * @field p_id            父级分类Id
     */
    public function delete_cate()
    {
        $id             = input('param.id');
        $CateModel      = New ArticleCateModel();
        $isOk           = $CateModel -> deleteOneCate($id);

        return json($isOk);
    }

    /**
     * [statusCate  [ 更新分类状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return \think\response\Json
     * @field name            文章分类标题
     * @field status          文章分类状态           1：显示  0：不显示
     * @field order           文章分类后台排序
     * @field create_time     文章分类添加时间
     * @field update_time     文章分类更新时间
     * @field p_id            父级分类Id
     */
    public function status_cate()
    {
        $id                 = input('param.id');
        $CateModel          = New ArticleCateModel();
        $isOk               = $CateModel -> updateStatusCate($id);

        return json($isOk);
    }

}