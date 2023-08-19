<?php
	session_start();
	if(isset($_GET['logout'])) {
		session_unset();
		session_destroy();
	
		// clear authentication cookies or tokens here
		// ...
	
		header("Location: restaurant.php");
		exit;
		} 
   include 'db_connect.php';
   
   $connect = mysqli_connect(HOST, USER, PASS, DB)
	or die("Can not connect");

	$pid=intval($_GET['nid']);
	if (!empty($_SESSION['us_id'])) {
		$cid = $_SESSION['us_id'];
		
	  }
	  else{}
	
  ?>
  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="FooYes - Quality delivery or takeaway food">
    <meta name="author" content="Ansonika">
    <title>Foogra - Discover & Book the best restaurants at the best price</title>

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
    <link href="css/detail-page.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body data-spy="scroll" data-target="#secondary_nav" data-offset="75">
				
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
			<?php
 							$query=mysqli_query($connect, "SELECT * FROM restaurant  WHERE r_id='$pid' ");
							while ($row=mysqli_fetch_array($query)) {
								?>

		<div class="hero_in detail_page background-image" data-background="url(img2/<?php echo htmlentities($row['r_pic']); ?>)">
			<div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				
				<div class="container">
					<div class="main_info">
						<div class="row">
							
							<div class="col-xl-4 col-lg-5 col-md-6">
								<div class="head"><div class="score"><span>Superb<em></em></span><strong><?php echo htmlentities($row['r_rating']); ?></strong></div></div>
								<h1><?php echo htmlentities($row['r_name']); ?></h1>
								<em><?php echo htmlentities($row['r_address']); ?> - <a href="https://www.google.com/maps/search/?api=1&query=<?php echo htmlentities($row['r_address']); ?>" target="blank">Get directions</a></em>
							</div>
							<div class="col-xl-8 col-lg-7 col-md-6">
								<div class="buttons clearfix">
									<span class="magnific-gallery">
										<a href="img2/<?php echo htmlentities($row['r_pic']); ?>" class="btn_hero" title="Photo title" data-effect="mfp-zoom-in"><i class="icon_image"></i>View photos</a>
										<a href="img2/<?php echo htmlentities($row['r_pic']); ?>" title="Photo title" data-effect="mfp-zoom-in"></a>
										<a href="img2/<?php echo htmlentities($row['r_pic']); ?>" title="Photo title" data-effect="mfp-zoom-in"></a>
									</span>
									<a href="#0" class="btn_hero wishlist"><i class="icon_heart"></i>Wishlist</a>
								</div>
							</div>
							
						</div>
						<!-- /row -->
					</div>
					<!-- /main_info -->
				</div>
			</div>
		</div>
			<?php } ?>
		<!--/hero_in-->

		<nav class="secondary_nav sticky_horizontal">
		    <div class="container">
		        <ul id="secondary_nav">
		            <li><a class="list-group-item list-group-item-action" href="#section-1">Starters</a></li>
		            <li><a class="list-group-item list-group-item-action" href="#section-2">Main Courses</a></li>
		            <li><a class="list-group-item list-group-item-action" href="#section-3">Desserts</a></li>
		            <li><a class="list-group-item list-group-item-action" href="#section-4">Drinks</a></li>
		            <li><a class="list-group-item list-group-item-action" href="#section-5"><i class="icon_chat_alt"></i>Reviews</a></li>
		        </ul>
		    </div>
		    <span></span>
		</nav>
		<!-- /secondary_nav -->

		<div class="bg_gray">
		    <div class="container margin_detail">
		        <div class="row">
		            <div class="col-lg-8 list_menu">
		                <section id="section-1">
		                    <h4>Starters</h4> <a href="add_menu.php?pid=<?php echo $pid ?>&ftype=1" class="btn_1 gradient" style="width: 850px">Add Starters</a>
		                    <div class="row">
								<?php
 								$query=mysqli_query($connect, "SELECT * FROM fooddet  WHERE f_r_id='$pid' and f_type= 1 ");
								while ($row=mysqli_fetch_array($query)) {
									?>
		                        <div class="col-md-6">
									<a href="" class="menu_item modal_dialog" data-name="<?php echo htmlentities($row['f_name']); ?>" data-price="<?php echo htmlentities($row['f_price']); ?>">
		                                <figure><img src="fimg/<?php echo htmlentities($row['f_pic']); ?>" data-src="fimg/<?php echo htmlentities($row['f_pic']); ?>" alt="thumb" class="lazy"></figure>
		                                <h3><?php echo htmlentities($row['f_name']); ?></h3>
		                                <p><?php echo htmlentities($row['f_det']); ?></p>
		                                <strong><?php echo htmlentities($row['f_price']); ?>৳</strong>
										<a href="delete_menu.php?fid=<?php echo htmlentities($row['f_id']) ?>" class="btn_1 gradient" style="width: 100px">Delete</a>
										<a href="edit_menu.php?fid=<?php echo htmlentities($row['f_id']) ?>" class="btn_1 gradient" style="width: 100px">Edit</a>
		                            </a>
		                        </div>
								<?php } ?>
		                    </div>
		                    <!-- /row -->
		                </section>
		                <!-- /section -->
		                <section id="section-2">
		                    <h4>Main Courses</h4><a href="add_menu.php?pid=<?php echo $pid ?>&ftype=2" class="btn_1 gradient" style="width: 850px">Add Main Courses</a>
		                    <div class="row">
								<?php
 								$query=mysqli_query($connect, "SELECT * FROM fooddet  WHERE f_r_id='$pid' and f_type= 2 ");
								while ($row=mysqli_fetch_array($query)) {
									?>
		                        <div class="col-md-6">
									<a href="" class="menu_item modal_dialog" data-name="<?php echo htmlentities($row['f_name']); ?>" data-price="<?php echo htmlentities($row['f_price']); ?>">		                                <figure><img src="fimg/<?php echo htmlentities($row['f_pic']); ?>" data-src="fimg/<?php echo htmlentities($row['f_pic']); ?>" alt="thumb" class="lazy"></figure>
		                                <h3><?php echo htmlentities($row['f_name']); ?></h3>
		                                <p><?php echo htmlentities($row['f_det']); ?></p>
		                                <strong><?php echo htmlentities($row['f_price']); ?>৳</strong>
										<a href="delete_menu.php?fid=<?php echo htmlentities($row['f_id']) ?>" class="btn_1 gradient" style="width: 100px">Delete</a>
										<a href="edit_menu.php?fid=<?php echo htmlentities($row['f_id']) ?>" class="btn_1 gradient" style="width: 100px">Edit</a>
		                            </a>
		                        </div>
								<?php } ?>
		                    </div>
		                    <!-- /row -->
		                </section>
		                <!-- /section -->
		                <section id="section-3">
		                    <h4>Desserts</h4><a href="add_menu.php?pid=<?php echo $pid ?>&ftype=3" class="btn_1 gradient" style="width: 850px">Add Desserts</a>
		                    <div class="row">
								<?php
 								$query=mysqli_query($connect, "SELECT * FROM fooddet  WHERE f_r_id='$pid' and f_type= 3 ");
								while ($row=mysqli_fetch_array($query)) {
									?>
		                        <div class="col-md-6">
									<a href="" class="menu_item modal_dialog" data-name="<?php echo htmlentities($row['f_name']); ?>" data-price="<?php echo htmlentities($row['f_price']); ?>">		                                <figure><img src="fimg/<?php echo htmlentities($row['f_pic']); ?>" data-src="fimg/<?php echo htmlentities($row['f_pic']); ?>" alt="thumb" class="lazy"></figure>
		                                <h3><?php echo htmlentities($row['f_name']); ?></h3>
		                                <p><?php echo htmlentities($row['f_det']); ?></p>
		                                <strong><?php echo htmlentities($row['f_price']); ?>৳</strong>
										<a href="delete_menu.php?fid=<?php echo htmlentities($row['f_id']) ?>" class="btn_1 gradient" style="width: 100px">Delete</a>
										<a href="edit_menu.php?fid=<?php echo htmlentities($row['f_id']) ?>" class="btn_1 gradient" style="width: 100px">Edit</a>
		                            </a>
		                        </div>
								<?php } ?>
		                    </div>
		                    <!-- /row -->
		                </section>
		                <!-- /section -->
		                <section id="section-4">
		                    <h4>Drinks</h4><a href="add_menu.php?pid=<?php echo $pid ?>&ftype=4" class="btn_1 gradient" style="width: 850px">Add Drinks</a>
		                    <div class="row">
								<?php
 								$query=mysqli_query($connect, "SELECT * FROM fooddet  WHERE f_r_id='$pid' and f_type= 4 ");
								while ($row=mysqli_fetch_array($query)) {
									?>
		                        <div class="col-md-6">
		                            <a class="menu_item modal_dialog" href="">
		                                <figure><img src="fimg/<?php echo htmlentities($row['f_pic']); ?>" data-src="fimg/<?php echo htmlentities($row['f_pic']); ?>" alt="thumb" class="lazy"></figure>
		                                <h3><?php echo htmlentities($row['f_name']); ?></h3>
		                                <p><?php echo htmlentities($row['f_det']); ?></p>
		                                <strong><?php echo htmlentities($row['f_price']); ?>৳</strong>
										<a href="delete_menu.php?fid=<?php echo htmlentities($row['f_id']) ?>" class="btn_1 gradient" style="width: 100px">Delete</a>
										<a href="edit_menu.php?fid=<?php echo htmlentities($row['f_id']) ?>" class="btn_1 gradient" style="width: 100px">Edit</a>
		                            </a>
		                        </div>
								<?php } ?>
		                    </div>
		                    <!-- /row -->
		                </section>
		                <!-- /section -->
		            </div>
		            <!-- /col -->
		           
		        </div>
		        <!-- /row -->
		    </div>
		    <!-- /container -->
		</div>
		<!-- /bg_gray -->


		
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

	<div id="toTop" class="detail_page"></div><!-- Back to top button -->

	
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

<!-- Modal item order -->
<div id="modal-dialog" class="zoom-anim-dialog mfp-hide">
    <div class="small-dialog-header">
        <h3 id="modal-header"></h3>
    </div>
    <div class="content">
        <h5>Quantity</h5>
        <div class="numbers-row">
            <input type="text" value="1" id="qty_1" class="qty2 form-control" name="quantity">
        </div>
        
    </div>
    <div class="footer">
        <div class="row small-gutters">
            <div class="col-md-4">
                <button type="reset" class="btn_1 outline full-width mb-mobile">Add to Cart</button>
            </div>
            <div class="col-md-8">
                <button type="button" class="btn_1 full-width" id="addToCartButton">Cancel</button>
            </div>
        </div>
    </div>
</div>
    <!-- /Modal item order -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/common_func.js"></script>
    <script src="assets/validate.js"></script>

    <!-- SPECIFIC SCRIPTS -->
    <script src="js/sticky_sidebar.min.js"></script>
    <script src="js/sticky-kit.min.js"></script>
    <script src="js/specific_detail.js"></script>
	<script>
		// Attach event listener to link
		const menuItems = document.querySelectorAll('.menu_item');
		menuItems.forEach(item => {
			item.addEventListener('click', (event) => {
				event.preventDefault();
				const modal = document.querySelector(item.getAttribute('href'));
				const name = item.getAttribute('data-name');
				const price = item.getAttribute('data-price');
				
				// Set modal header and data
				modal.querySelector('#modal-header').textContent = name;
				modal.querySelector('#modal-price').textContent = price;
				
				// Show the modal
				modal.classList.add('mfp-ready');
				modal.classList.add('mfp-fadeIn');
				modal.style.display = 'block';
			});
		});
	</script>
	<script>
		var addToCartButton = document.querySelector('#modal-dialog .footer button');

		// Add an event listener to the button
		addToCartButton.addEventListener('click', function() {
			// Get the quantity from the input field in the modal
			var quantity = document.querySelector('#modal-dialog input[name="quantity"]').value;

			// Get the data from the modal header
			var data = document.querySelector('#modal-dialog #modal-header').textContent;

			// Create a new list item with the data and quantity
			var newItem = document.createElement('li');
			newItem.innerHTML = '<a href="#0">' + data + '</a><span>$' + (11 * quantity) + '</span>';

			// Add the new item to the data area
			var dataArea = document.querySelector('#data-area');
			dataArea.appendChild(newItem);
		});
	</script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>