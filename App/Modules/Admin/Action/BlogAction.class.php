<?php
/**
 * Created by PhpStorm.
 * User: 长春
 * Date: 2016/3/1
 * Time: 13:43
 */
    class BlogAction extends CommonAction{

        //博文列表
        public function index(){
            $blog = D('BlogRelation')->getBlogs();
            $this->blog = $blog;
            $this->display();
        }

        //删除博文到回收站或者还原
        public function toTrach(){
            $type = I('type','','intval');
            $msg = $type? '删除':'还原';
            $update = array(
                'id' => I('id',0,'intval'),
                'del' => $type
            );
           if(M('blog')->save($update)){
               $this->success($msg.'成功',U(GROUP_NAME.'/Blog/index'));
           }else{
               $this->error($msg.'失败');
           }

        }

        //回收站
        public function trach(){
            $blog = D('BlogRelation')->getBlogs(1);
            $this->blog = $blog;
            $this->display('index');
        }

        //删除博文
        public function delete(){
            $id = I('id',0,'intval');
            if(M('blog')->delete($id)){
                M('blog_attr')->where(array('bid'=>$id))->delete();
                $this->success('删除成功',U(GROUP_NAME.'/Blog/trach'));
            }else{
                $this->error('删除失败');
            }
        }

        //清空回收站
        public function emptyTrach(){
            $aid = I('aid');
            foreach($aid as $v){
                $id = (int)$v;
                if(M('blog')->delete($id)){
                    M('blog_attr')->where(array('aid'=>$id))->delete();
                }else{
                    $this->error('操作失败');
                }
            }
            $this->success('操作成功',U(GROUP_NAME.'/Blog/trach'));
        }

        //添加博文
        public function blog(){
            import('Class.Category',APP_PATH);
            //博文分类
            $cate = M('cate')->order('sort')->select();
            $cate = Category::unlimitedForLevel($cate);
            $this->cate = $cate;

            //博文属性
            $attr = M('attr')->select();
            $this->attr = $attr;
            $this->display();
        }

        //添加博文表单处理
        public function addBlog(){
            $data = array(
                'title' => I('title'),
                'content' => I('content'),
                'time' => time(),
                'click' => I('click','','intval'),
                'cid' => I('cid','','intval'),
                'summary' => I('summary')
            );
            if($bid = M('blog')->add($data)){
                if(isset($_POST['aid'])){
                    $sql = 'INSERT INTO `'.C('DB_PREFIX').'blog_attr` (bid,aid) VALUES';
                    foreach($_POST['aid'] as  $v){
                        $sql .= '('.$bid.','.$v.'),';
                    }
                    $sql = rtrim($sql,',');
                    M('blog_attr')->query($sql);
                }
                $this->success('发布成功',U(GROUP_NAME.'/Blog/index'));

            }else{
                $this->error('添加失败');
            }

        }

        //编辑器图片上传处理
        public function upload(){
            import('ORG.Net.UploadFile');

            $upload = new UploadFile();
            $upload->autoSub = true;
            $upload->subType = 'date';
            $upload->dateFormat = 'Ym';

            if($upload->upload('./Uploads/')){
                $info = $upload->getUploadFileInfo();
                /*import('ORG.Util.Image');
                Image::water('./Uploads/'.$info[0]['savename'],'./Data/watermelon.jpg');*/
                import('Class.Image',APP_PATH);
                Image::water('./Uploads/'.$info[0]['savename']);
                echo json_encode(array(
                   'url' => $info[0]['savename'],
                    'title' => htmlspecialchars($_POST['pictitle'], ENT_QUOTES),
                    'original' => $info[0]['name'],
                    'state' => 'SUCCESS'
                ));
            }else{
                echo json_encode(array(
                    'state' => $upload->getErrorMsg()
                ));

            }


            /*{
                'url'      :'a.jpg',   //保存后的文件路径
                'title'    :'hello',   //文件描述，对图片来说在前端会添加到title属性上
                'original' :'b.jpg',   //原始文件名
                'state'    :'SUCCESS'  //上传状态，成功时返回SUCCESS,其他任何值将原样返回至图片上传框中
              }*/

        }
    }
?>