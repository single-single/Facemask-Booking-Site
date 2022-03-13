<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $sql = "SELECT `time` FROM `order` WHERE `id` = '$_POST[id]'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);

    $time_buy = $row["time"];
    $time_now = date('YmdHis');
    $diff = strtotime($time_now) - strtotime($time_buy);

    if ($diff > 86400) {
        echo 1;
    } else {
        echo 2;
    }

    $conn->close();