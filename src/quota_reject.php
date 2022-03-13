<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $id = $_POST[id];
    $status = "rejected";

    $conn->query("UPDATE `quota` SET `status`='$status' WHERE `id`='$id'");

    echo json_encode(1);

    $conn->close();