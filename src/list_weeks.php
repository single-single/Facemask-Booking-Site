<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $sql = "SELECT `N95`, `surgical`, `surgical_N95`, `time` FROM `order` WHERE `status`='completed'";
    $result = $conn->query($sql);
    $arr = array();
    while ($row = mysqli_fetch_row($result)) {
        $arr[] = $row;
    }

    $N95_1 = 0;
    $surgical_1 = 0;
    $surgical_N95_1 = 0;
    $N95_2 = 0;
    $surgical_2 = 0;
    $surgical_N95_2 = 0;
    $N95_3 = 0;
    $surgical_3 = 0;
    $surgical_N95_3 = 0;

    $time_now = date('YmdHis');
    foreach ($arr as $value) {
        $diff = strtotime($time_now) - strtotime($value[3]);
        if ($diff < 604800) {
            $N95_1 = $N95_1 + $value[0];
            $surgical_1 = $surgical_1 + $value[1];
            $surgical_N95_1 = $surgical_N95_1 + $value[2];
        }
        if ($diff < 1209600) {
            $N95_2 = $N95_2 + $value[0];
            $surgical_2 = $surgical_2 + $value[1];
            $surgical_N95_2 = $surgical_N95_2 + $value[2];
        }
        if ($diff < 1814400) {
            $N95_3 = $N95_3 + $value[0];
            $surgical_3 = $surgical_3 + $value[1];
            $surgical_N95_3 = $surgical_N95_3 + $value[2];
        }
    }

    $arr1 = array('1', $N95_1, $surgical_1, $surgical_N95_1);
    $arr2 = array('2', $N95_2, $surgical_2, $surgical_N95_2);
    $arr3 = array('3', $N95_3, $surgical_3, $surgical_N95_3);
    $arr4 = array($arr1, $arr2, $arr3);

    echo json_encode($arr4);

    $conn->close();