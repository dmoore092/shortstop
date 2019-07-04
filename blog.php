<?php include("config/pageconfig.php"); session_start();?>
<?php include("assets/inc/header.inc.php") ?>
        <div id="body-main">   
            <h1>Blog</h1>
            <hr />
            <div class="blog">
         <?php
            //check if logged in
            if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
                //check if admin, if yes, show delete button
                if ($_SESSION['id'] == 1 || $_SESSION['id'] == 2) {  
                    $canDelete = true;
                }
            }
            try{
                $conn = mysqli_connect('127.0.0.1', 'root', 'y#GbqXtBGcy!z3Cf', 'sports');
                //echo "Connected successfully"; 
                $query = "SELECT * FROM blog_posts ORDER BY id DESC;";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)){
                    if($canDelete == true){
                        $postid = $row['id'];
                        // echo "<form action='blog.php'><input type='submit' name='delete-post' value='$postid'></form><h3>{$row['title']}</h3>";
                        echo "<div class=\"post\"><p><form action='blog.php' ><button name='delete-post' value='$postid'>Delete Post</button></form><h3>{$row['title']}</h3>";
                    }
                    else{
                        echo "<div class=\"post\"><h3>{$row['title']}</h3>";
                    } 
                    echo "<h6>By Keith Prestano</h6>";
                    echo "<h6>{$row['post_date']}</h6>";
                    echo "<p>{$row['text']}</p>";
                    echo "<div><p>Tags: {$row['tags']}</p></div>";
                    echo "<hr></p></div>";
                } 
                mysqli_close($conn);
            }
            catch(exception $e){
                //echo "Connection failed: " . $e->getMessage();
            } 
        ?>
        </div> <!-- end of .pagination -->
        <script>
            $(document).ready(function(){
               //alert('ready');
               $('.blog').paginate({
                   items_per_page  : 2,
                   border: true,
                   border_color: '#fff',
                   background_color: '#bb0a1e',
                   rotate: true,
                });
            });
        </script> 

<?php include("assets/inc/footer.inc.php") ?>
<script>
    function deletePost(){
        if(confirm("Really Delete Post?", event.preventDefault()));
    }
</script>

<?php
 //posting a blog"
 if(isset($_POST['submit-post'])){
    echo "<meta http-equiv='refresh' content='0'>";//force page refresh
    try{
        $mysqli = new mysqli("127.0.0.1", "root", "root", "sports");
        if($mysqli->connect_error) {
            exit('Error connecting to database'); 
          }
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli->set_charset("utf8mb4");

        $stmt = $mysqli->prepare("INSERT INTO blog_posts(title, text, tags, post_date) VALUES(?, ?, ?, NOW());");
        $stmt->bind_param("sss", $_POST["title"], $_POST["post"], $_POST["tags"]);
        $stmt->execute();
        $stmt->close();
    }
    catch(exception $e){
        //echo "Connection failed: " . $e->getMessage();
    } 
 }

//deleting a blog post
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    try{
        if ($_SESSION['id'] == 1 || $_SESSION['id'] == 2) {
            if(isset($_GET['delete-post'])){
                $mysqli = new mysqli("127.0.0.1", "root", "root", "sports");
                if($mysqli->connect_error) {
                    exit('Error connecting to database'); 
                  }
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $mysqli->set_charset("utf8mb4");
        
                $stmt = $mysqli->prepare("DELETE FROM blog_posts WHERE id = ?");
                $stmt->bind_param("i", $_GET['delete-post']);
                echo "<script>";
                echo "var confirm = window.confirm('Confirm Delete Post?');";
                echo "if(confirm === true){";
                        $stmt->execute();
                echo    "window.location.href = 'blog.php';";
                echo "};";
                echo   "</script>";
                $stmt->close();
            }
            
        }
    }
    catch(exception $e){
        //echo "Connection failed: " . $e->getMessage();
    } 
 }
?>