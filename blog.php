<?php
  session_start();
  if(isset($_GET['logout'])) {
    session_unset();
    session_destroy();

    // clear authentication cookies or tokens here
    // ...

    header("Location: blog.php");
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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="FoodBEE - Quality delivery or takeaway food">
    <meta name="author" content="Ansonika">
    <title>FoodBEE - Quality delivery or takeaway food</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img2/favicon.ico" type="image2/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img2/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img2/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img2/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img2/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap_customized.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/blog.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>
<body>

<header class="header_in clearfix">
	    <div class="container">
	        <div id="logo">
	            <a href="index.php">
	                <img src="img/logo.png" width="140" height="35" alt="">
	            </a>
	        </div>
	        <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
	        <ul id="top_menu">
                <?php
                    if (!empty($_SESSION['us_id'])) {
                    }
                    else{
                    ?>
            
                <li><a href="#sign-in-dialog" id="sign-in" class="login">Sign In</a></li> <?php }?>
                <li><a href="#" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>
            </ul>
            
            <!-- /top_menu -->
            <a href="#0" class="open_close">
                <i class="icon_menu"></i><span>Menu</span>
            </a>
            <nav class="main-menu">
                <div id="header_menu">
                    <a href="#0" class="open_close">
                        <i class="icon_close"></i><span>Menu</span>
                    </a>
                    <a href="index.php"><img src="img/logo.png" width="162" height="35" alt=""></a>
                </div>
                <ul>
                    <li >
                        <a href="index.php">Home</a>
                    </li>
                    <li >
                        <a href="restaurant.php">Restaurant</a>
                    </li>
                    <li >
                        <a >Meal Planning</a>
                    </li>
                    <li >
                        <a href="blog.php">Blog</a>
                    </li>
                    <li >
                        <a href="recipes.php">Recipes</a>
                    </li>
                    
                    <?php
                    if (!empty($_SESSION['us_id'])) {
                        $cid = $_SESSION['us_id'];
                        
                    
                    $query=mysqli_query($connect, "SELECT * from user where us_id = $cid");
                    $row=mysqli_fetch_assoc($query); 
                    
                    ?>
                    <li class="submenu">
                        &nbsp;&nbsp;<img src="img2/<?php echo htmlentities($row['us_pic']); ?>" style="display: inline-block; border-radius: 50%; width: 30px; height: 30px;" alt="Image"> 
                        <a style="display: inline-block; margin-left: 10px;"><?php echo htmlentities($row['us_name']); ?></a> 
                        <ul>
                            <li><a href="#0">Add Restaurant</a></li>
                            <li><a href="?logout=1" style="color: red;">Log Out</a></li>
                                                         
                        </ul>
                    </li>
                    <?php 
                        }
                    else{}?>
                    
                    
                </ul>
            </nav>
        </div>
    </header>

    <!-- /header -->
	
	<main>
		<div class="page_header blog element_to_stick">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
		    			<h1>Blog and Articles</h1>
		    		</div>
					
		    		<div class="col-xl-4 col-lg-5 col-md-5">
		    			<div class="search_bar_list">
						    <input type="text" class="form-control" placeholder="Dishes, restaurants, cuisines, blog or recipes">
						    <button type="submit"><i class="icon_search"></i></button>
						</div>
		    		</div>
					
		    	</div>
				<div class="row">
					
                    <?php
                        if (!empty($_SESSION['us_id'])) {
                        
                        
                        ?>
                        <div class="mt-2 col-sm-12 text-center">
                            <a href="add_blog.php" class="btn_1 gradient" style="width: 1000px">Add Blog</a>
                            <a href="my_blog.php" class="btn_1 gradient" style="width: 200px">My BlogS</a>
                        </div>
                        <?php }
                                else{} ?>
				</div>
		    	<!-- /row -->		       
		    </div>
		</div>
		<!-- /page_header -->

        <div class="container margin_60_20">			
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<?php

						$query = mysqli_query($connect, "SELECT * FROM blog_post as b join user as u on b.bg_us_id=u.us_id order by bg_time DESC ");
						while ($row = mysqli_fetch_array($query)) {
							?>
						<div class="col-md-6">
							<article class="blog">
								<figure>
									<a href="blog-post.php?bgid=<?php echo htmlentities($row['bg_id']); ?>"><img src="img2/<?php echo htmlentities($row['bg_img']); ?>" alt="">
										<div class="preview"><span>Read more</span></div>
									</a>
								</figure>
								<div class="post_info">
									<small><?php echo htmlentities($row['bg_time']); ?></small>
									<h2><a href="blog-post.php?bgid=<?php echo htmlentities($row['bg_id']); ?>"><?php echo htmlentities($row['bg_title']); ?></a></h2>
									<p><?php echo htmlentities($row['bg_post']); ?></p>
									<ul>
										<li>
											<div class="thumb"><img src="img2/<?php echo htmlentities($row['us_pic']); ?>" alt=""></div> <?php echo htmlentities($row['us_name']); ?>
										</li>
										<li><i class="icon_comment_alt"></i>20</li>
									</ul>
								</div>
							</article>
							<!-- /article -->
						</div>
						<?php } ?>
						
						<!-- /col -->
					</div>
					<!-- /row -->

					<div class="pagination_fg">
					  <a href="#">&laquo;</a>
					  <a href="#" class="active">1</a>
					  <a href="#">2</a>
					  <a href="#">3</a>
					  <a href="#">4</a>
					  <a href="#">5</a>
					  <a href="#">&raquo;</a>
					</div>

				</div>
				<!-- /col -->


</body>