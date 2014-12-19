<br/>
<form id="registerForm">
    <div class="row">
        <div class="large-8 small-12 large-centered columns">
            <div class="row">
                <div class="large-3 small-3 columns">
                    <label class="right inline" for="username">
                        帐号
                    </label>
                </div>
                <div class="large-9 small-9 columns">
                    <input type="text" placeholder="邮箱/QQ/手机号"
                           id="username_reg" name="username"/>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-8 small-12 large-centered columns">
            <div class="row">
                <div class="large-3 small-3 columns">
                    <label class="right inline" for="username">
                        密码
                    </label>
                </div>
                <div class="large-9 small-9 columns">
                    <input type="password" id="password_reg" name="password"/>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-8 small-12 large-centered columns">
            <div class="row">
                <div class="large-3 small-3 columns"></div>
                <div class="large-9 small-9 columns">
                    <a href="#" id="registerSubmitBtn" class="button tiny">立即注册</a>
                </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
$(document).foundation().ready(function() {
    $('#registerSubmitBtn').click(function() {
        clearAllErrorClass();
        // validation
        var uDom = $('#username_reg'),
            pDom = $('#password_reg'),
            username = uDom.val(),
            password = pDom.val();
        if (false === /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/.test(username) &&
            false === /^\d{11}$/.test(username) &&
            false === /^[1-9][0-9]{4,14}$/.test(username)) {
            addErrorClass(uDom, '用户名错误');
            return false;
        }
        if (false === /^.{6,16}$/.test(password)) {
            addErrorClass(pDom,
                '请输入6-16位数字、字母或常用符号, 字母区分大小写');
            return false;                
        }
        $.ajax({
            type: "POST",
            url: 'index.php/login/register',
            data: {
                u: username,
                p: password
            },
            dataType: "JSON",
            success: function(ret) {
                if (ret.status === 0) {
                    window.location.reload();
                }
            }
        });
    });
});
</script>