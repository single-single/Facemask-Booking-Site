<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    session_start();
    $region = $_SESSION["region"];

    $sql = "SELECT `realname`, `telephonenumber`, `emailaddress` 
            FROM `sales_rep` WHERE `region` = '$region'";
    $result = $conn->query($sql);

    $arr = array();
    $realname = array();
    while ($row = mysqli_fetch_row($result)) {
        $arr[] = $row;
        $realname[] = $row[0];
    }

    $_SESSION["realname"] = $realname;

    echo json_encode($arr);

    $conn->close();
