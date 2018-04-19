<?php
namespace app\index\controller;

use org;
class Message extends Base
{
    /**
     * [index  [ 留言 ]
     * @author [Boot.Z] [852952656@qq.com]
     */
    public function index()
    {
        $WordsModel = New \app\index\model\Message();
        if (request()->isPost()){
            $param = input('param.');
            $isOK = $WordsModel -> insertWords($param);
            if ($isOK){
                $this->success('提交成功');
            }else{
                $this->success('提交失败');
            }
        }else{
            $list = $WordsModel->getAllWords();
            $IpLocation = New org\IpLocation();
            $new = array();
            foreach ($list as $key => $value)
            {
                $arr =  $IpLocation->getlocation($value['ip']);
                $new[$key] = $list[$key];
                $new[$key]['addr'] = $arr['country'].$arr['area'];
            }
            $this->assign('list',$new);
            $page = $list->render();
            $this->assign('page',$page);
            $Num = $WordsModel -> getWordsNum();
            $this->assign('Num',$Num);
            return  $this->fetch();
        }
    }
}
