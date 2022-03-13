<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $sql1 = "SELECT * FROM `sales_rep` WHERE `username` = '$_POST[username]'";
    $result1 = $conn->query($sql1);
    $number1 = mysqli_num_rows($result1);

    $sql2 = "SELECT * FROM `sales_rep` WHERE `employeeid` = '$_POST[employeeid]'";
    $result2 = $conn->query($sql2);
    $number2 = mysqli_num_rows($result2);

    $username = $_POST[username];
    $realname = $_POST[realname];
    $employeeid = $_POST[employeeid];
    $telephone = $_POST[telephone];
    $region = $_POST[region];
    $email = $_POST[email];
    $password = $_POST[password];

    if ($number1) {
        echo json_encode(1);
    } else if ($number2) {
        echo json_encode(2);
    } else {
        $conn->query("INSERT INTO `sales_rep` (`username`, `realname`, `employeeid`, `telephonenumber`, `region`, `emailaddress`, `password`, `quota_N95`, `quota_surgical`, `quota_surgical_N95`) 
                             VALUES ('$username','$realname','$employeeid','$telephone','$region','$email','$password','0','0','0')");
        echo json_encode(3);
    }

    $conn->close();