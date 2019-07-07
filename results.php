<?php include("config/pageconfig.php"); session_start(); error_reporting(0); ?>
<?php include_once ("classes/Player.PDO.Class.php"); ?>
<?php include("assets/inc/header.inc.php");

    //search results from top of vagivation
    $data=$_GET;
    echo $playerDB->getPlayersFromSearch($data);

    include("assets/inc/footer.inc.php");

?>
