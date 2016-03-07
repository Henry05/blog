<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="__PUBLIC__/Css/public.css">
</head>
<body>
<form action="<?php echo U(GROUP_NAME.'/Attribute/runUpdateAttr');?>"  method="post">
    <table class="table">
        <tr>
            <th colspan="2">博文属性</th>
        </tr>
        <tr>
            <td align="right">属性名称</td>
            <td>
                <input type="text" name="name" value="<?php echo ($attr["name"]); ?>"/>
            </td>
        </tr>
        <tr>
            <td align="right">标题颜色</td>
            <td>
                <input type="text" name="color" value="<?php echo ($attr["color"]); ?>"/>
            </td>
            <td>
                <input type="hidden" name="id" value="<?php echo ($attr["id"]); ?>" />
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="保存修改" />
            </td>
        </tr>
    </table>
</form>
</body>
</html>