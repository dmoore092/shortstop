<?php 
try{
    $conn = mysqli_connect('127.0.0.1', 'root', 'KeyHole1!@', 'sports');
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
    //echo "Connection failed: " . $e->getMessage();
} 

?>