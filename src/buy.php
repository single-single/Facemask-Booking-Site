<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    session_start();
    $id = substr(str_shuffle(md5(time())), 0, 8);
    $quota1 = (int)$_POST[quota1];
    $quota2 = (int)$_POST[quota2];
    $quota3 = (int)$_POST[quota3];
    $realname = $_POST[name];
    $username = $_SESSION["username"];
    $time = date('YmdHis');
    $status = "processing";

    $conn->query("INSERT INTO `order`(`id`, `N95`, `surgical`, `surgical_N95`, `sales_rep`, `customer`, `time`, `status`) 
                        VALUES ('$id','$quota1','$quota2','$quota3','$realname','$username','$time','$status')");
    echo json_encode(1);

    $conn->close();