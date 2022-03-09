<?php

    $servername = "localhost";
    $username = "matteodaaddato";
    $password = "";
    $dbname = "my_matteodaaddato";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("connection failed ".$conn->connect_error );
    }

?>