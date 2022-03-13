<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $sql1 = "SELECT `N95`, `surgical`, `surgical_N95` FROM `order` WHERE `id` = '$_POST[id]'";
    $result1 = $conn->query($sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $N95 = $row1["N95"];
    $surgical = $row1["surgical"];
    $surgical_N95 = $row1["surgical_N95"];

    session_start();
    $name = $_SESSION["name_r"];

    $sql2 = "SELECT `quota_N95`, `quota_surgical`, `quota_surgical_N95` 
             FROM `sales_rep` WHERE `realname` = '$name'";
    $result2 = $conn->query($sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $quota_N95 = $row2["quota_N95"];
    $quota_surgical = $row2["quota_surgical"];
    $quota_surgical_N95 = $row2["quota_surgical_N95"];

    if ($quota_N95<$N95 || $quota_surgical<$surgical || $quota_surgical_N95<$surgical_N95) {
        echo 1;
    } else {
        echo 2;
    }

    $conn->close();