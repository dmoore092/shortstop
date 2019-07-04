<?php
//search from admin panel
//goes into profile.php
if(isset($_POST['admin-search'])){
    //actually does the search here
    include("assets/inc/searchathlete.php");
    $data = $playerDB->getPlayersByFindAthleteSearch($query);
    echo $playerDB->getPlayersAsTableasAdmin($data);
    echo $playerDB->getPlayersWhileAdminMobile($data);
};
?>