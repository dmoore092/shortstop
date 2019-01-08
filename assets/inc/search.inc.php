<?php
    //require_once '/var/www/html/classes/Player.PDO.class.php';
    require_once(realpath(dirname(__FILE__) . '/classes/Player.PDO.class.php'));
    $playerDB = new PlayerDB();

    $data = null;
    if(isset($_POST['search-btn'])){
        //echo "search triggered";
       if(isset($_POST['search']) && $playerDB->isAlphaNumeric($_POST['search']) != 0){
            //echo "passed validation"; 
            $srch = $playerDB->sanitize($_POST['search']);
            $data = $playerDB->searchPlayers($srch);
            header("Location: results.php?".http_build_query($data));
       }
     }

?>