<?php if ($data === false) { ?>
    <p class="lead">错误</p>
    <p class="main">找不到您想看的书的信息,抱歉啦.</p>
<?php } else { ?>
    <p class="lead"><?php echo $data['name'] ?></p>
    <div class="row">
        <div class="large-2 medium-4 columns hide-for-small-only">
            <img src="img/english/book/<?php echo $data['imgPath'] ?>"/>
        </div>
        <div class="large-10 medium-8 small-12 columns">
            <ul class="vcard">
                <li><span>上传人：</span><a href="#"><?php echo 'Demo Tian' ?></a></li>
                <li><span>所属类别：</span><?php echo $data['category'] ?></li>
                <li><span>课文数：</span><?php echo $data['lessonCount'] ?></li>
                <li><span>免费</span></li>
                <li><span>学习进度：</span><?php echo $data['progress'] . '%' ?></li>
            </ul>
        </div>        
    </div>
    <div class="row">
        <div id="interest_sect_level" class="large-4 medium-6 small-12 columns">
            <?php if($data['state'] === 'N') {?>
            <ul class="button-group radius even-3">
                <li><a href="#" class="tiny button state-w">想读</a></li>
                <li><a href="#" class="tiny button state-r">在读</a></li>
                <li><a href="#" class="tiny button state-c">读过</a></li>
            </ul>
            <?php } else {?>
                <span><?php echo $data['stateCn'] ?></span>
                <div class="range-slider" data-slider
                    data-options="start: 0; end: 5;">
                <span class="range-slider-handle" role="slider" tabindex="0"></span>
                <span class="range-slider-active-segment"></span>
            </div>
            <?php } ?>
        </div>
        <div class="large-8 medium-6 hide-for-small-only columns">
            &nbsp;
        </div>
    </div>
    <span class="bookDescription">内容简介   · · · · · · </span>
    <p class="specBookTxt">
        <?php echo $data['description'] ?>
    </p>
    <span class="bookDescription">书中包含文章 · · · · · · </span>
    <div style='border:solid 1px #209E85;border-radius:5px;width:100%'>
        <?php foreach($data['lessonData'] as $k => $lesson) { 
            if ( $k+1 == $data['lessonCount'] ) {
                echo '<div>';
            } else if ( $k%2 == 0 ) {
                echo "<div class='evenLesson'>";
            } else {
                echo "<div class='oddLesson'>";
            } 
        ?>        
            <div class="row">
                <div class="columns large-8 medium-6 small-12">
                    <strong class='lessonInfoTitle'><?php echo "{$lesson['les_num']}. {$lesson['les_name']}"?></strong>
                </div>
                <div class="columns large-4 medium-6 small-12  large-text-right medium-text-right">
                    <span class='lessonInfoTitle'>分数:
                        <span class="lessonInfoVal"><?php echo empty($lesson['les_score']) ? '-' : $lesson['les_score'] ?></span>                           
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="columns large-6 medium-6 small-12">
                    <span class='lessonInfoTitle'>听过:
                        <span class="lessonInfoVal"><?php echo empty($lesson['count']) ? 0 : $lesson['count'] ?></span>遍
                    </span>
                </div>
                <div class="columns large-6 medium-6 small-12 large-text-right medium-text-right">
                    <span class="lessonInfoTitle">更新:
                        <span class="lessonInfoVal"><?php echo empty($lesson['datetime']) ? '-' : $lesson['datetime'] ?></span>
                    </span>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
<?php } ?>
<!-- footer-->
<div class="row">
    <div class='large-12 small-12 columns gray-link'>
        <span id="icp"> &copy; 2005 - 2012 devilTian.com, all rights reserved </span>
    </div>
</div>
<a class="close-reveal-modal">&#215;</a>
<script type="text/javascript">
    $(document).foundation().ready(function() {
        $("a[class*=state-]").click(function() {
            var data = { id: <?php echo $data['id']?>},
                isValid = true;
            if ($(this).hasClass('state-w')) {
                data['s'] = 'W';
            } else if ($(this).hasClass('state-r')) {
                data['s'] = 'R';
            } else if ($(this).hasClass('state-c')) {
                data['s'] = 'C';
            } else {
                isValid = false;
            }
            if (isValid) {
                $.ajax({
                    url: 'index.php/sentence/modifyBookReadState',
                    data: data,
                    type: 'POST',
                    dataType: "json",
                    success: function(ret) {
                        $('#interest_sect_level').children('ul').hide().end().
                            append('<span>' + ret.msg + '</span>');
                        
                        
                    }
                });
            }
        });
    });
</script>

