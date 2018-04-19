<?php
namespace app\admin\controller;

use app\admin\model\TemplateCateModel;
use app\admin\model\TemplateModel;
use app\admin\model\MenuHomeModel;

class Menuhome extends Base
{
    /**
     * listNav [ 前台菜单列表 ]
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
    public function list_menu()
    {
        $NavModel           = New  MenuHomeModel();
        $cate               = $NavModel -> fetchAllCate();
        $list               = $this->rule($cate);
        $this               ->assign('list',$list);

        return $this->fetch();
    }

    /**
     * insertNav [ 添加前端菜单 ]
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
    public function insert_menu()
    {
        if (request()->isAjax()) {
            $param              = input('param.');

            $CateModel          = New MenuHomeModel();
            $isOk               = $CateModel->insertOneNav($param);

            return json($isOk);
        }else{
            // 加载菜单树
            $NavModel           = New  MenuHomeModel();
            $cate               = $NavModel -> fetchAllCate();
            $list               = $this->rule($cate);
            $this               ->assign('list',$list);

            $CateModel          = New TemplateCateModel();
            $listCate           = $CateModel -> fetchAllCate();
            $this               ->assign('listCate',$listCate);


            return $this->fetch();
        }
    }

    /**
     * findTemplateLink [ 根据传值id 查到link值 ]
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
    public function findTemplateLink()
    {
       $id                  = input('param.id');
       $TemplateModel       = New TemplateModel();

       $list                = $TemplateModel ->findThisIdAllTemplate($id);

        $data               = '';
        foreach ($list as $key => $value){
        $data               .= "<option value='".$value['url']."'>".$value['title']."</option>";
        }
        $arr                = ['html'=> $data];
        return json($arr);
    }

    /**
     * deleteNav [ 删除前端菜单 ]
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
    public function delete_menu()
    {
        $id                     = input('param.id');
        $CateModel              = New MenuHomeModel();
        $isOk                   = $CateModel -> deleteOneNav($id);

        return json($isOk);
    }

    /**
     * [statusNav  [ 更新前端菜单状态 ]
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
    public function status_menu()
    {
        $id                     = input('param.id');
        $CateModel              = New MenuHomeModel();
        $isOk                   = $CateModel -> updateStatusNav($id);

        return json($isOk);
    }

    /**
     * [updateNav  [ 更新前端菜单信息 ]
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
    public function update_menu()
    {
        if (request()->isAjax()) {
            $param                  = input('param.');

            $CateModel              = New MenuHomeModel();
            $isOk                   = $CateModel->doUpdateNav($param);


            return json($isOk);

        }else{
            $id                     = input('param.id');                   // 加载传值ID 查出的值



            $NavModel               = New  MenuHomeModel();                     //当前栏目
            $Nav                    = $NavModel
                                    -> findOneNavUpdate($id);
            //dump($Nav);die;
            $this                   ->assign('Nav',$Nav);

            $cate                   = $NavModel
                                    -> fetchAllCate();                        // 顶级菜单类
            $list                   = $this
                                    ->rule($cate);
            $this                   ->assign('list',$list);

            $CateModel              = New TemplateCateModel();               // 模板类型  -- 模板路径类
            $listCate               = $CateModel
                                    -> fetchAllCate();
            $this                   ->assign('listCate',$listCate);

            return $this            ->fetch();
        }
    }

    /**
     * [insertPage  [ 更新/上传单页信息 ]
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
    public function insert_page()
    {
        $NavModel = New MenuHomeModel();
        if (request()->isAjax()){
            $param              = input('param.');
            $isok               = $NavModel -> insertPage($param);

            return  json($isok);
        }else{
            $id                 = input('param.id');
            $this               ->assign('id',$id);
            $content            = $NavModel -> getOnePageContent($id);
            $this               ->assign('content',$content);

            return $this        ->fetch();
        }
    }


    /**
     * tree [ 无限极分类函数 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array
     * @param $list
     * @param int $pid
     * @param int $level
     * @param string $html
     */

    private function rule($cate , $lefthtml = ' — — ' , $pid=0 , $lvl=0, $leftpin=0 ){
        $arr=array();
        foreach ($cate as $v){
            if($v['p_id']==$pid){
                $v['lvl']=$lvl + 1;
                $v['leftpin']=$leftpin + 0;//左边距
                $v['lefthtml']=str_repeat($lefthtml,$lvl);
                $arr[]=$v;
                $arr= array_merge($arr,self::rule($cate,$lefthtml,$v['id'],$lvl+1 , $leftpin+20));
            }
        }
        return $arr;
    }
}