<?php
/**
 * Created by PhpStorm.
 * User: 长春
 * Date: 2016/3/1
 * Time: 12:56
 */
    class AttributeAction extends CommonAction{

        //属性列表
        public function index(){
            $attr = M('attr')->select();
            $this->attr = $attr;
            $this->display();
        }

        //添加属性视图
        public function addAttr(){
            $this->display();
        }

        //修改属性视图
        public function updateAttr(){
            $attr = M('attr')->where(array('id'=>I('id')))->find();
            $this->attr = $attr;
            $this->display();
        }

        //添加属性表单处理
        public function runAddAttr(){
           if(M('attr')->add($_POST)){
               $this->success('添加成功',U(GROUP_NAME.'/Attribute/index'));
           }else{
               $this->error('添加失败');
           }
        }

        //删除属性
        public function runDeleteAttr(){
            if(M('attr')->where(array('id'=>I('id')))->delete()){
                $this->success('删除成功',U(GROUP_NAME.'/Attribute/index'));
            }else{
                $this->error('删除失败');
            }
        }

        //修改属性
        public function runUpdateAttr(){
            if(!IS_POST) halt('页面不存在');
            else{
                if(M('attr')->save($_POST)){
                    $this->success('修改成功',U(GROUP_NAME.'/Attribute/index'));
                }else{
                    $this->error('修改失败');
                }

            }
        }
    }
?>