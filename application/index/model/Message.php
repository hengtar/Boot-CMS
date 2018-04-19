<?php
namespace app\index\model;

use think\Db;

class Message extends Base
{
    protected $name="message";
    protected $autoWriteTimestamp = true; //开启自动写入时间戳

    /**
     * getAllWords [ 取出所有的留言 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getAllWords()
    {

        return $this ->where('is_ok',1)
                     ->field('*')
                     ->order('id desc')
                     ->paginate(10);

    }

    /**
     * getWordsNum [ 取出留言条数 ]
     * @author [Boot.Z] [852952656@qq.com]
     */
    public function getWordsNum()
    {
       return $this->count('is_ok');
    }

    /**
     * insertWords [ 写入一条留言进行审核 ]
     * @author [Boot.Z] [852952656@qq.com]
     * @param $param
     */
    public function insertWords($param)
    {
        $param['ip'] = get_client_ip();
        if ($this->allowField(true)->save($param)){
            return ['pass'=> 1,'msg'=> '提交成功，等待审核'];
        }else{
            return ['pass'=> 0,'msg'=> '提交失败，请重试'];
        }

    }
}