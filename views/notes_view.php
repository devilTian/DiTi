<div class="row">
    <div class="large-6 large-centered small-centered columns">
        <?php foreach($data['notes'] as $note) {?>
            <div class="panel callout radius">
                <?php echo $note['content']?>
                <label><?php echo $note['t']?> | <strong><?php echo $note['nickname']?></strong></label> 
            </div>
        <?php } ?>
    </div>
    <div class="large-6 large-centered small-centered columns">
        <label>新内容</label>
        <form>
            <textarea rows="2" name="content" id="content"></textarea>
            <a href="#" class="button tiny radius" id="submitBtn">提交</a>
        </form>
    </div>    
</div>
<script type="text/javascript">
$(document).foundation().ready(function() {
    function clearAllErrorClass() {
        $('input.error').removeClass('error');
        $('small.error').remove();
    }
    function addErrorClass(dom, errMsg) {
        dom.addClass('error');
        dom.after('<small class="error">' + errMsg + '.</small>');
    }
    $('#submitBtn').click(function() {
        clearAllErrorClass();
        // validation
        var content = $('#content').val();
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
            url: 'index.php/notes/add',
            data: {
                content: content
            },
            dataType: "JSON",
            success: function(ret) {
            }
        });
    });
});
</script>