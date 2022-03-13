<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $sql = "SELECT * FROM `customer` WHERE `username` = '$_POST[username]' AND `password` = '$_POST[password]'";

    $result = $conn->query($sql);
    $number = mysqli_num_rows($result);
    $tuple = mysqli_fetch_assoc($result);

    session_start();
    $_SESSION["region"] = $tuple["region"];
    $_SESSION["username"] = $tuple["username"];

    if (!$number) {
        echo json_encode(1);
    } else {
        echo json_encode(2);
    }

    $conn->close();
