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


        <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            .mySlides {display:none;}
        </style>
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
                                        <a title="About us" href="pages/about-us">About LeafPlus</a>
                                    </li>
                                    <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                                        <a title="Mother`s Day" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" href="#">Policies <span class="caret"></span></a>
                                        <ul role="menu" class=" dropdown-menu">
                                            <!-- <li class="menu-item animate-dropdown">
                                                <a title="Privacy Policy" href="pages/?p=privacy-policy">Privacy Policy</a>
                                            </li> -->
                                            <li class="menu-item animate-dropdown">
                                                <a title="Privacy Policy" href="pages/privacy-policy">Privacy Policy</a>
                                            </li>
                                            <li class="menu-item animate-dropdown">
                                                <a title="Terms and conditions" href="pages/terms-and-conditions">Terms &amp; Conditions</a>
                                            </li>
                                            <li class="menu-item animate-dropdown">
                                                <a title="Delivey Charges" href="pages/delivery-charges">Delivey Charges</a>
                                            </li>
                                            <li class="menu-item animate-dropdown">
                                                <a title="Return Policy" href="pages/return-policy">Return Policy</a>
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
                    <!-- .techmarket-sticky-wrap -->
                    <div class="row align-items-center">
                        <div id="departments-menu" class="dropdown departments-menu">
                            <button class="btn dropdown-toggle btn-block" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="tm tm-departments-thin"></i>
                                <span>All Departments</span>
                            </button>
                            <?php 
                                $category = new Category();
                                $all_parent_cats = $category->getParentCatForMenu();

                            ?>
                            <ul id="menu-departments-menu" class="dropdown-menu yamm departments-menu-dropdown">
                                <?php 
                                    foreach($all_parent_cats as $cat_info){
                                        $child_cats = $category->getChildCategory($cat_info->id);
                                        if($child_cats){
                                ?>

                                            <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                                <a title="Computers &amp; Laptops" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" href="#"><?php echo $cat_info->name; ?> <span class="caret"></span></a>
                                                <ul role="menu" class=" dropdown-menu">
                                                    <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                        <div class="yamm-content">
                                                            <div class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_single_image">
                                                                        <?php 
                                                                            if($cat_info->image!=null && file_exists(UPLOAD_DIR.'category/'.$cat_info->image)){
                                                                                ?>
                                                                        <img src="<?php echo UPLOAD_URL.'category/'.$cat_info->image ?>" class="" alt="" />

                                                                                <?php
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                    <!-- .kc_single_image -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .bg-yamm-content -->
                                                            <div class="row yamm-content-row">
                                                                <?php 
                                                                foreach ($child_cats as $key => $sub_cats) {
                                                                    if($key%9==0){

                                                                ?>
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="kc-col-container">
                                                                        <div class="kc_text_block">
                                                                            <ul>
                                                                            <?php } ?>
                                                                                <li><a href="category?cid=<?php echo $cat_info->id ?>&amp;sid=<?php echo $sub_cats->id; ?>"><?php echo $sub_cats->name; ?></a></li>
                                                                            <?php if(($key != 0 && $key%9 == 0) || ($key == (count($child_cats)-1))){ ?>
                                                                            </ul>
                                                                        </div>
                                                                        <!-- .kc_text_block -->
                                                                    </div>
                                                                    <!-- .kc-col-container -->
                                                                </div>
                                                                <!-- .kc_column -->
                                                            <?php }
                                                                } ?>
                                                            </div>
                                                            <!-- .kc_row -->
                                                        </div>
                                                        <!-- .yamm-content -->
                                                    </li>
                                                </ul>
                                            </li>
                                <?php
                                        } else {
                                            
                                ?>
                                            <li class=" menu-item animate-dropdown">
                                                <a title="Value of the Day" href="category?cid=<?php echo $cat_info->id ?>"> <?php echo $cat_info->name; ?></a>
                                            </li>
                                            <?php
                                        }
                                    }
                                ?>
                            </ul>
                                
                        </div>
                        <!-- .departments-menu -->
                        <form class="navbar-search" method="get" action="search">
                            <label class="sr-only screen-reader-text" for="search">Search for:</label>
                            <div class="input-group">
                                <input type="text" id="search" class="form-control search-field product-search-field" dir="ltr" value="" name="s" placeholder="Search for products" />
                                <div class="input-group-addon search-categories popover-header">
                                    <select name='product_cat' id='product_cat' class='postform resizeselect'>
                                        <?php 
                                            foreach ($all_parent_cats as $key => $parent) {
                                        ?>
                                        <option class="level-0" value="<?php echo $parent->id ?>"><?php echo $parent->name ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <!-- .input-group-addon -->
                                <div class="input-group-btn input-group-append">
                                    <input type="hidden" id="search-param" name="post_type" value="product" />
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                        <span class="search-btn">Search</span>
                                    </button>
                                </div>
                                <!-- .input-group-btn -->
                            </div>
                            <!-- .input-group -->
                        </form>
                        
                        <!-- .header-wishlist -->
                        <ul id="site-header-cart" class="site-header-cart menu">
                            <li class="animate-dropdown dropdown ">
                                <a class="cart-contents" href="cart.html" data-toggle="dropdown" title="View your shopping cart">
                                    <i class="tm tm-shopping-bag"></i>
                                    <span class="count">0</span>
                                    <span class="amount">
                                        <span class="price-label">Your Cart</span>NPR. 100 </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-mini-cart">
                                    <li>
                                        <div class="widget woocommerce widget_shopping_cart">
                                            <div class="widget_shopping_cart_content">
                                                <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                                    <li class="woocommerce-mini-cart-item mini_cart_item">
                                                        <a href="#" class="remove" aria-label="Remove this item" data-product_id="65" data-product_sku="">×</a>
                                                        <a href="single-product-sidebar.html">
                                                            <img src="<?php echo IMAGES_URL ?>products/mini-cart1.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">XONE Wireless Controller&nbsp;
                                                        </a>
                                                        <span class="quantity">1 ×
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol">$</span>64.99</span>
                                                        </span>
                                                    </li>
                                                    <li class="woocommerce-mini-cart-item mini_cart_item">
                                                        <a href="#" class="remove" aria-label="Remove this item" data-product_id="27" data-product_sku="">×</a>
                                                        <a href="single-product-sidebar.html">
                                                            <img src="<?php echo IMAGES_URL ?>products/mini-cart2.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">Gear Virtual Reality 3D with Bluetooth Glasses&nbsp;
                                                        </a>
                                                        <span class="quantity">1 ×
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol">$</span>72.00</span>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <!-- .cart_list -->
                                                <p class="woocommerce-mini-cart__total total">
                                                    <strong>Subtotal:</strong>
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol">$</span>136.99</span>
                                                </p>
                                                <p class="woocommerce-mini-cart__buttons buttons">
                                                    <a href="cart.html" class="button wc-forward">View cart</a>
                                                    <a href="checkout.html" class="button checkout wc-forward">Checkout</a>
                                                </p>
                                            </div>
                                            <!-- .widget_shopping_cart_content -->
                                        </div>
                                        <!-- .widget_shopping_cart -->
                                    </li>
                                </ul>
                                <!-- .dropdown-menu-mini-cart -->

                            </li>
                        </ul>
                        <!-- .site-header-cart -->
                        <ul class="header-wishlist nav navbar-nav">
                            <li class="nav-item">
                                <a href="login" class="nav-link">
                                    <i class="tm tm-login-register"></i>
                                    <span id="top-cart-wishlist-count" class="value"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- .col-full -->
        </header>
            <!-- .header-v1 -->