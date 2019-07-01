<?php include("config/pageconfig.php"); session_start(); error_reporting(0); ?>
<?php include('assets/inc/header.inc.php'); ?>
        <div id="body-main">
            <div id="content">
                <section>
                    
                    <?php 
                        try{
                            $conn = mysqli_connect('127.0.0.1', 'root', 'root', 'sports');
                            //echo "Connected successfully"; 
                            $query = "SELECT header, text FROM home_page;";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<h2>{$row['header']}</h2>";
                                echo "<p>{$row['text']}</p>";
                            } 
                        }
                        catch(exception $e){
                            echo "Connection failed: " . $e->getMessage();
                        } 
                    
                    ?>
                    <!-- <h2>At Athletic Prospects</h2> -->
                    <!-- <p>
                        We strive to provide High School and JUCO athletes the tools to successfully promote themselves 
                        to college coaches by assisting athletes through the recruiting process. Our goal is to be a mentor-leader 
                        to athletes to teach them the importance of academics and athletics while showing strong leadership 
                        characteristics to be successful on and off the field.
                    </p> -->
                    <hr/>
                </section>  
            
            </div><!-- end of #content -->
            <div id="center-area">
            
                <a href = "register.php"><img src = "/assets/img/mainbanner.jpg" /></a>
            </div>
            
<?php include('assets/inc/footer.inc.php'); ?>

<?php include('assets/inc/password_reset_email_link.php'); ?>
