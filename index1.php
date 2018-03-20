
<?php

include_once 'header.php';
require_once 'twitter.class.php';
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;


    $uid = $_POST['adhar'];
    $phone=$_POST['phone'];

    if((preg_match('^\d{12}$^',$uid)==0))
    {
        echo "pls enter a valid aadhr num";
        header("refresh:5;url=index.php" );
    }
    else {
        $text = $_POST['problem'];
        $insert1 = "Insert into details1 (`uid`,`problem`,`status`) values('$uid','$text','pending')";
        if ($qry = mysqli_query($con, $insert1)) {
            echo "<div class=\"jumbotron text-center\">
                     <h1><center>Thank you!</center></h1><h2><center>Your request is initated soon!</center></h2></h1>";
        } else {
            echo mysqli_error($con);
        }
        $sno1 = "SELECT * from details1 where problem='$text' AND uid='$uid'";
        if ($qry = mysqli_query($con, $sno1)) {
            $ss = mysqli_fetch_assoc($qry);
            $sno = $ss['sno'];
        }


        $target_dir = "uploads/";

        $target_file1 = $target_dir . basename($_FILES["fileToUpload"]["name"]);


        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
        $target_file = $target_dir . basename($sno . "." . $imageFileType);
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

// Check if image file is a actual image or fake image

       /* if($imageFileType=="jpg" || $imageFileType=="jpeg" )
        {
            imagejpeg( $dst, $target_file );
        }else if($imageFileType=="png")
        {
            imagepng( $dst, $target_file );
        }else{
            imagegif( $dst, $target_file );
        }*/
        if($_FILES['fileToUpload']['size'] > 10485760) { //10 MB (size is also in bytes)
            // File too big
        } else {
            // File within size restrictions
        }

        if ($check !== false && $_FILES['fileToUpload']['size'] < 10485760) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                $qw = "Update details1 set fileupload='$target_file' where sno='$sno'";
                $qw1 = mysqli_query($con, $qw);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }


        echo("<h5 style='color:#00CCCC; text-align: center; font-style: italic` class='\display-3'\><center>Your problem Unique id is ". $sno."</center></h5> " );

        $consumerKey = "KmJFnkIkb81zEaudlJBHne6UZ";
        $consumerSecret = "W76k6DZUUDFHX9Spv1SIAjEVuoCYY9hXTiW5LzwNfJp0d467y5";
        $accessToken = "315596424-7OiKyVZedy41mSWifYgwSH91xZpn1PJWShSvfsLM";
        $accessTokenSecret = "qjc0g76UhkDLon4hc7AOZwjy997beNuHliavPqxQzqDpm";


        $twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
        try {
            $tweet = $twitter->send("problem is ".$text."and serial number is ".$sno."#toym#problem"); // you can add $imagePath or array of image paths as second argument
        } catch (TwitterException $e) {
            echo 'Error: ' . $e->getMessage();
        }


// Your Account SID and Auth Token from twilio.com/console
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
                'body' => "your serial number is " . $sno
            )
        );


    }



?>