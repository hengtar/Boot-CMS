<?php
namespace app\admin\controller;

use app\admin\model\MemberCateModel;
use app\admin\model\MemberModel;


class Member extends Base
{
    //-------------------------------------------------------------------------------//
    //---------------------------------------会员列表---------------------------------//
    //-------------------------------------------------------------------------------//


    /**
     * [listMember  [ 会员列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id           会员类型Id
     * @field account           会员账号
     * @field password          会员密码（使用Comment 重的 getPass 方法加密）
     * @field nickname          会员昵称
     * @field photo             会员头像
     * @field login_num         会员登录次数
     * @field status            会员状态  显示 ：1   不显示 ：0
     * @field reg_ip            会员注册ip
     * @field create_time       会员添加时间
     * @field update_time       会员更新时间
     */
    public function list_member()
    {

        $MemberModel            = New MemberModel();
        $list                   = $MemberModel ->getAllMember();
        $page                   = $list->render();                         //分页
        $this                   ->assign('list',$list);               //注册传值
        $this                   ->assign('page',$page);

        return $this->fetch();
    }

    /**
     * [insertMember  [ 添加会员 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id           会员类型Id
     * @field account           会员账号
     * @field password          会员密码（使用Comment 重的 getPass 方法加密）
     * @field nickname          会员昵称
     * @field photo             会员头像
     * @field login_num         会员登录次数
     * @field status            会员状态  显示 ：1   不显示 ：0
     * @field reg_ip            会员注册ip
     * @field create_time       会员添加时间
     * @field update_time       会员更新时间
     */
    public function insert_member()
    {
        if(request()->isAjax()){
            $param              = input('param.');
            $MemberModel        = New MemberModel();
            $isOk               = $MemberModel -> insertOneMember($param);

            return json($isOk);
        }else{
            $CateModel          = New MemberCateModel();
            $list               = $CateModel -> fetchAllCate();
            $this               ->assign('list',$list);

            return $this        ->fetch();
        }
    }

    /**
     * [deleteMember  [ 删除会员 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id           会员类型Id
     * @field account           会员账号
     * @field password          会员密码（使用Comment 重的 getPass 方法加密）
     * @field nickname          会员昵称
     * @field photo             会员头像
     * @field login_num         会员登录次数
     * @field status            会员状态  显示 ：1   不显示 ：0
     * @field reg_ip            会员注册ip
     * @field create_time       会员添加时间
     * @field update_time       会员更新时间
     */
    public function delete_member()
    {
        $id                     = input('param.id');
        $MemberModel            = New MemberModel();
        $isOk                   = $MemberModel -> deleteOneMember($id);

        return json($isOk);
    }

    /**
     * [statusMember  [ 更新会员状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id           会员类型Id
     * @field account           会员账号
     * @field password          会员密码（使用Comment 重的 getPass 方法加密）
     * @field nickname          会员昵称
     * @field photo             会员头像
     * @field login_num         会员登录次数
     * @field status            会员状态  显示 ：1   不显示 ：0
     * @field reg_ip            会员注册ip
     * @field create_time       会员添加时间
     * @field update_time       会员更新时间
     */
    public function status_member()
    {
        $id                     = input('param.id');
        $MemberModel            = New MemberModel();
        $isOk                   = $MemberModel -> updateStatusMember($id);

        return json($isOk);
    }

    /**
     * update_member [ 更新会员信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field cate_id           会员类型Id
     * @field account           会员账号
     * @field password          会员密码（使用Comment 重的 getPass 方法加密）
     * @field nickname          会员昵称
     * @field photo             会员头像
     * @field login_num         会员登录次数
     * @field status            会员状态  显示 ：1   不显示 ：0
     * @field reg_ip            会员注册ip
     * @field create_time       会员添加时间
     * @field update_time       会员更新时间
     */
    public function update_member()
    {
        if(request()->isAjax()){
            $param          = input('param.');
            $id             = input('param.id');
            //dump($param);die;
            $MemberModel    = New MemberModel();
            $isOk           = $MemberModel -> updateOneMember($param,$id);

            return json($isOk);
        }else{
            $id             = input('param.id');
            $MemberModel    = New MemberModel();
            $member         = $MemberModel -> fetchOneMember($id);
            $this           ->assign('member',$member);

            //会员类型
            $CateModel      = New MemberCateModel();
            $list           = $CateModel -> fetchAllCate();
            $lists          = $list;
            $this           ->assign('list',$list);
            $this           ->assign('lists',$lists);
            //dump($member);die;

            return $this    ->fetch();
        }
    }



    //-------------------------------------------------------------------------------//
    //---------------------------------------会员类型---------------------------------//
    //-------------------------------------------------------------------------------//

    /**
     * [listCate  [ 分类列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name            会员类型名称
     * @field status          会员类型状态           1：显示  0：不显示
     * @field order           会员类型后台排序
     * @field create_time     会员类型添加时间
     * @field update_time     会员类型更新时间
     */
    public function list_cate()
    {
        $CateModel           = New MemberCateModel();
        $list                = $CateModel -> getAllCate();
        $page                = $list -> render();
        $this                ->assign('list',$list);
        $this                ->assign('page',$page);

        return $this->fetch();
    }

    /**
     * [insertCate  [ 添加分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name            会员类型名称
     * @field status          会员类型状态           1：显示  0：不显示
     * @field order           会员类型后台排序
     * @field create_time     会员类型添加时间
     * @field update_time     会员类型更新时间
     */
    public function insert_cate()
    {
        if(request()->isAjax()){
            $param              = input('param.');
            $CateModel          = New MemberCateModel();
            $isOk               = $CateModel->insertOneCate($param);

            return json($isOk);
        }else{

            return $this        ->fetch();
        }
    }

    /**
     * [updateCate  [ 更新分类信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name            会员类型名称
     * @field status          会员类型状态           1：显示  0：不显示
     * @field order           会员类型后台排序
     * @field create_time     会员类型添加时间
     * @field update_time     会员类型更新时间
     */
    public function update_cate()
    {
        $id                     = input('param.id');
        $CateModel              = New MemberCateModel();
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
     * [deleteCate  [ 删除分类 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name            会员类型名称
     * @field status          会员类型状态           1：显示  0：不显示
     * @field order           会员类型后台排序
     * @field create_time     会员类型添加时间
     * @field update_time     会员类型更新时间
     */
    public function delete_cate()
    {
        $id                 = input('param.id');
        $CateModel          = New MemberCateModel();
        $isOk               = $CateModel -> deleteOneCate($id);

        return json($isOk);
    }

    /**
     * [statusCate  [ 更新分类状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name            会员类型名称
     * @field status          会员类型状态           1：显示  0：不显示
     * @field order           会员类型后台排序
     * @field create_time     会员类型添加时间
     * @field update_time     会员类型更新时间
     */
    public function status_cate()
    {
        $id                 = input('param.id');
        $CateModel          = New MemberCateModel();
        $isOk               = $CateModel -> updateStatusCate($id);

        return json($isOk);
    }
}