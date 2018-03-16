<?php
include_once 'header.php';
if(isset($_POST['submit'])) {
    $sno = $_POST['sno'];

    $qu1 = "SELECT * FROM details1 where sno='$sno'";
    $qry_execute = mysqli_query($con, $qu1);
    echo mysqli_error($con);
    $i = 0;
    echo("<table>");
    while ($da = mysqli_fetch_array($qry_execute)) {
        echo("<tr>");
        $i++;
        $problem = $da['problem'];
        $sno = $da['sno'];
        $path = $da['fileupload'];
        $status = $da['status'];
        echo("<td>" . $i . "</td>");
        echo("<td>" . $problem . "</td>");

        echo("<td>" . $status . "</td>");
        echo("</tr>");


    }
    echo("</table>");
}
?>