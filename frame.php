<?php session_start();?>
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
        <script src="js/angular.min.js"></script>
    </head>
    <body ng-app="myApp">
        <div class="off-canvas-wrap" data-offcanvas>            
			<div class="inner-wrap">
            <nav class="tab-bar" data-topbar role="navigation">
				<section class="left-small">
					<a class="left-off-canvas-toggle menu-icon"><span></span></a>
				</section>
                <section class="middle tab-bar-section">
                    <h1 class="title">DiTi</h1>
				</section>
				<section class="right-small">
					<a class="right-off-canvas-toggle menu-icon"><span></span></a>
				</section>
			</nav>
			<!-- Left Nav Section -->
			<aside class="left-off-canvas-menu">    
				<ul class="off-canvas-list" id="topleftmenu">
					<li><label>DiTi</label></li>
					<li><a href="#" name="resume">About Me</a></li>
					<?php if (!empty($_SESSION['user'])) { ?>
						<li><a href="#" name="healthy">健康</a></li>
						<li><label>英语</label></li>
						<li><a href="#" name="sentence">五百句</a></li>
					<?php } ?>
					<li><a href="#" name="notes">Note</a></li>
				</ul>
			</aside>
			<!-- Right login Section -->
			<aside class="right-off-canvas-menu">
				<ul class="off-canvas-list" id="toprightmenu">
				<?php if (empty($_SESSION['user'])) { ?>
					<li class="login">
						<input type="text" name="username"
							placeholder="请输入用户名" id="username"/>
					</li>
					<li class="login">
						<input type="password" name="password"
							placeholder="请输入密码" id="password"/>
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
					<li class="login">
						<a href="#" class="button tiny" id="loginBtn">登录</a>
					</li>
					<li class="login">
						<a href="#" class="button tiny alert" id="registerBtn">注册</a>
					</li>
				<?php } else { ?>
					<li><label>设置</label></li>
					<li><a href="#" id="accountSetup">账号配置</a></li>
					<li class="login"><a href="index.php/login/logout" id="logout" class="button tiny alert">退出</a>
					</li>
				<?php } ?>
				</ul>
			</aside>
			<section role="main" class="main-section" id="mainContent">
				welcome~
			</section>
			<a class="exit-off-canvas"></a>

			</div>
        </div>
        <script src="js/vendor/jquery.js"></script>
        <script src="js/foundation.min.js"></script>
        <script>
            function clearAllErrorClass() {
                $('input.error').removeClass('error');
                $('small.error').remove();
            }
            function addErrorClass(dom, errMsg) {
                dom.addClass('error');
                dom.after('<small class="error">' + errMsg + '.</small>');
            }
            $(document).foundation().ready(function() {
				$('#mainContent').height($(document).height()-45);
				$('a[href=#]').click(function() {
					$('.exit-off-canvas').trigger('click')
				});
                $('#topleftmenu>li a[name]').click(function() {
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
                    var userDom = $('#username'),
                            pwdDom = $('#password'),
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
                    $.ajax({
                        type: "POST",
                        url: 'index.php/login/showRegisterForm',
                        dataType: "html",
                        success: function(html) {
                            $('#mainContent').html(html);
                        }
                    });
                    return false;
                });
                $('#accountSetup').click(function() {
                    $.ajax({
                        type: "POST",
                        url: 'index.php/login/showAccountSetupForm',
                        dataType: "html",
                        success: function(html) {
                            $('#mainContent').html(html);
                        }
                    });
                    return true;
                });
            });
            
            var myAppModule = angular.module('myApp', []);
            myAppModule.controller('loginController', function($scope) {
                $scope.params = [{name: 'username', cnName: '用户名', type: 'text'},
                                 {name: 'password', cnName: '密码', type:'password'}];
            });
        </script>
    </body>     
</html>
