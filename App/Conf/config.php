<?php
return array(
	//'配置项'=>'配置值'

    'APP_GROUP_LIST' => 'Index,Admin',
    'DEFAULT_GROUP' => 'Index',
    'APP_GROUP_MODE' => 1,
    'APP_GROUP_PATH' => 'Modules',

    'LOAD_EXT_CONFIG' => 'verify,water',

    //数据库连接配置
    'DB_HOST' => '',
    'DB_USER' => '',
    'DB_PWD' => '',
    'DB_NAME' => 'blog',
    'DB_PREFIX' => 'hd_',

    'SHOW_PAGE_TRACE' => true,


    'URL_MODEL' => 2,
    //URL路由
    'URL_ROUTER_ON' => true,
    'URL_ROUTE_RULES' => array(
       // 'c/:id\d' => 'Index/List/index',                        //c替换'Index/List/index   id是参数的名称 \d代表只能传递整数 c/9 => Index/List/c/9
        '/^c_(\d+)$/' => 'Index/List/index?id=:1',              //正则路由  :1代表正则里面的东西
        ':id\d' => 'Index/Show/index',
    ),
);
?>