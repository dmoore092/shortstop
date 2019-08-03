<?php include("config/pageconfig.php"); session_start(); error_reporting(0); ?>
<?php include_once ("classes/Player.PDO.Class.php"); ?>
<?php include("assets/inc/header.inc.php");

if(isset($_POST['search-btn'])){
    $playerDB = new PlayerDB();
    $srch = $playerDB->sanitize($_POST['search']);
    //$data = $playerDB->searchPlayers($srch);
    $query = "SELECT id, AES_DECRYPT(`name`,'!trN8xLnaHcA@cKu') AS `name`, 
                AES_DECRYPT(highschool,'!trN8xLnaHcA@cKu') AS highschool, 
                AES_DECRYPT(gradYear,'!trN8xLnaHcA@cKu') AS gradyear, 
                AES_DECRYPT(sport,'!trN8xLnaHcA@cKu') AS sport, 
                AES_DECRYPT(primaryPosition,'!trN8xLnaHcA@cKu') AS primaryposition 
            FROM players WHERE AES_DECRYPT(`name`,'!trN8xLnaHcA@cKu') LIKE '%".$srch."%' AND persontype = 'player';";
    $data = $playerDB->getPlayersByFindAthleteSearch($query);
    echo $playerDB->getPlayersAsTable($data);
    echo $playerDB->getPlayers($data);

 }

include("assets/inc/footer.inc.php");
?>
