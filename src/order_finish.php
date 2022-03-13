<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $sql1 = "SELECT `id`, `N95`, `surgical`, `surgical_N95`, `sales_rep`, `customer` 
             FROM `order` WHERE `id` = '$_POST[id]'";
    $result1 = $conn->query($sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $id = $row1["id"];
    $N95 = $row1["N95"];
    $surgical = $row1["surgical"];
    $surgical_N95 = $row1["surgical_N95"];
    $sales_rep = $row1["sales_rep"];
    $customer = $row1["customer"];

    session_start();
    $name = $_SESSION["name_r"];

    $sql2 = "SELECT `quota_N95`, `quota_surgical`, `quota_surgical_N95` 
             FROM `sales_rep` WHERE `realname` = '$name'";
    $result2 = $conn->query($sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $quota_N95 = $row2["quota_N95"];
    $quota_surgical = $row2["quota_surgical"];
    $quota_surgical_N95 = $row2["quota_surgical_N95"];

    $quota_N95 = $quota_N95 - $N95;
    $quota_surgical = $quota_surgical - $surgical;
    $quota_surgical_N95 = $quota_surgical_N95 - $surgical_N95;

    $conn->query("UPDATE `order` SET `status` = 'completed' WHERE `id` = '$_POST[id]'");
    if ($quota_N95>=0 && $quota_surgical>=0 && $quota_surgical_N95>=0) {
        $conn->query("UPDATE `sales_rep` SET `quota_N95`='$quota_N95',`quota_surgical`='$quota_surgical',`quota_surgical_N95`='$quota_surgical_N95' 
                            WHERE `realname` = '$name'");
    } else {
        $conn->query("INSERT INTO `order_abnormal`(`id`, `N95`, `surgical`, `surgical_N95`, `sales_rep`, `customer`) 
                            VALUES ('$id','$N95','$surgical','$surgical_N95','$sales_rep','$customer')");
    }

    echo json_encode(0);

    $conn->close();