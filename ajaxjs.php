
<?php
/**
 * Created by PhpStorm.
 * User: Divyam Singh
 * Date: 3/15/2018
 * Time: 8:54 PM
 */
include_once 'connect.inc.php';
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;
    $sno=$_POST['sno'];
    $update="Update details1 set status='closed' where sno='$sno'";
    if($qry_execute=mysqli_query($con,$update)) {


        $sid = 'AC27a7f00c85aa3d49b3e076d2669d0289';
        $token = 'bd359131687a7d2af793f5da5db8f213';
        $client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
        $client->messages->create(
// the number you'd like to send the message to
            '+918726040985',
            array(
                // A Twilio phone number you purchased at twilio.com/console
                'from' => '+19284408423',
                // the body of the text message you'd like to send
                'body' => "your serial number is " . $sno . "has been closed "
            )
        );
    }
    else
    {
        echo "sno not present";
    }
    ?>
