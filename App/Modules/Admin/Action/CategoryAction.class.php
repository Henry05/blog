<?php
/**
 * Created by PhpStorm.
 * User: 长春
 * Date: 2016/2/29
 * Time: 22:21
 */
class CategoryAction extends CommonAction{

    //分类列表视图
    public function index(){
        import('Class.Category',APP_PATH);

        $cate = M('cate')->order('sort ASC')->select();
        $cate = Category::unlimitedForLevel($cate,"&nbsp;&nbsp;- - ");

        $this->cate = $cate;
        $this->display();
    }

    public function addCate(){
        $pid = I('pid',0,'intval');
        $this->pid = $pid;
        $this->display();
    }

    //添加分类表单处理
    public function runAddCate(){
        if(M('cate')->add($_POST)){
            $this->success('添加成功',U(GROUP_NAME.'/Category/index'));
        }else{
            $this->error('添加失败');
        }
    }

    //排序
    public function sortCate(){
        $db = M('cate');
        foreach($_POST as $id => $sort){
            $db->where(array('id'=>$id))->setField('sort',$sort);
        }
        $this->redirect(GROUP_NAME.'/Category/index');

    }
}
?>