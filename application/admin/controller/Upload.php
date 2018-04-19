<?php
namespace app\admin\controller;

use app\admin\model\ArticleCateModel;

class Upload extends Base
{
    /**
     * upload [ 上传图片 ]
     * @author [Boot.Z] [852952656@qq.com]
     */
    public function upload()
    {
        $file           = request()->file('file');
        $info           = $file->move(ROOT_PATH . 'public' . DS . 'uploads/images');
        if($info){
            echo $info  ->getSaveName();
        }else{
            echo $file  ->getError();
        }
   }
}