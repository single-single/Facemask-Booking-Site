<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $sql1 = "SELECT `region` FROM `customer` WHERE 1";
    $result1 = $conn->query($sql1);
    $arr1 = array();
    while ($row = mysqli_fetch_row($result1)) {
        $arr1[] = $row[0];
    }
    $arr1 = array_unique($arr1);
    sort($arr1);

    $arr3 = array();
    foreach ($arr1 as $value) {
        $sql2 = "SELECT `username` FROM `customer` WHERE `region`='$value'";
        $result2 = $conn->query($sql2);
        $arr2 = array();
        while ($row = mysqli_fetch_row($result2)) {
            $arr2[] = $row[0];
        }
        $arr3[] = $arr2;
    }

    $arr5 = array();
    $i = 0;
    foreach ($arr3 as $value) {
        $amount1 = 0;
        $amount2 = 0;
        $amount3 = 0;
        foreach ($value as $v) {
            $sql3 = "SELECT `N95`, `surgical`, `surgical_N95` FROM `order` WHERE `customer`='$v' AND `status`='completed'";
            $result3 = $conn->query($sql3);
            $arr4 = array();
            while ($row = mysqli_fetch_row($result3)) {
                $arr4[] = $row;
            }
            foreach ($arr4 as $amount) {
                $amount1 = $amount1 + $amount[0];
                $amount2 = $amount2 + $amount[1];
                $amount3 = $amount3 + $amount[2];
            }
        }
        $arr5[] = array($arr1[$i], $amount1, $amount2, $amount3);
        $i++;
    }

    echo json_encode($arr5);

    $conn->close();