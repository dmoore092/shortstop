<?php
//search from admin panel
//goes into profile.php
if(isset($_POST['admin-search'])){
    //actually does the search here
    include("assets/inc/searchathlete.php");
    $data = $playerPDO->getPlayersByFindAthleteSearch($query);
    echo $playerPDO->getPlayersAsTableasAdmin($data);
    echo $playerPDO->getPlayersWhileAdminMobile($data);
};
?>