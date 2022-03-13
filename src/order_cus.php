<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    session_start();
    $username = $_SESSION["username"];

    $sql = "SELECT `id`, `N95`, `surgical`, `surgical_N95`, `sales_rep`, `time`, `status` 
            FROM `order` WHERE `customer` = '$username'";
    $result = $conn->query($sql);

    $arr = array();
    while ($row = mysqli_fetch_row($result)) {
        $arr[] = $row;
    }

    echo json_encode($arr);

    $conn->close();
