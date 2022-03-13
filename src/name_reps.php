<?php
    header("Content-type: text/json; charset=UTF-8");
    session_start();
    $realname = $_SESSION["realname"];
    echo json_encode($realname);