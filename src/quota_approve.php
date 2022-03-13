<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $id = $_POST[id];
    $status = "approved";

    $sql1 = "SELECT `sales_rep`, `quota_N95`, `quota_surgical`, `quota_surgical_N95` FROM `quota` WHERE `id` = '$id'";
    $result1 = $conn->query($sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $sales_rep = $row1["sales_rep"];
    $N95 = $row1["quota_N95"];
    $surgical = $row1["quota_surgical"];
    $surgical_N95 = $row1["quota_surgical_N95"];

    $sql2 = "SELECT `quota_N95`, `quota_surgical`, `quota_surgical_N95` 
             FROM `sales_rep` WHERE `realname` = '$sales_rep'";
    $result2 = $conn->query($sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $quota_N95 = $row2["quota_N95"];
    $quota_surgical = $row2["quota_surgical"];
    $quota_surgical_N95 = $row2["quota_surgical_N95"];

    $quota_N95 = $quota_N95 + $N95;
    $quota_surgical = $quota_surgical + $surgical;
    $quota_surgical_N95 = $quota_surgical_N95 + $surgical_N95;

    $conn->query("UPDATE `quota` SET `status`='$status' WHERE `id`='$id'");
    $conn->query("UPDATE `sales_rep` SET `quota_N95`='$quota_N95',`quota_surgical`='$quota_surgical',`quota_surgical_N95`='$quota_surgical_N95' 
                        WHERE `realname` = '$sales_rep'");
    echo json_encode(1);

    $conn->close();