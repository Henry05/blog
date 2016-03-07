<?php if (!defined('THINK_PATH')) exit();?><dl>
    <dt>友情连接</dt>
    <?php if(is_array($site)): foreach($site as $key=>$v): ?><dd>
            <a href="<?php echo ($v["url"]); ?>" target="_blank"><?php echo ($v["name"]); ?></a>
        </dd><?php endforeach; endif; ?>

</dl>