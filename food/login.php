<?php
	$_SESSION['logged_in'] = false;
    include 'db_connect.php';
    $connect = mysqli_connect(HOST, USER, PASS, DB)
        or die("Can not connect");
	$email = $_GET['email'];
    $password = $_GET['password'];

    $result = mysqli_query($connect, "SELECT * FROM user WHERE us_email='$email' AND us_pass='$password' LIMIT 1");
    $row=mysqli_fetch_assoc($result);
	// Check if user exists and password is correct
	if ($row) { 
		// Set session variables
		session_start();
		$login = true;
		$_SESSION['us_id'] = $row['us_id'];
        $_SESSION['logged_in'] = true;
        $cid = $_SESSION['us_id'];
		// Redirect to home page or dashboard
		header("Location: index.php?cid=$cid");
		exit();
	} else {

		header("Location: index.php#sign-in-dialog");
		
}
?>