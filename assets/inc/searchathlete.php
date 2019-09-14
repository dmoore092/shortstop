<?php
//goes in findathletes.php
$name       = $playerPDO->sanitize($_POST['name']);
$sport      = $_POST['sport'] = isset($_POST['sport']) ? $_POST['sport'] : '';
$state      = $_POST['state'] = isset($_POST['state']) ? $_POST['state'] : '';
$class      = $_POST['class'] = isset($_POST['class']) ? $_POST['class'] : '';
$position   = $playerPDO->sanitize($_POST['position']);
$school     = $playerPDO->sanitize($_POST['school']);
$gpa        = $_POST['gpa'] = isset($_POST['gpa']) ? $_POST['gpa'] : '';

$arr = array();
if($name != "") $arr[] = "AES_DECRYPT(`name`,'!trN8xLnaHcA@cKu') LIKE '%{$name}%'";
if($sport != "") $arr[] = "AES_DECRYPT(sport,'!trN8xLnaHcA@cKu') LIKE '{$sport}'";
if($state != "") $arr[] = "AES_DECRYPT(state,'!trN8xLnaHcA@cKu') = '{$state}'";
if($class != "") $arr[] = "AES_DECRYPT(gradyear,'!trN8xLnaHcA@cKu') = '{$class}'";
if($position != "") $arr[] = "AES_DECRYPT(primaryposition,'!trN8xLnaHcA@cKu') LIKE '%{$position}%'";
if($school != "") $arr[] = "AES_DECRYPT(highschool,'!trN8xLnaHcA@cKu') LIKE '%{$school}%'";
if($gpa != "") $arr[] = "AES_DECRYPT(gpa,'!trN8xLnaHcA@cKu') >= '{$gpa}'";

if($name == "" && $sport == "" && $state == "" && $class == "" && $position == "" && $school == "" && $gpa == "" ){
    $query = "SELECT id, 
                    AES_DECRYPT(`name`,'!trN8xLnaHcA@cKu') AS `name`, 
                    AES_DECRYPT(highschool,'!trN8xLnaHcA@cKu') AS highschool, 
                    AES_DECRYPT(gradYear,'!trN8xLnaHcA@cKu') AS gradyear, 
                    AES_DECRYPT(sport,'!trN8xLnaHcA@cKu') AS sport, 
                    AES_DECRYPT(primaryPosition,'!trN8xLnaHcA@cKu') AS primaryposition 
                    FROM players WHERE persontype = 'player';";
}
else{
    $query = "SELECT id, 
                    AES_DECRYPT(`name`,'!trN8xLnaHcA@cKu') AS `name`, 
                    AES_DECRYPT(highschool,'!trN8xLnaHcA@cKu') AS highschool, 
                    AES_DECRYPT(gradYear,'!trN8xLnaHcA@cKu') AS gradyear, 
                    AES_DECRYPT(sport,'!trN8xLnaHcA@cKu') AS sport, 
                    AES_DECRYPT(primaryPosition,'!trN8xLnaHcA@cKu') AS primaryposition 
                    FROM players WHERE ";
    $query .= implode(" AND ", $arr);
    $query .= " AND persontype = 'player';";
}

if(isset($_POST['search-athlete'])){
    //$data = $playerPDO->searchPlayers($srch);
    $data = $playerPDO->getPlayersByFindAthleteSearch($query);
    echo $playerPDO->getPlayersAsTable($data);
    echo $playerPDO->getPlayers($data);
}
?>