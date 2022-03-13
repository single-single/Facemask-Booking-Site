<?php
    $servername = "localhost";
    $username = "scysx1";
    $password = "Xsq.10180501";
    $dbname = "scysx1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
