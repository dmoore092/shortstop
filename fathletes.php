<?php $relpath= ""; $title="Female Athletes"; $page="mfathletes";
    session_start();
    include_once ("classes/Player.PDO.class.php");
    include("assets/inc/header.inc.php");

    $playerDB = new PlayerDB();

    $data = $playerDB->getPlayersByGender('female');
    //var_dump($data);
    echo $playerDB->getPlayersAsTable($data);


    include("assets/inc/footer.inc.php");

?>