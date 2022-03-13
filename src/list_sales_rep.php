<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $sql1 = "SELECT `sales_rep` FROM `order` WHERE 1";
    $result1 = $conn->query($sql1);
    $arr1 = array();
    while ($row = mysqli_fetch_row($result1)) {
        $arr1[] = $row[0];
    }
    $arr1 = array_unique($arr1);
    sort($arr1);

    $arr3 = array();
    $i = 0;
    foreach ($arr1 as $value) {
        $sql2 = "SELECT `N95`, `surgical`, `surgical_N95` FROM `order` WHERE `sales_rep`='$value' AND `status`='completed'";
        $result2 = $conn->query($sql2);
        $arr2 = array();
        while ($row = mysqli_fetch_row($result2)) {
            $arr2[] = $row;
        }
        $amount1 = 0;
        $amount2 = 0;
        $amount3 = 0;
        foreach ($arr2 as $value) {
            $amount1 = $amount1 + $value[0];
            $amount2 = $amount2 + $value[1];
            $amount3 = $amount3 + $value[2];
        }
        $arr3[] = array($arr1[$i], $amount1, $amount2, $amount3);
        $i++;
    }

    echo json_encode($arr3);

    $conn->close();