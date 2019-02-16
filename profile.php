<?php 
        error_reporting(0);
        session_start();

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require './PHPMailer/src/Exception.php';
        require './PHPMailer/src/PHPMailer.php';
        require './PHPMailer/src/SMTP.php';

        $title="Profile"; $page="profile";
        include_once ("classes/Player.PDO.Class.php");

        $playerDB = new PlayerDB();     

        include ("assets/inc/header.inc.php");
        
        $id=$_GET['id'];
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
            //echo "logged in set";
            if ($_SESSION['id'] == $_GET['id']) {  
                echo $playerDB->getMyInfo($id);
                echo "<script>
                        function doubleCheck(e){
                            if(!confirm('are you sure?')) e.preventDefault();
                        }
                    </script>";
                echo "<script>document.getElementById('edit-img').style.display='inline-block'</script>";
            }
            else{
                //echo "logged in, but username should be passed through from mathelete/fathelete";
                echo $playerDB->getMyInfo($id);
            } 
        }
        else {
            //echo "not logged in, username should be passed through";
            //$id = $_GET["id"];
            echo $playerDB->getMyInfo($id);
        //     echo "<h2 id='nologin'>You must be logged in to see your info</h2>";
        //     echo "<a href='login.php' class='redirect-link'>Login</a>'";
        //     header("Location: login.php");
        }

        if(isset($_POST['admin-search'])){
            //echo "search triggered";
            if(isset($_POST['admin-search'])){
                $name       = $playerDB->sanitize($_POST['name']);
                $sport      = $_POST['sport'];
                $state      = $_POST['state'];
                $class      = $_POST['class'];
                $position   = $playerDB->sanitize($_POST['position']);
                $school     = $playerDB->sanitize($_POST['school']);
                $gpa        = $_POST['gpa'];
                
                $arr = array();
                if($name != "") $arr[] = "name LIKE '%{$name}%'";
                if($sport != "") $arr[] = "sport = '{$sport}'";
                if($state != "") $arr[] = "state = '{$state}'";
                if($class != "") $arr[] = "gradyear = '{$class}'";
                if($position != "") $arr[] = "primaryposition LIKE '%{$position}%'";
                if($school != "") $arr[] = "highschool LIKE '%{$school}%'";
                if($gpa != "") $arr[] = "gpa >= '{$gpa}'";
        
                if($name == "" && $sport == "" && $state == "" && $class == "" && $position == "" && $school == "" && $gpa == "" ){
                    $query = "SELECT id, name, highschool, gradYear, sport, primaryPosition FROM players WHERE persontype = 'player' OR persontype = 'coach';";
                }
                else{
                    $query = "SELECT id, name, sport, email, persontype FROM players WHERE ";
                    $query .= implode(" AND ", $arr);
                    $query .= " AND persontype = 'player' OR persontype = 'coach';";
                }
                //$data = $playerDB->searchPlayers($srch);
                $data = $playerDB->getPlayersByFindAthleteSearch($query);
                //header("Location: results.php?".http_build_query($data));
                echo $playerDB->getPlayersAsTableasAdmin($data);
                //var_dump($data);
                echo $playerDB->getPlayersWhileAdminMobile($data);
           }
         };

        include("assets/inc/footer.inc.php"); 
        
        if(isset($_POST['report'])){
            //MAIL
            // $id=$_POST["playerid"];
            // $to = "dmoore092@gmail.com";
            // $subject = "AthleticProspects.com Post Reported";
            // $message = "<body><a href='www.dmwebdev.net/profile.php?id=".$id."'>A user has reported a post for inappropriate images, video, or content</body></a>";
            // $headers = "MIME-Version: 1.0" . "\r\n";
            // $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            // $headers .= "From: webmaster@dmwebdev.net" . "\r\n" .
            //             "Reply-To: dmoore092@gmail.com" . "\r\n" .
            //             "X-Mailer: PHP/" . phpversion();
            
            //MAILGUN
            // $oldpath = getcwd();
            // chdir("./mailgun-php");
            // $msg = "./swaks --auth --server smtp.mailgun.org --au postmaster@sandbox448969da9f4d4c26bb11056f71517f71.mailgun.org --ap 4c4ddadc26f0cfb5687e5420c0356338-1b65790d-30158b40 --to dmoore092@gmail.com --h-subject: 'User Reported Profile' --body 'A user has reported a profile for inappropriate images, video, or content. 'www.dmwebdev.net/profile.php?id=".$id."'' 2>&1";
            // $output = exec($msg);
            // chdir($oldpath);
            // echo "<script>alert('Account reported.');</script>";

            //PHPMailer
            $mail = new PHPMailer(true); 
            
            try {
                //Server settings
                $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'dmoore092@gmail.com';                 // SMTP username
                $mail->Password = 'Google@ccess2';                           // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
            
                //Recipients
                $mail->setFrom('webmaster@athleticprospects.com', 'Inappropriate Profile Report');
                $mail->addAddress('dmoore092@gmail.com', 'Dale');     // Add a recipient
                //$mail->addAddress('ellen@example.com');               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');
            
                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'test';
                $mail->Body    = "A user has reported a profile for inappropriate images, video, or content. <a href='www.dmwebdev.net/profile.php?id=".$id."'>Click Here.</a>";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
            
        };

        if(isset($_POST['delete'])){
            $id=$_POST["playerid"];
            $playerDB->delete($id);
        };


        // Handles all form data from myinfo.php
        if(isset($_POST['updateUserInfo'])) {
            //echo "update being attempted";
        echo "<meta http-equiv='refresh' content='0'>";//force page refresh
          $updateArray = array();
          if(isset($_SESSION['id'])){
              $myId = $_SESSION['id'];
              //var_dump($_POST);
              $updateArray['id'] = $_SESSION['id'];
              if(isset($_POST['name'])){
                  //echo $_POST['name'];
                  if($playerDB->isAlphaNumeric($_POST['name']) != 0){
                      $updateArray['name'] = $playerDB->sanitize($_POST['name']);
                  }
              }
              if(isset($_POST['username'])){
                  if($playerDB->isAlphaNumeric($_POST['username']) != 0){
                      $updateArray['username'] = $playerDB->sanitize($_POST['username']);
                  }
              }

              if(isset($_POST['gender'])){
                if($playerDB->isMaleOrFemale($_POST['gender']) != 0){
                    $updateArray['gender'] = $playerDB->sanitize($_POST['gender']);
                }
              }
              
              if(isset($_POST['email'])){
                if($playerDB->isValidEmail($_POST['email']) != 0){
                    $updateArray['email'] = $playerDB->sanitize($_POST['email']);
                }
              }

              if(isset($_POST['cellPhone'])){
                  if($playerDB->isValidPhone($_POST['cellPhone']) != 0){
                      $updateArray['cellPhone'] = $playerDB->sanitize($_POST['cellPhone']);
                  }
              }

              if(isset($_POST['homePhone'])){
                if($playerDB->isValidPhone($_POST['homePhone']) != 0){
                    $updateArray['homePhone'] = $playerDB->sanitize($_POST['homePhone']);
                }
              }
              
              if(isset($_POST['address'])){
                //if($playerDB->isAlphaNumeric($_POST['address']) != 0){
                    $updateArray['address'] = $playerDB->sanitize($_POST['address']);
                //}
              }

              if(isset($_POST['city'])){
                if($playerDB->isAlphaNumeric($_POST['city']) != 0){
                    $updateArray['city'] = $playerDB->sanitize($_POST['city']);
                }
              }
              
              if(isset($_POST['state'])){
                  $updateArray['state'] = $_POST['state'];
              }

              if(isset($_POST['zip'])){
                if($playerDB->isZip($_POST['zip']) != 0){
                    $updateArray['zip'] = $playerDB->sanitize($_POST['zip']);
                }
              }

              if(isset($_POST['highschool'])){
                  $updateArray['highschool'] = $playerDB->sanitize($_POST['highschool']);
                  echo $updateArray['highschool'];
              }

              if(isset($_POST['weight'])){
                if($playerDB->isAlphaNumeric($_POST['weight']) != 0){
                    $updateArray['weight'] = $playerDB->sanitize($_POST['weight']);
                }
              }
              
              if(isset($_POST['height'])){
                  $updateArray['height'] = $playerDB->sanitize($_POST['height']);
              }

              if(isset($_POST['gradYear'])){
                  if($playerDB->isNumeric($_POST['gradYear']) != 0){
                    $updateArray['gradYear'] = $playerDB->sanitize($_POST['gradYear']);
                  }
              }
              if(isset($_POST['sport'])){
                if($playerDB->isAlphaNumeric($_POST['sport']) != 0){
                    $updateArray['sport'] = $playerDB->sanitize($_POST['sport']);
                }
              }

              if(isset($_POST['primaryPosition'])){
                if($playerDB->isAlphaNumeric($_POST['primaryPosition']) != 0){
                    $updateArray['primaryPosition'] = $playerDB->sanitize($_POST['primaryPosition']);
                }
              }

              if(isset($_POST['secondaryPosition'])){
                if($playerDB->isAlphaNumeric($_POST['secondaryPosition']) != 0){
                    $updateArray['secondaryPosition'] = $playerDB->sanitize($_POST['secondaryPosition']);
                }
              }

              if(isset($_POST['travelTeam'])){
                if($playerDB->isAlphaNumeric($_POST['travelTeam']) != 0){
                    $updateArray['travelTeam'] = $playerDB->sanitize($_POST['travelTeam']);
                }
              }

              if(isset($_POST['gpa'])){
                  $updateArray['gpa'] = $playerDB->sanitize($_POST['gpa']);
              }

              if(isset($_POST['sat'])){
                if($playerDB->isNumeric($_POST['sat']) != 0){
                    $updateArray['sat'] = $playerDB->sanitize($_POST['sat']);
                }
              }

              if(isset($_POST['act'])){
                if($playerDB->isNumeric($_POST['act']) != 0){
                    $updateArray['act'] = $playerDB->sanitize($_POST['act']);
                }
              }

              if(isset($_POST['ref1Name'])){
                if($playerDB->isAlphaNumeric($_POST['ref1Name']) != 0){
                    $updateArray['ref1Name'] = $playerDB->sanitize($_POST['ref1Name']);
                }
              }

              if(isset($_POST['ref1JobTitle'])){
                if($playerDB->isAlphaNumeric($_POST['ref1JobTitle']) != 0){
                    $updateArray['ref1JobTitle'] = $playerDB->sanitize($_POST['ref1JobTitle']);
                }
              }

              if(isset($_POST['ref1Email'])){
                if($playerDB->isValidEmail($_POST['ref1Email']) != 0){
                    $updateArray['ref1Email'] = $playerDB->sanitize($_POST['ref1Email']);
                }
              }

              if(isset($_POST['ref1Phone'])){
                if($playerDB->isValidPhone($_POST['ref1Phone']) != 0){
                    $updateArray['ref1Phone'] = $playerDB->sanitize($_POST['ref1Phone']);
                }
              }

              if(isset($_POST['ref2Name'])){
                if($playerDB->isAlphaNumeric($_POST['ref2Name']) != 0){
                    $updateArray['ref2Name'] = $playerDB->sanitize($_POST['ref2Name']);
                }
              }

              if(isset($_POST['ref2JobTitle'])){
                if($playerDB->isAlphaNumeric($_POST['ref2JobTitle']) != 0){
                    $updateArray['ref2JobTitle'] = $playerDB->sanitize($_POST['ref2JobTitle']);
                }
              }

              if(isset($_POST['ref2Email'])){
                if($playerDB->isValidEmail($_POST['ref2Email']) != 0){
                    $updateArray['ref2Email'] = $playerDB->sanitize($_POST['ref2Email']);
                }
              }

              if(isset($_POST['ref2Phone'])){
                if($playerDB->isValidPhone($_POST['ref2Phone']) != 0){
                    $updateArray['ref2Phone'] = $playerDB->sanitize($_POST['ref2Phone']);
                }
              }

              if(isset($_POST['ref3Name'])){
                if($playerDB->isAlphaNumeric($_POST['ref3Name']) != 0){
                    $updateArray['ref3Name'] = $playerDB->sanitize($_POST['ref3Name']);
                }
              }

              if(isset($_POST['ref3JobTitle'])){
                if($playerDB->isAlphaNumeric($_POST['ref3JobTitle']) != 0){
                    $updateArray['ref3JobTitle'] = $playerDB->sanitize($_POST['ref3JobTitle']);
                }
              }

              if(isset($_POST['ref3Email'])){
                if($playerDB->isValidEmail($_POST['ref3Email']) != 0){
                    $updateArray['ref3Email'] = $playerDB->sanitize($_POST['ref3Email']);
                }
              }

              if(isset($_POST['ref3Phone'])){
                if($playerDB->isNumeric($_POST['ref3Phone']) != 0){
                    $updateArray['ref3Phone'] = $playerDB->sanitize($_POST['ref3Phone']);
                }
              }

              if(isset($_POST['persStatement'])){
                if($playerDB->isAlphaNumeric($_POST['persStatement']) != 0){
                    $updateArray['persStatement'] = $playerDB->sanitize($_POST['persStatement']);
                }
              }

              if(isset($_POST['major'])){
                if($playerDB->isAlphaNumeric($_POST['major']) != 0){
                    $updateArray['major'] = $playerDB->sanitize($_POST['major']);
                }
              }

              if(isset($_POST['commitment'])){
                if($playerDB->isAlphaNumeric($_POST['commitment']) != 0){
                    $updateArray['commitment'] = $playerDB->sanitize($_POST['commitment']);
                }
              }

              if(isset($_POST['service'])){
                if($playerDB->isAlphabetic($_POST['service']) != 0){
                    $updateArray['service'] = $playerDB->sanitize($_POST['service']);
                }
              }
              if(isset($_POST['showcase1'])){
                  $updateArray['showcase1'] = $playerDB->isYouTube($_POST['showcase1']);
                  //var_dump($updateArray);
              }

              if(isset($_POST['showcase2'])){
                  $updateArray['showcase2'] = $playerDB->isYouTube($_POST['showcase2']);
                  //var_dump($updateArray);
              }

              if(isset($_POST['showcase3'])){
                  $updateArray['showcase3'] = $playerDB->isYouTube($_POST['showcase3']);
                  //var_dump($updateArray);
              }
              if(isset($_POST['college'])){
                  $updateArray['college'] = $playerDB->sanitize($_POST['college']);
              }
              if(isset($_POST['twitter'])){
                  $updateArray['twitter'] = $playerDB->sanitize($_POST['twitter']);
              }
              if(isset($_POST['facebook'])){
                  $updateArray['facebook'] = $playerDB->sanitize($_POST['facebook']);
              }
              if(isset($_POST['instagram'])){
                  $updateArray['instagram'] = $playerDB->sanitize($_POST['instagram']);
              }
              if(isset($_POST['website'])){
                  $updateArray['website'] = $playerDB->sanitize($_POST['website']);
              }
              if(isset($_POST['characteristics'])){
                  $updateArray['characteristics'] = $playerDB->sanitize($_POST['characteristics']);
                  //var_dump($updateArray);
              }
              if(isset($_POST['velocity'])){
                  $updateArray['velocity'] = $playerDB->sanitize($_POST['velocity']);
              }
              if(isset($_POST['gpareq'])){
                  $updateArray['gpareq'] = $playerDB->sanitize($_POST['gpareq']);
              }
              if(isset($_POST['satactreq'])){
                  $updateArray['satactreq'] = $playerDB->sanitize($_POST['satactreq']);
              }
              //move profileImage to server folder
              $uploadOk = 1;
              if (is_uploaded_file($_FILES['profileImage']['tmp_name'])){ 
                  //First, Validate the file name
                      if(empty($_FILES['profileImage']['name'])){
                         echo " File name is empty! ";
                         $uploadOk = 0;
                         exit;
                      }
                      $upload_file_name = $_FILES['profileImage']['name'];
                      //Too long file name?
                      if(strlen ($upload_file_name)>100){
                         echo " too long file name ";
                         $uploadOk = 0;
                      }
                      $check = getimagesize($_FILES["profileImage"]["tmp_name"]);
                      if($check !== false) {
                          //echo "File is an image - " . $check["mime"] . ".";
                          $uploadOk = 1;
                      } else {
                          echo "File is not an image.";
                          $uploadOk = 0;
                      }
                     //replace any non-alpha-numeric cracters in th file name
                     $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
                     //set a limit to the file upload size
                     if ($_FILES['profileImage']['size'] > 1000000){
                         echo " too big file ";
                         $uploadOk = 0;        
                     }
                     //Save the file
                     if ($uploadOk == 1){
                      $dest='assets/img/userpictures/'.$upload_file_name;
                      if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $dest)){
                          //echo 'File Has Been Uploaded !';
                          $updateArray['profileImage'] = $_FILES['profileImage']['name'];
                          //var_dump($updateArray['profileImage']);
                      }
                      else{
                          echo 'File was not uploaded';
                      }
                     }
                 }
                 $playerDB->updateUser($updateArray);
                 
                 //profile.php?id={$player->getId()}
                 //echo $updateArray
                 //var_dump($updateArray);
            }
        }
?>