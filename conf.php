<?php
    $apiKey = "brutalny_api_kluc_123";
    // kyvadlo_speed values in range <0,1000>;
    $kyvadlo_speed = 200;

    if(isset($_GET['lang']) && strtoupper($_GET['lang']) == 'SK') require_once __DIR__ ."/lang/sk.php";
    else require_once __DIR__."/lang/en.php";
?>