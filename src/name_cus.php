<?php
    header("Content-type: text/json; charset=UTF-8");
    session_start();
    $username = $_SESSION["username"];
    echo json_encode($username);