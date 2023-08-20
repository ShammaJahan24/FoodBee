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
  $rcid=intval($_GET['rcid']);
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
	<link href="css/detail-page.css" rel="stylesheet">
	<link href="css/review.css" rel="stylesheet">

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
		    			<h1>Recipes</h1>
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

					$query = mysqli_query($connect, "SELECT * FROM recipes  as r join user as u on r.rc_us_id=u.us_id where '$rcid'=r.rc_id ");
					while ($row = mysqli_fetch_array($query)) {
						?>
					<div class="singlepost">
						<figure><img alt="" class="img-fluid" src="img2/<?php echo htmlentities($row['rc_img']); ?>" style=" width: 950px; height: auto;"></figure>
						
						<h1><?php echo htmlentities($row['rc_title']); ?></h1>
						<div class="head"><div class="score"><span><em></em></span><strong><?php echo htmlentities($row['rc_rating']); ?></strong></div></div>
						<div class="postmeta">
							<ul>
								
								<li><i class="icon_calendar"></i> <?php echo htmlentities($row['rc_time']); ?></li>
								<li>
									<img src="img2/<?php echo htmlentities($row['us_pic']); ?>" alt="" style="border-radius: 50%; width: 30px; height: 30px;"><?php echo htmlentities($row['us_name']); ?>
								</li>
								
							</ul>
						</div>
						<!-- /post meta -->
						<div class="post-content">
							<div class="dropcaps">
								
							</div>
							<p><?php echo htmlentities($row['rc_post']); ?></p>

						</div>
						<!-- /post -->
					</div>
					<?php } ?>
					<!-- /single-post -->

					<?php 
					$query=mysqli_query($connect, "SELECT COUNT(rc_c_rc_id)as c FROM recipes_comment  WHERE rc_c_rc_id='$rcid' ");
					$result = mysqli_fetch_assoc($query);
					$comment_count = $result['c'];
					
					if ($comment_count != 0) {

					?>
					<div >
						<div class="row">
							<div class="col-lg-12 list_menu">
								<section id="section-5">
									<h4>Reviews</h4>
									<div class="row add_bottom_30 d-flex align-items-center reviews">
										<div class="col-md-3">
											<?php
												$query=mysqli_query($connect, "SELECT * FROM recipes  WHERE rc_id='$rcid' ");
												while ($row=mysqli_fetch_array($query)) {
													?>
											<div id="review_summary">
												<strong><?php echo htmlentities($row['rc_rating']); ?></strong>
												<em>Superb</em>
												<?php } ?>
												<?php
												$query=mysqli_query($connect, "SELECT COUNT(rc_c_rc_id) AS ccount FROM recipes_comment  WHERE rc_c_rc_id='$rcid' ");
												while ($row=mysqli_fetch_array($query)) {
													?>
												<small>Based on <?php echo htmlentities($row['ccount']); ?> reviews</small>
												<?php } ?>
											</div>
										</div>
										<div class="col-md-9 reviews_sum_details">
											<div class="row">
												<div class="col-md-6">
													<h6>Instructions</h6>
													<div class="row">
														<?php
																$query=mysqli_query($connect, "SELECT CAST(AVG(rc_c_instruction)AS DECIMAL (10,1)) AS avg FROM recipes_comment  WHERE rc_c_rc_id='$rcid' ");
																while ($row=mysqli_fetch_array($query)) {
																	?>
														<div class="col-xl-10 col-lg-9 col-9">
															<div class="progress">
																<div class="progress-bar" role="progressbar" style="width: <?php echo htmlentities($row['avg'])*10; ?>% " aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
														<div class="col-xl-2 col-lg-3 col-3"><strong><?php echo htmlentities($row['avg']); ?></strong></div>
														<?php } ?>
													</div>
												
													<!-- /row -->
												</div>
												<div class="col-md-6">
													<h6>Taste</h6>
													<div class="row">
														<?php
																$query=mysqli_query($connect, "SELECT CAST(AVG(rc_c_taste)AS DECIMAL (10,1)) AS avg FROM recipes_comment  WHERE rc_c_rc_id='$rcid' ");
																while ($row=mysqli_fetch_array($query)) {
																	?>
														<div class="col-xl-10 col-lg-9 col-9">
															<div class="progress">
																<div class="progress-bar" role="progressbar" style="width: <?php echo htmlentities($row['avg'])*10; ?>% " aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
														<div class="col-xl-2 col-lg-3 col-3"><strong><?php echo htmlentities($row['avg']); ?></strong></div>
														<?php } ?>
													</div>
													
													<!-- /row -->
												</div>
											</div>
											<!-- /row -->
										</div>
									</div>
									<!-- /row -->
									<div id="reviews">
										<div class="review_card">
											<div class="row">
												<?php
														
														$query=mysqli_query($connect, "SELECT CAST((r.rc_c_instruction+r.rc_c_taste)/2 AS DECIMAL (10,1)) AS avg ,r.rc_c_time as ctime,r.rc_c_comment as treview,u.us_pic as upic,u.us_name as uname FROM recipes_comment as r join user as u on r.rc_c_us_id=u.us_id where r.rc_c_rc_id='$rcid' ");
														while ($row=mysqli_fetch_array($query)) {
															

															?>
												<div class="col-md-2 user_info">
													<figure><img src="img2/<?php echo htmlentities($row['upic']); ?>" alt=""></figure>
													<h5><?php echo htmlentities($row['uname']); ?></h5>
													
												</div>
												
												<div class="col-md-10 review_content">
														
													<div class="clearfix add_bottom_15">
														<span class="rating"><?php echo htmlentities($row['avg']); ?><small>/10</small> <strong>Rating average</strong></span>
														<em>Published at <?php echo htmlentities($row['ctime']); ?></em>
													</div>
													<h4><?php echo htmlentities($row['treview']); ?></h4>
													
													<ul class='mt-2'>
														
														<li><a href="#0"><i class="arrow_back"></i> <span>Reply</span></a></li>
														<li></li>


													</ul>
													

													
												</div>
												<?php } ?>
											</div>
											<!-- /row -->
										</div>
										<!-- /review_card -->
										
									</div>
									<!-- /reviews -->
									
								</section>
								<!-- /section -->
							</div>
						</div>
					</div>
					<?php } else {} ?>

					<hr>

					<h5>Leave a Review</h5>
                    <form class="ui form" method=get action=recipes_comment.php>
					    <div class="row">
						    <div class="col-md-3 add_bottom_25">
		                        <div class="add_bottom_15">Instruction<strong class="food_quality_val"></strong></div>
		                        <input type="range" min="0" max="10" step="1" value="0" data-orientation="horizontal" id="food_quality" name="food_quality">
						    </div>
                            <div class="col-md-3 add_bottom_25">
		                        <div class="add_bottom_15">Taste <strong class="service_val"></strong></div>
		                        <input type="range" min="0" max="10" step="1" value="0" data-orientation="horizontal" id="service" name="service">
                            </div>
					    </div>
					    <div class="form-group">
						    <textarea class="form-control" name="comments" id="comments2" rows="6" placeholder="Comment"></textarea>
					    </div>
					    <div class="form-group">
						    <button type="submit" id="submit2" class="btn_1 add_bottom_15">Submit</button>
					    </div>
                        <input type="hidden" name=rcid value="<?php echo $rcid ?>"> 
                    </form>
				</div>
				<!-- /col -->

				<aside class="col-lg-3">
					<div class="widget">
						<div class="widget-title first">
							<h4>Latest Recipes</h4>
						</div>
						<ul class="comments-list">
							<?php

							$query = mysqli_query($connect, "SELECT * FROM recipes  as r join user as u on r.rc_us_id=u.us_id order by rc_time DESC limit 3 ");
							while ($row = mysqli_fetch_array($query)) {
								?>
							<li>
								<div class="alignleft">
									<a href="recipes-post.php?rcid=<?php echo htmlentities($row['rc_id']); ?>"><img src="img2/<?php echo htmlentities($row['rc_img']); ?>" alt=""></a>
								</div>
								<small><?php echo htmlentities($row['rc_time']); ?></small>
								<h3><a href="recipes-post.php?rcid=<?php echo htmlentities($row['rc_id']); ?>" title=""><?php echo htmlentities($row['rc_title']); ?></a></h3>
							</li>
							<?php } ?>
							
						</ul>
					</div>
					<!-- /widget -->
					
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

	<footer>
        <div class="wave footer"></div>
        <div class="container margin_60_40 fix_mobile">

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h3 data-target="#collapse_1">Quick Links</h3>
                    <div class="collapse dont-collapse-sm links" id="collapse_1">
                        <ul>
                            <li><a href="about.html">About us</a></li>
                            <li><a href="submit-restaurant.php">Add your restaurant</a></li>
                            <li><a href="help.html">Help</a></li>
                            <li><a href="register.php">My account</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 data-target="#collapse_2">Categories</h3>
                    <div class="collapse dont-collapse-sm links" id="collapse_2">
                        <ul>
                            <li><a href="restaurant.php">Top Categories</a></li>
                            <li><a href="grid-listing-filterscol-full-masonry.html">Best Rated</a></li>
                            <li><a href="grid-listing-filterscol-full-width.html">Best Price</a></li>
                            <li><a href="grid-listing-filterscol-full-masonry.html">Latest Submissions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                        <h3 data-target="#collapse_3">Contacts</h3>
                    <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                        <ul>
                            <li><i class="icon_house_alt"></i>Mirpur 14 <br>Dhaka 1206</li>
                            <li><i class="icon_mobile"></i>016628245488</li>
                            <li><i class="icon_mail_alt"></i><a href="#0">admin@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                        <h3 data-target="#collapse_4">Keep in touch</h3>
                    <div class="collapse dont-collapse-sm" id="collapse_4">
                        <div id="newsletter">
                            <div id="message-newsletter"></div>
                            <form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
                                <div class="form-group">
                                    <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
                                    <button type="submit" id="submit-newsletter"><i class="arrow_carrot-right"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="follow_us">
                            <h5>Follow Us</h5>
                            <ul>
                                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/twitter_icon.svg" alt="" class="lazy"></a></li>
                                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/facebook_icon.svg" alt="" class="lazy"></a></li>
                                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/instagram_icon.svg" alt="" class="lazy"></a></li>
                                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/youtube_icon.svg" alt="" class="lazy"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row-->
            <hr>
            <div class="row add_bottom_25">
                <div class="col-lg-6">
                    <ul class="footer-selector clearfix">
						<li>
                            <div class="styled-select lang-selector">
                                <select>
                                    <option value="English" selected>English</option>
                                    
                                    <option value="Bangla">Bangla</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="styled-select currency-selector">
                                <select>
                                    <option value="TK" selected>TK</option>
                                    <option value="US Dollars">US Dollars</option>
                                </select>
                            </div>
                        </li>
                        <li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/cards_all.svg" alt="" width="230" height="35" class="lazy"></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="additional_links">
                        <li><a href="#0">Terms and conditions</a></li>
                        <li><a href="#0">Privacy</a></li>
                        <li><span>© FoodBEE</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--/footer-->

	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- Sign In Modal -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
    <div class="modal_header">
        <h3>Sign In</h3>
    </div>
    <form method="GET" action=login.php >
        <div class="sign-in-wrapper">
            <a href="#0" class="social_bt facebook">Login with Facebook</a>
            <a href="#0" class="social_bt google">Login with Google</a>
            <div class="divider"><span>Or</span></div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email">
                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" value="">
                <i class="icon_lock_alt"></i>
            </div>
            <div class="clearfix add_bottom_15">
                <div class="checkboxes float-left">
                    <label class="container_check">Remember me
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="float-right"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
            </div>
            <div class="text-center">
                <input type="submit" value="Log In" class="btn_1 full-width mb_5">
                Don’t have an account? <a href="register.php">Sign up</a>
            </div>
            <div id="forgot_pw">
                <div class="form-group">
                    <label>Please confirm login email below</label>
                    <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                    <i class="icon_mail_alt"></i>
                </div>
                <p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
                <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
            </div>
        </div>
    </form>
    <!--form -->
</div>


<!-- /Sign In Modal -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/common_func.js"></script>
    <script src="assets/validate.js"></script>
	<script src="js/specific_review.js"></script>

</body>
</html>