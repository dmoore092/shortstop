<?php include("config/pageconfig.php"); session_start(); error_reporting(E_ALL); ?>
<?php include_once ("classes/Player.PDO.Class.php"); ?>
<?php include("assets/inc/header.inc.php");?>
<script>
    function checkRegistrationForm(){
        var registrationcode = document.getElementById("registrationcode").value;
        if(registrationcode.toLowerCase() !== "elite prospects"){
            event.preventDefault();
            document.getElementById("registrationcode").style="border:2px solid red";
            document.getElementById("registration-code-error").style="display:block;";
            return false;
        }
        else if(document.getElementById("password1").value !== document.getElementById("password2").value){
            event.preventDefault();
            document.getElementById("password1").style="border:2px solid red";
            document.getElementById("password2").style="border:2px solid red";
            document.getElementById("password-match-error").style="display:block;";
            return false;
        }
        return true;
    } 
</script>
        <div id="body-main">
            <form id="player-form"
                         method = "POST"
                         action= ""
                         onsubmit = "return checkRegistrationForm();" >
                        <h2>Create an Account</h2>
                        <p id="username-error">That email is already in use, please log in</p>
                        <p>
                            <span class="span">Email:* &nbsp; </span>
                            <input type="text"
                                   id = "email"
                                   name= "email"
                                   size = "25"
                                   maxlength = "150"
                                   placeholder = "Enter your email address"
                                   value=""
                                   required />
                        </p>
                        <p id="password-match-error">Passwords do not match. Please try again.</p>
                        <p>
                        <span class="span">Password:* &nbsp; </span>
                            <input type="password"
                                   id="password1"
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
                                   id="password2"
                                   class = "password"
                                   name= "retypepassword"
                                   size = "25"
                                   maxlength = "50"
                                   placeholder = "Retype Your Password"
                                   value=""
                                   required />
                        </p>
                        <p id="registration-code-error">Please enter the correct registration code.<p>
                        <p>
                        <span class="span">Registration Code:* &nbsp; </span> 
                            <input type="text"
                                   class = "password"
                                   name= "registrationcode"
                                   id ="registrationcode"
                                   size = "25"
                                   maxlength = "50"
                                   placeholder = "Enter your registration code"
                                   value=""
                                   required />
                        </p>
                       <?php 
                            //wrapped in php to hide from inspect
                            //<p>
                            //<select name="persontype" id="persontype">
                                //<option value="" selected disabled>I am a...</option>
                                //<option value="player">Player</option>
                                //<option value="coach">Coach</option>
                            //</select>
                        //</p> 
                        ?>
                        <input type="submit"
                               value="Create Account"
                               name = "btnCreate"
                               class="btn-all-buttons"
                               id="btn-create-account"/>
            </form> 
            <p style="text-align:center;margin-top:15px;">Contact <a href="mailto:kprestano@athleticprospects.com">kprestano@athleticprospects.com</a> if you need a registration code</p>     
<?php include("assets/inc/footer.inc.php"); ?>

<?php include("assets/inc/create_account.php"); ?>