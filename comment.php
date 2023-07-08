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
			$fq = $_GET["food_quality"];
			$ser = $_GET["service"];
			$pun = $_GET["location"];
			$pri = $_GET["price"];
            $c_time = (new \DateTime())->format('Y-m-d H:i:s');
            $title_review = $_GET["t_body"];
			$review = $_GET["body"];
			$r_id = $_GET["rid"];
			$user_id = $_GET["cid"];

			

			


			mysqli_query( $connect, "INSERT INTO review_table (user_id,r_id,title_review,review,c_time,food_quality,service,punctuality,price) VALUES ('$user_id','$r_id', '$title_review', '$review', '$c_time','$fq', '$ser', '$pun', '$pri')" )

				or die("Can not execute query");

                header("Location: detail-restaurant.php?nid=$r_id&cid=$user_id");

		?>
		
	</div>
</body>
</html>
