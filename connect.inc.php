<?php
$username = 'root';
$password = '';
$host = '127.0.0.1';
$database = 'hkt';
$con = mysqli_connect($host,$username,$password,$database);
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
