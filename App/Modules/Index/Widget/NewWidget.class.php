<?php
/**
 * Created by PhpStorm.
 * User: 长春
 * Date: 2016/3/2
 * Time: 11:16
 */
class NewWidget extends Widget{
    public function render($data)
    {
        // TODO: Implement render() method.
        $limit = $data['limit'];
        $field = array('id','title','click');
        $news = M('blog')->field($field)->order('time DESC')->limit($limit)->select();
        $data['news'] = $news;
        return $this->renderFile('',$data);
    }
}
?>