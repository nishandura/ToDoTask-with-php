<?php
$servername = "localhost";
$username ="root";
$password = "";
$dbname = "task";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn){
    // echo "database connection successful";
}else{
    echo "database connection failed";
}
?>