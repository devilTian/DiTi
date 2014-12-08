<?php
$dbh   = new PDO('mysql:dbname=diti;host=192.168.1.103;charset=UTF8', 'spidertianye', 'root');
$notes = $dbh->query('SELECT DATE_FORMAT(t, "%m月%d日 %H:%s") AS t, content, userId FROM notes ORDER BY t DESC')->fetchAll(PDO::FETCH_ASSOC);

if (!empty($_POST['content'])) {
    $content = $_POST['content'];
    if (strlen(utf8_decode($content)) > 200) {
        throw new Exception('超过200个字!');
    }
    $sth = $dbh->prepare('INSERT INTO notes VALUES(CURRENT_TIMESTAMP, ?, 1)');
    $sth->execute(array($content));
    $affectedRow = $sth->rowCount();            
    if ($affectedRow !== 1) {
        throw new Exception('存入新内容时出错!');
    }
    echo json_encode(array('status' => 0));
    return true;
 }
?>
<div class="row">
    <div class="large-6 large-centered small-centered columns">
        <?php foreach($notes as $note) {?>
            <div class="panel callout radius">
                <?php echo $note['content']?>
                <label><?php echo $note['t']?> | <strong><?php echo '田野'?></strong></label> 
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
            url: 'm_note.php',
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

