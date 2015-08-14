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
        <link rel="stylesheet" href="css/foundation-icons.css">
        <!-- This is how you would link your custom stylesheet-->
        <link rel="stylesheet" href="css/app.css"/>

        <script src="js/vendor/modernizr.js"></script>
        <script src="js/angular.min.js"></script>
        <script src="js/mm-foundation-tpls-0.6.0.min.js"></script>        
    </head>
    <body ng-app="myApp">
        <div class="off-canvas-wrap">            
            <div class="inner-wrap" ng-controller="menuController" >
				<top-bar class="top-bar hide-for-small" data-topbar role="navigation">
					<ul class="title-area">
						<li class="name">
							<h1><a href="#">DiTi</a></h1>
						</li>
						<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
						<li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
					</ul>
					<top-bar-section class="top-bar-section">    
						<!-- Left Nav Section -->
						<ul class="left menu" id="topmenu">
							<li parent-dropdown="{{item.children.length}}" has-dropdown ng-repeat="item in topMenuData">
								<a href="#" ng-bind="item.name" ng-click="item.children.length > 0 ? false : request(item.link)"></a>
								<ul top-bar-dropdown ng-if="item.children.length > 0">
									<li ng-repeat="child in item.children">
										<a href="#" ng-bind="child.name" ng-click="request(item.link+'/'+child.link)"></a>
									</li>
								</ul>
							</li>
						</ul>
						<!-- Right login Section -->
						<ul ng-if="!isLogin" class="right menu" id="loginDiv">
							<li class="has-form">
								<div class="row collapse">
									<div class="large-12 small-12 columns">
								<input type="text" name="username" ng-model='loginform.user'
									   placeholder="请输入用户名" id="username"/>
								</div>
							</li>
							<li class="has-form">
								<div class="row collapse">
									<div class="large-12 small-12 columns">
								<input type="password" name="password" ng-model='loginform.pwd'
									   placeholder="请输入密码" id="password"/>
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
								<a href="#" class="button"
									ng-click='checkUserAndPwd()'
									id="loginBtn">登录</a>
							</li>
							<li class="has-form">
								<a href="#" class="button alert"
									ng-click='register()'
									id="registerBtn">注册</a>
							</li>
						</ul>
						<ul ng-if="isLogin" class="right menu" id="loginDiv">
							<li has-dropdown>
								<a href="#">设置</a>
								<ul top-bar-dropdown>
									<li><a ng-click="request('login/showAccountSetupForm')"
										href="#" id="accountSetup">账号配置</a></li>
								</ul>
							</li>
							<li class="divider"></li>
							<li class="has-form">
								<a ng-href="index.php/login/logout"
									id="logout" class="button alert">退出</a>
							</li>
							<li class="divider"></li>
						</ul>
					</top-bar-section>
				</top-bar>
				
				<!-- Left Nav Section -->
				<nav class="tab-bar show-for-small">
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
				<aside class="left-off-canvas-menu">    
					<ul class="off-canvas-list" id="topleftmenu">
						<li><label>DiTi</label></li>
						<li ng-repeat="item in sideMenuData">
							<label ng-if="item.hasChild" ng-bind="item.name"></label>
							<a ng-if="!item.hasChild"
								href="#" ng-bind="item.name"
								ng-click="request(item.link)"></a>
						</li>
					</ul>
				</aside>
				<!-- Right login Section -->
				<aside class="right-off-canvas-menu">
					<ul ng-if="!isLogin" id="rightSideDiv">
						<li class="login">
							<input type="text" name="username" ng-model='loginform.user'
							   placeholder="请输入用户名" id="username"/>
						</li>
						<li class="login">
							<input type="password" name="password" ng-model='loginform.pwd'
							   placeholder="请输入密码" id="password"/>
						</li>
						<li class="login has-form">
							<a href="#" class="button"
								ng-click='checkUserAndPwd()'
								id="loginBtn">登录</a>
						</li>
						<li class="has-form login">
							<a href="#" class="button alert"
								ng-click='register()'
								id="registerBtn">注册</a>
						</li>
					</ul>
					<ul ng-if="isLogin" id="rightSideDiv">
						<li><label>设置</label></li>
						<li><a ng-click="request('login/showAccountSetupForm')"
							href="#" id="accountSetup">账号配置</a></li>
						<li>
							<a ng-href="index.php/login/logout"
								id="logout" class="button alert">退出</a>
						</li>
					</ul>
					<ul id="offCanvasFlag" class="off-canvas-list"></ul>
				</aside>
				<section role="main" class="main-section" id="mainContent">
					<div class="columns" style="height: 500px">
						<p>Welcome~</p>
					</div>
				</section>    
				<a class="exit-off-canvas"></a>
            </div>
        </div>
        <script src="js/vendor/jquery.js"></script>
        <script src="js/foundation.min.js"></script>
        <script>
            var myAppModule = angular.module('myApp', ['mm.foundation']);
            myAppModule.directive('parentDropdown', function() {
                return {
                    link : function(scope, element, attrs) {
                        if (attrs.parentDropdown === '0') {
                            $(element).removeAttr('has-dropdown').removeClass('has-dropdown');
                        }
                    }
                };
            });
            myAppModule.controller('menuController', function($scope, $http) {
                $scope.isLogin      = false;
                $scope.topMenuData  = [];
                $scope.sideMenuData = [];
                $scope.loginform    = {
                    "user" : '',
                    "pwd"  : ''
                };
                $scope.request = function(link) {
                    $http({
                        method  : 'POST',
                        url     : 'index.php/' + link,
                        headers : {"content-type" : 'application/json'}
                    }).success(function(html) {
                        $('#mainContent').html(html);
						$('#offCanvasFlag').trigger('click');
                    });
                };
                $scope.clearAllErrorClass = function() {
                    $('input.error').removeClass('error');
                    $('small.error').remove();
                };
                $scope.addErrorClass = function(dom, errMsg) {
                    dom.addClass('error');
                    dom.after('<small class="error">' + errMsg + '.</small>');
                };
                $scope.checkUserAndPwd = function() {
                    $scope.clearAllErrorClass();
                    if ($scope.loginform.user === '') {
                        //$scope.addErrorClass(userDom, '用户名不能为空!');
                    } else if ($scope.loginform.pwd === '') {  // [TODO] encrypt
                        //$scope.addErrorClass(pwdDom, '密码不能为空!');
                    } else {
                        $http({
                            method   : 'POST',
                            url      : 'index.php/login',
                            headers : {"content-type" : 'application/json'},
                            data     : $scope.loginform,
                        }).success(function(ret) {
                            if ('success' === ret.msg) {
                                window.location.reload();
                            } else {
                                userDom.focus();
                                addErrorClass(userDom, ret.msg);
                            }
                        });
                    }
                };
				$scope.register = function() {
                    $scope.clearAllErrorClass();
					$http({
						method : 'POST',
						url    : 'index.php/login/showRegisterForm'
					}).success(function(html) {
						$('#mainContent').html(html);
						$('#offCanvasFlag').trigger('click');
					});
				};
                // Get mene data.
                $http({
                    method  : 'POST',
                    url     : 'index.php/layout/getNavigationData',
                    headers : {"content-type" : 'application/json'}
                }).success(function(data) {
                    var tempTopMenu = [], tempSideMenu = [], id, pid, clone;
                    data.data.forEach(function(v) {
                        id    = parseInt(v.id);
                        pid   = parseInt(v.pid);
					    clone = jQuery.extend({}, v);
                        if (pid === -1) {  // level 1
                            if(v.link === 'login') {
                                $scope.isLogin = true;
                            } else {
								tempSideMenu[id] = clone;
								tempTopMenu[id]  = v;
								tempTopMenu[id]['children'] = [];
                            }                            
                        } else {  // level 2
							clone.link = tempSideMenu[pid]['link'] + '/' +
								clone.link;
							tempSideMenu[pid]['hasChild'] = true;
                            tempSideMenu.splice(pid+1, 0, clone);
                            tempTopMenu[pid]['children'].push(v);
                        }
                    }); console.info(tempSideMenu);
                   tempTopMenu.forEach(function(v) {
                        $scope.topMenuData.push(v);
                    });
                    tempSideMenu.forEach(function(v) {
                        $scope.sideMenuData.push(v);
                    });
                });
				$scope.$watch(function() {
					return $('#rightSideDiv li').length;
				}, function() {
					$('#rightSideDiv').addClass('off-canvas-list');
				});
            });
            $(document).ready(function() {
                $(document).foundation();
            });
        </script>
    </body>     
</html>
