<?php
/**
 * Created by PhpStorm.
 * User: 长春
 * Date: 2016/2/29
 * Time: 11:22
 */
class CommonAction extends Action{

    public function _initialize(){
        if(!isset($_SESSION['uid'])){
            $this->redirect(GROUP_NAME.'/Login/index');
        }
    }
}

?>