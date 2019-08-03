<?php include("config/pageconfig.php"); session_start(); error_reporting(0); ?>
<?php include("classes/Player.PDO.Class.php");?>
<?php include('assets/inc/do_login.php'); ?>
<?php include('assets/inc/header.inc.php'); ?>
        <div id="body-main">
            <form id="player-form"
                    method = "POST"
                    action= ""
                    onsubmit = "" >
                <h2>Login</h2>
                <!-- <span class="span">First Name:* &nbsp; </span> -->
                <input type="text"
                        id = "username"
                        name= "username"
                        placeholder = "Enter Your Username" />
                <!-- <span class="span">First Name:* &nbsp; </span> -->
                <input type="password"
                        class = "password"
                        name= "password"
                        placeholder = "Password"
                        value=""
                        onclick="" />
                <button type="submit" name="login" class="btn-all-buttons" id="btn-login">Login</button>
                <a href = "register.php" style="text-decoration:none"><input type="button" class="btn-all-buttons" id="btn-create-account" value="Register" /></a>
                <br/>
                <a href = "recover.php" style="text-decoration:none">Reset My Password..</a>
            </form>
<?php include('assets/inc/password_reset_actual.php'); ?>
<?php include('assets/inc/footer.inc.php'); ?>

