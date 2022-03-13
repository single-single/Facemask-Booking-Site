<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    session_start();
    $name = $_SESSION["username"];

    $sql = "SELECT `id` FROM `order` WHERE `customer` = '$name'";
    $result = $conn->query($sql);

    $arr = array();
    while ($row = mysqli_fetch_row($result)) {
        $arr[] = $row;
    }

    echo json_encode($arr);

    $conn->close();