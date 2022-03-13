<?php
    header("Content-type: text/json; charset=UTF-8");

    require("connect.php");

    $sql = "SELECT * FROM `customer` WHERE `username` = '$_POST[username]'";
    $result = $conn->query($sql);
    $number = mysqli_num_rows($result);

    $username = $_POST[username];
    $realname = $_POST[realname];
    $passportid = $_POST[passportid];
    $telephone = $_POST[telephone];
    $region = $_POST[region];
    $email = $_POST[email];
    $password = $_POST[password];

    if ($number) {
        echo json_encode(1);
    } else {
        $conn->query("INSERT INTO `customer` (`username`, `realrname`, `passportid`, `telephonenumber`, `region`, `emailaddress`, `password`) 
                             VALUES ('$username','$realname','$passportid','$telephone','$region','$email','$password')");
        echo json_encode(2);
    }

    $conn->close();