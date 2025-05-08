<?php

session_start();
$auth = (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name']));

if(!$auth)
{
    header("Location: http://localhost/hirelancer/admin-hirelancer/index.php");
}

include "database.php";
$base_url = "http://localhost/hirelancer/admin-hirelancer";
?>