<?php
namespace app\admin\controller;



use app\admin\model\AdminModel;
use app\admin\model\AuthGroupModel;
use app\admin\model\AuthRuleModel;

class Auth extends Base
{

    // +----------------------------------------------------------------------
    // | 菜单管理
    // +----------------------------------------------------------------------
    /**
     * [list_menu  [ 权限菜单列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              权限链接
     * @field title             权限名称
     * @field type
     * @field status            权限名称
     * @field condition         权限名称
     * @field p_id              权限名称
     * @field sort              权限名称
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function list_menu()
    {

        // +----------------------------------------------------------------------
        // | 查询权限菜单
        // +----------------------------------------------------------------------
        $AuthModel          = New AuthRuleModel();
        $list               =  $AuthModel ->getAllAuthMenu();
        $listRule           = $this->rule($list);
        $this               ->assign('listRule',$listRule);
        $this               ->assign('list',$listRule);

        return $this->fetch();
    }

    /**
     * status_auth [ 更新权限菜单状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              权限链接
     * @field title             权限名称
     * @field type
     * @field status            权限名称
     * @field condition         权限名称
     * @field p_id              权限名称
     * @field sort              权限名称
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function status_auth()
    {
        if (request()->isAjax()){
            $id                 = input('param.id');
            // +----------------------------------------------------------------------
            // | 接受传值ID进行修改状态
            // +----------------------------------------------------------------------
            $AuthRuleModel      = New AuthRuleModel();
            $isOk               = $AuthRuleModel -> updateStatusMenu($id);

            return json($isOk);
        }else{

            return $this        ->fetch();
        }
    }

    /**
     * delete_auth [ 删除权限菜单的权限 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              权限链接
     * @field title             权限名称
     * @field type
     * @field status            权限名称
     * @field condition         权限名称
     * @field p_id              权限名称
     * @field sort              权限名称
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function delete_auth()
    {
        if (request()->isAjax()){
            $id                 = input('param.id');
            // +----------------------------------------------------------------------
            // | 接受传值ID删除权限
            // +----------------------------------------------------------------------
            $AuthRuleModel      = New AuthRuleModel();
            $isOk               = $AuthRuleModel -> deleteStatusMenu($id);

            return json($isOk);
        }else{

            return $this        ->fetch();
        }
    }

    /**
     * insert_auth [ 添加权限 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              权限链接
     * @field title             权限名称
     * @field type
     * @field status            权限名称
     * @field condition         权限名称
     * @field p_id              权限名称
     * @field sort              权限名称
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function insert_auth()
    {
        if (request()->isPost()) {
            $param              = input('param.');
            // +----------------------------------------------------------------------
            // | 添加权限
            // +----------------------------------------------------------------------
            $AuthRuleModel      = New AuthRuleModel();
            $isOk               = $AuthRuleModel->insertOneAuthRule($param);
           if ($isOk){

               $this            ->success('新增成功',url('Auth/list_menu'));
           }else{

               $this            ->error('新增失败',url('Auth/list_menu'));
           }
        }else{

            return $this        ->fetch();
        }
    }

    /**
     * update_auth [ 更新权限菜单属性 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              权限链接
     * @field title             权限名称
     * @field type
     * @field status            权限名称
     * @field condition         权限名称
     * @field p_id              权限名称
     * @field sort              权限名称
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function update_auth()
    {
        if (request()->isPost()) {
            $param              = input('param.');
            $id                 = $param['id'];
            $AuthRuleModel      = New AuthRuleModel();
            // +----------------------------------------------------------------------
            // | 接受传值ID进行查询传值
            // +----------------------------------------------------------------------
            $isOk               = $AuthRuleModel->updateOneAuthRule($param,$id);
            if ($isOk){

                $this           ->success('修改成功',url('Auth/list_menu'));
            }else{

                $this           ->error('修改失败',url('Auth/list_menu'));
            }
        }else{

            // +----------------------------------------------------------------------
            // | 接受传值ID进行查询传值
            // +----------------------------------------------------------------------
            $id                 = input('param.id');
            $AuthRuleModel      = New AuthRuleModel();
            $menu               = $AuthRuleModel -> findOneMenu($id);
            $this               ->assign('menu',$menu);

            // +----------------------------------------------------------------------
            // | 所属父级栏目
            // +----------------------------------------------------------------------
            $list               = $AuthRuleModel ->getAllAuthMenu();
            $listRule           = $this->rule($list);
            $this               ->assign('list',$listRule);

            return $this        ->fetch();
        }

    }

    /**
     * give_auth [ 权限分配 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field name              权限链接
     * @field title             权限名称
     * @field type
     * @field status            权限名称
     * @field condition         权限名称
     * @field p_id              权限名称
     * @field sort              权限名称
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function give_auth()
    {
        if (request()->isPost()) {
            $param              = input('param.');
            $id                 = $param['id'];
            $rule_ids['rules']  = implode(',',$param['rule_ids']);
            $AuthGroupModel     = New AuthGroupModel();
            $is_ok              = $AuthGroupModel ->  updateTheIdAuth($id,$rule_ids);
            //判断是否成功
            if ($is_ok == true){

                  return $this  ->success('编辑成功', 'auth/list_group');
            }else{

                  return $this  ->error('编辑失败', 'auth/list_group');
            }
        }else{
            $id                 = input('param.id');
            //根据当前ID查出是赋予某个角色管理员的权限
            $AuthGroupModel     = New AuthGroupModel();
            $name               = $AuthGroupModel -> findOneGroup($id);
            $this               ->assign('name',$name);
            //查出当前id相应的权限表
            $HaveAuth           = $AuthGroupModel->findTheIdHaveAuth($id);
            $HaveAuth           = explode(',',$HaveAuth['rules']);
            $AuthRule           = New AuthRuleModel();
            $auth_rule          = $AuthRule ->findThisAllAuth();
            $tree               = $this->tree($auth_rule,$pid=0,$level=1,$HaveAuth);
            $this               ->assign('list',$tree);

            return $this        ->fetch();
        }

    }

    /**
     * tree [ 无限极分类函数 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array
     * @param $AllAuth
     * @param int $pid
     * @param int $level
     * @param $HaveAuth
     */
    private function tree($AllAuth,$pid=0,$level=1,$HaveAuth)
    {

        $arr                                    = array();
        foreach ($AllAuth as $key => $value){
                if ($value['p_id'] == $pid){
                    $arr[$key]                  = $value;
                    $arr[$key]['level']         = $level;
                    if (in_array($value['id'],$HaveAuth) ){
                        $arr[$key]['is_yes']    = 1;
                    }else{
                        $arr[$key]['is_yes']    = 0;
                    }
                    $arr[$key]['child']         = $this->tree($AllAuth,$value['id'],$level+1,$HaveAuth);
                }
        }
        return $arr;
    }


    // +------------------------------------------------------------------------------------------------------
    //    角色管理
    // +-----------------------------------------------------------------------------------------------------

    /**
     * [list_group  [ 角色组列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field title             用户组名称
     * @field status            用户组状态
     * @field rules             用户组权限Id
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function list_group()
    {
        $AuthGroupModel         = New AuthGroupModel();
        $list                   =  $AuthGroupModel ->getAllAuthGroup();
        $this                   ->assign('list',$list);
        return $this            ->fetch();

    }

    /**
     * insert_group [ 添加角色组 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field title             用户组名称
     * @field status            用户组状态
     * @field rules             用户组权限Id
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function insert_group()
    {
        if (request()->isPost()) {
            $param              = input('param.');
            // +----------------------------------------------------------------------
            // | 添加角色
            // +----------------------------------------------------------------------
            $AuthGroupModel     = New AuthGroupModel();
            $isOk               = $AuthGroupModel -> insertOneGroup($param);
            if ($isOk){
                $this           ->success('新增成功',url('Auth/list_group'));
            }else{
                $this           ->error('新增失败',url('Auth/list_group'));
            }
        }else{
            return $this        ->fetch();
        }
    }

    /**
     * update_group [ 更新角色组 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field title             用户组名称
     * @field status            用户组状态
     * @field rules             用户组权限Id
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function update_group()
    {
        if (request()->isPost()){
            $param              = input('param.');
            $id                 = $param['id'];
            $AuthGroupModel     = New AuthGroupModel();
            // +----------------------------------------------------------------------
            // | 接受传值ID进行查询传值
            // +----------------------------------------------------------------------
            $isOk               = $AuthGroupModel->updateOneGroup($param,$id);
            if ($isOk){

                $this           ->success('修改成功',url('Auth/list_group'));
            }else{

                $this           ->error('修改失败',url('Auth/list_group'));
            }

        }else{
            // +----------------------------------------------------------------------
            // | 接受传值ID进行查询传值
            // +----------------------------------------------------------------------
            $id                 = input('param.id');
            $AuthGroupModel     = New AuthGroupModel();
            $group              = $AuthGroupModel -> findOneGroup($id);
            $this               ->assign('group',$group);

            return $this        ->fetch();
        }
    }

    /**
     * status_group [ 更新角色组的状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field title             用户组名称
     * @field status            用户组状态
     * @field rules             用户组权限Id
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function status_group()
    {
        if (request()->isAjax()){
            $id                 = input('param.id');
            // +----------------------------------------------------------------------
            // | 接受传值ID进行修改状态
            // +----------------------------------------------------------------------
            $AuthGroupModel     = New AuthGroupModel();
            $isOk               = $AuthGroupModel -> updateStatusGroup($id);

            return json($isOk);
        }else{

            return $this        ->fetch();
        }
    }

    /**
     * delete_group [ 删除角色 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field title             用户组名称
     * @field status            用户组状态
     * @field rules             用户组权限Id
     * @field create_time       用户组添加时间
     * @field update_time       用户组更新时间
     */
    public function delete_group()
    {
        if (request()->isAjax()){
            $id                 = input('param.id');
            // +----------------------------------------------------------------------
            // | 接受传值ID删除权限
            // +----------------------------------------------------------------------
            $AuthGroupModel     = New AuthGroupModel();
            $isOk               = $AuthGroupModel -> deleteGroup($id);

            return json($isOk);
        }else{

            return $this        ->fetch();
        }
    }

    // +-------------------------------------------------------------------------------------------------------------
    // 用户管理
    // +-------------------------------------------------------------------------------------------------------------

    /**
     * [list_user  [ 管理员列表 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field user              管理员用户名
     * @field pass              管理员密码
     * @field nickname          管理员昵称
     * @field logi_num          管理员登录次数
     * @field last_login_time   管理员上一次登录时间
     * @field last_login_ip     管理员上次登录地点
     * @field status            管理员状态
     * @field header_image      管理员头像
     * @field logi_num          管理员登录次数
     * @field logi_num          管理员登录次数
     * @field create_time       管理员添加时间
     * @field update_time       管理员更新时间
     */
    public function list_user()
    {
        if (request()->isAjax()){

        }else{
            // +----------------------------------------------------------------------
            // | 列表
            // +----------------------------------------------------------------------
            $AuthModel          = New AdminModel();
            $list               =  $AuthModel ->getAllAuthUser();
            //dump($list);die;
            $this               ->assign('list',$list);
   
            // +----------------------------------------------------------------------
            // | 管理组
            // +----------------------------------------------------------------------
            $AuthGroupModel     = New AuthGroupModel();
            $group              = $AuthGroupModel-> getAllAuthGroup();
            $this               ->assign('group',$group);

            return $this        ->fetch();
        }
    }

    /**
     * status_user [ 更新管理员状态 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return mixed|\think\response\Json
     * @field user              管理员用户名
     * @field pass              管理员密码
     * @field nickname          管理员昵称
     * @field logi_num          管理员登录次数
     * @field last_login_time   管理员上一次登录时间
     * @field last_login_ip     管理员上次登录地点
     * @field status            管理员状态
     * @field header_image      管理员头像
     * @field logi_num          管理员登录次数
     * @field logi_num          管理员登录次数
     * @field create_time       管理员添加时间
     * @field update_time       管理员更新时间
     */
    public function status_user()
    {
        if (request()->isAjax()){
            $id                 = input('param.id');
            // +----------------------------------------------------------------------
            // | 接受传值ID进行修改状态
            // +----------------------------------------------------------------------
            $AdminUserModel     = New AdminModel();
            $isOk               = $AdminUserModel -> updateStatusUser($id);

            return json($isOk);
        }else{

            return $this        ->fetch();
        }
    }

    /**
     * delete_user [ 删除管理员 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field user              管理员用户名
     * @field pass              管理员密码
     * @field nickname          管理员昵称
     * @field logi_num          管理员登录次数
     * @field last_login_time   管理员上一次登录时间
     * @field last_login_ip     管理员上次登录地点
     * @field status            管理员状态
     * @field header_image      管理员头像
     * @field logi_num          管理员登录次数
     * @field logi_num          管理员登录次数
     * @field create_time       管理员添加时间
     * @field update_time       管理员更新时间
     */
    public function delete_user()
    {
        if (request()->isAjax()){
            $id                 = input('param.id');
            // +----------------------------------------------------------------------
            // | 接受传值ID删除权限
            // +----------------------------------------------------------------------
            $AdminUserModel     = New AdminModel();
            $isOk               = $AdminUserModel -> deleteUser($id);

            return json($isOk);
        }else{

            return $this        ->fetch();
        }
    }

    /**
     * insert_user [ 添加管理员 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field user              管理员用户名
     * @field pass              管理员密码
     * @field nickname          管理员昵称
     * @field logi_num          管理员登录次数
     * @field last_login_time   管理员上一次登录时间
     * @field last_login_ip     管理员上次登录地点
     * @field status            管理员状态
     * @field header_image      管理员头像
     * @field logi_num          管理员登录次数
     * @field logi_num          管理员登录次数
     * @field create_time       管理员添加时间
     * @field update_time       管理员更新时间
     */
    public function insert_user()
    {
        if (request()->isPost()) {
            $param              = input('param.');
            // +----------------------------------------------------------------------
            // | 添加角色
            // +----------------------------------------------------------------------
            $AdminUserModel     = New AdminModel();
            $isOk               = $AdminUserModel -> insertOneUser($param);
            if ($isOk){

                $this           ->success('新增成功',url('Auth/list_user'));
            }else{

                $this           ->error('新增失败',url('Auth/list_user'));
            }
        }else{

            return $this        ->fetch();
        }
    }

    /**
     * [update_user  [ 更新角色信息 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @field user              管理员用户名
     * @field pass              管理员密码
     * @field nickname          管理员昵称
     * @field logi_num          管理员登录次数
     * @field last_login_time   管理员上一次登录时间
     * @field last_login_ip     管理员上次登录地点
     * @field status            管理员状态
     * @field header_image      管理员头像
     * @field logi_num          管理员登录次数
     * @field logi_num          管理员登录次数
     * @field create_time       管理员添加时间
     * @field update_time       管理员更新时间
     */
    public function update_user()
    {
        if (request()->isPost()){
            $param              = input('param.');
            $id                 = $param['id'];
            $AdminUserModel     = New AdminModel();
            // +----------------------------------------------------------------------
            // | 接受传值ID进行查询传值
            // +----------------------------------------------------------------------
            $isOk               = $AdminUserModel->updateOneUser($param,$id);
            if ($isOk){

                $this           ->success('修改成功',url('Auth/list_user'));
            }else{

                $this           ->error('修改失败',url('Auth/list_user'));
            }
        }else{
            // +----------------------------------------------------------------------
            // | 接受传值ID进行查询传值
            // +----------------------------------------------------------------------
            $id                 = input('param.id');
            $AdminUserModel     = New AdminModel();
            $user               = $AdminUserModel -> findOneUser($id);
            // +----------------------------------------------------------------------
            // | 管理组
            // +----------------------------------------------------------------------
            $AuthGroupModel     = New AuthGroupModel();
            $group              = $AuthGroupModel-> getAllAuthGroup();
            $this               ->assign('group',$group);
            $this               ->assign('user',$user);

            return $this        ->fetch();
        }
    }


    /**
     * rule [ 无限极分类函数 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return array
     * @param $cate
     * @param string $lefthtml
     * @param int $pid
     * @param int $lvl
     * @param int $leftpin
     */
    private function rule($cate , $lefthtml = ' — — ' , $pid=0 , $lvl=0, $leftpin=0 ){
        $arr=array();
        foreach ($cate as $v){
            if($v['p_id']==$pid){
                $v['lvl']               =$lvl + 1;
                $v['leftpin']           =$leftpin + 0;//左边距
                $v['lefthtml']          =str_repeat($lefthtml,$lvl);
                $arr[]                  =$v;
                $arr                    = array_merge($arr,self::rule($cate,$lefthtml,$v['id'],$lvl+1 , $leftpin+20));
            }
        }
        return $arr;
    }
}