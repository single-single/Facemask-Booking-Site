<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    session_start();
    $name = $_SESSION["name_r"];

    $sql = "SELECT * FROM `order` WHERE `id` = '$_POST[id]'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_row($result);

    $conn->query("INSERT INTO `order_canceled`(`id`, `N95`, `surgical`, `surgical_N95`, `sales_rep`, `customer`, `time`, `cancellation`)
                         VALUES ('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$name')");
    $conn->query("DELETE FROM `order` WHERE `id` = '$_POST[id]'");
    echo json_encode(0);

    $conn->close();