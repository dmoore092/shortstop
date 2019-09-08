<?php include("config/pageconfig.php"); session_start();

error_reporting(E_ALL); 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$canDelete = false;
?>
<?php include("assets/inc/header.inc.php") ?>
        <div id="body-main">   
            <h1>Blog @ Athletic Prospects</h1>
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
            //rewrite this section. Get rid of echo'd code, replace mysqli
            try{
                $conn = mysqli_connect('127.0.0.1', 'root', 'y#GbqXtBGcy!z3Cf', 'sports');
                //echo "Connected successfully"; 
                $query = "SELECT * FROM blog_posts ORDER BY id DESC;";
                $result = mysqli_query($conn, $query);
        ?>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="post">
            <?php if($canDelete == true){ ?>
                <?php $postid = $row['id']; ?>
                    <form action='blog.php' >
                        <button name='delete-post' value=<?php echo $postid ?>>Delete Post</button>
                    </form>
            <?php } ?> 
                    <div class="post-header">
                        <h3><?php echo $row['title']?></h3>
                        <h6>By <?php echo $row['author']?></h6>
                        <h6><?php echo $row['post_date']?></h6>
                    </div>
                    <!-- <div class="clear"></div> -->
        <?php if($row['post_image'] != ""){ ?>
                    <img src='assets/img/blogpictures/<?php echo $row['post_image']?>' alt='blog picture' class='blog-pic'>
        <?php } ?>
                    <p class='text'> <?php echo nl2br($row['text']) ?></p>
        <?php if($row['youtube_link'] != NULL){ ?>
                    <p id='frame-container'><iframe id='ytplayer' allowfullscreen type='text/html' src='<?php echo $row['youtube_link'] ?>'></iframe></p>
        <?php } ?>
                    <!-- <div> -->
                        <p>Tags: <?php echo $row['tags'] ?></p>
                        <hr>
                    </div>
        <?php } 
                mysqli_close($conn);
            }
            catch(exception $e){
                //echo "Connection failed: " . $e->getMessage();
            } 
        ?>
        </div> <!-- end of .blog -->
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
    $uploadOk = 1;
    mysql_real_escape_string($_POST['text']);

    if (is_uploaded_file($_FILES['blogImage']['tmp_name'])){
        //First, Validate the file name
        if(empty($_FILES['blogImage']['name'])){
            echo " File name is empty! ";
            $uploadOk = 0;
            exit;
        }
        $upload_file_name = $_FILES['blogImage']['name'];
        //Too long file name?
        if(strlen ($upload_file_name)>100){
            echo " too long file name ";
            $uploadOk = 0;
        }
        $check = getimagesize($_FILES["blogImage"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        //replace any non-alpha-numeric cracters in th file name
        $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
        //set a limit to the file upload size
        if ($_FILES['blogImage']['size'] > 1000000){
            echo " File is too large ";
            $uploadOk = 0;        
        }
        //Save the file
        if ($uploadOk == 1){
            $dest='./assets/img/blogpictures/'.$upload_file_name;
            if (move_uploaded_file($_FILES['blogImage']['tmp_name'], $dest)){
                echo 'File Has Been Uploaded !';
            }
            else{
                //var_dump($_FILES['1111.jpg']['error']);
               echo 'File was not uploaded';
            }
        }
    }
    if(isset($_POST['blog-youtube'])){
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $_POST['blog-youtube'], $match)) {
            $video_id = $match[1];
            $saveUrl = "https://www.youtube.com/embed/".$video_id;
            //return $saveUrl;
        }
    }

    try{
        $mysqli = new mysqli("127.0.0.1", "root", "y#GbqXtBGcy!z3Cf", "sports");
        if($mysqli->connect_error) {
            exit('Error connecting to database'); 
          }
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli->set_charset("utf8mb4");

        $stmt = $mysqli->prepare("INSERT INTO blog_posts(title, text, tags, post_date, post_image, youtube_link) VALUES(?, ?, ?, NOW(), ?, ?);");
        $stmt->bind_param("sssss", mysql_real_escape_string($_POST['title']), 
                                    mysql_real_escape_string($_POST["post"]), 
                                    mysql_real_escape_string($_POST["tags"]), 
                                    mysql_real_escape_string($_FILES['blogImage']['name']), 
                                    mysql_real_escape_string($saveUrl));
        $stmt->execute();
        $stmt->close();
    }
    catch(exception $e){
        echo "Connection failed: " . $e->getMessage();
    } 
 }

//deleting a blog post
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    try{
        if ($_SESSION['id'] == 1 || $_SESSION['id'] == 2) {
            if(isset($_GET['delete-post'])){
                $mysqli = new mysqli("127.0.0.1", "root", "y#GbqXtBGcy!z3Cf", "sports");
                if($mysqli->connect_error) {
                    exit('Error connecting to database'); 
                  }
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $mysqli->set_charset("utf8mb4");
        
                $stmt = $mysqli->prepare("DELETE FROM blog_posts WHERE id = ?");
                $stmt->bind_param("i", $_GET['delete-post']);
                echo "<script>";
                echo "var confirm = window.confirm('Do you really want to delete that post?');";
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

