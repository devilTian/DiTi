<?php session_start(); ?>
<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>DiTi</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/foundation.css">

    <!-- This is how you would link your custom stylesheet-->
    <link rel="stylesheet" href="css/app.css"/>

    <script src="js/vendor/modernizr.js"></script>
</head>
<body>
    <div class=''>
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="#">DiTi</a></h1>
                </li>
                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
            </ul>

            <section class="top-bar-section">    
            <!-- Left Nav Section -->
            <ul class="left" id="topmenu">
                <li class="divider"></li>
                <li><a href="#" name="resume">About Me</a></li>
                <li class="divider"></li>
                <li><a href="#" name="healthy">健康</a></li>
                <li class="divider"></li>
                <li><a href="#" name="notes">Note</a></li>
                <li class="divider"></li>
                <li><a href="#">Building</a></li>
                <li class="divider"></li>
            </ul>
			<?php if(empty($_SESSION['user'])) { ?>
			<!-- Right login Section -->
			<ul class="right" id="loginDiv">
				<form>
				<li class="has-form">
					<div class="row collapse">
						<div class="large-12 small-12 columns">
							<input type="text" name="username" id="username"
								placeholder="用户名">
						</div>
				</li>
				<li class="has-form">
					<div class="row collapse">
						<div class="large-12 small-12 columns">
							<input type="text" name="password" id="password"
								placeholder="密码">
						</div>
					</div>
				</li>
				<!--
				<li class="has-form">
					<ul class="inline-list">
						<li>
							<label class="white" for="remember">
							<input type="checkbox" id="remember"/>
							记住我</label>
						</li>
						<li>
							<a href="#">忘记密码</a>
						</li>
					</ul>
				</li>
				-->
				<li class="has-form">
					<a href="#" class="button" id="loginBtn">登录</a>
				</li>
				<li class="has-form">
					<a href="#" class="button alert" id="registerBtn">注册</a>
				</li>
				</form>
			</ul>
			<?php } ?>
            </section>
        </nav>       
    </div>
    <section role="main" class="scroll-container" id="mainContent">
        Welcome~
    </section> 
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
		
        $(document).foundation().ready(function() {
            
			function clearAllErrorClass() {
				$('input.error').removeClass('error');
				$('small.error').remove();
			}
			function addErrorClass(dom, errMsg) {
				dom.addClass('error');
				dom.after('<small class="error">' + errMsg + '.</small>');
			}
		    $('#topmenu>li>a').click(function() {
                var link = $(this).attr('name');
                $.ajax({
                    type: "POST",
                    url: 'index.php/' + link,
                    dataType: "html",
                    success: function(html) {
                        $('#mainContent').html(html);
                    }
                });
            });
			$('#loginBtn').click(function() {
				clearAllErrorClass();
				var userDom  = $('#username'),
					pwdDom   = $('#password'),
					username = userDom.val().trim(),	
					password = pwdDom.val().trim();
				if (username.length === 0) {
					addErrorClass(userDom, '用户名不能为空!');
				} else if (password.length === 0) {
					addErrorClass(pwdDom, '密码不能为空!');
				} else {
					$.ajax({
						type: "POST",
						url: 'index.php/login',
						dataType: "JSON",
						data: {
							u: username,
							p: password  // [TODO] encrypt
						},
						success: function(ret) {
							if ('success' === ret.msg) {
								window.location.reload();
							} else {
								userDom.focus();
								addErrorClass(userDom, ret.msg);
							}
						}
					});
				}
				return false;
			});
			$('#registerBtn').click(function() {
				clearAllErrorClass();
				return false;
			});
        });
    </script>
</body>     
</html>
