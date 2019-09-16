<?php
    //goes into profile.php
    $playerPDO = new PlayerPDO();
    $id=$_GET['id'];
    $showAdmin = false;

    //decide whether to show admin panel or not. This blocks the ability to add admin id(1 or 2) to the URL and bypass logging in
    if(($_SESSION['id'] == $_GET['id'] && $id == 1) || ($_SESSION['id'] == $_GET['id'] && $id == 2)){
        $showAdmin = true;
    }
    else{
        $showAdmin = false;
    }

    //shows profiles based on being logged in or not
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        //echo "logged in set";
        if ($_SESSION['id'] == $_GET['id']) {  
            //player is logged in, show profile with edit button for myinfo.php
            echo $playerPDO->getMyInfo($id, $showAdmin);
            echo "<script>document.getElementById('edit-img').style.display='inline-block'</script>";
        }
        else{
            //player is logged in, but viewing other profiles
            echo $playerPDO->getMyInfo($id, $showAdmin);
        } 
    }
    else {
        //person is not logged in, can see profiles
        echo $playerPDO->getMyInfo($id, $showAdmin);
    }
?>