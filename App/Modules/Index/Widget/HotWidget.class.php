<?php
/**
 * Created by PhpStorm.
 * User: 长春
 * Date: 2016/3/2
 * Time: 10:12
 */

class HotWidget extends Widget{

    public function render($data){
        //热门博文
        $field = array('id','title','click');
        $blog = M('blog')->field($field)->order('click DESC')->limit(5)->select();
        $data['blog'] = $blog;
        return $this->renderFile('',$data);
    }
}
?>