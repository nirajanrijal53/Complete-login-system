<?php require '../config/init.php'; ?>

<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title><?php echo isset($page_title) ? $page_title : SITE_NAME  ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>font-awesome.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>bootstrap-grid.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>bootstrap-reboot.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>font-techmarket.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>slick.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>techmarket-font-awesome.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>slick-style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>colors/blue.css" media="all" />
        
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,900" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo IMAGES_URL ?>logo.png">

    </head>
    <body class="woocommerce-active page-template-template-homepage-v2 can-uppercase">
        <div id="page" class="hfeed site">
        
            <!-- .top-bar-v1 -->
        <header id="masthead" class="site-header header-v1" style="background-image: none; ">
                <div class="col-full desktop-only">
                    <div class="techmarket-sticky-wrap">
                        <div class="row">
                            <div class="site-branding">
                                <a href="<?php echo SITE_URL?>home" class="custom-logo-link" rel="home">
                                    <img src=" <?php echo IMAGES_URL ?>logo.png" style="height: 45px; width: auto; background-size: cover">
                                </a>
                                <!-- /.custom-logo-link -->
                            </div>
                            <!-- /.site-branding -->

                            <nav id="primary-navigation" class="primary-navigation" aria-label="Primary Navigation" data-nav="flex-menu">
                                <ul id="menu-primary-menu" class="nav yamm">
                                    <li class="sale-clr yamm-fw menu-item animate-dropdown">
                                        <a title="About us" href="about-us">About LeafPlus</a>
                                    </li>
                                    <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                                        <a title="Mother`s Day" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" href="#">Policies <span class="caret"></span></a>
                                        <ul role="menu" class=" dropdown-menu">
                                            <li class="menu-item animate-dropdown">
                                                <a title="Privacy Policy" href="privacy-policy">Privacy Policy</a>
                                            </li>
                                            <li class="menu-item animate-dropdown">
                                                <a title="Terms and conditions" href="terms-and-conditions">Terms &amp; Conditions</a>
                                            </li>
                                            <li class="menu-item animate-dropdown">
                                                <a title="Delivey Charges" href="delivery-charges">Delivey Charges</a>
                                            </li>
                                            <li class="menu-item animate-dropdown">
                                                <a title="Return Policy" href="return-policy">Return Policy</a>
                                            </li>
                                        </ul>
                                        <!-- .dropdown-menu -->
                                    </li>
                                    
                                </ul>
                                <!-- .nav -->
                            </nav>
                            <!-- .primary-navigation -->
                        </div>
                        <!-- /.row -->
                    </div>

                </div>
         </header>


<?php 
	$page = new Pages();
	$page_info = $page->getAllPages();
	// debugger($page_info);
?>         	
<div class="container">
	<h2><?php echo $page_info[1]->title ?></h2>
	<h3><?php echo $page_info[1]->summary ?></h3>
	<p><?php echo $page_info[1]->description ?></p>
</div>






<footer class="site-footer footer-v1">
                <div class="col-full">
                    <div class="before-footer-wrap">
                        <div class="col-full">
                            <div class="footer-newsletter">
                                <div class="media">
                                    <i class="footer-newsletter-icon tm tm-newsletter"></i>
                                    <div class="media-body">
                                        <div class="clearfix">
                                            <div class="newsletter-header">
                                                <h5 class="newsletter-title">Sign up to Newsletter</h5>
                                                <span class="newsletter-marketing-text">...and receive
                                                    <strong>NPR 2,000 coupon for first shopping</strong>
                                                </span>
                                            </div>
                                            <!-- .newsletter-header -->
                                            <div class="newsletter-body">
                                                <form class="newsletter-form">
                                                    <input type="text" placeholder="Enter your email address">
                                                    <button class="button" type="button">Sign up</button>
                                                </form>
                                            </div>
                                            <!-- .newsletter body -->
                                        </div>
                                        <!-- .clearfix -->
                                    </div>
                                    <!-- .media-body -->
                                </div>
                                <!-- .media -->
                            </div>
                            <!-- .footer-newsletter -->
                            <div class="footer-social-icons">
                                <ul class="social-icons nav">
                                    <li class="nav-item">
                                        <a class="sm-icon-label-link nav-link" href="https://www.facebook.com/">
                                            <i class="fa fa-facebook"></i> Facebook</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="sm-icon-label-link nav-link" href="https://www.twitter.com/">
                                            <i class="fa fa-twitter"></i> Twitter</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="sm-icon-label-link nav-link" href="https://plus.google.com/discover">
                                            <i class="fa fa-google-plus"></i> Google+</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="sm-icon-label-link nav-link" href="https://www.vimeo.com/">
                                            <i class="fa fa-vimeo-square"></i> Vimeo</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="sm-icon-label-link nav-link" href="https://rss.com/">
                                            <i class="fa fa-rss"></i> RSS</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- .footer-social-icons -->
                        </div>
                        <!-- .col-full -->
                    </div>
                    <!-- .before-footer-wrap -->
                    <div class="footer-widgets-block">
                        <div class="row">
                            <div class="footer-contact">
                                <div class="footer-logo">
                                    <a href="<?php echo SITE_URL?>home" class="custom-logo-link" rel="home">
                                        <img src=" <?php echo IMAGES_URL ?>logo.png ?> " style="width: auto; height: 75px;">
                                    </a>
                                </div>
                                <!-- .footer-logo -->
                                <div class="contact-payment-wrap">
                                    <div class="footer-contact-info">
                                        <div class="media">
                                            <span class="media-left icon media-middle">
                                                <i class="tm tm-call-us-footer"></i>
                                            </span>
                                            <div class="media-body">
                                                <span class="call-us-title">Got Questions ? Call us 24/7!</span>
                                                <span class="call-us-text">(+977) 9816257665</span>
                                                <address class="footer-contact-address">Mid-baneshwor, Kathmandu, Nepal</address>
                                                <a href="https://www.google.com/maps/place/Leafplus+Pvt+Ltd/@27.6963315,85.3318975,17z/data=!3m1!4b1!4m5!3m4!1s0x39eb19a29cc57e5d:0xf1b1caf4bcce530c!8m2!3d27.6963268!4d85.3340862" class="footer-address-map-link">
                                                    <i class="tm tm-map-marker"></i>Find us on map</a>
                                            </div>
                                            <!-- .media-body -->
                                        </div>
                                        <!-- .media -->
                                    </div>
                                    <!-- .footer-contact-info -->
                                </div>
                                <!-- .contact-payment-wrap -->
                            </div>
                            <!-- .footer-contact -->
                            <div class="footer-widgets">
                                <div class="columns">
                                    <aside class="widget clearfix">
                                        <div class="body">
                                            <h4 class="widget-title">Find it Fast</h4>
                                            <div class="menu-footer-menu-1-container">

                                                <ul id="menu-footer-menu-1" class="menu">
                                                    <?php 
                                                    	$category = new Category();
                                						$all_parent_cats = $category->getParentCatForMenu();
                                                        foreach($all_parent_cats as $cat_info){
                                                            $child_cats = $category->getChildCategory($cat_info->id);
                                                            if($child_cats){
                                                    ?>
                                                    <li class="menu-item">
                                                        <a href="#"><?php echo $cat_info->name; ?></a>
                                                    </li>
                                                <?php       } 
                                                        }   
                                                ?>
                                                </ul>
                                            </div>
                                            <!-- .menu-footer-menu-1-container -->
                                        </div>
                                        <!-- .body -->
                                    </aside>
                                    <!-- .widget -->
                                </div>
                                <!-- .columns -->
                                <div class="columns">
                                    <aside class="widget clearfix">
                                        <div class="body">
                                            <h4 class="widget-title">Customer Care</h4>
                                            <div class="menu-footer-menu-3-container">
                                                <ul id="menu-footer-menu-3" class="menu">
                                                    <li class="menu-item">
                                                        <a href="login-and-register.html">My Account</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="track-your-order.html">Track Order</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="shop.html">Shop</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="about.html">About Us</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="faq.html">FAQs</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- .menu-footer-menu-3-container -->
                                        </div>
                                        <!-- .body -->
                                    </aside>
                                    <!-- .widget -->
                                </div>
                                <!-- .columns -->
                            </div>
                            <!-- .footer-widgets -->
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .footer-widgets-block -->
                    <div class="site-info">
                        <div class="col-full">
                            <div class="copyright">Copyright &copy; <?php echo date("Y"); ?> Powered by <a href="<?php SITE_URL?>home"><b><?php echo SITE_NAME ?></a> All rights reserved.</b></div>
                            <!-- .copyright -->
                            <div class="credit">Made with
                                <i class="fa fa-heart"></i> by Nirajan Rijal.</div>
                            <!-- .credit -->
                        </div>
                        <!-- .col-full -->
                    </div>
                    <!-- .site-info -->
                </div>
                <!-- .col-full -->
            </footer>
            <!-- .site-footer -->
        </div>
        
        <script type="text/javascript" src="<?php echo JS_URL ?>jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_URL ?>tether.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_URL ?>bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_URL ?>jquery-migrate.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_URL ?>hidemaxlistitem.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_URL ?>jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_URL ?>hidemaxlistitem.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_URL ?>jquery.easing.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_URL ?>scrollup.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_URL ?>jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_URL ?>waypoints-sticky.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_URL ?>pace.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_URL ?>slick.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_URL ?>scripts.js"></script>
        
    </body>
</html>