<?php
namespace app\index\model;

use think\Model;
use think\Db;
class MenuHome extends Model
{

    protected $name = 'menu_home';                     //设置数据表

    /**
     * getOneNav [ 取出所有菜单 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return false|\PDOStatement|string|\think\Collection、
     */
    public function getAllMenu()
    {
        return $this ->field('id,name,status,order,p_id,template_link,template_cate')
                     ->where(array('status' => 1))
                     ->order(['order','order'=>'asc'])
                     ->select();
    }

    /**
     * getAllMenuSeoConfig [ 查出当前ID所在的Menu的SEO配置 ]
     * @author [Boot.Z] [852952656@qq.com]
     */
    public function getAllMenuSeoConfig($id)
    {
        return $this->where('id',$id)->field('name,keywords,description')->find();
    }

    /**
     * getTheIdMenuInfo [查出当前ID所在的Menu的所有内容  ]
     * @author [Boot.Z] [852952656@qq.com]
     */
    public function getTheIdMenuInfo($id)
    {
        return $this->where('id',$id)->field('name,keywords,description,content')->find();
    }

}