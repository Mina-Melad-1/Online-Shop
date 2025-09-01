<?php 
$conn = new mysqli('localhost','root','','onlineshopdb');
    if(!$conn){
        echo "Connection Failed: ". $conn->connect_error;
    }
?>