<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    session_start();
    $id = substr(str_shuffle(md5(time())), 0, 8);
    $name = $_SESSION["name_r"];
    $quota1 = (int)$_POST[quota1];
    $quota2 = (int)$_POST[quota2];
    $quota3 = (int)$_POST[quota3];
    $status = "processing";

    $conn->query("INSERT INTO `quota` (`id`, `sales_rep`, `quota_N95`, `quota_surgical`, `quota_surgical_N95`, `status`) 
                        VALUES ('$id','$name','$quota1','$quota2','$quota3','$status')");
    echo json_encode(1);

    $conn->close();