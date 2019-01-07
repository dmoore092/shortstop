<?php 
      $relpath= ""; $title="Home"; $page="main";
      $imgpath="";
      $linkpath = "";
      $templinkpath = "";
      session_start();
      //test
?>

        <?php include('assets/inc/header.inc.php'); ?>
        <div id="body-main">
                        <div id="content">
                <section>
                    <h2>At Athletic Prospects</h2>
                    <p>We strive to provide High School and JUCO athletes the tools to successfully promote themselves to college coaches by assisting athletes through the recruiting process. Our goal is to be a mentor-leader to athletes to teach them the importance of academics and athletics while showing strong leadership characteristics to be successful on and off the field.</p>
                <hr/>
                </section>  
            </div><!-- end of #content -->
            <div id="center-area">
                <div class="img-container"> 
                    <img src="assets/img/freeprofile-large.png">
                    <a href="login.php" class="index-image-overlay">
                        <span>Parents/Athletes</span>
                    </a>
                </div>
                <div class="img-container">
                    <img src="assets/img/coaches-large.png" >
                    <a href="login.php" class="index-image-overlay">
                        <span>Coaches</span>
                    </a>
                </div> 
              <!--  <img src="assets/img/mentor-large.png" > -->
            </div>
            


            <?php include('assets/inc/footer.inc.php'); ?>
