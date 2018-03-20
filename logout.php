<?php
/**
 * Created by PhpStorm.
 * User: Cratos
 * Date: 20-03-2018
 * Time: 11:55
 */
session_start();
unset($_SESSION['username']);
session_destroy();
header("Location:login.php");
?>