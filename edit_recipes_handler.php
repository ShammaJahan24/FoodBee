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

      $rc_id=$_POST['rc_id'];
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
	<div class="ui padded text segment container" style="margin-top: 20vh;">
		<?php
            $rc_time = (new \DateTime())->format('Y-m-d H:i:s');
            $rc_title= $_POST["rc_title"];
			$rc_post = $_POST["rc_post"];
            $filename = $_FILES['fileupload']['name'];
            $tempname = $_FILES['fileupload']['tmp_name'];
            mysqli_query( $connect, "UPDATE recipes
            SET 
                rc_title = '$rc_title',
                rc_post = '$rc_post',
                rc_time = '$rc_time',
                rc_img = '$filename'
            WHERE
                rc_id='$rc_id'" )
            or die("Can not execute query");

            $target_dir = "img2/";
            $target_file = $target_dir . basename($filename);
            move_uploaded_file($tempname, $target_file);

            header("Location: my_recipes.php");


		?>
		
	</div>
</body>
</html>