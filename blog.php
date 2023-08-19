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
</body>
</html>