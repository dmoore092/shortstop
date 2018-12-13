<?php 
      session_start();
      unset($_SESSION);
      session_destroy();
      $relpath= ""; $title="Logout"; $page="logout";
      $imgpath="";
      $linkpath = "";
      $templinkpath = "";
?>

        <?php include('assets/inc/header.inc.php'); ?>
        <div id="body-main">
             <p>Logout</p>
            


            <?php include('assets/inc/footer.inc.php'); ?>