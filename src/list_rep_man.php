<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $sql = "SELECT `realname`, `employeeid`, `quota_N95`, `quota_surgical`, `quota_surgical_N95` 
            FROM `sales_rep` WHERE 1";
    $result = $conn->query($sql);

    $arr = array();
    $name = array();
    while ($row = mysqli_fetch_row($result)) {
        $arr[] = $row;
        $name[] = $row[0];
    }

    session_start();
    $_SESSION["name_rep_man"] = $name;

    echo json_encode($arr);

    $conn->close();