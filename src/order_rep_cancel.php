<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    session_start();
    $name = $_SESSION["name_r"];

    $sql = "SELECT `id`, `N95`, `surgical`, `surgical_N95`, `customer`, `time`, `cancellation` 
            FROM `order_canceled` WHERE `sales_rep` = '$name'";
    $result = $conn->query($sql);

    $arr = array();
    while ($row = mysqli_fetch_row($result)) {
        $arr[] = $row;
    }

    echo json_encode($arr);

    $conn->close();