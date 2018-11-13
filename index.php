
<?php $relpath= ""; $title="home"; $page="home";
      $imgpath="";
      $linkpath = "";
      $templinkpath = "";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Athletic Prospects</title>
      <!--  <link rel="stylesheet" type="text/css" href="assets/css/main.css" /> -->
        <link rel="stylesheet" type="text/css" href="assets/css/mobile.css" />
        <meta http-equiv="content-type" content="text/php; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div id="search">
                <input id="textbox" type="text" size="30">
                <input id="button" type="button" value="Search">
            </div>
                <div class="nav">
                    <ul>
                        <li id="login"><a href="login.php">Login</a></li>
                        <li id="current"><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Male Athletes</a></li>
                        <li><a href="#">Female Athletes</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="createaccount.php">Registration</a></li>
                    </ul><!-- end of #top-bar -->
                </div>
            <div id="logo"><img src="https://cdn3.sportngin.com/attachments/banner_graphic/9705/8066/SiteHeader.png" alt="logo" id="logo"></div>
        </header>
        <div id="body-main">
            <div id="center-area">
                <img src="https://via.placeholder.com/400x250" >
                <img src="https://via.placeholder.com/400x250" >
            </div>
            <div id="content">
                <section>
                    <h2>At Athletic Prospects</h2>
                    <p>We strive to provide High School and JUCO athletes the tools to successfully promote themselves to college coaches by assisting athletes through the recruiting process. Our goal is to be a mentor-leader to athletes to teach them the importance of academics and athletics while showing strong leadership characteristics to be successful on and off the field.</p>
                </section>
                <article>
                    <p> ARTICLE - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras efficitur quis risus nec accumsan. Curabitur varius sapien quam, fringilla tristique leo pellentesque et. In lorem neque, ultrices at egestas quis, interdum nec purus. Nunc commodo tincidunt arcu et consectetur. Morbi iaculis posuere odio vel aliquet. In porta mattis consectetur. Donec vehicula, ante eu cursus gravida, libero sapien placerat neque, quis luctus ipsum est eget felis. Morbi efficitur nisl nec odio euismod, nec varius lorem suscipit. Sed erat lectus, sagittis nec velit eu, bibendum luctus magna. Etiam vehicula enim vel odio cursus commodo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras efficitur quis risus nec accumsan. Curabitur varius sapien quam, fringilla tristique leo pellentesque et. In lorem neque, ultrices at egestas quis, interdum nec purus. Nunc commodo tincidunt arcu et consectetur.</p>
                </article>
                </div><!-- end of #content -->
            <aside>
                    <img src="https://via.placeholder.com/300x500" >
                </aside>
            <footer>
                <p>&copy; 2018 Athletic Prospects</p>
            </footer>
            </div><!-- end of #body-main -->
    </body>
</html>
