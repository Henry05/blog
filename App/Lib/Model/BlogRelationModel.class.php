<?php
/**
 * Created by PhpStorm.
 * User: 长春
 * Date: 2016/3/1
 * Time: 19:51
 */
    class BlogRelationModel extends RelationModel{

        Protected $tableName = 'blog';  //主表

        Protected $_link = array(
            'attr' => array(
                'mapping_type' => MANY_TO_MANY,
                'mapping_name' => 'attr',  //与主表关联的表
                'foreign_key' => 'bid',     //主表外键在关联表中的名字
                'relation_foreign_key' => 'aid',   //关联表外键在关联表中的名字
                'relation_table' => 'hd_blog_attr'  //关系表
            ),
            'cate' => array(
                'mapping_type' => BELONGS_TO,   //与HAS_MANY一样，但是两张关联表的主从关系相反
                'foreign_key' => 'cid',
                'mapping_fields' => 'name',   //只读取cate表中的name字段
                'as_fields' => 'name:cate',  //因为只读取一个字段，无需用一个数组展示，as_fields把读取的name字段从cate数组中提取出来，作为外部数组的一个键值对，:cate是给name重命名为cate，防止key重名

            )
        );

        public function getBlogs($type=0){
            $field = array('del');
            $where = array('del' => $type);
            return $this->field($field,true)->where($where)->relation(true)->select();

        }
    }
?>