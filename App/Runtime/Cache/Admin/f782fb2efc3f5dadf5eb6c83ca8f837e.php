<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
    <style>
        th,td{
            text-align: center;
        }
    </style>
</head>
<body>
<form action="<?php echo U(GROUP_NAME.'/Blog/emptytrach');?>" method="post">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>所属分类</th>
            <th>点击次数</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>

        <?php if(is_array($blog)): foreach($blog as $key=>$v): ?><tr>
                <td width="8%"><?php echo ($v["id"]); ?></td>
                <input type="hidden" name="aid[]" value="<?php echo ($v["id"]); ?>" />
                <td style="text-align: left"><?php echo ($v["title"]); if(is_array($v["attr"])): foreach($v["attr"] as $key=>$value): ?><strong style="color: <?php echo ($value["color"]); ?>;padding: 0 5px">[<?php echo ($value["name"]); ?>]</strong><?php endforeach; endif; ?></td>
                <td width="12%"><?php echo ($v["cate"]); ?></td>
                <td width="12%"><?php echo ($v["click"]); ?></td>
                <td width="12%"><?php echo (date('y-m-d H:i',$v["time"])); ?></td>
                <td width="20%">
                    <?php if(ACTION_NAME == "index"): ?>[<a href="">修改</a>]
                    [<a href="<?php echo U(GROUP_NAME.'/Blog/toTrach',array('id'=>$v['id'],'type'=>1));?>">删除</a>]
                        <?php else: ?>
                        [<a href="<?php echo U(GROUP_NAME.'/Blog/toTrach',array('id'=>$v['id'],'type'=>0));?>">还原</a>]
                        [<a href="<?php echo U(GROUP_NAME.'/Blog/delete',array('id'=>$v['id']));?>">彻底删除</a>]<?php endif; ?>
                </td>
            </tr><?php endforeach; endif; ?>
        <?php if(ACTION_NAME == "trach"): ?><td colspan="6" align="right">
                <input style="color: #1F4799" type="submit" value="清空回收站" />
            </td><?php endif; ?>
    </table>
</form>
</body>
</html>