<?php
// entrace file
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                <li><a href="#">早餐供给</a></li>
                <li class="divider"></li>
                <li><a href="#">页面3</a></li>
                <li class="divider"></li> 
                <li><a href="#">页面4</a></li>
                <li class="divider"></li>
                <li><a href="#">页面5</a></li>
                <li class="divider"></li> 
            </ul>
            </section>
        </nav>       
    </div>
    <section role="main" class="scroll-container">
        <div class="row">
            <div class="large-3 medium-4 columns hide-for-small-only">
                12312312312
            </div>
            <div class="large-9 medium-8 columns">
                <h1>关于我</h1>
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