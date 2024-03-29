<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $TITLE ?> | Athletic Prospects</title>
        <link rel="stylesheet" type="text/css" href="assets/css/main.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/footer.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/<?php echo $PAGE ?>.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--icon library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- tinyMCE -->
        <script src="https://cdn.tiny.cloud/1/1zjhrkwrkw2rialjg6et20v23vjfauhizzfivbus50azwuhu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <link rel="stylesheet" type="text/css" href="assets/javascript/jqueryui-1.12.1/jquery-ui.css" />
        <script type="text/javascript" src="assets/javascript/jqueryui-1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="assets/javascript/jPaginate/src/jQuery.paginate.js"></script>
        <script src="assets/javascript/inputmask/dist/jquery.inputmask.js"></script>
        <meta http-equiv="content-type" content="text/php; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Dale Moore">
        <meta name="description" content="We strive to provide High School and JUCO athletes the tools to successfully promote themselves to college coaches by assisting athletes through the recruiting process."/>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
<header>
    <?php //require_once('assets/inc/search.inc.php'); ?>
                <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
            <div><a href="javascript:void(0);" class="navicon" onclick="openNav()">Menu</a></div>
                <script>
                    function openNav(){
                        var nav = document.querySelector('.nav');
                        if(nav.style.display === "block"){
                            nav.style.display = 'none';
                        }
                        else{
                            nav.style.display = 'block';
                        }
                    }
                </script>
            <div id="big-login">
                <div class="social-media">
                    <span id="followUS">Follow US </span>
                    <a href="http://www.facebook.com/Athletic-Prospects-191313784947225" target="_blank" class="fa fa-facebook"></a>
                    <a href="http://www.twitter.com/A_Prospects" target="_blank" class="fa fa-twitter"></a>
                    <a href="http://www.instagram.com/athleticprospects" target="_blank" class="fa fa-instagram"></a>
                    <!-- <a href="mailto:kprestano@athleticprospects.com" class="fa fa-envelope"></a> -->
                </div>
                <ul>
                    <?php
                        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']){
                            echo "<li id='big-login-button'><a class='link' href='logout.php'>Logout</a></li>";
                        }
                        else{
                            echo "<li id='big-login-button'><a class='link' href='login.php'>Login</a></li>";
                        }
                    ?>
                   <!-- <li id="big-login-button"><a href="login.php">Login</a></li>-->
                </ul>
            </div><!-- #big-login end
           --><div id="search">
                <div id="search-container">
                    <form action='results.php' method='POST' id="search-form"> 
                        <input id="textbox" type="text" size="50" placeholder= "First or Last Name" name="search">
                        <input id="button" class="searchbtn" type="submit" name="search-btn" value="Search">
                    </form>
                </div>
            </div>
                <div class="nav">
                    <ul>
                        <!-- <li id="mobile-login"><a href="login.php">Login</a></li> -->
                        <?php
                            if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']){
                                echo "<li id='mobile-login'><a class='link' href='logout.php'>Logout</a></li>";
                            }
                            else{
                                echo "<li id='mobile-login'><a class='link' href='login.php'>Login</a></li>";
                            }
                        ?>
                        <li id="current"><a href="index.php">Home</a></li>
                        <li><a href="<?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']){echo "profile.php?id=".$_SESSION['id'];}else{echo "login.php";}?>">My Profile</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="findathletes.php">Find Athletes</a></li>
                       <?php // <li><a href="findcoaches.php">Find Coaches</a></li>
                        //<li><a href="services.php">Services</a></li> ?>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="blog.php">Blog</a></li>
                    </ul><!-- end of #top-bar -->
                </div>
            <div id="logo"><img src="/assets/img/siteLogo.png" alt="logo" id="logo-img"></div>
        </header>
