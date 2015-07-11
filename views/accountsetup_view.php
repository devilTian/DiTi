<dl class="accordion" data-accordion="">
    <dd>
        <a href="#nicknameDiv">昵称</a>
        <div id="nicknameDiv" class="content">
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
                                   placeholder="<?php echo $data['nick'] ?>"/>
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
        </div>
    </dd>
    <dd>
        <a href="#heightDiv">身高</a>
        <div id="heightDiv" class="content">
            <div class="row">
                <div class="large-8 small-12 large-centered columns">
                    <div class="row">
                        <div class="large-3 small-3 columns">
                            <label class="right inline" for="height">
                                身高
                            </label>
                        </div>
                        <div class="large-9 small-9 columns">
                            <input type="text" id="height" name="height"
                                   placeholder="<?php echo $data['height'] ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="large-8 small-12 large-centered columns">
                    <div class="row">
                        <div class="large-3 small-3 columns"></div>
                        <div class="large-9 small-9 columns">
                            <a href="#" id="heightSubmitBtn" class="button tiny">保存</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </dd>
    <dd>
        <a href="#pwdDiv">修改密码</a>
        <div id="pwdDiv" class="content">
            <div class="row">
                <div class="large-8 small-12 large-centered columns">
                    <div class="row">
                        <div class="large-3 small-3 columns">
                            <label class="right inline" for="oldPwd">
								当前密码
                            </label>
                        </div>
                        <div class="large-9 small-9 columns">
                            <input type="password" id="oldPwd" name="oldPwd"
								placeholder="请输入现在使用的账户密码."/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="large-8 small-12 large-centered columns">
                    <div class="row">
                        <div class="large-3 small-3 columns">
                            <label class="right inline" for="newPwd">
								新密码
                            </label>
                        </div>
                        <div class="large-9 small-9 columns">
                            <input type="password" id="newPwd" name="newPwd"
								placeholder="请输入新设置的账户密码."/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="large-8 small-12 large-centered columns">
                    <div class="row">
                        <div class="large-3 small-3 columns">
                            <label class="right inline" for="cnfPwd">
								确认密码
                            </label>
                        </div>
                        <div class="large-9 small-9 columns">
                            <input type="password" id="cnfPwd" name="cnfPwd"
								placeholder="请再次输入新密码."/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="large-8 small-12 large-centered columns">
                    <div class="row">
                        <div class="large-3 small-3 columns"></div>
                        <div class="large-9 small-9 columns">
                            <a href="#" id="pwdSubmitBtn" class="button tiny">保存</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </dd>
</dl>
<script type="text/javascript">
$(document).foundation().ready(function() {
    $('#nickSubmitBtn').click(function() {
        clearAllErrorClass();
        // validation
        var nickDom = $('#nickname'),
            nickVal = nickDom.val();
        if (false === <?php echo $data['regexp']?>.test(nickVal)) {
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
                if (ret.status === 0) {
                    $('#accountSetup').trigger('click');
                }
            }
        });
    });
    $('#heightSubmitBtn').click(function() {
        clearAllErrorClass();
        // validation
        var heightDom = $('#height'),
            heighVal = heightDom.val();
        if (false === /\d{1,3}/.test(heighVal)) {
            addErrorClass(heightDom, '身高范围1-999');
            return false;
        }
        $.ajax({
            type: "POST",
            url: 'index.php/login/updateHeight',
            data: {
                v: heighVal
            },
            dataType: "JSON",
            success: function(ret) {
                if (ret.status === 0) {
                    $('#accountSetup').trigger('click');
                }
            }
        });
    });
    $('#pwdSubmitBtn').click(function() {
        clearAllErrorClass();
        // validation
        var oldPwdDom = $('#oldPwd'),
			newPwdDom = $('#newPwd'),
			cnfPwdDom = $('#cnfPwd'),
            oldVal    = oldPwdDom.val().trim(),
            newVal    = newPwdDom.val().trim(),
            cnfVal    = cnfPwdDom.val().trim();
		if (false === /^.{6,16}$/.test(oldVal)) {
			$msg = '请输入6-16位数字、字母或常用符号, 字母区分大小写';
            addErrorClass(oldPwdDom, $msg);
            return false;
		}
		if (false === /^.{6,16}$/.test(newVal)) {
			$msg = '请输入6-16位数字、字母或常用符号, 字母区分大小写';
            addErrorClass(newPwdDom, $msg);
            return false;
		}
        if (cnfVal !== newVal) {
            addErrorClass(cnfPwdDom, '两次输入的密码不匹配');
            return false;
        }
        $.ajax({
            type: "POST",
            url: 'index.php/login/changePassword',
            data: {
                o : oldVal,
				n : newVal
            },
            dataType: "JSON",
            success: function(ret) {
                if (ret.status === 0) {
					alert('密码修改成功!请用新密码登录.');
					window.location.href = "index.php/login/logout";
                } else {
					alert('密码修改失败!');  // [TODO]
				}
            }
        });
    });
});
</script>
