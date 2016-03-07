<?php
/**
 * Created by PhpStorm.
 * User: 长春
 * Date: 2016/3/2
 * Time: 0:36
 */
return array(
    'APP_AUTOLOAD_PATH' => '@.TagLib',            //自动载入文件
    'TAGLIB_BUILD_IN' => 'Cx,Hd',                   //载入的自定义标签,前面必须加Cx，这是ThinkPhp的标签库，如果不加，ThinkPHP原有的标签库将无法使用

    //开启静态缓存
    'HTML_CACHE_ON' => true,
    'HTML_CHCHE_RULES' => array(
        'Show:index' => array('{:module}_{:action}_{id}',0),    //'控制器名称:方法名称' => array('缓存文件名称',缓存文件时间[0:永久生成])
    ),

    //动态缓存方式
    'DATA_CACHE_TYPE' => 'FIle',
);
?>