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
                $conn = mysqli_connect('127.0.0.1', 'root', 'root', 'sports');
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
            }
            catch(exception $e){
                echo "Connection failed: " . $e->getMessage();
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

    if(isset($_POST["submit-post"])){
        //force page refresh, makes it so person doesn't have to reload and resend page after submitting a new post
        echo "<meta http-equiv='refresh' content='0'>";
        $title  = mysqli_real_escape_string($_POST["title"]);
        $post   = mysqli_real_escape_string($_POST["post"]);
        $tags   = mysqli_real_escape_string($_POST["tags"]);
        $title  = nl2br(htmlentities(strip_tags(trim($_POST["title"]))));
        $post   = nl2br(htmlentities(strip_tags(trim($_POST["post"]))));
        $tags   = nl2br(htmlentities(strip_tags(trim($_POST["tags"]))));
        $query = "INSERT INTO blog_posts(title, text, tags, post_date) VALUES('$title', '$post', '$tags', NOW())";
        $result = mysqli_query($conn, $query);
    }


    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        //check if admin, if yes, show delete button
        if ($_SESSION['id'] == 1 || $_SESSION['id'] == 2) {
            if(isset($_GET['delete-post'])){
                $query = "DELETE FROM blog_posts WHERE id = {$_GET['delete-post']};";
                echo "<script>";
                echo  "if (window.confirm('Confirm Delete Post?')){";
                        mysqli_query($conn, $query);
                echo    "window.location.href = 'blog.php';";
                echo "};";
                echo   "</script>"; 
            }
        }
    }




        
    
?>