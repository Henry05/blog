<?php
/**
 * Created by PhpStorm.
 * User: 长春
 * Date: 2016/3/1
 * Time: 22:32
 */
    class IndexAction extends Action{

        //首页
        public function index(){
            if(!($topCate = S('index_list'))){
                $topCate = M('cate')->where(array('pid'=>0))->order('sort')->select();
                import('Class.Category',APP_PATH);
                $cate = M('cate')->order('sort')->select();
                $db = M('blog');
                $field = array('id','title','time');
                foreach($topCate as $k=>$v){
                    $cids = Category::getChildId($cate,$v['id']);
                    $cids[] = $v['id'];
                    $where = array('cid' => array('IN',$cids));
                    $topCate[$k]['blog'] = $db->field($field)->where($where)->order('time DESC')->select();
                }
                S('index_list',$topCate,10);
            }
            //缓存  S('缓存名称'，'缓存数据','缓存时间')

            $this->cates = $topCate;
            $this->display();
        }
    }
?>