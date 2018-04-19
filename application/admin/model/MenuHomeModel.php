<?php
namespace app\admin\model;

use think\Db;
use think\Model;
use app\admin\model\ArticleCateModel;
use app\admin\model\TemplateModel;

class MenuHomeModel extends BaseModel
{
    protected $name = 'menu_home';                            //设置数据表
    protected $autoWriteTimestamp = true;                    //开启自动写入时间戳


    /**
     * fetchAllCate [ 查出所有菜单 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              前端菜单标题
     * @field keywords          前端菜单关键词
     * @field description       前端菜单描述
     * @field content           前端菜单单页内容
     * @field status            前端菜单状态
     * @field order             前端菜单排序
     * @field p_id              前端菜单父级Id
     * @field template_cate     前端菜单模板类型
     * @field template_link     前端菜单模板链接
     * @field is_list           前端菜单是否列表模板
     * @field create_time       前端菜单添加时间
     * @field update_time       前端菜单更新时间
     */
    public function fetchAllCate()
    {


        return  $this->alias('a')
                     ->join('__TEMPLATE_CATE__ b' , 'a.template_cate = b.id')
                     ->field('a.*,b.name as cate_name')
                     ->select();
    }

    /**
     * [deleteOneNav  [ 删除当前id的菜单 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              前端菜单标题
     * @field keywords          前端菜单关键词
     * @field description       前端菜单描述
     * @field content           前端菜单单页内容
     * @field status            前端菜单状态
     * @field order             前端菜单排序
     * @field p_id              前端菜单父级Id
     * @field template_cate     前端菜单模板类型
     * @field template_link     前端菜单模板链接
     * @field is_list           前端菜单是否列表模板
     * @field create_time       前端菜单添加时间
     * @field update_time       前端菜单更新时间
     */
    public function deleteOneNav($id)
    {

        Db::startTrans();                                   // 启动事务
        try{
            $param['id'] = $id;
            $ArticleCateModel       =  New ArticleCateModel();
            $aaa =  $ArticleCateModel ->    findTheIdDelete($param);
            $ProductCateModel       =  New ProductCateModel();
            $ProductCateModel ->    findTheIdDelete($param);
            $is_ok = $this->where('id',$id)->delete();
            Db::commit();                                    // 提交事务
        } catch (\Exception $e) {
            Db::rollback();                                  // 回滚事务
            $is_ok = false;
        }
            if ($is_ok){
                $info= '成功';
                $id = 1;
            }else{
                $info= '失败';
                $id = 0;
            }
        $this->writeLog('删除','前台菜单 ',$info);
        return $this->returnMsg($id);


    }

    /**
     * [updateStatusNav  [ 修改菜单状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              前端菜单标题
     * @field keywords          前端菜单关键词
     * @field description       前端菜单描述
     * @field content           前端菜单单页内容
     * @field status            前端菜单状态
     * @field order             前端菜单排序
     * @field p_id              前端菜单父级Id
     * @field template_cate     前端菜单模板类型
     * @field template_link     前端菜单模板链接
     * @field is_list           前端菜单是否列表模板
     * @field create_time       前端菜单添加时间
     * @field update_time       前端菜单更新时间
     */
    public function updateStatusNav($id)
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
        $this                       ->writeLog('更新','前端菜单',$info);
        return $this                ->returnMsg($id);

    }

    /**
     * [insertOneNav  [ 添加一条菜单信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              前端菜单标题
     * @field keywords          前端菜单关键词
     * @field description       前端菜单描述
     * @field content           前端菜单单页内容
     * @field status            前端菜单状态
     * @field order             前端菜单排序
     * @field p_id              前端菜单父级Id
     * @field template_cate     前端菜单模板类型
     * @field template_link     前端菜单模板链接
     * @field is_list           前端菜单是否列表模板
     * @field create_time       前端菜单添加时间
     * @field update_time       前端菜单更新时间
     */
    public function insertOneNav($param)
    {
            Db::startTrans();                                   // 启动事务
            try{
                $this                   ->allowField(true)-> save($param);  //如果开启写入时间戳 必须使用sava添加
                $id = $this             -> getLastInsID();      //获取当前插入ID 存到article_cate 数据库 以便于文章分类ID与 菜单分类ID相同

                if ($param['template_cate'] == 2) {
                    $ArticleCateModel = New ArticleCateModel();
                    $param['id'] = $id;
                    $ArticleCateModel       -> insertOneCate($param);

                    $Is_OK                  = $this->save(
                        ['template_link'    => $param['template_link']. "/page/".$id],
                        ['id' => $id]
                    );
                }else if ($param['template_cate'] == 7){
                    $ArticleCateModel = New ProductCateModel();
                    $param['id'] = $id;
                    $ArticleCateModel       -> insertOneCate($param);

                    $Is_OK                  = $this->save(
                        ['template_link'    => $param['template_link']. "/page/".$id],
                        ['id' => $id]
                    );
                }else{
                    $param['id'] = $id;
                    $Is_OK                  = $this->save(
                        ['template_link'    => $param['template_link']. "/page/".$id],
                        ['id' => $id]
                    );
                }
                Db::commit();                                    // 提交事务
            }catch (\Exception $e) {
                Db::rollback();                                  // 回滚事务
                $Is_OK = false;
            }

            if ($Is_OK){
                $info                   = '成功';
                $id                     = 1;
            }else{
                $info                   = '失败';
                $id                     = 0;
            }
        $this                           ->writeLog('添加','前端菜单 ',$info);
        return $this                    ->returnMsg($id);
    }

    /**
     * findOneNavUpdate [ 查出一条菜单 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              前端菜单标题
     * @field keywords          前端菜单关键词
     * @field description       前端菜单描述
     * @field content           前端菜单单页内容
     * @field status            前端菜单状态
     * @field order             前端菜单排序
     * @field p_id              前端菜单父级Id
     * @field template_cate     前端菜单模板类型
     * @field template_link     前端菜单模板链接
     * @field is_list           前端菜单是否列表模板
     * @field create_time       前端菜单添加时间
     * @field update_time       前端菜单更新时间
     */
    public function findOneNavUpdate($id)
    {
        return  $this   ->where('id',$id)
                        ->field('*')
                        ->find();
            }

    /**
     * doUpdateNav [ 根据传值来的param 条件 进行更新菜单 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              前端菜单标题
     * @field keywords          前端菜单关键词
     * @field description       前端菜单描述
     * @field content           前端菜单单页内容
     * @field status            前端菜单状态
     * @field order             前端菜单排序
     * @field p_id              前端菜单父级Id
     * @field template_cate     前端菜单模板类型
     * @field template_link     前端菜单模板链接
     * @field is_list           前端菜单是否列表模板
     * @field create_time       前端菜单添加时间
     * @field update_time       前端菜单更新时间
     */
    public function doUpdateNav($param)
    {

        $ArticleCateModel       =  New ArticleCateModel();
        if($param['template_cate'] == 0) {  //判断是否选择模板类型 ，如果未选中 执行以下方法

            Db::startTrans();
            try{
                unset($param['template_cate']);
                unset($param['template_link']);                                //去除模板类型 和 模板链接
                $this       ->isUpdate(true)->save($param);                   // 更新菜单
                $is_ok      = $ArticleCateModel ->updateWhereIdAndName($param);     // 更新文章分类
                Db::commit();                                                  // 提交事务
            } catch (\Exception $e) {
                Db::rollback();                                                // 回滚事务
                $is_ok      = false;
            }

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }else {                                                                 // 判断是否选择模板类型 ，如果选中 执行以下方法

            if($param['template_cate'] == 6 or $param['template_cate'] ==1 ){   //判断是否是首页Or外联页
                Db::startTrans();
                try{
                    $this->isUpdate(true)->save($param);                 // 更新菜单
                    $is_ok = $ArticleCateModel ->findTheIdDelete($param);        // 如果更改的菜单是 首页 或者是外链 将删除文章里面当前的ID分类

                    Db::commit();                                                // 提交事务
                } catch (\Exception $e) {

                    Db::rollback();                                              // 回滚事务
                    $is_ok = false;
                }
            }else{
                Db::startTrans();
                try{
                     $this->isUpdate(true)->save($param);                // 更新菜单

                    $id = $ArticleCateModel ->updateWhereIdAndName($param);      // 更新文章分类
                    //dump($id);die;
                    $is_ok = $this           ->save(
                        ['template_link'  => $param['template_link']. "/page/".$param['id']],
                        ['id'             => $param['id']]);                     // 增加后缀

                    Db::commit();                                                // 提交事务
                } catch (\Exception $e) {
                    Db::rollback();                                              // 回滚事务
                    $is_ok = false;
                }
            }
        }
        if ($is_ok){
            $info               = '成功';
            $id                 = 1;
        }else{
            $info               = '失败';
            $id                 = 0;
        }
        $this                   ->writeLog('更新','前端菜单 ',$info);
        return $this            ->returnMsg($id);



    }

    /**
     * [getOnePageContent  [ 查出一条菜单内容 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              前端菜单标题
     * @field keywords          前端菜单关键词
     * @field description       前端菜单描述
     * @field content           前端菜单单页内容
     * @field status            前端菜单状态
     * @field order             前端菜单排序
     * @field p_id              前端菜单父级Id
     * @field template_cate     前端菜单模板类型
     * @field template_link     前端菜单模板链接
     * @field is_list           前端菜单是否列表模板
     * @field create_time       前端菜单添加时间
     * @field update_time       前端菜单更新时间
     */
    public function getOnePageContent($id)
    {
        return $this    ->where('id',$id)
                        ->field('content')
                        ->find();
    }

    /**
     * [insertPage  [ 插入单页内容 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              前端菜单标题
     * @field keywords          前端菜单关键词
     * @field description       前端菜单描述
     * @field content           前端菜单单页内容
     * @field status            前端菜单状态
     * @field order             前端菜单排序
     * @field p_id              前端菜单父级Id
     * @field template_cate     前端菜单模板类型
     * @field template_link     前端菜单模板链接
     * @field is_list           前端菜单是否列表模板
     * @field create_time       前端菜单添加时间
     * @field update_time       前端菜单更新时间
     */
    public function insertPage($param)
    {

            if ($this->update(['id'=> $param['id'],'content'=>$param['content']])){
                $info           = '成功';
                $id             = 1;
            }else{
                $info           = '失败';
                $id             = 0;
            }
        $this                   ->writeLog('更新','单页内容 ',$info);
        return $this            ->returnMsg($id);



    }

}