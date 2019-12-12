<?php include("config/pageconfig.php"); session_start();

error_reporting(E_ALL); 

ini_set('display_errors', E_ALL);
ini_set('display_startup_errors', E_ALL);
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
                $connection = mysqli_connect('127.0.0.1', 'root', 'y#GbqXtBGcy!z3Cf', 'sports');
                //echo "Connected successfully"; 
                $query = "SELECT * FROM blog_posts
                 ORDER BY id DESC;";
                $result = mysqli_query($connection, $query);
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
                        <audio controls>
                            <!-- <source src="horse.ogg" type="audio/ogg"> -->
                            <source src='/assets/audio/<?php echo $row['podcast'] . ".mp3" ?>' type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio> 
                        <p>Tags: <?php echo $row['tags'] ?></p>
                        <hr>
                    </div>
        <?php } 
                mysqli_close($connection);
            }
            catch(exception $e){
                echo "Connection failed: " . $e->getMessage();
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
    if(is_uploaded_file($_FILES['podcast']['tmp_name'])){
        $fileName = $_FILES['podcast']['name'];
        $tmpName = $_FILES['podcast']['tmp_name'];
        $fileSize = $_FILES['podcast']['size'];
        $fileType = $_FILES['podcast']['type'];
        var_dump($filetype);
        if ($fileType != 'audio/mpeg' && $fileType != 'audio/mpeg3' && $fileType != 'audio/mp3' && $fileType != 'audio/x-mpeg' && $fileType != 'audio/x-mp3' && $fileType != 'audio/x-mpeg3' && $fileType != 'audio/x-mpg' && $fileType != 'audio/x-mpegaudio' && $fileType != 'audio/x-mpeg-3') {
            echo('<script>alert("Error! File needs to be an mp3.")</script>');
        } else if ($fileSize > '10485760') {
            echo('<script>alert("File should not be more than 10mb")</script>');
        }else{
            // // get the file extension first
            $ext = substr(strrchr($fileName, "."), 1); 
        
            // make the random file name
            $randName = md5(rand() * time());
        
            // and now we have the unique file name for the upload file
            $dest='./assets/audio/'. $randName . '.' . $ext;
        
            $result = move_uploaded_file($tmpName, $dest);
            if (!$result) {
                echo "<script>alert('Error Uploading File')</script>";
                exit;
            }
        }
    }
    try{
        $mysqli = new mysqli("127.0.0.1", "root", "y#GbqXtBGcy!z3Cf", "sports");
        if($mysqli->connect_error) {
            exit('Error connecting to database'); 
          }
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli->set_charset("utf8mb4");

        // $title = htmlentities($_POST['title']);
        // $tags = htmlentities($_POST['tags']);
        // $post = htmlentities($_POST['post']);
        $title = $_POST['title'];
        $tags = $_POST['tags'];
        $post = $_POST['post'];
        $image = $_FILES['blogImage']['name'];
        $podcast = $randName;
        //var_dump($post);

        $stmt = $mysqli->prepare("INSERT INTO blog_posts(title, text, tags, post_date, post_image, youtube_link, podcast) VALUES(?, ?, ?, NOW(), ?, ?, ?);");
        $stmt->bind_param("ssssss", $title, $post, $tags, $image, $saveUrl, $podcast);
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

