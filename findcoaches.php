<?php $relpath= ""; $title="Find Coaches"; $page="mfathletes";
    session_start();
    include_once ("classes/Player.PDO.Class.php");
    include("assets/inc/header.inc.php");

    $playerPDO = new PlayerPDO();

    $data = $playerPDO->getPlayersByRole('coach');
    //$data = $playerPDO->getPlayersByGender('female');
    //var_dump($data);
    echo $playerPDO->getPlayersAsTable($data);

    include("assets/inc/footer.inc.php");
?>