<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $sql1 = "SELECT `N95`, `surgical`, `surgical_N95` FROM `order` WHERE `status`='completed'";
    $result1 = $conn->query($sql1);

    $arr1 = array();
    $arr2 = array();
    $arr3 = array();
    while ($row = mysqli_fetch_row($result1)) {
        $arr1[] = $row[0];
        $arr2[] = $row[1];
        $arr3[] = $row[2];
    }

    $amount1 = 0;
    foreach ($arr1 as $value) {
        $amount1 = $amount1 + $value;
    }

    $amount2 = 0;
    foreach ($arr2 as $value) {
        $amount2 = $amount2 + $value;
    }

    $amount3 = 0;
    foreach ($arr3 as $value) {
        $amount3 = $amount3 + $value;
    }

    $amount = $amount1 + $amount2 + $amount3;
    $revenue = 3*$amount1 + 1*$amount2 + 5*$amount3;

    $sql2 = "SELECT `N95`, `surgical`, `surgical_N95` FROM `order` WHERE `status`='processing'";
    $result2 = $conn->query($sql2);

    $arr4 = array();
    $arr5 = array();
    $arr6 = array();
    while ($row = mysqli_fetch_row($result2)) {
        $arr4[] = $row[0];
        $arr5[] = $row[1];
        $arr6[] = $row[2];
    }

    $amount4 = 0;
    foreach ($arr4 as $value) {
        $amount4 = $amount4 + $value;
    }

    $amount5 = 0;
    foreach ($arr5 as $value) {
        $amount5 = $amount5 + $value;
    }

    $amount6 = 0;
    foreach ($arr6 as $value) {
        $amount6 = $amount6 + $value;
    }

    $amount_p = $amount4 + $amount5 + $amount6;

    $arr = array($amount, $revenue, $amount_p);

    echo json_encode($arr);

    $conn->close();