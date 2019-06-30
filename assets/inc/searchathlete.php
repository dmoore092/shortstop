<?php
//goes in findathletes.php
if(isset($_POST['search-athlete'])){
    //echo "search triggered";
    if(isset($_POST['search-athlete'])){
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
            $query = "SELECT id, name, highschool, gradYear, sport, primaryPosition FROM players WHERE persontype = 'player';";
        }
        else{
            $query = "SELECT id, name, highschool, gradYear, sport, primaryPosition FROM players WHERE ";
            $query .= implode(" AND ", $arr);
            $query .= " AND persontype = 'player';";
        }
        //$data = $playerDB->searchPlayers($srch);
        $data = $playerDB->getPlayersByFindAthleteSearch($query);
        //header("Location: results.php?".http_build_query($data));
        echo $playerDB->getPlayersAsTable($data);
        echo $playerDB->getPlayers($data);
   }
 };
?>