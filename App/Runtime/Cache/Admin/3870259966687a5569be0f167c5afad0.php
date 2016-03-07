<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="__PUBLIC__/Css/public.css">
    <style>
        tr,th{text-align: center}
    </style>
</head>
<body>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>属性名称</th>
            <th>标题颜色</th>
            <th>操作</th>
        </tr>

        <?php if(is_array($attr)): foreach($attr as $key=>$v): ?><tr>
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["name"]); ?></td>
                <td>
                    <div style='width: 20px;height: 20px;background: <?php echo ($v["color"]); ?>;text-align: center'></div>
                </td>
                <td>
                    [<a href="<?php echo U(GROUP_NAME.'/Attribute/updateAttr',array('id'=>$v['id']));?>">修改</a>]
                    [<a href="<?php echo U(GROUP_NAME.'/Attribute/runDeleteAttr',array('id'=>$v['id']));?>">删除</a>]
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
</body>
</html>