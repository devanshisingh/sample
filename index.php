
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>


</head>
<body>
<a href="login.php">admin login</a>
<h5> If any problem fill this form </h5>
<form method="POST" action="index1.php" enctype="multipart/form-data">
    <input type="number" placeholder="Adhar" name="adhar" id="adhar" required>
    <input type="number" placeholder="phone number" name="phone" id="phone" required>
    <input type="text" placeholder="State The Problem" name="problem" id="problem" required>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" name="submit" placeholder="submit" >
</form>

<h5>if Already problem registered enter the serial no</h5>
<form method="POST" action="login_user.php" enctype="multipart/form-data">
    <input type="number" placeholder="serial no" name="sno">
    <input type="submit" placeholder="submit" name="submit">

</form>






            </body>
</html>
