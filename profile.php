<?php include("config/pageconfig.php"); session_start(); error_reporting(0); ?>

<?php 
try{
    $conn = mysqli_connect('127.0.0.1', 'root', 'root', 'sports');
    //echo "Connected successfully"; 
    $queryHome = "SELECT header, text FROM home_page ORDER BY id DESC LIMIT 1;";
    $queryAbout = "SELECT header, text FROM about_us ORDER BY id DESC LIMIT 1;";

    $resultHome = mysqli_query($conn, $queryHome);
    while($row = mysqli_fetch_assoc($resultHome)){
        $_SESSION['homePageHeader'] = $row['header'];
        $_SESSION['homePageText'] = $row['text'];
    } 
    $resultAbout = mysqli_query($conn, $queryAbout);
    while($row = mysqli_fetch_assoc($resultAbout)){
        $_SESSION['aboutUsHeader'] = $row['header'];
        $_SESSION['aboutUsText'] = $row['text'];
    } 
    mysqli_close($conn);
}
catch(exception $e){
    echo "Connection failed: " . $e->getMessage();
} 

?>

<?php include_once ("classes/Player.PDO.Class.php"); ?>
<?php include("assets/inc/phpmailer_use_require.php"); ?>
<?php include("assets/inc/phpmailer_download_db.php"); ?>
<?php include("assets/inc/phpmailer_report_profile.php"); ?>

<?php include ("assets/inc/header.inc.php");?>
<?php include("assets/inc/show_profile.php"); ?>
<?php include("assets/inc/admin_search.php"); ?>
<?php include("assets/inc/delete_profile.php"); ?>



<?php include("assets/inc/footer.inc.php"); ?>

<?php include("assets/inc/handle_myinfo.php");?>


