<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $sql = "SELECT `status` FROM `order` WHERE `id` = '$_POST[id]'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $status = $row["status"];

    if ($status == "completed") {
        echo 1;
    } else {
        echo 2;
    }

    $conn->close();