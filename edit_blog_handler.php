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

      $bg_id=$_POST['bg_id'];
      echo $bg_id;
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
            $bg_time = (new \DateTime())->format('Y-m-d H:i:s');
            $bg_title= $_POST["bg_title"];
			$bg_post = $_POST["bg_post"];
            $filename = $_FILES['fileupload']['name'];
            $tempname = $_FILES['fileupload']['tmp_name'];

            mysqli_query( $connect, "UPDATE blog_post
            SET 
                bg_title = '$bg_title',
                bg_post = '$bg_post',
                bg_time = '$bg_time',
                bg_img = '$filename'
            WHERE
                bg_id='$bg_id'" )
            or die("Can not execute query");

            $target_dir = "img2/";
            $target_file = $target_dir . basename($filename);
            move_uploaded_file($tempname, $target_file);

            header("Location: my_blog.php");


		?>
		
	</div>
</body>
</html>