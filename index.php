<?php
  session_start();
  if(isset($_GET['logout'])) {
    session_unset();
    session_destroy();

    // clear authentication cookies or tokens here
    // ...

    header("Location: index.php");
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
    <link href="css/home.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>
                
    <header class="header clearfix element_to_stick">
        <div class="container">
            <div id="logo">
                <a href="index.php">
                    <img src="img/logo.png" width="162" height="35" alt="" class="logo_normal">
                    <img src="img/logo.png" width="162" height="35" alt="" class="logo_sticky">
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
                        <a href="mealplanning.php">Meal Planning</a>
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
                        
                    
                    $query=mysqli_query($connect, "SELECT * from user as u Join restaurant as r on r.r_us_id=u.us_id where u.us_id = $cid");
                    $row=mysqli_fetch_assoc($query); 
                    $us_type = $row['us_type'];
                    
                    ?>
                    <li class="submenu">
                        &nbsp;&nbsp;<img src="img2/<?php echo htmlentities($row['us_pic']); ?>" style="display: inline-block; border-radius: 50%; width: 30px; height: 30px;" alt="Image"> 
                        <a style="display: inline-block; margin-left: 10px;"><?php echo htmlentities($row['us_name']); ?></a> 
                        <ul>
                            <?php if ($us_type != 2) {  ?>
                            <li><a href="submit-restaurant.php">Add Restaurant</a></li>
                            <li><a href="?logout=1" style="color: red;">Log Out</a></li>
                            <?php } else { ?>
                            <li><a href="add_edit_menu.php?nid=<?php echo htmlentities($row['r_id']) ?>">Edit Restaurant Menu</a></li>
                            <li><a href="dashboard.php?nid=<?php echo htmlentities($row['r_id']) ?>">Dashboard</a></li>
                            <li><a href="order_list.php?nid=<?php echo htmlentities($row['r_id']) ?>">Order List</a></li>
                            <li><a href="?logout=1" style="color: red;">Log Out</a></li>
                            <?php }?>
                                                         
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
        <div class="header-video">
            <div id="hero_video">
                <div class="shape_element one"></div>
                <div class="shape_element two"></div>
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-7 col-lg-8 col-md-8">
                                <h1>Delivery or Takeaway Food</h1>
                            <p>The best restaurants at the best price</p>
                                <form method="post" action="restaurant.php">
                                <div class="row no-gutters custom-search-input">
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <input class="form-control no_border_r" type="text" id="autocomplete" placeholder="Address, neighborhood...">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn_1 gradient" type="submit">Search</button>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="search_trends">
                                    <h5>Trending:</h5>
                                    <ul>
                                        <li><a href="#0">Sushi</a></li>
                                        <li><a href="#0">Burger</a></li>
                                        <li><a href="#0">Chinese</a></li>
                                        <li><a href="#0">Pizza</a></li>
                                    </ul>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="img/video_fix.png" alt="" class="header-video--media" data-video-src="video1/intro" data-teaser-source="video1/intro" data-provider="" data-video-width="1920" data-video-height="960">
            <div class="wave hero"></div>
        </div>
        <!-- /header-video -->

        <div class="container margin_30_60">
            <div class="main_title center">
                <span><em></em></span>
                <h2>Popular Categories</h2>
                <p></p>
            </div>
            <!-- /main_title -->

            <div class="owl-carousel owl-theme categories_carousel">
                <div class="item_version_2">
                    <a href="restaurant.php">
                        <figure>
                            <span>98</span>
                            <img src="img/pizza.jpg" data-src="img/pizza.jpg" alt="" class="owl-lazy" width="350" height="450">
                            <div class="info">
                                <h3>Pizza</h3>
                                <small>Avg price 150৳</small>
                            </div>
                        </figure>
                    </a>
                </div>
                <div class="item_version_2">
                    <a href="restaurant.php">
                        <figure>
                            <span>87</span>
                            <img src="img/biryani.jpg" data-src="img/biryani.jpg" alt="" class="owl-lazy" width="350" height="450">
                            <div class="info">
                                <h3>Bangali</h3>
                                <small>Avg price 200৳</small>
                            </div>
                        </figure>
                    </a>
                </div>
                <div class="item_version_2">
                    <a href="restaurant.php">
                        <figure>
                            <span>55</span>
                            <img src="img/burger.jpg" data-src="img/burger.jpg" alt="" class="owl-lazy" width="350" height="450">
                            <div class="info">
                                <h3>Burgers</h3>
                                <small>Avg price 200৳</small>
                            </div>
                        </figure>
                    </a>
                </div>
                <div class="item_version_2">
                    <a href="restaurant.php">
                        <figure>
                            <span>55</span>
                            <img src="img/vegetariani.jpg" data-src="img/vegetariani.jpg" alt="" class="owl-lazy" width="350" height="450">
                            <div class="info">
                                <h3>Vegetarian</h3>
                                <small>Avg price 300৳</small>
                            </div>
                        </figure>
                    </a>
                </div>
                <div class="item_version_2">
                    <a href="restaurant.php">
                        <figure>
                            <span>25</span>
                            <img src="img/chinese.jpg" data-src="img/chinese.jpg" alt="" class="owl-lazy" width="350" height="450">
                            <div class="info">
                                <h3>Chinese</h3>
                                <small>Avg price 300৳</small>
                            </div>
                        </figure>
                    </a>
                </div>
                <div class="item_version_2">
                    <a href="restaurant.php">
                        <figure>
                            <span>35</span>
                            <img src="img/kebab.jpg" data-src="img/kebab.jpg" alt="" class="owl-lazy" width="350" height="450">
                            <div class="info">
                                <h3>Kebab</h3>
                                <small>Avg price 80৳</small>
                            </div>
                        </figure>
                    </a>
                </div>
            </div>
            <!-- /carousel -->
        </div>
        <!-- /container -->

        <div class="bg_gray">
            <div class="container margin_60_40">
                <div class="main_title">
                    <span><em></em></span>
                    <h2>Top Rated Restaurants</h2>
                    <p></p>
                    <a href="#0">View All &rarr;</a>
                </div>
                <div class="row add_bottom_25">
                    <div class="col-lg-6">
                        
                        <div class="list_home">
                            <ul>
                                <?php

                                    $query = mysqli_query($connect, "SELECT * FROM restaurant order by r_rating DESC limit 3");
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                <li>
                                    <a href="detail-restaurant.php?nid=<?php echo htmlentities($row['r_id']) ?>&cid=<?php echo $cid ?>">
                                        <figure>
                                            <img src="img2/<?php echo htmlentities($row['r_pic']); ?>" data-src="img2/<?php echo htmlentities($row['r_pic']); ?>" alt="" class="lazy" width="350" height="233">
                                        </figure>
                                        <div class="score"><strong><?php echo htmlentities($row['r_rating']); ?></strong></div>
                                        <em><?php echo htmlentities($row['r_food_type']); ?></em>
                                        <h3><?php echo htmlentities($row['r_name']); ?></h3>
                                        <small><?php echo htmlentities($row['r_address']); ?></small>
                                        <ul>
                                            <li><span class="ribbon off">-30%</span></li>
                                            <li>Average price 400৳</li>
                                        </ul>
                                    </a>
                                </li>
                                <?php } ?>
                                
                            </ul>
                        </div>
                         
                    </div>
                    
                    <div class="col-lg-6">
                        
                    <div class="list_home">
                            <ul>
                                <?php

                                    $query = mysqli_query($connect, "SELECT * FROM restaurant order by r_rating DESC limit 3,3");
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                <li>
                                    <a href="detail-restaurant.php?nid=<?php echo htmlentities($row['r_id']) ?>&cid=<?php echo $cid ?>">
                                        <figure>
                                        <img src="img2/<?php echo htmlentities($row['r_pic']); ?>" data-src="img2/<?php echo htmlentities($row['r_pic']); ?>" alt="" class="lazy" width="350" height="233">
                                        </figure>
                                        <div class="score"><strong><?php echo htmlentities($row['r_rating']); ?></strong></div>
                                        <em><?php echo htmlentities($row['r_food_type']); ?></em>
                                        <h3><?php echo htmlentities($row['r_name']); ?></h3>
                                        <small><?php echo htmlentities($row['r_address']); ?></small>
                                        <ul>
                                            <li><span class="ribbon off">-30%</span></li>
                                            <li>Average price 400৳</li>
                                        </ul>
                                    </a>
                                </li>
                                <?php } ?>
                                
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <!-- /row -->
                <div class="banner lazy" data-bg="url(img2/banner_bg_desktop.jpg)">
                    <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                        <div>
                            <small>FoodBEE Delivery</small>
                            <h3>We Deliver to your Office</h3>
                            <p>Enjoy a tasty food in minutes!</p>
                            <a href="restaurant.php" class="btn_1 gradient">Start Now!</a>
                        </div>
                    </div>
                    <!-- /wrapper -->
                </div>
                <!-- /banner -->
            </div>
        </div>
        <!-- /bg_gray -->

        <div class="shape_element_2">
            <div class="container margin_60_0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box_how">
                                    <figure><img src="img/lazy-placeholder-100-100-white.png" data-src="img/how_1.svg" alt="" width="150" height="167" class="lazy"></figure>
                                    <h3>Easly Order</h3>
                                    <p>Ordering food has never been easier </p>
                                </div>
                                <div class="box_how">
                                    <figure><img src="img/lazy-placeholder-100-100-white.png" data-src="img/how_2.svg" alt="" width="130" height="145" class="lazy"></figure>
                                    <h3>Quick Delivery</h3>
                                    <p>Indulge in a world of culinary delights with Foodbee</p>
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <div class="box_how">
                                    <figure><img src="img/lazy-placeholder-100-100-white.png" data-src="img/how_3.svg" alt="" width="150" height="132" class="lazy"></figure>
                                    <h3>Enjoy Food</h3>
                                    <p>Get your food delivered fast and fresh with Foodbee</p>
                                </div> 
                            </div>
                        </div>
                        <p class="text-center mt-3 d-block d-lg-none"><a href="#0" class="btn_1 medium gradient pulse_bt mt-2">Register Now!</a></p>
                    </div>
                    <div class="col-lg-5 offset-lg-1 align-self-center">
                        <div class="intro_txt">
                            <div class="main_title">
                                <span><em></em></span>
                                <h2>Start Ordering Now</h2>
                            </div>
                            <p class="lead"></p>
                            <p></p>
                            <p><a href="register.php" class="btn_1 medium gradient pulse_bt mt-2">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /shape_element_2 -->

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

<!-- Video header -->
<script src="js/modernizr.min.js"></script>
<script src="js/video_header.min.js"></script>
<script>
    HeaderVideo.init({
        container: $('.header-video'),
        header: $('.header-video--media'),
        videoTrigger: $("#video-trigger"),
        autoPlayVideo: true
    });
</script>

<!-- Autocomplete -->
<script>
function initMap() {
    var input = document.getElementById('autocomplete');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    });
}
$(document).ready(function() {
    $('.open-modal').click(function(e) {
        e.preventDefault();
        var target = $(this).attr('href');
        $(target).magnificPopup({
            type:'inline',
            midClick: true // Allow opening the modal with middle click
        }).magnificPopup('open');
    });
});
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initMap"></script>


</body>
</html>