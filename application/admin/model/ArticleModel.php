<?php
namespace app\admin\model;

use think\Model;

class ArticleModel extends BaseModel
{
    protected $name = 'article';                            //设置数据表
    protected $autoWriteTimestamp = true;                   //开启自动写入时间戳


    /**
     * [getAllArticle  [ 取出所有文章到控制器 ]
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
    public function getAllArticle()
    {

       return  $this    ->alias('a')
                        ->join('__ARTICLE_CATE__ b','a.cate_id = b.id')
                        ->field('a.*,b.name')
                        ->order('a.id desc')
                        ->paginate(10);
    }

    /**
     * insertOneArticle [ 添加一片文章 ]
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
    public function insertOneArticle($param)
    {
        try{
            $param['ip']            =  get_client_ip();
            $isOK = $this->allowField(true)->save($param);
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
        $this                       ->writeLog('添加','文章 ',$info);
        return $this                ->returnMsg($id);
    }

    /**
     * [deleteOneArticle  [ 根据传值id删除当前文章 ]
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
    public function deleteOneArticle($id)
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

        $this                           ->writeLog('删除','文章 ',$info);
        return $this                    ->returnMsg($id);
    }

    /**
     * updateStatusArticle [ 更新文章状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return mixed
     * @param $id
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
    public function updateStatusArticle($id)
    {
        try{
            $IsId = $this->where('id',$id)->find();
            if ($IsId['status'] == 1){
                if ($this->update(['status' => 0],['id'=> $id])) {
                    $info                   = '成功';
                    $id                     = 1;
                }else{
                    $info                   = '失败';
                    $id                     = 0;
                }
            }else if ($IsId['status'] == 0){
                if ($this->update(['status' => 1],['id'=> $id])) {
                    $info                   = '成功';
                    $id                     = 1;
                }else{
                    $info                   = '失败';
                    $id                     = 0;
                }
            }
        }catch(PDOException $e){
            $info                           = $e->getMessage();
            $id                             = 0;
        }
        $this                               ->writeLog('更新状态','文章 ',$info);
        return $this                        ->returnMsg($id);
    }

    /**
     * updateIsTuiArticle [ 更新文章推荐状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return mixed
     * @param $id
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
    public function updateIsTuiArticle($id)
    {
        try{
            $IsId                       = $this->where('id',$id)->find();
            if ($IsId['is_tui'] == 1){
                if ($this->update(['is_tui' => 0],['id'=> $id])) {
                    $info               = '成功';
                    $id                 = 1;
                }else{
                    $info               = '失败';
                    $id                 = 0;
                }
            }else if ($IsId['is_tui'] == 0){
                if ($this->update(['is_tui' => 1],['id'=> $id])) {
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
        $this                           ->writeLog('推荐','文章 ',$info);
        return $this                    ->returnMsg($id);

    }


    /**
     * fetchOneArticle [ 查找文章信息 ]
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
    public function fetchOneArticle($id)
    {
        return $this->where('id',$id) -> find();
    }

    /**
     * updateOneArticle [ 更新文章信息 ]
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
    public function updateOneArticle($param,$id)
    {
        try{
            $param['ip'] =  get_client_ip();
            $isOK = $this->allowField(true)->save($param,['id' => $id]);
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
        $this                       ->writeLog('编辑','文章 ',$info);
        return $this                ->returnMsg($id);

    }

}