<?php
    session_start();
    if(isset($_GET['logout'])) {
        session_unset();
        session_destroy();    
        header("Location: restaurant.php");
        exit;
        } 
    include 'db_connect.php';
    $connect = mysqli_connect(HOST, USER, PASS, DB)
        or die("Can not connect");

	if (!empty($_SESSION['us_id'])) {
        $cid = $_SESSION['us_id'];
        
      }
      else{}
?>

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


	<div class="ui padded text segment container" style="margin-top: 20vh;">
		<?php
            $rc_c_time = (new \DateTime())->format('Y-m-d H:i:s');
            $rc_c_instruction = $_GET["food_quality"];
			$rc_c_taste = $_GET["service"];
			$rc_c_comment = $_GET["comments"];
			$rcid = $_GET["rcid"];

			


			mysqli_query( $connect, "INSERT INTO recipes_comment (rc_c_comment,rc_c_us_id,rc_c_time,rc_c_instruction,rc_c_taste,rc_c_rc_id) VALUES ('$rc_c_comment','$cid', '$rc_c_time' ,'$rc_c_instruction','$rc_c_taste','$rcid')" )

				or die("Can not execute query");

            header("Location: recipes-post.php?rcid=$rcid");

		?>
		
	</div>
</body>
</html>
