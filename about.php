<?php include("config/pageconfig.php"); session_start();?>
<?php include("assets/inc/header.inc.php") ?>
        <div id="body-main">    
            <h1>About Us</h1>
            <hr />
            <?php 
                try{
                    $conn = mysqli_connect('127.0.0.1', 'root', 'y#GbqXtBGcy!z3Cf', 'sports');
                    //echo "Connected successfully"; 
                    $query = "SELECT header, text FROM about_us ORDER BY id DESC LIMIT 1;";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        strip_tags($row['header'], '<br>');
                        strip_tags($row['text'], '<br>');
                        echo "<h2>{$row['header']}</h2>";
                        echo "<p>{$row['text']}</p>";
                    }
                    mysqli_close($conn);
                }
                catch(exception $e){
                    //echo "Connection failed: " . $e->getMessage();
                } 
            ?>
            <h2>Any Questions?</h2>
            <p>Email us at <a href="mailto:Kprestano@athleticprospects.com">Kprestano@athleticprospects.com</a></p>
        <div>
 <?php include("assets/inc/footer.inc.php") ?>


 <?php 
 //changing site content for "About Us"
 if(isset($_POST['submit-about-us'])){
    echo "<meta http-equiv='refresh' content='0'>";//force page refresh
    try{
        $mysqli = new mysqli("127.0.0.1", "root", "y#GbqXtBGcy!z3Cf", "sports");
        if($mysqli->connect_error) {
            exit('Error connecting to database'); 
          }
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli->set_charset("utf8mb4");

        $stmt = $mysqli->prepare("INSERT INTO about_us(header, text, creation_date) VALUES(?, ?, NOW());");
        $stmt->bind_param("ss", nl2br($_POST['about-us-header']), nl2br($_POST['about-us-content']));
        $stmt->execute();
        $stmt->close();
    }
    catch(exception $e){
        //echo "Connection failed: " . $e->getMessage();
    } 
 }
 
 ?>
