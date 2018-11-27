<?php
    $_SESSION["username"] = "ddoug";
    $mysqli = mysqli_connect("127.0.0.1", "root", "", "sports");
   //CONNECT TO DATABASE
    if(!$mysqli){
        echo "connection error: " . mysqli_connect_error();
        die();
    }
    else{
        echo "SUCCESS!";
    }
    //QUERY THE DATABASE for players to display
    if(isset($_POST["getPlayers"])){
        $query = "SELECT firstName, sport
                         FROM players;";
        $result = mysqli_query($mysqli, $query);
        $num_rows = mysqli_affected_rows($mysqli);
        echo "<p>There are $num_rows players in the database.</p>";
        echo "<div id='display-players'>";
        if($result && $num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<div id='comments'>".$row["firstName"].": ".$row["sport"]."</div>";
            }
        }
    }
    //SEND COMMENT TO DATABASE
            if(isset($_POST["submit"])){
                //block cross-site scripting, html entities(apersand etc), trim white space
                $firstname  = htmlentities(strip_tags(trim($_POST["firstname"])));
                $lastname   = htmlentities(strip_tags(trim($_POST["lastname"])));
                $email      = htmlentities(strip_tags(trim($_POST["email"])));
                $cellphone  = htmlentities(strip_tags(trim($_POST["cellphone"])));
                $homephone  = htmlentities(strip_tags(trim($_POST["homephone"])));
                $address    = htmlentities(strip_tags(trim($_POST["address"])));
                $city       =  htmlentities(strip_tags(trim($_POST["city"])));
                $state      =  htmlentities(strip_tags(trim($_POST["state"])));
                $zip        =  htmlentities(strip_tags(trim($_POST["zip"])));
                $highschool = htmlentities(strip_tags(trim($_POST["highschool"])));
                $weight     =  htmlentities(strip_tags(trim($_POST["weight"])));
                $height     =  htmlentities(strip_tags(trim($_POST["height"])));
                $gradyear   =  htmlentities(strip_tags(trim($_POST["grad-year"])));
                $sport      =  htmlentities(strip_tags(trim($_POST["sport"])));
                $primaryposition    =  htmlentities(strip_tags(trim($_POST["primary-position"])));
                $secondaryposition  =  htmlentities(strip_tags(trim($_POST["secondary-position"])));
                $travelteam =  htmlentities(strip_tags(trim($_POST["travel-team"])));
                $gpa        =  htmlentities(strip_tags(trim($_POST["gpa"])));
                $sat        =  htmlentities(strip_tags(trim($_POST["sat"])));
                $act        =  htmlentities(strip_tags(trim($_POST["act"])));
                $ref1firstname  = htmlentities(strip_tags(trim($_POST["ref1-first-name"])));
                $ref1lastname   = htmlentities(strip_tags(trim($_POST["ref1-last-name"])));
                $ref1jobtitle   = htmlentities(strip_tags(trim($_POST["ref1-job-title"])));
                $ref1email      = htmlentities(strip_tags(trim($_POST["ref1-email"])));
                $ref1phone      = htmlentities(strip_tags(trim($_POST["ref1-phone"])));
                $ref2firstname  = htmlentities(strip_tags(trim($_POST["ref2-first-name"])));
                $ref2lastname   = htmlentities(strip_tags(trim($_POST["ref2-last-name"])));
                $ref2jobtitle   = htmlentities(strip_tags(trim($_POST["ref2-job-title"])));
                $ref2email      = htmlentities(strip_tags(trim($_POST["ref2-email"])));
                $ref2phone      = htmlentities(strip_tags(trim($_POST["ref2-phone"])));
                $ref3firstname  = htmlentities(strip_tags(trim($_POST["ref3-first-name"])));
                $ref3lastname   = htmlentities(strip_tags(trim($_POST["ref3-last-name"])));
                $ref3jobtitle   = htmlentities(strip_tags(trim($_POST["ref3-job-title"])));
                $ref3email      = htmlentities(strip_tags(trim($_POST["ref3-email"])));
                $ref3phone      = htmlentities(strip_tags(trim($_POST["ref3-phone"])));
                $persstatement  = htmlentities(strip_tags(trim($_POST["pers-statement"])));
                $service        = htmlentities(strip_tags(trim($_POST["service"])));
                
                //block sql injections
                $firstname  = mysqli_real_escape_string($mysqli, $_POST["firstname"]);
                $lastname   = mysqli_real_escape_string($mysqli, $_POST["lastname"]);
                $email      = mysqli_real_escape_string($mysqli, $_POST["email"]);
                $cellphone  = mysqli_real_escape_string($mysqli, $_POST["cellphone"]);
                $homephone  = mysqli_real_escape_string($mysqli, $_POST["homephone"]);
                $address    = mysqli_real_escape_string($mysqli, $_POST["address"]);
                $city       = mysqli_real_escape_string($mysqli, $_POST["city"]);
                $state      = mysqli_real_escape_string($mysqli, $_POST["state"]);
                $zip        = mysqli_real_escape_string($mysqli, $_POST["zip"]);
                $highschool = mysqli_real_escape_string($mysqli, $_POST["highschool"]);
                $height     = mysqli_real_escape_string($mysqli, $_POST["height"]);
                $weight     = mysqli_real_escape_string($mysqli, $_POST["weight"]);
                $gradyear   = mysqli_real_escape_string($mysqli, $_POST["grad-year"]);
                $sport      = mysqli_real_escape_string($mysqli, $_POST["sport"]);
                $primaryposition    =  mysqli_real_escape_string($mysqli, $_POST["primary-position"]);
                $secondaryposition  =  mysqli_real_escape_string($mysqli, $_POST["secondary-position"]);
                $travelteam = mysqli_real_escape_string($mysqli, $_POST["travel-team"]);
                $gpa        = mysqli_real_escape_string($mysqli, $_POST["gpa"]);
                $sat        = mysqli_real_escape_string($mysqli, $_POST["sat"]);
                $act        = mysqli_real_escape_string($mysqli, $_POST["act"]);
                $persstatement  = mysqli_real_escape_string($mysqli, $_POST["pers-statement"]);
                $service        = mysqli_real_escape_string($mysqli, $_POST["service"]);
                $ref1firstname  = mysqli_real_escape_string($mysqli, $_POST["ref1-first-name"]);
                $ref1lastname   = mysqli_real_escape_string($mysqli, $_POST["ref1-last-name"]);
                $ref1jobtitle   = mysqli_real_escape_string($mysqli, $_POST["ref1-job-title"]);
                $ref1email      = mysqli_real_escape_string($mysqli, $_POST["ref1-email"]);
                $ref1phone      = mysqli_real_escape_string($mysqli, $_POST["ref1-phone"]);
                $ref2firstname  = mysqli_real_escape_string($mysqli, $_POST["ref2-first-name"]);
                $ref2lastname   = mysqli_real_escape_string($mysqli, $_POST["ref2-last-name"]);
                $ref2jobtitle   = mysqli_real_escape_string($mysqli, $_POST["ref2-job-title"]);
                $ref2email      = mysqli_real_escape_string($mysqli, $_POST["ref2-email"]);
                $ref2phone      = mysqli_real_escape_string($mysqli, $_POST["ref2-phone"]);
                $ref3firstname  = mysqli_real_escape_string($mysqli, $_POST["ref3-first-name"]);
                $ref3lastname   = mysqli_real_escape_string($mysqli, $_POST["ref3-last-name"]);
                $ref3jobtitle   = mysqli_real_escape_string($mysqli, $_POST["ref3-job-title"]);
                $ref3email      = mysqli_real_escape_string($mysqli, $_POST["ref3-email"]);
                $ref3phone      = mysqli_real_escape_string($mysqli, $_POST["ref3-phone"]);
                
                //build the database query
                $query   = "UPDATE players
                            SET firstName = '$firstname', 
                            lastName = '$lastname', 
                            email = '$email',
                            cellPhone = '$cellphone',
                            homePhone = '$homephone', 
                            address = '$address', 
                            city = '$city', 
                            state = '$state', 
                            zip = '$zip', 
                            highschool = '$highschool', 
                            height = '$height', 
                            weight = '$weight',
                            gradyear = '$gradyear', 
                            sport = '$sport', 
                            primaryPosition = '$primaryposition', 
                            secondaryPosition = '$secondaryposition', 
                            travelTeam = '$travelteam', 
                            gpa = '$gpa', 
                            sat = '$sat', 
                            act = '$act', 
                            ref1FirstName = '$ref1FirstName', 
                            ref1LastName = '$ref1LastName', 
                            ref1Jobtitle = '$ref1Jobtitle', 
                            ref1Email = '$ref1Email', 
                            ref1Phone = '$ref1Phone', 
                            ref2FirstName = '$ref2FirstName', 
                            ref2LastName = '$ref2LastName', 
                            ref2Jobtitle = '$ref2Jobtitle', 
                            ref2Email = '$ref2Email', 
                            ref2Phone = '$ref2Phone', 
                            ref3FirstName = '$ref3FirstName', 
                            ref3LastName = '$ref3LastName', 
                            ref3Jobtitle = '$ref3Jobtitle', 
                            ref3Email = '$ref3Email', 
                            ref3Phone = '$ref3Phone', 
                            persStatement = '$persStatement', 
                            service  = '$service'
                            WHERE username = '" . $_SESSION["username"] . "';";
                            
                            
                //THIS WORKS
                //$_SESSION["username"] = "ddave";
                //$query = "INSERT INTO players(firstname)VALUES('dave')WHERE username = '" . $_SESSION["username"] . "';";

                echo $query;
                $result = mysqli_query($mysqli, $query);
                $num_rows = mysqli_affected_rows($mysqli);
                
                echo "<p>$num_rows records inserted.</p>";
                //echo "<script type='text/javascript'> document.location = 'signup.php'; </script>";
            }
        
?>