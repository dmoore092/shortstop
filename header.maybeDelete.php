<?php
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
                <ul>
                    <li id="big-login-button"><a href="login.php">Login</a></li>
                </ul>
            </div><!--
    -->     <div id="search">
                <input id="textbox" type="text" size="30">
                <input id="button" type="button" value="Search">
            </div>
                <div class="nav">
                    <ul>
                        <li id="mobile-login"><a href="login.php">Login</a></li>
                        <li id="current"><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Male Athletes</a></li>
                        <li><a href="#">Female Athletes</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="createaccount.php">Registration</a></li>
                    </ul><!-- end of #top-bar -->
                </div>
            <div id="logo"><img src="https://cdn3.sportngin.com/attachments/banner_graphic/9705/8066/SiteHeader.png" alt="logo" id="logo-img"></div>
        </header>
    ?>