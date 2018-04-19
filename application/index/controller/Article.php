<?php

namespace app\index\controller;

use app\index\model\MenuHome;
use think\Controller;
class Article extends Base
{
    public function lists()
    {
        $id = input('param.page');
        $MenuHomeModel = New MenuHome();
        $SeoConfig = $MenuHomeModel -> getAllMenuSeoConfig($id);
        $this->assign('SeoConfig',$SeoConfig);
        //查出当前ID所有文章
        $ArticleModel = New \app\index\model\Article();
        $list = $ArticleModel ->getInsIdArticle($id);

        $this->assign('list',$list);
        $page = $list -> render();
        $this->assign('page',$page);
        return $this->fetch();
    }

    /**
     * index [ 详情页 ]
     * @author [Boot.Z] [852952656@qq.com]
     */
    public function index()
    {
        $id = input('param.page');
        $ArticleModel = New \app\index\model\Article();
        $article = $ArticleModel -> WhereIdFindTheArticleInfo($id);
        $this->assign('article',$article);
        return $this->fetch();
    }
}