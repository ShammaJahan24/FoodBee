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
           // $rc_time = (new \DateTime())->format('Y-m-d H:i:s');
            $r_name = $_POST["restaurantname"];
			$r_address = $_POST["address"];
            $r_email = $_POST["r_email"];
            $r_food_type = $_POST["r_food_type"];
            $filename = $_FILES['fileupload']['name'];
            $tempname = $_FILES['fileupload']['tmp_name'];


            mysqli_query( $connect, "UPDATE user
            SET 
                us_type = 2
            WHERE
                us_id='$cid'" )
            or die("Can not execute query");


			mysqli_query( $connect, "INSERT INTO restaurant (r_name,r_address,r_email,r_food_type,r_pic,r_us_id) VALUES ('$r_name','$r_address', '$r_email', '$r_food_type' ,'$filename','$cid')" )

				or die("Can not execute query");
                $target_dir = "img2/";
                $target_file = $target_dir . basename($filename);
                move_uploaded_file($tempname, $target_file);



            header("Location: add_edit_menu.php?nid=" . mysqli_insert_id($connect));


		?>
		
	</div>
</body>
</html>
