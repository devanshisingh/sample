<script>function change(sno) {
            var x=confirm("sure ");

            var datastring='sno='+sno;
            if(x==1) {
                $.ajax({
                    type: "POST",
                    url: "ajaxjs.php",
                    data: datastring,
                    cache: false,
                    success: function (html) {
                        location.reload();
                    }
                });
            }


        return false;
    }</script>
<?php
include_once 'header.php';
session_start();
if(!(isset($_SESSION['username']))){
    header('Location:login.php');
}
else
{
    if($_SESSION['category']=='N') {
        $qu1 = "SELECT * FROM details1 where status='pending'";
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
            echo("<td>" . $i . "</td>");
            echo("<td>" . $problem . "</td>");
            echo("<td><img src='$path'></td>");
            echo("<td><button name='pending' id='pending' onclick='change($sno)'></button></td>");
            echo("</tr>");


        }
        echo("</table>");

        echo("closed issue");
        $qu11 = "SELECT * FROM details1 where status='closed'";
        $qry_execute1 = mysqli_query($con, $qu11);
        echo mysqli_error($con);
        $i = 0;
        echo("<table>");
        while ($da1 = mysqli_fetch_array($qry_execute1)) {
            echo("<tr>");
            $i++;
            $problem = $da1['problem'];
            $sno = $da1['sno'];
            $path = $da1['fileupload'];
            echo("<td>" . $i . "</td>");
            echo("<td>" . $problem . "</td>");
            echo("<td><img src='$path'></td>");

            echo("</tr>");

        }
        echo("</table>");
    }
    


}
?>

