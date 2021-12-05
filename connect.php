<?php 

    DEFINE('DB_HOST', 'localhost');
    DEFINE('DB_USER', 'root');
    DEFINE('DB_PASS', '');
    DEFINE('DB_NAME', 'it15_database');

    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME) or die('Error Connecting...'.mysqli_connect_error());


?>