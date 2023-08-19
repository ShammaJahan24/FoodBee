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
            $bgc_time = (new \DateTime())->format('Y-m-d H:i:s');
            $bgc_comment = $_GET["comments"];
			$bgc_bg_id = $_GET["bgid"];
			


			mysqli_query( $connect, "INSERT INTO blog_comment (bgc_comment,bgc_bg_id,bgc_us_id,bgc_time) VALUES ('$bgc_comment','$bgc_bg_id', '$cid' ,'$bgc_time')" )

				or die("Can not execute query");

            header("Location: blog-post.php?bgid=$bgc_bg_id");

		?>
		
	</div>
</body>
</html>