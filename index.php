<?php include("config/pageconfig.php"); session_start(); error_reporting(0); ?>
<?php include("classes/Player.PDO.Class.php");?>
<?php include('assets/inc/header.inc.php'); ?>
        <div id="body-main">
            <div id="content">
                <section>
                    <?php 
                        try{
                            $conn = mysqli_connect('127.0.0.1', 'root', 'y#GbqXtBGcy!z3Cf', 'sports');
                            //echo "Connected successfully"; 
                            $query = "SELECT header, text FROM home_page ORDER BY id DESC LIMIT 1;";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<h2>".nl2br($row['header'])."</h2>";
                                echo "<p>".nl2br($row['text'])."</p>";
                                echo "<hr>";
                            } 
                        }
                        catch(exception $e){
                            //echo "Connection failed: " . $e->getMessage();
                        } 
                    
                    ?>
                </section>  
            
            </div><!-- end of #content -->
            <div id="center-area">
                <a href = "register.php"><img src = "/assets/img/mainbanner.jpg" /></a>
            </div>
            
<?php include('assets/inc/footer.inc.php'); ?>

<?php include('assets/inc/password_reset_email_link.php'); ?>

<?php 
 //changing site content for "Home Page"
 if(isset($_POST['submit-home-page'])){
    echo "<meta http-equiv='refresh' content='0'>";//force page refresh
    try{
        $mysqli = new mysqli("127.0.0.1", "root", "y#GbqXtBGcy!z3Cf", "sports");
        if($mysqli->connect_error) {
            exit('Error connecting to database'); 
          }
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli->set_charset("utf8mb4");

        $stmt = $mysqli->prepare("INSERT INTO home_page(header, text, creation_date) VALUES(?, ?, NOW());");
        $stmt->bind_param("ss", $_POST['home-page-header'], $_POST['home-page-content']);
        $stmt->execute();
        $stmt->close();
    }
    catch(exception $e){
        //echo "Connection failed: " . $e->getMessage();
    } 
 }
?>
