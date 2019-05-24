<?php 
    $relpath= ""; $title="Select A New Password"; $page="login";
    $imgpath="";
    $linkpath = "";
    $templinkpath = "";
    session_start();

    //collect info from email link
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    };
    if(isset($_GET['reset'])){
        $resetpassword = $_GET['reset'];
    };
    if(isset($_GET['uname'])){
        $username = $_GET['uname'];
    };

    include('assets/inc/header.inc.php');
?>
    <div id="body-main">
        <section>
            <h2 style="text-align: center;">Select a new password below</h2>
            <hr/>
            <div id="body-main">
                <form id="player-form"
                        method = "POST"
                        action= "login.php?uname=<?php echo $username?>"
                        onsubmit = "" >   
                    <h3>
                        Username: <?php echo $username ?>
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
                    <div class="g-recaptcha" data-sitekey="6LfGGJEUAAAAAChOm6ZDVpoo3ZbjdUsfwfYT6Omj"></div>
                    <input type="submit"
                            value="Update Password"
                            name = "update-password"
                            class="btn-all-buttons"
                            id="btn-reset-password"/>
                </form>
            </div>
        </section>  
    </div>
<?php
    include('assets/inc/footer.inc.php');


    // //reset the users password. From changepassword.php
    // if(isset($_POST['update-password'])){
    //     //makes recaptcha work
    //     if(isset($_POST['g-recaptcha-response'])){
    //         $captcha=$_POST['g-recaptcha-response'];
    //         //captcha failed
    //         if(!$captcha){
    //             echo "<p style='color:red';>Please check the ReCaptcha!</p>";
    //             exit;
    //         }
    //         $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfGGJEUAAAAAFAw4zjaPVM2rlP1HqtQBw05rCek&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
    //         if($response['success'] == false){
    //             echo "<p style='color:red';>ReCaptcha Failed.</p>";
    //         }
    //         //captcha passed
    //         else{
    //             //check the user typed the same password both times
    //             if($_POST["password"] == $_POST['retypepassword']){
    //                 if($_POST['password'] != ""){
    //                     $newpassword = $_POST['password'];
    //                     $result = $playerDB->checkTempPassExpire($username);
    //                     //everything is ready for password change
    //                     if($result == 1){
    //                         $player = new PlayerDB();
    //                         //password is hashed in updatePassword, not here
    //                         $player->updatePassword($username, $newpassword);
    //                     }
    //                 }
    //                 else{
    //                     echo "<p style='color:red;margin-top:25px'>Password cannot be empty, try again</p>";
    //                 }
    //             }
    //             else{
    //                 echo "<p style='color:red;margin-top:25px'>Passwords do not match, try again</p>";
    //             }
    //         }
    //     }  
    // }
?>