<?php include("config/pageconfig.php"); session_start(); error_reporting(0); ?>

<?php include('assets/inc/email_reset.php');?>
<?php include('assets/inc/header.inc.php');?>
    <div id="body-main">
        <section>
            <h2 style="text-align: center;">Select a new password below</h2>
            <hr/>
            <form id="player-form"
                    method = "POST"
                    action= "login.php?email=<?php echo $email?>"
                    onsubmit = "" >   
                <h3>
                    Email Address: <?php echo $email ?>
                </h3>
                <p>
                <span class="span">Password:* &nbsp; </span>
                    <input type="password"
                            class = "password"
                            name= "password"
                            size = "25"
                            maxlength = "150"
                            placeholder = "password"
                            value=""
                            required />
                </p>
                <p>
                <span class="span">Retype Password:* &nbsp; </span> 
                    <input type="password"
                            class = "password"
                            name= "retypepassword"
                            size = "25"
                            maxlength = "50"
                            placeholder = "Retype Your Password"
                            value=""
                            required />
                </p>
                <?php if($environment == 'production'){ ?>
                    <div class="g-recaptcha" data-sitekey="6LfGGJEUAAAAAChOm6ZDVpoo3ZbjdUsfwfYT6Omj"></div>
                <?php } ?>
                <input type="submit"
                        value="Update Password"
                        name = "update-password"
                        class="btn-all-buttons"
                        id="btn-reset-password"/>
            </form>
        </section>  
<?php include('assets/inc/footer.inc.php');?>
