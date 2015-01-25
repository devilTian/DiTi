<?php if ($data === false) { ?>
    <p class="lead">错误</p>
    <p class="main">找不到您想看的书的信息,抱歉啦.</p>
<?php } else { ?>
    <p class="lead"><?php echo $data['name'] ?></p>
    <p>
        <ul class="vcard">
            <li><span>上传人：</span><a href="#"><?php echo 'Demo Tian'?></a></li>
            <li><span>所属类别：</span><?php echo $data['category'] ?></li>
            <li><span>课文数：</span><?php echo $data['lessonCount'] ?></li>
            <li><span>免费</span></li>
            <li><span>学习进度：</span><?php echo $data['progress']. '%'?></li>
        </ul>        
    </p>
    <p>
        <?php echo $data['description'] ?>
    </p>
<?php } ?>
<a class="close-reveal-modal">&#215;</a>

