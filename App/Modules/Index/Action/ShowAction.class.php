<?php
/**
 * Created by PhpStorm.
 * User: 长春
 * Date: 2016/3/1
 * Time: 22:35
 */
    class ShowAction extends Action{

        public function index(){
            $id = I('id','','intval');

            $field = array('title','time','content','click','cid','id');
            $blog = M('blog')->field($field)->find($id);
            $blog['content'] = html_entity_decode($blog['content']);
            $this->blog = $blog;

            import('Class.Category',APP_PATH);
            $cate = M('cate')->order('sort')->select();
            $this->parent = Category::getParents($cate,$blog['cid']);


            $this->display();
        }

        public function clickNum(){
            $id = I('id','','intval');
            $where = array('id'=>$id);
            $click = M('blog')->where($where)->getField('click');
            M('blog')->where($where)->setInc('click');
            echo 'document.write('.$click. ')';

        }
    }
?>