<?php 
      session_start();
      unset($_SESSION);
      session_destroy();
      $relpath= ""; $title="Logout"; $page="logout";
      $imgpath="";
      $linkpath = "";
      $templinkpath = "";

include('assets/inc/header.inc.php'); ?>
<div id="body-main">
        <div id="logout-wrapper">
                <p>You have been successfully logged out!</p>
        </div>
             
            


<?php include('assets/inc/footer.inc.php'); ?>