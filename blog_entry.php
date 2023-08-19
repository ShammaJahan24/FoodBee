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
            $bg_title = $_POST['bg_title'];
            $bg_post = $_POST['bg_post'];
            $filename = $_FILES['fileupload']['name'];
            $tempname = $_FILES['fileupload']['tmp_name'];
            $bg_time = (new \DateTime())->format('Y-m-d H:i:s');


			mysqli_query( $connect, "INSERT INTO blog_post (bg_title,bg_post,bg_time,bg_us_id,bg_img) VALUES ('$bg_title','$bg_post', '$bg_time' ,'$cid','$filename')" )

				or die("Can not execute query");
            $target_dir = "img2/";
            $target_file = $target_dir . basename($filename);
            move_uploaded_file($tempname, $target_file);
            header("Location: blog.php");

		?>
		
	</div>
</body>
</html>