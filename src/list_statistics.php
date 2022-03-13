<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $sql = "SELECT `customer`, `time` FROM `order` WHERE `status`='completed'";
    $result = $conn->query($sql);
    $arr = array();
    while ($row = mysqli_fetch_row($result)) {
        $arr[] = $row;
    }

    $arr1 = array();
    $cus = 0;
    $week = (int)$_POST[week];
    foreach ($arr as $value) {
        $dup = 0;
        foreach ($arr1 as $v) {
            if ($v == $value[0]) {
                $dup = 1;
                break;
            }
        }
        $diff = strtotime($time_now) - strtotime($value[1]);
        if ($diff < $week*604800 && $dup == 0) {
            $cus++;
            $arr1[] = $value[0];
        }
    }

    $cus_w = round($cus/$week, 2);
    $cus_d = round($cus/($week*7), 2);
    $arr2 = array($cus, $cus_w, $cus_d);

    echo json_encode($arr2);

    $conn->close();