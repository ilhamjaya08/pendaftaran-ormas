<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'dbdash';
$conn = mysqli_connect($host, $user, $pass, $db);

if($conn->connect_error){
    die('Database connection error: ' . $conn->connect_error);
}