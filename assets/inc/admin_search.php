<?php
    //search from admin panel
    //goes into profile.php
    if(isset($_POST['admin-search'])){
    $name       = $playerDB->sanitize($_POST['name']);
    $sport      = $_POST['sport'];
    $state      = $_POST['state'];
    $class      = $_POST['class'];
    $position   = $playerDB->sanitize($_POST['position']);
    $school     = $playerDB->sanitize($_POST['school']);
    $gpa        = $_POST['gpa'];

    $arr = array();
    if($name != "") $arr[] = "name LIKE '%{$name}%'";
    if($sport != "") $arr[] = "sport = '{$sport}'";
    if($state != "") $arr[] = "state = '{$state}'";
    if($class != "") $arr[] = "gradyear = '{$class}'";
    if($position != "") $arr[] = "primaryposition LIKE '%{$position}%'";
    if($school != "") $arr[] = "highschool LIKE '%{$school}%'";
    if($gpa != "") $arr[] = "gpa >= '{$gpa}'";

    if($name == "" && $sport == "" && $state == "" && $class == "" && $position == "" && $school == "" && $gpa == "" ){
        $query = "SELECT id, name, highschool, gradYear, sport, primaryPosition FROM players WHERE persontype = 'player' OR persontype = 'coach';";
    }
    else{
        $query = "SELECT id, name, sport, email, persontype FROM players WHERE ";
        $query .= implode(" AND ", $arr);
        $query .= " AND persontype = 'player' OR persontype = 'coach';";
    }
    $data = $playerDB->getPlayersByFindAthleteSearch($query);
    echo $playerDB->getPlayersAsTableasAdmin($data);
    echo $playerDB->getPlayersWhileAdminMobile($data);
    }
?>