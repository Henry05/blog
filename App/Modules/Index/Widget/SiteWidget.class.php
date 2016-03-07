<?php
/**
 * Created by PhpStorm.
 * User: 长春
 * Date: 2016/3/2
 * Time: 14:17
 */

class SiteWidget extends Widget{

    public function render($data)
    {
        // TODO: Implement render() method.
        $limit = $data['limit'];
        $site = M('site')->limit($limit)->order('sort ASC')->select();
        $data['site'] = $site;
        return $this->renderFile('',$data);
    }
}
?>