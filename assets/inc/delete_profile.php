<?php 
//goes in profile.php
    if(isset($_POST['delete'])){
        $id=$_POST["playerid"];
        $playerDB->delete($id);
    };
?>