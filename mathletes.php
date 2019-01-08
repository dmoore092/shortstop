<?php $relpath= ""; $title="Male Athletes"; $page="mfathletes";
    session_start();
    include_once ("/html/classes/Player.PDO.class.php");
    include("assets/inc/header.inc.php");

    $playerDB = new PlayerDB();

    $data = $playerDB->getPlayersByGender('male');
    //var_dump($data);
    echo $playerDB->getPlayersAsTable($data);


    include("assets/inc/footer.inc.php");

?>