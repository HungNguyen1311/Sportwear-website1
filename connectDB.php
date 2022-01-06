<?php
    $hostname = 'localhost:3306';
    $username = 'root';
    $password = '';
    $dbname = "data3";
    $con = new mysqli($hostname, $username, $password,$dbname);
    if ($con->connect_error) {
        die("Không thể kết nối: " . mysqli_error($con));
        exit();
    }
   //else echo "Kết nối thành công"."<br>";
