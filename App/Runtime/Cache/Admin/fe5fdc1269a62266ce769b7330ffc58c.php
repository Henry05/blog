<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!--<link rel="stylesheet" href="__PUBLIC__/Css/public.css">-->
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
    <script type="text/javascript">
        window.UEDITOR_CONFIG_URL = '__ROOT__/Data/ueditor/';
        window.onload = function(){
            window.UEDITOR_CONFIG.initialFrameHeight = 500;
            window.UEDITOR_CONFIG.imageUrl = "<?php echo U(GROUP_NAME.'/Blog/upload');?>"
            window.UEDITOR_CONFIG.imagePath = '__ROOT__/Uploads/';
            UE.getEditor('content');
        }
    </script>
    <script type="text/javascript" src="__ROOT__/Data/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="__ROOT__/Data/ueditor/ueditor.all.min.js"></script>
</head>
<body>
    <form action="<?php echo U(GROUP_NAME.'/Blog/addBlog');?>" method="post">
        <table class="table">
            <tr>
                <th colspan="2">博文发布</th>
            </tr>
            <tr>
                <td align="right" width="10%">所属分类</td>
                <td>
                    <select name="cid">
                        <option value="">===请选择分类===</option>
                        <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["html"]); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">点击次数</td>
                <td>
                    <input type="text" name="click" value="100" />
                </td>
            </tr>
            <tr>
                <td align="right">博文属性</td>
                <td>
                    <?php if(is_array($attr)): foreach($attr as $key=>$v): ?><label style="margin-right: 10px">
                            <input type="checkbox" name="aid[]" value="<?php echo ($v["id"]); ?>" />&nbsp;<?php echo ($v["name"]); ?>
                        </label><?php endforeach; endif; ?>
                </td>
            </tr>
            <tr>
                <td align="right">标题</td>
                <td>
                    <input name="title" type="text">
                </td>
            </tr>
            <tr>
                <td align="right">摘要</td>
                <td>
                    <input name="title" type="summary">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea name="content" id="content"></textarea>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" value="保存添加" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>