
<?php

include_once 'header.php';


    $uid = $_POST['adhar'];

    $text = $_POST['problem'];
    $insert1 = "Insert into details1 (`uid`,`problem`,`status`) values('$uid','$text','pending')";
    if ($qry=mysqli_query($con, $insert1)) {
        echo "successfull entered";
    }
    else{
        echo mysqli_error($con);
    }
    $sno1="SELECT * from details1 where problem='$text' AND uid='$uid'";
    if($qry=mysqli_query($con,$sno1)){
        $ss=mysqli_fetch_assoc($qry);
        $sno=$ss['sno'];
    }


    $target_dir = "uploads/";

    $target_file1= $target_dir . basename($_FILES["fileToUpload"]["name"]);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
    $target_file = $target_dir . basename($sno.".".$imageFileType);
// Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0)
    {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else
        {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $qw="Update details1 set fileupload='$target_file' where sno='$sno'";
            $qw1=mysqli_query($con,$qw);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    echo ("Your problem Unique id is ".$sno);








?>