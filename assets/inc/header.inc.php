
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title ?> | Athletic Prospects</title>
      <!--  <link rel="stylesheet" type="text/css" href="assets/css/main.css" /> -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
        <meta http-equiv="content-type" content="text/php; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Dale Moore">
    </head>
    <body>
<header>
                <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
            <div style="background-color:black;"><a href="javascript:void(0);" class="navicon" onclick="openNav()">Menu</a></div>
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
                <a href="http://www.facebook.com" target="_blank"><img src="assets/img/fbbutton.png" alt="facebook" id="fb"></a>
                <a href="http://www.twitter.com" target="_blank"><img src="assets/img/twitterbutton.png" alt="twitter" id="twit"></a>
                <ul>
                    <li id="big-login-button"><a href="login.php">Login</a></li>
                </ul>
            </div><!-- #big-login end
           --><div id="search">
                <div id="search-container">
                    <input id="textbox" type="text" size="30">
                    <input id="button" type="button" value="Search">
                </div>
            </div>
                <div class="nav">
                    <ul>
                        <li id="mobile-login"><a href="login.php">Login</a></li>
                        <li id="current"><a href="index.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="mathletes.php">Male Athletes</a></li>
                        <li><a href="fathletes.php">Female Athletes</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul><!-- end of #top-bar -->
                </div>
            <div id="logo"><img src="https://cdn3.sportngin.com/attachments/banner_graphic/9705/8066/SiteHeader.png" alt="logo" id="logo-img"></div>
        </header>
