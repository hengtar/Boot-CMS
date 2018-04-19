<?php
namespace app\admin\controller;


use org;
use app\admin\model\MessageModel;
class Message extends Base
{

    /**
     * listMessage [ 留言列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field email                  留言的邮箱
     * @field nick_name              留言的昵称
     * @field content                留言的内容
     * @field is_ok                  留言是否通过审核  1：通过  0：未通过
     * @field ip                     留言的IP
     * @field create_time            留言的添加时间
     * @field update_time            留言的更新时间
     */
    public function list_message()
    {
       if (request()->isAjax()){

       }else{
           $MessageModel                     = New MessageModel();
           $list                             = $MessageModel -> getAllMessage();
           $page                             = $list -> render();
           $this                             ->assign('page',$page);
           $IpLocation                       = New org\IpLocation();
           $newList                          = array();
           foreach ($list as $key=> $value){
               $arr                          = $IpLocation->getlocation($value['ip']);
               $newList[$key]                = $list[$key];
               $newList[$key]['address']     =  $arr['country'].$arr['area'];
           }
           $this                             ->assign('list',$newList);

           return $this                      ->fetch();
       }
    }

    /**
     * [deleteMessage  [ 删除留言信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field email                  留言的邮箱
     * @field nick_name              留言的昵称
     * @field content                留言的内容
     * @field is_ok                  留言是否通过审核  1：通过  0：未通过
     * @field ip                     留言的IP
     * @field create_time            留言的添加时间
     * @field update_time            留言的更新时间
     */
    public function delete_message()
    {
        $id             = input('param.id');
        $ArticleModel   = New MessageModel();
        $isOk           = $ArticleModel -> deleteOneMessage($id);

        return json($isOk);
    }

    /**
     * [statusMessage  [ 更改留言状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field email                  留言的邮箱
     * @field nick_name              留言的昵称
     * @field content                留言的内容
     * @field is_ok                  留言是否通过审核  1：通过  0：未通过
     * @field ip                     留言的IP
     * @field create_time            留言的添加时间
     * @field update_time            留言的更新时间
     */
    public function status_message()
    {
        $id                 = input('param.id');
        $ArticleModel       = New MessageModel();
        $isOk               = $ArticleModel -> updateStatusMessage($id);

        return json($isOk);
    }
}