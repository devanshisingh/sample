<?php
include_once 'header.php';
if(isset($_POST['submit'])) {
    $uid = $_POST['adhar'];
    $text = $_POST['problem'];
    $insert1 = "Insert into details1 ('uid','problem','status') values('$uid','$text','pending')";
    if ($qry=mysqli_query($con, $insert1)) {
        echo "succcessfull";
    }
}
else{
    echo"ycffc";
}

?>