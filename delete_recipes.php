<?php
  session_start();
  if(isset($_GET['logout'])) {
    session_unset();
    session_destroy();

    // clear authentication cookies or tokens here
    // ...

    header("Location: recipes.php");
    exit;
    } 
  if (!empty($_SESSION['us_id'])) {
    $cid = $_SESSION['us_id'];
    
  }
  else{}
  include 'db_connect.php';
  $connect = mysqli_connect(HOST, USER, PASS, DB)
    or die("Can not connect");

  ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Deletion</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet">
</head>
<body>

	<div class="ui text segment container" style="margin-top: 20vh;">
		<?php

			$rc_id = $_GET["fid"];

			mysqli_query( $connect, "DELETE FROM recipes WHERE rc_id=$rc_id" )

				or die("Can not execute query");



			//echo "<h2>Record deleted</h2><br>";


		     header("Location: my_recipes.php");

			//echo "<div><a href=commentOn.php><button class='ui right floated blue button'>OK</button></a></div>";

		?>
	</div>
</body>
</html>

