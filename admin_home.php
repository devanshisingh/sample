<?php
include_once 'header.php';
session_start();
if(!(isset($_SESSION['username']))){
    header('Location:index.php');
}
else
{
    $qu1="SELECT * FROM details1 where status='pending'";
    $qry_execute=mysqli_query($con, $qu1);
    echo mysqli_error($qry_execute);
    $i=0;
    while($da=mysqli_fetch_array($qry_execute)) {
        $i++;
        $problem = $da['problem'];
        echo ($i);
        echo($problem);
    }


}
?>

