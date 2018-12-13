<?php $relpath= ""; $title="Male Athletes"; $page="mathletes";
      $imgpath="";
      $linkpath = "";
      $templinkpath = "";
?>
<?php include("assets/inc/header.inc.php") ?>
        <div id="body-main">    
            <p> Male Athletes Page</p>
            <?php
                $html = "";
                $mysqli = mysqli_connect("localhost", "root", "root", "sports");
                //DB password on prod is 1234
                //DB paswword on laptop is root
                //CONNECT TO DATABASE
                if(!$mysqli){
                    echo "connection error: " . mysqli_connect_error();
                    die();
                }
                else{
                    echo "<p style=color:white>success connection</p>";
                }
        
                //QUERY THE DATABASE for profile stuff
                $query = "SELECT firstName, lastName, sport, username 
                          FROM players
                          WHERE gender = 'male';";

                if($result = mysqli_query($mysqli, $query)){
                    while($row = mysqli_fetch_assoc($result)){
                        $_POST["username"] = $row["username"];
                        $html .= "<p><a href='profile.php'>".$row["firstName"]." ".$row["lastName"]." ".$row["sport"]."</a></p>";
                    }
                    echo $html;
                }
            ?>
 <?php include("assets/inc/footer.inc.php") ?>