<?php
    header("Content-type: text/json; charset=UTF-8");
    session_start();
    $name = $_SESSION["name_rep_man"];
    echo json_encode($name);