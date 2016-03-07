<?php
/**
 * Created by PhpStorm.
 * User: 长春
 * Date: 2016/2/29
 * Time: 21:19
 */
class SystemAction extends CommonAction{

    public function verify(){
        $this->display();
    }

    //表单处理
    public function updateVerify(){
        //写入文件
        if(F('verify',$_POST,CONF_PATH)){
            $this->success('修改成功',U(GROUP_NAME.'/System/verify'));
        }else{
            $this->error('修改失败');
        }
    }
}
?>