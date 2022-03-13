<?php
    session_start();
    header("Content-type: text/json; charset=UTF-8");
    session_unset();
    session_destroy();
