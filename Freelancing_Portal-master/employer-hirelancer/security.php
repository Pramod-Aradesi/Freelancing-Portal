<?php

session_start();
$auth = (isset($_SESSION['employers_id']) && isset($_SESSION['employers_name']));

if(!$auth)
{
    header("Location: http://localhost/hirelancer/employer-hirelancer/index.php");
}

include "database.php";
$base_url = "http://localhost/hirelancer/employer-hirelancer";
?>