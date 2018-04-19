<?php
namespace app\index\model;

use think\Model;
use think\Db;
class Article extends Model
{

    protected $name = 'article';                     //设置数据表

    /**
     * [getNewsArticle  [ 取出程序咨询文章 ]
     * @author [Boot.Z] [852952656@qq.com]
     */
    public function getInsIdArticle($id)
    {
        return   $this  ->field('*')
                        ->where('cate_id',$id)
                        ->limit(6)
                        ->paginate(6);
    }

    /**
     * WhereIdFindTheArticleInfo [ 根据当前ID查询文章信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @param $id
     */
    public function WhereIdFindTheArticleInfo($id)
    {
        return $this->where('id',$id)->find();
    }

}