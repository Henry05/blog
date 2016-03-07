<?php
/**
 * Created by PhpStorm.
 * User: 长春
 * Date: 2016/3/1
 * Time: 22:34
 */
    class ListAction extends Action{

        public function index(){
            import('Class.Category',APP_PATH);
            import('ORG.Util.Page');

            $id = I('id','','intval');
            $cate = M('cate')->order('sort')->select();

            $cids = Category::getChildId($cate,$id);
            $cids[] = $id;
            $where = array('cid'=>array('IN',$cids));
            $count = M('blog')->where($where)->count();
            $page = new Page($count,10);
            $limit = $page->firstRow.','.$page->listRows;

            $blog = D('BlogView')->getAll($where,$limit);
            $this->page = $page->show();
            $this->blog = $blog;
            $this->display();
        }
    }
?>