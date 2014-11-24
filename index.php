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
            <ul class="left" id="topmenu">
                <li class="divider"></li>
                <li><a href="#" name="resume">About Me</a></li>
                <li class="divider"></li>
                <li><a href="#" name="healthy">健康</a></li>
                <li class="divider"></li>
                <li><a href="#">Building</a></li>
                <li class="divider"></li>
            </ul>
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
            $('#topmenu>li>a').click(function() {
                var link = $(this).attr('name');
                $.ajax({
                    type: "POST",
                    url: 'controller.php',
                    data: {
                        link: link
                    },
                    dataType: "html",
                    success: function(html) {
                        $('#mainContent').html(html);
                    }
                });
            });
        });
    </script>
</body>     
</html>
