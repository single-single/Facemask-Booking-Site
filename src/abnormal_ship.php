<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $id = $_POST[id];

    $conn->query("DELETE FROM `order_abnormal` WHERE `id`='$id'");

    echo json_encode(1);

    $conn->close();