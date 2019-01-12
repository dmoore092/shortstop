<?php $relpath= ""; $title="Search Results"; $page="mfathletes";

    include_once ("classes/Player.PDO.Class.php");
    include("assets/inc/header.inc.php");

    //$playerDB = new PlayerDB();
    $data=$_GET;
    //$data = $playerDB->getPlayersByGender('male');
    //var_dump($data);
    echo $playerDB->getPlayersFromSearch($data);
    //echo $playerDB->getPlayersAsTable($data);

    include("assets/inc/footer.inc.php");

?>