# blog
使用thinkphp框架做的一个简单的博客系统，有后台系统和前台展示，对初学者很有用

1 导入数据库
  数据库文件保存在blog/database文件夹下。
  导入命令：
  mysql -u 用户名 -p 密码
  mysql > create database blog;
  mysql > use blog;
  mysql > source blog.sql(blog.sql所在位置)
  
2 更改配置文件
  修改blog/App/Conf/config.php文件，把
      'DB_HOST' => '',
      'DB_USER' => '',
      'DB_PWD' => '',
  修改为自己mysql数据库的IP，用户名、密码
  
3 把项目拷贝到apache服务器的www目录下，使用http://localhost/blog即可访问博客前台，使用http://blog/blog/Admin访问后台管理，默认用户名和
  密码均为admin
