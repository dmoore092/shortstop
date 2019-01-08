<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title ?> | Athletic Prospects</title>
      <!--  <link rel="stylesheet" type="text/css" href="assets/css/main.css" /> -->
        <link rel="stylesheet" type="text/css" href="assets/css/main.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/<?php echo $page ?>.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--icon library -->
        <meta http-equiv="content-type" content="text/php; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Dale Moore">
        <meta name="description" content="We strive to provide High School and JUCO athletes the tools to successfully promote themselves to college coaches by assisting athletes through the recruiting process."/>
    </head>
    <body>
<header>
    <?php include ("/var/www/html/assets/inc/search.inc.php"); //on dev server, remove the first /?>
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
                <div id="social-media">
                    <span id="followUS">Follow US </span>
                     <a href="http://www.facebook.com" target="_blank" class="fa fa-facebook"></a>
                    <a href="http://www.twitter.com" target="_blank" class="fa fa-twitter"</a>
                    <a href="http://www.instagram.com" target="_blank" class="fa fa-instagram"></a>
                </div>
                <ul>
                    <?php // var_dump($_SESSION['logged_in']); ?>
                    <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']){ ?>
                    <li id="big-login-button"><a class="link" href="logout.php">Logout</a></li>
                    <?php }else{ ?>
                    <li id="big-login-button"><a class="link" href="login.php">Login</a></li>
                    <?php } ?>
                   <!-- <li id="big-login-button"><a href="login.php">Login</a></li>-->
                </ul>
            </div><!-- #big-login end
           --><div id="search">
                <div id="search-container">
                    <form action='#' method='POST' id="search-form"> 
                        <input id="textbox" type="text" size="50" placeholder= "First or Last Name" name="search">
                        <input id="button" class="searchbtn" type="submit" name= "search-btn" value="Search">
                    </form>
                </div>
            </div>
                <div class="nav">
                    <ul>
                        <li id="mobile-login"><a href="login.php">Login</a></li>
                        <li id="current"><a href="index.php">Home</a></li>
                        <li><a href="<?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']){echo "profile.php?id=".$_SESSION['id'];}else{echo "login.php";}?>">My Profile</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="mathletes.php">Male Athletes</a></li>
                        <li><a href="fathletes.php">Female Athletes</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul><!-- end of #top-bar -->
                </div>
            <div id="logo"><img src="https://cdn3.sportngin.com/attachments/banner_graphic/9705/8066/SiteHeader.png" alt="logo" id="logo-img"></div>
        </header>
