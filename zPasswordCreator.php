<?php
$password = 'keyhole1';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo $hashed_password;

try{
    $conn = mysqli_connect('nt71li6axbkq1q6a.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'ugaf16xakn6l03kv', 'pzai4vad7q5d55gr', 'died52h990bhctqt');
    //echo "Connected successfully"; 
    $query = "SELECT header, text FROM home_page ORDER BY id DESC LIMIT 1;";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result)){
        echo "<h2>$row</h2>";
        echo "<hr>";
    } 
}
catch(exception $e){
    //echo "Connection failed: " . $e->getMessage();
} 
?>