<?php
//goes in findathletes.php
$name       = $playerDB->sanitize($_POST['name']);
$sport      = $_POST['sport'] = isset($_POST['sport']) ? $_POST['sport'] : '';
$state      = $_POST['state'] = isset($_POST['state']) ? $_POST['state'] : '';
$class      = $_POST['class'] = isset($_POST['class']) ? $_POST['class'] : '';
$position   = $playerDB->sanitize($_POST['position']);
$school     = $playerDB->sanitize($_POST['school']);
$gpa        = $_POST['gpa'] = isset($_POST['gpa']) ? $_POST['gpa'] : '';

$arr = array();
if($name != "") $arr[] = "`name` LIKE '%{$name}%'";
if($sport != "") $arr[] = "sport LIKE '{$sport}'";
if($state != "") $arr[] = "state = '{$state}'";
if($class != "") $arr[] = "gradyear = '{$class}'";
if($position != "") $arr[] = "primaryposition LIKE '%{$position}%'";
if($school != "") $arr[] = "highschool LIKE '%{$school}%'";
if($gpa != "") $arr[] = "gpa >= '{$gpa}'";

if($name == "" && $sport == "" && $state == "" && $class == "" && $position == "" && $school == "" && $gpa == "" ){
    $query = "SELECT id, 
                    `name` AS `name`, 
                    highschool AS highschool, 
                    gradYear AS gradyear, 
                    sport AS sport, 
                    primaryPosition AS primaryposition 
                    FROM players WHERE persontype = 'player';";
}
else{
    $query = "SELECT id, 
                    `name` AS `name`, 
                    highschool AS highschool, 
                    gradYear AS gradyear, 
                    sport AS sport, 
                    primaryPosition AS primaryposition 
                    FROM players WHERE ";
    $query .= implode(" AND ", $arr);
    $query .= " AND persontype = 'player';";
}

if(isset($_POST['search-athlete'])){
    //$data = $playerDB->searchPlayers($srch);
    $data = $playerDB->getPlayersByFindAthleteSearch($query);
    echo $playerDB->getPlayersAsTable($data);
    echo $playerDB->getPlayers($data);
}
?>