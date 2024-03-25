<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ql_nhansu";

    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if($conn->connect_error){
        die("Kết nối thất bại: " . $conn->connect_error);
    }
?>