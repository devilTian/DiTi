<div class="row">
    <div class="large-6 large-centered small-centered columns">
        <?php foreach($data['notes'] as $note) {?>
            <div class="panel callout radius">
                <input type="hidden" name="k" value="<?php echo $note['orig_t']?>">
                <h6><?php echo $note['content']?></h6>
                <label><?php echo $note['t']?> | <strong><?php echo $note['nickname'] === null ? '匿名用户' : $note['nickname']?></strong></label>
                <?php if ($data['userId'] === $note['userId']) { ?>
                <ul class="inline-list">
                    <li><a class="del" href="#">删除</a></li>
                    <li><a class="update" href="#">修改</a></li>
                </ul>
                <?php }?>
            </div>
        <?php } ?>
    </div>
    <div class="large-6 large-centered small-centered columns">
        <label>新内容</label>
        <form id="contentForm">
            <input type="hidden" name="k" value=""/>
            <textarea rows="2" name="content" id="content" placeholder="hi, <?php echo $data['nick']?>!说两句～"></textarea>
            <a href="#" class="button tiny radius" id="submitBtn">提交</a>
        </form>
    </div>    
</div>
<script type="text/javascript">
$(document).foundation().ready(function() {
    $('a.del').click(function() {
        var g = $(this).parent().parent().parent();
        $.ajax({
            type: "POST",
            url: 'index.php/notes/del',
            data: {
                k : g.find('[name=k]').val()
            },
            dataType: "JSON",
            success: function(ret) {
                g.remove();
            }
        });
        return false;
    });
    $('a.update').click(function() {
        var txt = $(this).parent().parent().parent().find('h6').text().trim(),
            g   = $(this).parent().parent().parent();
        document.body.scrollTop += 9999; // 滚动到页底
        $('#content').focus().val(txt);
        $('#contentForm').find('[name=k]').val(g.find('[name=k]').val());
        return false;
    })
    $('#submitBtn').click(function() {
        clearAllErrorClass();
        // validation
        var content = $('#content').val(),
            data = {
                content: content
            },
            kDom = $('#contentForm').find('[name=k]'),
            k = kDom.val(),
            url = 'index.php/notes/add';
        if (true === /\d{4}\-\d{2}\-\d{2} \d{2}:\d{2}:\d{2}/.test(k)) {
            data['k'] = k;
            url = 'index.php/notes/update';
        }
        if (content.length > 200) {
            addErrorClass($('#content'), '超过200个字!');
            return false;
        }
        if (content.trim().length === 0) {
            addErrorClass($('#content'), '必填!');
            return false;
        }       
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: "JSON",
            success: function(ret) {
                $('a[name=notes]').trigger('click'); //TODO 
                kDom.val('');
            }
        });
    });
});
</script>