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
                //$this->dbConn = new PDO("mysql:host={$_SERVER['DB_SERVER']};dbname={$_SERVER['DB']}",
                //$_SERVER['DB_USER'],$_SERVER['DB_PASSWORD']);
                $this->dbConn = new PDO("mysql:host=localhost;dbname=sports,root, 1234");
                // Change the error reporting for development
                $this->dbConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            }
            catch(PDOException $e){
                echo $e;
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
        function updateField($tableName, $fieldName, $value, $id){
            try{
                $query = "UPDATE $tableName SET $fieldName = :value WHERE id = :id";
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
        function delete($tableName, $id){
            try{
                $query = "DELETE FROM $tableName WHERE id = :id";
                $stmt = $this->dbConn->prepare($query);
                $stmt->execute(array(
                    ":id"=>$id
                ));
            }catch(PDOException $e){
                return "A problem occurred deleting from $tableName";
            }
        }

        /**
         * getFieldById() - Returns a specific entry from any table 
         */
        function getFieldById($tableName, $fieldName, $id){
            $data = array();
            try{
                $query = "SELECT :fieldName FROM :table WHERE id = :id";
                $stmt = $this->dbConn->prepare($query);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->bindParam(array(
                    ":table"=>$tableName,
                    ":column"=>$fieldName,
                    ":id"=>$id
                ));
                $stmt->execute();
                while($item = $stmt->fetch()){
                    $data[] = $item;
                }
            }catch(PDOException $e){
                return "A problem occurred selecting the $fieldName from the table $tableName";
            }
            return $data;
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

        function getObjectByID($table, $className, $id){
            $object = null;
            $query = "SELECT * FROM $table WHERE id = :id";
            $stmt = $this->dbConn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, $className);
            $object = $stmt->fetch();

            return $object;
        }

        function getObjectByUsername($table, $className, $username){
            $object = null;
            $query = "SELECT * FROM $table WHERE username = :username";
            $stmt = $this->dbConn->prepare($query);
            $stmt->bindParam(":username", $username);
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
    
        function isHeightFeet($value){
            echo $value;
		    //if($value == '4' || $value == '5' || $value == '6'){
            return true;
            //}
        }

        function isHeightInches($value){
		    $reg = "/^([0-9]|1[011])$/";
            return preg_match($reg, $value);
            //return true;
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
            $reg = "/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/";
            return preg_match($reg, $value);
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
                //var_dump($match[1]);
            }
            return $video_id;
        }
    } // class
?>
