<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $name = $_POST[name];
    $quota1 = (int)$_POST[quota1];
    $quota2 = (int)$_POST[quota2];
    $quota3 = (int)$_POST[quota3];

    $sql = "SELECT `quota_N95`, `quota_surgical`, `quota_surgical_N95` 
            FROM `sales_rep` WHERE `realname` = '$name'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $quota_N95 = $row["quota_N95"];
    $quota_surgical = $row["quota_surgical"];
    $quota_surgical_N95 = $row["quota_surgical_N95"];

    $quota_N95 = $quota_N95 + $quota1;
    $quota_surgical = $quota_surgical + $quota2;
    $quota_surgical_N95 = $quota_surgical_N95 + $quota3;

    $conn->query("UPDATE `sales_rep` SET `quota_N95`='$quota_N95',`quota_surgical`='$quota_surgical',`quota_surgical_N95`='$quota_surgical_N95' 
                        WHERE `realname` = '$name'");
    echo json_encode(1);

    $conn->close();