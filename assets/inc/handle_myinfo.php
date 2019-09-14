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
                if($playerPDO->isAlphaNumeric($_POST['name']) != 0){
                    $updateArray['name'] = $playerPDO->sanitize($_POST['name']);
                }
            }
            // if(isset($_POST['email'])){
            //     if($playerPDO->isAlphaNumeric($_POST['email']) != 0){
            //         $updateArray['email'] = $playerPDO->sanitize($_POST['email']);
            //     }
            // }

            if(isset($_POST['gender'])){
            if($playerPDO->isMaleOrFemale($_POST['gender']) != 0){
                $updateArray['gender'] = $playerPDO->sanitize($_POST['gender']);
            }
            }
            
            if(isset($_POST['email'])){
            if($playerPDO->isValidEmail($_POST['email']) != 0){
                $updateArray['email'] = $playerPDO->sanitize($_POST['email']);
            }
            }

            if(isset($_POST['cellPhone'])){
                if($playerPDO->isValidPhone($_POST['cellPhone']) != 0){
                    $updateArray['cellPhone'] = $playerPDO->sanitize($_POST['cellPhone']);
                }
            }

            if(isset($_POST['homePhone'])){
            if($playerPDO->isValidPhone($_POST['homePhone']) != 0){
                $updateArray['homePhone'] = $playerPDO->sanitize($_POST['homePhone']);
            }
            }
            
            if(isset($_POST['address'])){
            //if($playerPDO->isAlphaNumeric($_POST['address']) != 0){
                $updateArray['address'] = $playerPDO->sanitize($_POST['address']);
            //}
            }

            if(isset($_POST['city'])){
            if($playerPDO->isAlphaNumeric($_POST['city']) != 0){
                $updateArray['city'] = $playerPDO->sanitize($_POST['city']);
            }
            }
            
            if(isset($_POST['state'])){
                $updateArray['state'] = $_POST['state'];
            }

            if(isset($_POST['zip'])){
            if($playerPDO->isZip($_POST['zip']) != 0){
                $updateArray['zip'] = $playerPDO->sanitize($_POST['zip']);
            }
            }

            if(isset($_POST['highschool'])){
                $updateArray['highschool'] = $playerPDO->sanitize($_POST['highschool']);
                //echo $updateArray['highschool'];
            }

            if(isset($_POST['weight'])){
            if($playerPDO->isAlphaNumeric($_POST['weight']) != 0){
                $updateArray['weight'] = $playerPDO->sanitize($_POST['weight']);
            }
            }
            
            if(isset($_POST['height'])){
                $updateArray['height'] = $playerPDO->sanitize($_POST['height']);
            }

            if(isset($_POST['gradYear'])){
                if($playerPDO->isNumeric($_POST['gradYear']) != 0){
                $updateArray['gradYear'] = $playerPDO->sanitize($_POST['gradYear']);
                }
            }
            if(isset($_POST['sport'])){
            if($playerPDO->isAlphaNumeric($_POST['sport']) != 0){
                $updateArray['sport'] = $playerPDO->sanitize($_POST['sport']);
            }
            }
            if(isset($_POST['primaryPosition'])){
            if($playerPDO->isAlphaNumeric($_POST['primaryPosition']) != 0){
                $updateArray['primaryPosition'] = $playerPDO->sanitize($_POST['primaryPosition']);
            }
            }

            if(isset($_POST['secondaryPosition'])){
            if($playerPDO->isAlphaNumeric($_POST['secondaryPosition']) != 0){
                $updateArray['secondaryPosition'] = $playerPDO->sanitize($_POST['secondaryPosition']);
            }
            }

            if(isset($_POST['travelTeam'])){
            if($playerPDO->isAlphaNumeric($_POST['travelTeam']) != 0){
                $updateArray['travelTeam'] = $playerPDO->sanitize($_POST['travelTeam']);
            }
            }

            if(isset($_POST['gpa'])){
                $updateArray['gpa'] = $playerPDO->sanitize($_POST['gpa']);
            }

            if(isset($_POST['sat'])){
            if($playerPDO->isNumeric($_POST['sat']) != 0){
                $updateArray['sat'] = $playerPDO->sanitize($_POST['sat']);
            }
            }

            if(isset($_POST['act'])){
            if($playerPDO->isNumeric($_POST['act']) != 0){
                $updateArray['act'] = $playerPDO->sanitize($_POST['act']);
            }
            }

            if(isset($_POST['ref1Name'])){
            if($playerPDO->isAlphaNumeric($_POST['ref1Name']) != 0){
                $updateArray['ref1Name'] = $playerPDO->sanitize($_POST['ref1Name']);
            }
            }

            if(isset($_POST['ref1JobTitle'])){
            if($playerPDO->isAlphaNumeric($_POST['ref1JobTitle']) != 0){
                $updateArray['ref1JobTitle'] = $playerPDO->sanitize($_POST['ref1JobTitle']);
            }
            }

            if(isset($_POST['ref1Email'])){
            if($playerPDO->isValidEmail($_POST['ref1Email']) != 0){
                $updateArray['ref1Email'] = $playerPDO->sanitize($_POST['ref1Email']);
            }
            }

            if(isset($_POST['ref1Phone'])){
            if($playerPDO->isValidPhone($_POST['ref1Phone']) != 0){
                $updateArray['ref1Phone'] = $playerPDO->sanitize($_POST['ref1Phone']);
            }
            }

            if(isset($_POST['ref2Name'])){
            if($playerPDO->isAlphaNumeric($_POST['ref2Name']) != 0){
                $updateArray['ref2Name'] = $playerPDO->sanitize($_POST['ref2Name']);
            }
            }

            if(isset($_POST['ref2JobTitle'])){
            if($playerPDO->isAlphaNumeric($_POST['ref2JobTitle']) != 0){
                $updateArray['ref2JobTitle'] = $playerPDO->sanitize($_POST['ref2JobTitle']);
            }
            }

            if(isset($_POST['ref2Email'])){
            if($playerPDO->isValidEmail($_POST['ref2Email']) != 0){
                $updateArray['ref2Email'] = $playerPDO->sanitize($_POST['ref2Email']);
            }
            }

            if(isset($_POST['ref2Phone'])){
            if($playerPDO->isValidPhone($_POST['ref2Phone']) != 0){
                $updateArray['ref2Phone'] = $playerPDO->sanitize($_POST['ref2Phone']);
            }
            }

            if(isset($_POST['ref3Name'])){
            if($playerPDO->isAlphaNumeric($_POST['ref3Name']) != 0){
                $updateArray['ref3Name'] = $playerPDO->sanitize($_POST['ref3Name']);
            }
            }

            if(isset($_POST['ref3JobTitle'])){
            if($playerPDO->isAlphaNumeric($_POST['ref3JobTitle']) != 0){
                $updateArray['ref3JobTitle'] = $playerPDO->sanitize($_POST['ref3JobTitle']);
            }
            }

            if(isset($_POST['ref3Email'])){
            if($playerPDO->isValidEmail($_POST['ref3Email']) != 0){
                $updateArray['ref3Email'] = $playerPDO->sanitize($_POST['ref3Email']);
            }
            }

            if(isset($_POST['ref3Phone'])){
            if($playerPDO->isValidPhone($_POST['ref3Phone']) != 0){
                $updateArray['ref3Phone'] = $playerPDO->sanitize($_POST['ref3Phone']);
            }
            }

            if(isset($_POST['persStatement'])){
            if($playerPDO->isAlphaNumeric($_POST['persStatement']) != 0){
                $updateArray['persStatement'] = $playerPDO->sanitize($_POST['persStatement']);
            }
            }

            if(isset($_POST['major'])){
            if($playerPDO->isAlphaNumeric($_POST['major']) != 0){
                $updateArray['major'] = $playerPDO->sanitize($_POST['major']);
            }
            }

            if(isset($_POST['commitment'])){
            if($playerPDO->isAlphaNumeric($_POST['commitment']) != 0){
                $updateArray['commitment'] = $playerPDO->sanitize($_POST['commitment']);
            }
            }

            if(isset($_POST['service'])){
            if($playerPDO->isAlphabetic($_POST['service']) != 0){
                $updateArray['service'] = $playerPDO->sanitize($_POST['service']);
            }
            }
            if(isset($_POST['showcase1'])){
                $updateArray['showcase1'] = $playerPDO->isYouTube($_POST['showcase1']);
                //var_dump($updateArray);
            }

            if(isset($_POST['showcase2'])){
                $updateArray['showcase2'] = $playerPDO->isYouTube($_POST['showcase2']);
                //var_dump($updateArray);
            }

            if(isset($_POST['showcase3'])){
                $updateArray['showcase3'] = $playerPDO->isYouTube($_POST['showcase3']);
                //var_dump($updateArray);
            }
            if(isset($_POST['college'])){
                $updateArray['college'] = $playerPDO->sanitize($_POST['college']);
            }
            if(isset($_POST['twitter'])){
                $updateArray['twitter'] = $playerPDO->sanitize($_POST['twitter']);
            }
            if(isset($_POST['facebook'])){
                $updateArray['facebook'] = $playerPDO->sanitize($_POST['facebook']);
            }
            if(isset($_POST['instagram'])){
                $updateArray['instagram'] = $playerPDO->sanitize($_POST['instagram']);
            }
            if(isset($_POST['website'])){
                $updateArray['website'] = $playerPDO->sanitize($_POST['website']);
            }
            if(isset($_POST['characteristics'])){
                $updateArray['characteristics'] = $playerPDO->sanitize($_POST['characteristics']);
                //var_dump($updateArray);
            }
            if(isset($_POST['velocity'])){
                $updateArray['velocity'] = $playerPDO->sanitize($_POST['velocity']);
            }
            if(isset($_POST['gpareq'])){
                $updateArray['gpareq'] = $playerPDO->sanitize($_POST['gpareq']);
            }
            if(isset($_POST['satactreq'])){
                $updateArray['satactreq'] = $playerPDO->sanitize($_POST['satactreq']);
            }
            //move profileImage to server folder
            //this function is duplicated in blog.php. Rewrite this into a general function
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
                $playerPDO->updateUser($updateArray);
                
                //profile.php?id={$player->getId()}
                //echo $updateArray
        }
    //}
    
?>