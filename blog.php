<?php include("config/pageconfig.php"); session_start();?>
<?php include("assets/inc/header.inc.php") ?>
        <div id="body-main">    
            <h1>Blog</h1>
            <hr />
         <?php   
            try{
                $conn = mysqli_connect('127.0.0.1', 'root', 'root', 'sports');
                //echo "Connected successfully"; 
                $query = "SELECT * FROM blog_posts ORDER BY id DESC;";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)){  
                    echo "<h3>{$row['title']}</h3>";
                    echo "<p>{$row['post_date']}</p>";
                    echo "<p>{$row['text']}</p>";
                    echo "<hr>";
                } 
            }
            catch(exception $e){
                echo "Connection failed: " . $e->getMessage();
            } 
        ?>
<?php include("assets/inc/footer.inc.php") ?>


<?php

    if(isset($_POST["submit-post"])){
        $title  = mysqli_real_escape_string($_POST["title"]);
        $post   = mysqli_real_escape_string($_POST["post"]);
        $title  = htmlentities(strip_tags(trim($_POST["title"])));
        $post   = htmlentities(strip_tags(trim($_POST["post"])));
        $query = "INSERT INTO blog_posts(title, post_date, text) VALUES('$title', NOW(), '$post')";
        $result = mysqli_query($conn, $query);
        if(mysqli_connect_error()){
            echo mysqli_connect_error();
            echo "failure";
        }
        else{
            echo "no failure";
        }
        if(mysqli_affected_rows() < 0){
            echo "success";
        }
    }

?>