<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $sql = "SELECT * FROM `quota` WHERE `status` = 'processing'";
    $result = $conn->query($sql);

    $arr = array();
    while ($row = mysqli_fetch_row($result)) {
        $arr[] = $row;
    }

    echo json_encode($arr);

    $conn->close();