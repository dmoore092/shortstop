<?php 
    // Handles all form data from myinfo.php
    //goes into profile.php
    //updateUserInfo is from myinfo.php and update-player-details is from profile.php admin section
    if(isset($_POST['updateUserInfo']) || isset($_POST['update-player-details'])) {
        //echo "update being attempted";
    echo "<meta http-equiv='refresh' content='0'>";//force page refresh
        $updateArray = array();
        if(isset($_POST['updateUserInfo'])){
            $updateArray['id'] = $_SESSION['id'];
        }
        if(isset($_POST['update-player-details'])){
            //echo "<script>alert('test');</script>";
            $updateArray['id'] = $_POST['id'];
            //unset($_SESSION['admin-edit-player-name']);
        }
        //if(isset($_SESSION['id'])){
            //$myId = $_SESSION['id'];
            //$updateArray['id'] = $_SESSION['id'];
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
                //echo $updateArray['highschool'];
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
            if($playerDB->isValidPhone($_POST['ref3Phone']) != 0){
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
                        echo " File is too large ";
                        $uploadOk = 0;        
                    }
                    //Save the file
                    if ($uploadOk == 1){
                        $dest='./assets/img/userpictures/'.$upload_file_name;
                        //$dest='/var/www/html/assets/img/userpictures/'.$upload_file_name;
                        if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $dest)){
                            //echo 'File Has Been Uploaded !';
                            $updateArray['profileImage'] = $_FILES['profileImage']['name'];
                        }
                        else{
                            //var_dump($_FILES['1111.jpg']['error']);
                        //   echo 'File was not uploaded';
                        }
                    }
                }
                //var_dump($updateArray);
                $playerDB->updateUser($updateArray);
                
                //profile.php?id={$player->getId()}
                //echo $updateArray
        }
    //}
    
?>