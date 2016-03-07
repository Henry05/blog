<?php
/**
 * Created by PhpStorm.
 * User: 长春
 * Date: 2016/3/2
 * Time: 16:12
 */

/**
 * '_type':定义与下一张表的关联模式
 * '_on':修饰_type的关联条件
 */
class BlogViewModel extends ViewModel{
    protected $viewFields = array(
        'blog' => array(
            'id','title','time','click','summary',
            '_type' => 'LEFT'
        ),
        'cate' => array(
            'name','_on' => 'blog.cid = cate.id'
        )
    );

    public function getAll($where,$limit){
        return $this->where($where)->limit($limit)->order('time DESC')->select();
    }
}
?>