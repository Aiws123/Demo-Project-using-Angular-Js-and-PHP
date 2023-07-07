<?php

ob_start();
session_start();
// defined("INC_CLASS") or die("Invalid Access");

if(!isset($_SESSION['name']) && ($_SESSION['name'] == false))
{
    header("Location:login.php");
    exit;
}


?>