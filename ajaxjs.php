
<?php
/**
 * Created by PhpStorm.
 * User: Divyam Singh
 * Date: 3/15/2018
 * Time: 8:54 PM
 */
include_once 'connect.inc.php';
    $sno=$_POST['sno'];
    $update="Update details1 set status='closed' where sno='$sno'";
    $qry_execute=mysqli_query($con,$update);
    ?>
