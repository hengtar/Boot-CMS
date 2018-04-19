<?php
namespace app\admin\model;

use think\Model;
use think\Log;
class BaseModel extends Model
{
    public function _initialize()
    {



    }

    protected function writeLog($operation,$cate,$info)
    {
        //日志初始化
        Log::init(
            [
                'type'  =>  'File',
                'path'  =>  APP_PATH.'logs/'
            ]);
        Log::write('管理员 :'.session('admin_nickname')."在".date("Y-m-d H:i:s").$operation."了一条".$cate.$operation.$info,'log');
    }

    protected function returnMsg($id)
    {
        if ($id == 1){
            return ['pass' => $id,'msg'=>'成功'];
        }else{
            return ['pass' => $id,'msg'=>'失败'];
        }
    }
    //不知道是不是过度设计，先这样写着。
//    protected function returnSuccess()
//    {
//        return   $info = array(
//                           'info' => '成功',
//                           'id'     => 1
//                       );
//
//    }
//    protected function returnError()
//    {
//        return   $info = array(
//            'info' => '失败',
//            'id'     => 0
//        );
//    }
//
//    protected  function  returnCatch($e)
//    {
//        return   $info = array(
//            'info' => $e->getMessage(),
//            'id'     => 0
//        );
//    }



}