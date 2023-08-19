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
  $bgid=intval($_GET['bgid']);
  include 'db_connect.php';
  $connect = mysqli_connect(HOST, USER, PASS, DB)
    or die("Can not connect");

  ?>

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
		    	<!-- /row -->		       
		    </div>
		</div>
		<!-- /page_header -->

		<div class="container margin_60_20">			
			<div class="row">

				<div class="col-lg-9">
					<?php

					$query = mysqli_query($connect, "SELECT * FROM blog_post  as b join user as u on b.bg_us_id=u.us_id where '$bgid'=b.bg_id ");
					while ($row = mysqli_fetch_array($query)) {
						?>
					<div class="singlepost">
						<figure><img alt="" class="img-fluid" src="img2/<?php echo htmlentities($row['bg_img']); ?>" style=" width: 950px; height: auto;"></figure>
						<h1><?php echo htmlentities($row['bg_title']); ?></h1>
						<div class="postmeta">
							<ul>
								
								<li><i class="icon_calendar"></i> <?php echo htmlentities($row['bg_time']); ?></li>
								<li>
									<img src="img2/<?php echo htmlentities($row['us_pic']); ?>" alt="" style="border-radius: 50%; width: 30px; height: 30px;"><?php echo htmlentities($row['us_name']); ?>
								</li>
								
							</ul>
						</div>
						<!-- /post meta -->
						<div class="post-content">
							<div class="dropcaps">
								
							</div>
							<p><?php echo htmlentities($row['bg_post']); ?></p>

						</div>
						<!-- /post -->
					</div>
					<?php } ?>
					<!-- /single-post -->
					<?php 
					$query=mysqli_query($connect, "SELECT COUNT(bgc_bg_id)as c FROM blog_comment  WHERE bgc_bg_id='$bgid' ");
					$result = mysqli_fetch_assoc($query);
					$comment_count = $result['c'];
					
					if ($comment_count != 0) {

					?>

					<div id="comments">
						<h5>Comments</h5>
						<ul>
							<?php

							$query = mysqli_query($connect, "SELECT * FROM blog_comment  as b join user as u on b.bgc_us_id=u.us_id where '$bgid'=b.bgc_bg_id ");
							while ($row = mysqli_fetch_array($query)) {
								?>
							<li>
								<div class="avatar">
									<a href="#"><img src="img2/<?php echo htmlentities($row['us_pic']); ?>" alt="">
									</a>
								</div>
								<div class="comment_right clearfix">
									<div class="comment_info">
										By <a href="#"><?php echo htmlentities($row['us_name']); ?></a><span>|</span><?php echo htmlentities($row['bgc_time']); ?><span>|</span><a href="#">Reply</a>
									</div>
									<p>
									<?php echo htmlentities($row['bgc_comment']); ?>
									</p>
								</div>
								
							</li>
							<?php } ?>
						</ul>
					</div>
					<?php } else {} ?>

					<hr>

					<h5>Leave a comment</h5>
					<form class="ui form" method=get action=blog_comment.php>
					    <div class="form-group">
					    	<textarea class="form-control" name="comments" id="comments2" rows="6" placeholder="Comment"></textarea>
					    </div>
					    <div class="form-group">
					    	<button type="submit" id="submit2" class="btn_1 add_bottom_15">Submit</button>
					    </div>
                        <input type="hidden" name=bgid value="<?php echo $bgid ?>"> 
                    </form>

				</div>
				<!-- /col -->

				<aside class="col-lg-3">
					<div class="widget">
						<div class="widget-title first">
							<h4>Latest Post</h4>
						</div>
						<ul class="comments-list">
							<?php

							$query = mysqli_query($connect, "SELECT * FROM blog_post as b join user as u on b.bg_us_id=u.us_id order by bg_time DESC limit 3");
							while ($row = mysqli_fetch_array($query)) {
								?>
							<li>
								<div class="alignleft">
									<a href="blog-post.php?bgid=<?php echo htmlentities($row['bg_id']); ?>"><img src="img2/<?php echo htmlentities($row['bg_img']); ?>" alt=""></a>
								</div>
								<small><?php echo htmlentities($row['bg_time']); ?></small>
								<h3><a href="blog-post.php?bgid=<?php echo htmlentities($row['bg_id']); ?>" title=""><?php echo htmlentities($row['bg_title']); ?></a></h3>
							</li>
							<?php } ?>
							
						</ul>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Categories</h4>
						</div>
						<ul class="cats">
							<li><a href="#">Food <span>(12)</span></a></li>
							<li><a href="#">Places to visit <span>(21)</span></a></li>
							<li><a href="#">New Places <span>(44)</span></a></li>
							<li><a href="#">Suggestions and guides <span>(31)</span></a></li>
						</ul>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Popular Tags</h4>
						</div>
						<div class="tags">
							<a href="#">Food</a>
							<a href="#">Bars</a>
							<a href="#">Cooktails</a>
							<a href="#">Shops</a>
							<a href="#">Best Offers</a>
							<a href="#">Transports</a>
							<a href="#">Restaurants</a>
						</div>
					</div>
					<!-- /widget -->
				</aside>
				<!-- /aside -->
			</div>
			<!-- /row -->	
		</div>
		<!-- /container -->
		
	</main>
	<!-- /main -->
</body>