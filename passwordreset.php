<?php 
        error_reporting(0);
      $relpath= ""; $title="Reset my password"; $page="passwordreset";
      $imgpath="";
      $linkpath = "";
      $templinkpath = "";
      session_start();
      //test

      include('assets/inc/header.inc.php');
?>
<div id="body-main">
    <h2>Change your password</h2>
            <form id="password-change"
                         method = "POST"
                         action= ""
                         onsubmit = "" >

                        <p>
                            <span class="span">Current Password: &nbsp; </span>
                            <input type="password"
                                    class = "pword-reset-inputs"
                                   id = "currentpassword"
                                   name= "currentpassword"
                                   size = "25"
                                   maxlength = "150"
                                   placeholder = ""
                                   value=""
                                   onclick="" />
                        </p>
                        <p>
                            <span class="span">New Password: &nbsp; </span>
                            <input type="password"
                                   class = "pword-reset-inputs"
                                   name= "newpassword"
                                   size = "25"
                                   maxlength = "150"
                                   placeholder = ""
                                   value=""
                                   onclick="" />
                        </p>
                        <p>
                        <span class="span">Retype New Password: &nbsp; </span>
                        <input type="password"
                                    class = "pword-reset-inputs"
                                   name= "newpasswordagain"
                                   size = "25"
                                   maxlength = "150"
                                   placeholder = ""
                                   value=""
                                   onclick="" />
                        </p>
                        <button type="submit" name="updatepassword" class="btn-all-buttons" id="btn-update">Update</button>
                <?php 

            ?> 
            </form>
<?php 
            $player = new PlayerDB();

            if(isset($_POST["updatepassword"])){
                $username = $_SESSION["username"];
                
                if($_POST['newpassword'] == $_POST['newpasswordagain']){
                    if($_POST['newpassword'] != ""){
                        $currentpassword = $_POST["currentpassword"];
                    
                        if($player->checkPassword($username, $currentpassword)){
                            //echo "success!";
                            $newpassword = $_POST['newpassword'];
                            $player->updatePassword($username, $newpassword);
                        }
                    }
                    else{
                        echo "<p style='color:red;margin-top:25px'>Password cannot be empty, try again</p>";
                    }
                }
                else{
                    echo "<p style='color:red;margin-top:25px'>Passwords do not match, try again</p>";
                };
                //$success = $player->updatepassword($oldpassword, $newpassword);
            }

include('assets/inc/footer.inc.php'); 

?>