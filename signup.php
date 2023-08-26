<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insertion</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet">
</head>
<body>
<?php
    include 'db_connect.php';
    $connect = mysqli_connect(HOST, USER, PASS, DB)
        or die("Can not connect");
    ?>
<?php

$us_name = $_GET["us_name"];
$us_type = 1;
$last_name = $_GET['last_name'];
$email = $_GET['us_email'];
$password = $_GET['us_pass1'];
$confirm_password = $_GET['us_pass2'];

//check if passwords match
if ($password != $confirm_password) {
    echo "Passwords do not match.";
    exit();
}

//check if username or email already exists
$query = "SELECT * FROM user WHERE us_name='$us_name' OR us_email='$email' LIMIT 1";

$result = mysqli_query($connect, $query);
$user = mysqli_fetch_assoc($result);

if ($user) { //if user exists
    if ($user['us_name'] === $username) {
        echo "Username already exists.";
        exit();
    }

    if ($user['us_email'] == $email) {
        echo "Email already exists.";
        exit();
    }
}

//encrypt password
//$password = md5($password);

//insert user into database
$query = "INSERT INTO user (us_name,us_pass, us_email,us_type) VALUES ('$us_name', '$password', '$email','$us_type')";
mysqli_query($connect, $query);
header("Location: index.php?nid=$r_id&cid=$user_id");

//echo "You have been registered successfully!";
?>
</body>
</html>
