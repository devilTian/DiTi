<br/>
<form id="registerForm">
    <div class="row">
        <div class="large-8 small-12 large-centered columns">
            <div class="row">
                <div class="large-3 small-3 columns">
                    <label class="right inline" for="nickname">
                        新昵称
                    </label>
                </div>
                <div class="large-9 small-9 columns">
                    <input type="text" id="nickname" name="nickname"
                        placeholder="<?php echo isset($_SESSEION['nickname']) ? "现昵称: {$_SESSEION['nickname']}" : ''?>"/>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-8 small-12 large-centered columns">
            <div class="row">
                <div class="large-3 small-3 columns"></div>
                <div class="large-9 small-9 columns">
                    <a href="#" id="nickSubmitBtn" class="button tiny">保存</a>
                </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
$(document).foundation().ready(function() {
    $('#nickSubmitBtn').click(function() {
        clearAllErrorClass();
        // validation
        var nickDom = $('#nickname'),
            nickVal = nickDom.val();
        if (false === /^[a-zA-Z0-9_\-\u4E00-\u9FA5]{4,30}$/.test(nickVal)) {
            addErrorClass(nickDom, '请输入4-30个字符，支持中英文、数字、"_"或减号');
            return false;
        }
        $.ajax({
            type: "POST",
            url: 'index.php/login/updateNick',
            data: {
                v: nickVal
            },
            dataType: "JSON",
            success: function(ret) {
            }
        });
    });
});
</script>