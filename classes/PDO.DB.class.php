<?php
    /*
    * DB class contains all generalized methods for creating a connection to,
    * retrieving from, updating, deleting from, and inserting into the database.
	* version 11/8/2018
	*/
    
    class DB{
        private $dbConn;
        /**
         * __construct() - creates a new PDO database object and opens a connection.
         */
        function __construct(){
            try{
                // open a connection
                $this->dbConn = new PDO("mysql:host={$_SERVER['DB_SERVER']};dbname={$_SERVER['DB']}",
                $_SERVER['DB_USER'],$_SERVER['DB_PASSWORD']);
                // $this->dbConn = new PDO("mysql:host=127.0.0.1;dbname=sports,root,root");
                // Change the error reporting for development
                $this->dbConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            }
            catch(PDOException $e){
                //echo $e;
                throw new Exception("Problem Connecting to Server \n" . $e);
            }
        } // construct

        /**
         * getConn() - Returns the connection object for easy access
         */
        function getConn(){
            return $this->dbConn;
        }

        /**
         * logout() - unset and destroys a session, effectively logging a user
         */
        function logOut()
        {
            session_unset();

            unset($_COOKIE[session_name()]);
            setcookie(session_name(), "", time() - 3600, "/");

            session_destroy();   
            
            header("Location: ./index.php");
            exit; 
        }

        /**
         * updateField() - updates a column for any field for any table
         */
        function updateField($fieldName, $value, $id){
            //var_dump($fieldName);
            try{
                $query = "UPDATE players SET $fieldName = AES_ENCRYPT(:value, '!trN8xLnaHcA@cKu') WHERE id = :id";
                $stmt = $this->dbConn->prepare($query);
                $stmt->execute(array(
                    ":value"=>$value,
                    ":id"=>$id
                ));
            }catch(PDOException $e){
                return "A problem occurred updating $tableName";
            }
        }

        /**
         * delete() - deletes any entry for any table
         */
        function delete($id){
            try{
                $query = "DELETE FROM players WHERE id = :id";
                $stmt = $this->dbConn->prepare($query);
                $stmt->execute(array(
                    ":id"=>$id
                ));
            }catch(PDOException $e){
                return "A problem occurred deleting";
            }
        }

        /**
         * getFieldByEmail() - Returns a specific entry from players 
         */
        function getFieldByEmail($fieldname, $email){
            //$data = array();
            $data = "";
            try{
                $query = "SELECT id, AES_DECRYPT($fieldname, '!trN8xLnaHcA@cKu') AS $fieldname, AES_DECRYPT(name, '!trN8xLnaHcA@cKu') AS `name`, `reset` FROM players WHERE email = AES_ENCRYPT(:email, '!trN8xLnaHcA@cKu')";
                $stmt = $this->dbConn->prepare($query);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->bindParam(":email", $email);
                $stmt->execute();
                // while($item = $stmt->fetch()){
                //     $data[] = $item;
                // }
                $data = $stmt->fetch();
                
            }catch(PDOException $e){
                return "A problem occurred.";
            }
            return $data;
        }
        
        /**
         * creates a random string and puts in into db, along with a timestamp
         */
        function insertResetToken($email){
            $string = '';
            $characters = "23456789ABCDEFHJKLMNPRTVWXYZabcdefghijklmnopqrstuvwxyz";
            for ($p = 0; $p < 20; $p++) {
                $string .= $characters[mt_rand(0, strlen($characters)-1)];
            }
            try{
                //$deleteToken = "DELETE FROM players WHERE resetExpires < NOW()";
                $insertToken = "UPDATE players SET resetExpires = DATE_SUB(CURDATE(), INTERVAL 1 DAY) WHERE resetExpires < CURDATE() AND email = AES_ENCRYPT('$email', '!trN8xLnaHcA@cKu');
                                UPDATE players SET reset = :reset, resetExpires = DATE_ADD(CURDATE(), INTERVAL 2 DAY) WHERE email = AES_ENCRYPT('$email', '!trN8xLnaHcA@cKu');";
                $stmt = $this->dbConn->prepare($insertToken);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->bindParam(":reset", $string);
                $stmt->execute();
            }
            catch(PDOException $e){
                //echo $e;
            }
            return $string;
        }
        /**
         * getEverythingAsObjects() - returns everything in the given table as objects of the given class
         */
        function getEverythingAsObjects($tableName, $className){
            include_once("$className.class.php");
            $data = array();
            try{
                //$query = "SELECT * FROM $tableName";
                $query = "SELECT projectName, name as 'projectLead', email, projectDescription  FROM $tableName p JOIN user u WHERE p.projectLead = u.id";
                $stmt = $this->dbConn->prepare($query);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, $className);
                while($item = $stmt->fetch()){
                    $data[] = $item;
                }
            }catch(PDOException $e){
                return "A problem occurred getting everything from the table $tableName";
            }
            return $data;
        }

        function getObjectByID($id){
            $object = null;
            $query = "SELECT id, 
                            AES_DECRYPT(`name`,'!trN8xLnaHcA@cKu') AS `name`,
                            AES_DECRYPT(gender,'!trN8xLnaHcA@cKu') AS gender,
                            AES_DECRYPT(email,'!trN8xLnaHcA@cKu') AS email,
                            AES_DECRYPT(`address`,'!trN8xLnaHcA@cKu') AS `address`,
                            AES_DECRYPT(cellPhone,'!trN8xLnaHcA@cKu') AS cellphone,
                            AES_DECRYPT(homePhone,'!trN8xLnaHcA@cKu') AS homephone,
                            AES_DECRYPT(city,'!trN8xLnaHcA@cKu') AS city,
                            AES_DECRYPT(`state`,'!trN8xLnaHcA@cKu') AS `state`,
                            AES_DECRYPT(zip,'!trN8xLnaHcA@cKu') AS zip,
                            AES_DECRYPT(highschool,'!trN8xLnaHcA@cKu') AS highschool,
                            AES_DECRYPT(`weight`,'!trN8xLnaHcA@cKu') AS `weight`,
                            AES_DECRYPT(height,'!trN8xLnaHcA@cKu') AS height,
                            AES_DECRYPT(gradYear,'!trN8xLnaHcA@cKu') AS gradyear,
                            AES_DECRYPT(major,'!trN8xLnaHcA@cKu') AS major,
                            AES_DECRYPT(commitment,'!trN8xLnaHcA@cKu') AS commitment,
                            AES_DECRYPT(gpa,'!trN8xLnaHcA@cKu') AS gpa,
                            AES_DECRYPT(sat,'!trN8xLnaHcA@cKu') AS sat,
                            AES_DECRYPT(act,'!trN8xLnaHcA@cKu') AS act,
                            AES_DECRYPT(sport,'!trN8xLnaHcA@cKu') AS sport,
                            AES_DECRYPT(primaryPosition,'!trN8xLnaHcA@cKu') AS primaryposition,
                            AES_DECRYPT(secondaryPosition,'!trN8xLnaHcA@cKu') AS secondaryposition,
                            AES_DECRYPT(travelTeam,'!trN8xLnaHcA@cKu') AS travelteam,
                            AES_DECRYPT(ref1Name,'!trN8xLnaHcA@cKu') AS ref1name,
                            AES_DECRYPT(ref1JobTitle,'!trN8xLnaHcA@cKu') AS ref1jobtitle,
                            AES_DECRYPT(ref1Email,'!trN8xLnaHcA@cKu') AS ref1email,
                            AES_DECRYPT(ref1Phone,'!trN8xLnaHcA@cKu') AS ref1phone,
                            AES_DECRYPT(ref2Name,'!trN8xLnaHcA@cKu') AS ref2name,
                            AES_DECRYPT(ref2JobTitle,'!trN8xLnaHcA@cKu') AS ref2jobtitle,
                            AES_DECRYPT(ref2Email,'!trN8xLnaHcA@cKu') AS ref2email,
                            AES_DECRYPT(ref2Phone,'!trN8xLnaHcA@cKu') AS ref2phone,
                            AES_DECRYPT(ref3Name,'!trN8xLnaHcA@cKu') AS ref3name,
                            AES_DECRYPT(ref3JobTitle,'!trN8xLnaHcA@cKu') AS ref3jobtitle,
                            AES_DECRYPT(ref3Email,'!trN8xLnaHcA@cKu') AS ref3email,
                            AES_DECRYPT(ref3Phone,'!trN8xLnaHcA@cKu') AS ref3phone,
                            AES_DECRYPT(persStatement,'!trN8xLnaHcA@cKu') AS persstatement,
                            AES_DECRYPT(profileImage,'!trN8xLnaHcA@cKu') AS profileimage,
                            AES_DECRYPT(showcase1,'!trN8xLnaHcA@cKu') AS showcase1,
                            AES_DECRYPT(showcase2,'!trN8xLnaHcA@cKu') AS showcase2,
                            AES_DECRYPT(showcase3,'!trN8xLnaHcA@cKu') AS showcase3,
                            AES_DECRYPT(college,'!trN8xLnaHcA@cKu') AS college,
                            AES_DECRYPT(twitter,'!trN8xLnaHcA@cKu') AS twitter,
                            AES_DECRYPT(instagram,'!trN8xLnaHcA@cKu') AS instagram,
                            persontype FROM players WHERE id = :id";
            //$query = "SELECT AES_DECRYPT(name,'!trN8xLnaHcA@cKu'), persontype FROM players WHERE id = :id;";
            $stmt = $this->dbConn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'player');
            $object = $stmt->fetch();
            //var_dump($object);
            return $object;
        }

        function getObjectByEmail($table, $className, $email){
            $object = null;
            $query = "SELECT * FROM $table WHERE email = AES_ENCRYPT(:email, '!trN8xLnaHcA@cKu');";
            $stmt = $this->dbConn->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, $className);
            $object = $stmt->fetch();
            return $object;
        }

	    function sanitize($value){
		    $value = trim($value);
		    $value = stripslashes($value);
		    $value = strip_tags($value);
            $value = htmlentities($value);
            $value = ucwords($value);
		    return $value;
	    }

	    function isAlphabetic($value){
		    $reg = "/^[a-zA-Z] [a-zA-Z ]+$/";
		    return preg_match($reg, $value);
	    }

	    function isAlphaNumeric($value){
		    $reg = "/^[a-zA-Z0-9 ]+$/";
		    return preg_match($reg, $value);
	    }

	    function isNumeric($value){
		    $reg = "/^[0-9]*$/";
		    return preg_match($reg, $value);
        }

        function isValidGpa($value){
            $reg = "/^[0-4][.][0-9][0-9]$/";
            return preg_match($reg, $value);
        }

        function isValidEmail($value){
            $reg = "/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
            return preg_match($reg, $value);
        }

        function isValidPhone($value){
            //eliminate every char except 0-9
            $isPhoneNum = false;
            $justNums = preg_replace("/[^0-9]/", '', $value);
            //eliminate leading 1 if its there
            if (strlen($justNums) == 11) $justNums = preg_replace("/^1/", '',$justNums);
            //if we have 10 digits left, it's probably valid.
            if (strlen($justNums) == 10) $isPhoneNum = true;
            return $isPhoneNum;
        }

        function isMaleOrFemale($value){
            $value = strtolower($value);
            if($value == "male" || $value == "female"){
                return true;
            }
            else{
                return false;
            }
        }
        function isZip($value){
            $reg = "/^\d{5}(?:[-\s]?\d{4})?$/";
            return preg_match($reg, $value);
        }
    
        function isYouTube($value){
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $value, $match)) {
                $video_id = $match[1];
                $newUrl = "https://www.youtube.com/embed/".$video_id;
                return $newUrl;
            }
            //return $video_id;
        }
    } // class
?>
