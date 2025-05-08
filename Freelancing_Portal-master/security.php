<?php

session_start();
$auth = (isset($_SESSION['freelancer_id']) && isset($_SESSION['freelancer_name'])) || (isset($_SESSION['employer_id']) && isset($_SESSION['employer_name']));

if(!$auth)
{
    header("Location: http://localhost/hirelancer/login.php");
}

include "database.php";
$base_url = "http://localhost/hirelancer/";
?>