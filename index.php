<?php
// entrace file
?>
<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiTi</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/foundation.css">

    <!-- This is how you would link your custom stylesheet
    <link rel="stylesheet" href="css/app.css"/> -->

    <script src="js/vendor/modernizr.js"></script>
</head>
<body>
    <div class='sticky'>
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
            <ul class="left">
                <li class="divider"></li>
                <li><a href="#">About Me</a></li>
                <li class="divider"></li>
                <li><a href="#">Building</a></li>
                <li class="divider"></li>
                <li><a href="#">Building</a></li>
                <li class="divider"></li> 
                <li><a href="#">Building</a></li>
                <li class="divider"></li>
                <li><a href="#">Building</a></li>
                <li class="divider"></li> 
            </ul>
            </section>
        </nav>       
    </div>
    <section role="main" class="scroll-container">
        <div class="row">
            <div class="large-3 medium-4 columns hide-for-small-only">
                <div>
                <div class="fixed">
                    123
                </div>
                    </div>
            </div>
            <div class="large-9 medium-8 columns">
                <h2>联系方式</h2>
		<hr/>
		<ul>
		    <li>tel:&nbsp;&nbsp; 135-8199-9594</li>
		    <li>mail: spidertianye@gmail.com</li>
		    <li>QQ:&nbsp;&nbsp;619686417</li>
		</ul>
                <h2>个人信息</h2>
		<hr/>
		<ul>
		    <li>田野/男/1986</li>
		    <li>本科/北京联合大学计算机科学与技术专业</li>
		    <li>工作年限: 5年</li>
		    <li>微博: <a href="http://weibo.com/u/2240779113" target="_blank">@田野_DT</a></li>
		    <li>技术博客: <a href="http://deviltian.github.io/DiTi" target="_blank">http://deviltian.github.io/DiTi</a></li>
		    <li>GitHub: <a href="https://github.com/devilTian" target="_blank">https://github.com/devilTian</a></li>
		    <li>期望职位: PHP高级研发工程师, 架构师, DBA</li>
		    <li>期望薪水: 税前月薪14 - 16k, 开发团队过千人的公司可例外</li>
		    <li>期望城市: 北京</li>
		</ul>
                <h2>工作经历</h2>
		<hr/>
		<h3>北京网御星云信息技术有限公司 ( 2012年9月 ~ 至今 )</h3>
		<hr/>
		<h4>网御安全隔离与信息交换系统</h4>
                <p>负责产品web模块的需求收集与分析、架构设计、构建、调试和完成上市后的定制需求。
                    <u>技术方面</u>：弃用之前的c+cgi模式，改为LNMP架构。采用面向过程式设计。
                    将600百万条以上的日志数据的查询速度，从6秒降至0.5秒，此功能也被其他所有产品线引用。
                    <u>团队成长与产品成长</u>：自己组建新团队，招聘人才和组织培训等，新产品上市时，团队增长至7人，获得年度团队奖。新的界面设计与交互方式，让产品三年市场占有率持续保持第一。
                    <u>问题与解决</u>：因业务流程项之间的耦合，在构建时期人员增加导致的代码质量下降。
                    解决方法是1，提取功能之间的公共部分代码封装成函数。2，在代码提交时至少一人review通过。3，将开发规则文档化。
                    改进后，在调试和产品上市后的定制开发中，提高了扩展与维护的速度。
                </p>
                <h4>网御FW防火墙</h4>
                <p>负责重构产品的web模块、公共功能构建、代码调试。
                <u>技术方面</u>：将面向过程式设计重构为面向对象式(MVC)。编写PHP扩展以调用底层C方法。
                <u>团队成长与产品成长</u>：组织学习设计模式和分享读书笔记。团队人数增至8人。
                <u>问题与解决</u>：[TODO] 资源占用问题采用装饰者模式
                </p>
                <h4>网御信息交换平台</h4>
                <p>参与前后端设计讨论会议、CI框架扩展的review、人员招聘。
                <u>技术方面</u>：采用extJs + bootstrap + backbone + CI。对Application/core内代码进行优化。
                <u>团队成长与产品成长</u>：团队人数增至16人。
                <u>问题与解决</u>：
		<h3>联科集团（中国）有限公司 ( 2010年3月 ~ 2012年6月 )</h3>
		<hr/>
		<h4>CHESS(联科高性能计算管理平台)产品</h4>
                <ul>
                    <li>负责集群管理软件中，用户图形界面部分的开发与维护。</li>
                    <li>在新版本开发过程中，不仅负责新功能设计文档的编写，还负责用户图形界面部分的重构、调试和单元测试的编写。为产品规范代码和注释格式，并参与前端设计的实现。</li>
                    <li>维护和编写产品文档，包括用户使用手册，新功能需求设计，bug记录。</li>
                    <li>远程支持售前工程师安装软件，远程解决客户问题。</li>
                </ul>
                
                </dl>
                <h2>开源项目和作品</h2>
		<hr/>
                <h3>开源项目</h3>
                <hr/>
                <h3>技术文章</h3>
                <hr/>
                <h3>演讲和讲义</h3>
                <hr/>
                <h2>技能清单</h2>
		<hr/>
                <h2>读书清单</h2>               
		<hr/>
                <span class="label">PHP</span><p>《PHP和MySQL Web开发》，《深入PHP面向对象、模式与实现》，《PHP Cookbook》，《高性能PHP应用开发》，《PHP语言精粹》。</p>
                <span class="label">MySQL</span><p>Manual， 《MySQL必知必会》</p>
                <span class="label">网站优化</span><p>《高性能网站建设指南》，《构建高性能Web站点-改善性能和扩展规模的具体做法》。</p>
                <span class="label">JavaScript</span><p>《Javascript精粹》，《JavaScript基础教程》，《Javascript权威指南》，《编写可维护的JavaScript》。</p>
                <span class="label">前端</span><p>《HTML5揭秘》，《Bootstrap用户手册》，《精通CSS》， 《CSS基础教程》。</p>
                <span class="label">Linux/Nginx</span><p>《实战Nginx》,《Linux权威指南》，《鸟哥》。</p>
                <span class="label">其他</span><p>《黑客与画家》，《Refactoring,Improving the Design of Existing》，《程序员修炼之道》，《HEAD FIRST设计模式》，《大数据时代》。</p>
                <h2>致谢</h2>
		<hr/>
                <p>感谢您花时间阅读我的简历，期待能有机会和您共事。</p>
            </div>
        </div>
    </section> 
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>     
</html>
