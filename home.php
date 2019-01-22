<?php require 'config/init.php'; ?>

<?php require 'inc/header.php'; ?>
            
<div id="content" class="site-content" tabindex="-1">
                <div class="col-full">
                    <div class="row">
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="slider-with-banners row">
                                    <div class="slider-block column-1-slider-block ">
                                        <div class="w3-content w3-section" style="max-width:100%;">
                                    <?php  
                                        $banner = new Banner();
                                        $args = array(
                                            'where' => array(
                                                'and' => array(
                                                    'status' => 'Active'
                                                )
                                            ),
                                            'order_by' => 'id DESC',
                                            'limit' => '0,4'
                                        );
                                        $all_banner = $banner->getAllBanner($args);
                                        // debugger($all_banner);
                                        foreach ($all_banner as $key => $banner_info) {
                                        
                                    ?>
                                            <img class="mySlides" src="<?php echo UPLOAD_URL.'banner/'.$banner_info->image ?>" style="height: 500px; width: 100%;">
                                <?php } ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <section class="section-top-categories section-categories-carousel" id="categories-carousel-3">
                                    <header class="section-header">
                                        <h2 class="section-title">Top
                                            <br>categories
                                            <br>this week</h2>
                                        <a class="readmore-link" href="#">Full Catalog</a>
                                    </header>
                                    <!-- .section-header -->
                                    <div class="product-categories product-categories-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#categories-carousel-3 .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6}}]}">
                                        <div class="woocommerce columns-7">
                                            <div class="products">
                                                <?php 
                                                    foreach ($all_parent_cats as $key => $parent_category) {
                                                ?>
                                                <div class="product-category product">
                                                    <a href="category?cid=<?php echo $parent_category->id ?>">
                                                        <img width="224" height="197" alt="Fashion" src="<?php echo UPLOAD_URL.'category/'.$parent_category->image; ?>">
                                                        <h2 class="woocommerce-loop-category__title"> <?php echo $parent_category->name ?> </h2>
                                                    </a>
                                                </div>
                                            <?php } ?>
                                            </div>
                                            <!-- .products-->
                                        </div>
                                        <!-- .woocommerce-->
                                    </div>
                                    <!-- .product-categories -->
                                </section>
                                
                                <!-- /.section-6-1-6-products-tabs -->
                                <div class="fullwidth-notice stretch-full-width">
                                    <div class="col-full">
                                        <p class="message">Download our new app today! Dont miss our mobile-only offers and shop with Android Play.</p>
                                    </div>
                                    <!-- .col-full -->
                                </div>
                                <!-- .fullwidth-notice -->
                                <div class="banners">
                                    <div class="row">
                                        <?php
                                            $add = new Advertisement();
                                            $args = array(
                                            'where' => array(
                                                'and' => array(
                                                    'status' => 'Active'
                                                )
                                            ),
                                            'order_by' => 'id DESC',
                                            'limit' => '0,3'
                                            );
                                            $advertisement = $add->getAllAdvertisement($args);
                                            // debugger($advertisement);
                                            foreach ($advertisement as $key => $add_info) {
                                                
                                        ?>
                                        <div class="banner large-banner text-in-right">
                                            <a href="#">
                                                <div class="banner-bg" style="background-size: cover; background-position: center center; background-image: url( <?php echo UPLOAD_URL.'advertisement/'.$add_info->image; ?> ); height: 259px;">
                                                </div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.banners -->
                                <section class="section-hot-new-arrivals section-products-carousel-tabs techmarket-tabs">
                                    <div class="section-products-carousel-tabs-wrap">
                                        <header class="section-header">
                                            <h2 class="section-title">Hot New Arrivals</h2>
                                            <ul role="tablist" class="nav justify-content-end">
                                                <li class="nav-item"><a class="nav-link active" href="#tab-59f89f0940f740" data-toggle="tab">Top 20</a></li>
                                                <li class="nav-item"><a class="nav-link " href="#tab-59f89f0940f741" data-toggle="tab">Clothing</a></li>
                                                <li class="nav-item"><a class="nav-link " href="#tab-59f89f0940f742" data-toggle="tab">Electronics</a></li>
                                                <li class="nav-item"><a class="nav-link " href="#tab-59f89f0940f743" data-toggle="tab">Beverage</a></li>
                                            </ul>
                                        </header>
                                        <!-- .section-header -->
                                        <div class="tab-content">
                                            <div id="tab-59f89f0940f740" class="tab-pane active" role="tabpanel">
                                                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                                    <div class="container-fluid">
                                                        <div class="woocommerce">
                                                            <div class="products">
                                                                <?php 
                                                                    $product = new Products();
                                                                    $args = array(
                                                                        'fields' => array(
                                                                                'products.id',
                                                                                'products.title',
                                                                                'products.price',
                                                                                'products.discount',
                                                                                '(SELECT image_name FROM product_images WHERE product_images.product_id = products.id LIMIT 0,1) as product_image'),
                                                                            'where' => array(
                                                                            'and' => array(
                                                                                'status'=> 'Available'
                                                                            )
                                                                        ),
                                                                        'order' => 'id DESC',
                                                                        'limit' => '0,20'
                                                                    );
                                                                    $top_20 = $product->getProduct($args);
                                                                    //debugger($top_20,true);
                                                                    foreach ($top_20 as $key => $top_products) {
                                                                ?>
                                                                <div class="product">
                                                                    <a href="product?id=<?php echo $top_products->id ?>" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">NPR</span><?php echo number_format($top_products->price) ?></span>
                                                                        </span>
                                                                        <?php  
                                                                            if(file_exists(UPLOAD_DIR.'products/'.$top_products->product_image) && !empty($top_products->product_image)){

                                                                                $thumb = UPLOAD_URL.'products/'.$top_products->product_image;
                                                                            } else {
                                                                                $thumb = CMS_IMG.'default-image.jpg';
                                                                            }
                                                                        ?>
                                                                        <img src="<?php echo $thumb ?>" width="224" height="197" class="wp-post-image" alt="">

                                                                        <span class="price">
                                                                            <?php 
                                                                                $discount = $top_products->discount;
                                                                                $price = $top_products->price;

                                                                                if($discount > 0){
                                                                                    $price = $price-($price*$discount)/100;
                                                                                }
                                                                            ?>
                                                                            <ins>
                                                                                <span class="amount"> NPR <?php echo number_format($price); ?></span>
                                                                            </ins>
                                                                            <?php  
                                                                                if($discount > 0){
                                                                            ?>
                                                                            <del>
                                                                                <span class="amount">NPR <?php echo number_format($top_products->price); ?></span>
                                                                            </del>
                                                                        <?php } ?>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                                        <!-- /.price -->
                                                                        <h2 class="woocommerce-loop-product__title"><?php echo $top_products->title; ?></h2>
                                                                    </a>
                                                                    <div class="hover-area">
                                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                                <!-- /.product-outer -->
                                                            </div>
                                                        </div>
                                                        <!-- .woocommerce -->
                                                    </div>
                                                    <!-- .container-fluid -->
                                                </div>
                                                <!-- .products-carousel -->
                                            </div>
                                            <!-- .tab-pane -->
                                            <div id="tab-59f89f0940f741" class="tab-pane" role="tabpanel">
                                                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                                    <div class="container-fluid">
                                                        <div class="woocommerce">
                                                            <div class="products">
                                                                <?php 
                                                                    $args = array(
                                                                        'fields' => array(
                                                                                'products.id',
                                                                                'products.title',
                                                                                'products.price',
                                                                                'products.discount',
                                                                                '(SELECT image_name FROM product_images WHERE product_images.product_id = products.id LIMIT 0,1) as product_image'),
                                                                            'where' => array(
                                                                            'and' => array(
                                                                                'status'=> 'Available',
                                                                                'cat_id' => '26'
                                                                            )
                                                                        ),
                                                                        'order' => 'id DESC',
                                                                        'limit' => '0,5'
                                                                    );
                                                                    $clothing = $product->getProduct($args);
                                                                    //debugger($top_20,true);
                                                                    foreach ($clothing as $key => $top_products) {
                                                                ?>
                                                                <div class="product">
                                                                    <a href="product?id=<?php echo $top_products->id ?>" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">NPR</span><?php echo number_format($top_products->price) ?></span>
                                                                        </span>
                                                                        <?php  
                                                                            if(file_exists(UPLOAD_DIR.'products/'.$top_products->product_image) && !empty($top_products->product_image)){

                                                                                $thumb = UPLOAD_URL.'products/'.$top_products->product_image;
                                                                            } else {
                                                                                $thumb = CMS_IMG.'default-image.jpg';
                                                                            }
                                                                        ?>
                                                                        <img src="<?php echo $thumb ?>" width="224" height="197" class="wp-post-image" alt="">

                                                                        <span class="price">
                                                                            <?php 
                                                                                $discount = $top_products->discount;
                                                                                $price = $top_products->price;

                                                                                if($discount > 0){
                                                                                    $price = $price-($price*$discount)/100;
                                                                                }
                                                                            ?>
                                                                            <ins>
                                                                                <span class="amount"> NPR <?php echo number_format($price); ?></span>
                                                                            </ins>
                                                                            <?php  
                                                                                if($discount > 0){
                                                                            ?>
                                                                            <del>
                                                                                <span class="amount">NPR <?php echo number_format($top_products->price); ?></span>
                                                                            </del>
                                                                        <?php } ?>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                                        <!-- /.price -->
                                                                        <h2 class="woocommerce-loop-product__title"><?php echo $top_products->title; ?></h2>
                                                                    </a>
                                                                    <div class="hover-area">
                                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                                <!-- /.product-outer -->
                                                            </div>
                                                        </div>
                                                        <!-- .woocommerce -->
                                                    </div>
                                                    <!-- .container-fluid -->
                                                </div>
                                                <!-- .products-carousel -->
                                            </div>

                                            <div id="tab-59f89f0940f742" class="tab-pane" role="tabpanel">
                                                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                                    <div class="container-fluid">
                                                        <div class="woocommerce">
                                                            <div class="products">
                                                                <?php 
                                                                    $args = array(
                                                                        'fields' => array(
                                                                                'products.id',
                                                                                'products.title',
                                                                                'products.price',
                                                                                'products.discount',
                                                                                '(SELECT image_name FROM product_images WHERE product_images.product_id = products.id LIMIT 0,1) as product_image'),
                                                                            'where' => array(
                                                                            'and' => array(
                                                                                'status'=> 'Available',
                                                                                'cat_id' => '13'
                                                                            )
                                                                        ),
                                                                        'order' => 'id DESC',
                                                                        'limit' => '0,5'
                                                                    );
                                                                    $clothing = $product->getProduct($args);
                                                                    //debugger($top_20,true);
                                                                    foreach ($clothing as $key => $top_products) {
                                                                ?>
                                                                <div class="product">
                                                                    <a href="product?id=<?php echo $top_products->id ?>" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">NPR</span><?php echo number_format($top_products->price) ?></span>
                                                                        </span>
                                                                        <?php  
                                                                            if(file_exists(UPLOAD_DIR.'products/'.$top_products->product_image) && !empty($top_products->product_image)){

                                                                                $thumb = UPLOAD_URL.'products/'.$top_products->product_image;
                                                                            } else {
                                                                                $thumb = CMS_IMG.'default-image.jpg';
                                                                            }
                                                                        ?>
                                                                        <img src="<?php echo $thumb ?>" width="224" height="197" class="wp-post-image" alt="">

                                                                        <span class="price">
                                                                            <?php 
                                                                                $discount = $top_products->discount;
                                                                                $price = $top_products->price;

                                                                                if($discount > 0){
                                                                                    $price = $price-($price*$discount)/100;
                                                                                }
                                                                            ?>
                                                                            <ins>
                                                                                <span class="amount"> NPR <?php echo number_format($price); ?></span>
                                                                            </ins>
                                                                            <?php  
                                                                                if($discount > 0){
                                                                            ?>
                                                                            <del>
                                                                                <span class="amount">NPR <?php echo number_format($top_products->price); ?></span>
                                                                            </del>
                                                                        <?php } ?>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                                        <!-- /.price -->
                                                                        <h2 class="woocommerce-loop-product__title"><?php echo $top_products->title; ?></h2>
                                                                    </a>
                                                                    <div class="hover-area">
                                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                                <!-- /.product-outer -->
                                                            </div>
                                                        </div>
                                                        <!-- .woocommerce -->
                                                    </div>
                                                    <!-- .container-fluid -->
                                                </div>
                                                <!-- .products-carousel -->
                                            </div>

                                            <div id="tab-59f89f0940f743" class="tab-pane" role="tabpanel">
                                                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                                    <div class="container-fluid">
                                                        <div class="woocommerce">
                                                            <div class="products">
                                                                <?php 
                                                                    $args = array(
                                                                        'fields' => array(
                                                                                'products.id',
                                                                                'products.title',
                                                                                'products.price',
                                                                                'products.discount',
                                                                                '(SELECT image_name FROM product_images WHERE product_images.product_id = products.id LIMIT 0,1) as product_image'),
                                                                            'where' => array(
                                                                            'and' => array(
                                                                                'status'=> 'Available',
                                                                                'cat_id' => '12'
                                                                            )
                                                                        ),
                                                                        'order' => 'id DESC',
                                                                        'limit' => '0,5'
                                                                    );
                                                                    $clothing = $product->getProduct($args);
                                                                    //debugger($top_20,true);
                                                                    foreach ($clothing as $key => $top_products) {
                                                                ?>
                                                                <div class="product">
                                                                    <a href="product?id=<?php echo $top_products->id ?>" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">NPR</span><?php echo number_format($top_products->price) ?></span>
                                                                        </span>
                                                                        <?php  
                                                                            if(file_exists(UPLOAD_DIR.'products/'.$top_products->product_image) && !empty($top_products->product_image)){

                                                                                $thumb = UPLOAD_URL.'products/'.$top_products->product_image;
                                                                            } else {
                                                                                $thumb = CMS_IMG.'default-image.jpg';
                                                                            }
                                                                        ?>
                                                                        <img src="<?php echo $thumb ?>" width="224" height="197" class="wp-post-image" alt="">

                                                                        <span class="price">
                                                                            <?php 
                                                                                $discount = $top_products->discount;
                                                                                $price = $top_products->price;

                                                                                if($discount > 0){
                                                                                    $price = $price-($price*$discount)/100;
                                                                                }
                                                                            ?>
                                                                            <ins>
                                                                                <span class="amount"> NPR <?php echo number_format($price); ?></span>
                                                                            </ins>
                                                                            <?php  
                                                                                if($discount > 0){
                                                                            ?>
                                                                            <del>
                                                                                <span class="amount">NPR <?php echo number_format($top_products->price); ?></span>
                                                                            </del>
                                                                        <?php } ?>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                                        <!-- /.price -->
                                                                        <h2 class="woocommerce-loop-product__title"><?php echo $top_products->title; ?></h2>
                                                                    </a>
                                                                    <div class="hover-area">
                                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                                <!-- /.product-outer -->
                                                            </div>
                                                        </div>
                                                        <!-- .woocommerce -->
                                                    </div>
                                                    <!-- .container-fluid -->
                                                </div>
                                                <!-- .products-carousel -->
                                            </div>
                                            <!-- .tab-pane -->
                                        </div>
                                        <!-- .tab-content -->
                                    </div>
                                    <!-- .section-products-carousel-tabs-wrap -->
                                </section>
                                <section class="section-trending-noe section-products-carousel-tabs">
                                    <div class="section-products-carousel-tabs-wrap">
                                        <header class="section-header">
                                            <br>
                                            <h2 class="section-title">Trending Now</h2>
                                            <br>
                                        </header>
                                        <!-- .section-header -->
                                        <div class="tab-content">
                                            <div id="tab-59f89f0941abf0" class="tab-pane active" role="tabpanel">
                                                <div class="products-carousel">
                                                    <div class="container-fluid">
                                                        <div class="woocommerce">
                                                            <div class="products">
                                                                <?php 
                                                                    $args = array(
                                                                        'fields' => array(
                                                                                'products.id',
                                                                                'products.title',
                                                                                'products.price',
                                                                                'products.discount',
                                                                                '(SELECT image_name FROM product_images WHERE product_images.product_id = products.id LIMIT 0,1) as product_image'),
                                                                            'where' => array(
                                                                            'and' => array(
                                                                                'status'=> 'Available',
                                                                                'is_trending' => '1'
                                                                            )
                                                                        ),
                                                                        'order' => 'id DESC',
                                                                        'limit' => '0,25'
                                                                    );
                                                                    $clothing = $product->getProduct($args);
                                                                    //debugger($top_20,true);
                                                                    foreach ($clothing as $key => $top_products) {
                                                                ?>
                                                                <div class="product">
                                                                    <a href="product?id=<?php echo $top_products->id ?>" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">NPR</span><?php echo number_format($top_products->price) ?></span>
                                                                        </span>
                                                                        <?php  
                                                                            if(file_exists(UPLOAD_DIR.'products/'.$top_products->product_image) && !empty($top_products->product_image)){

                                                                                $thumb = UPLOAD_URL.'products/'.$top_products->product_image;
                                                                            } else {
                                                                                $thumb = CMS_IMG.'default-image.jpg';
                                                                            }
                                                                        ?>
                                                                        <img src="<?php echo $thumb ?>" width="224" height="197" class="wp-post-image" alt="">

                                                                        <span class="price">
                                                                            <?php 
                                                                                $discount = $top_products->discount;
                                                                                $price = $top_products->price;

                                                                                if($discount > 0){
                                                                                    $price = $price-($price*$discount)/100;
                                                                                }
                                                                            ?>
                                                                            <ins>
                                                                                <span class="amount"> NPR <?php echo number_format($price); ?></span>
                                                                            </ins>
                                                                            <?php  
                                                                                if($discount > 0){
                                                                            ?>
                                                                            <del>
                                                                                <span class="amount">NPR <?php echo number_format($top_products->price); ?></span>
                                                                            </del>
                                                                        <?php } ?>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                                        <!-- /.price -->
                                                                        <h2 class="woocommerce-loop-product__title"><?php echo $top_products->title; ?></h2>
                                                                    </a>
                                                                    <div class="hover-area">
                                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                                <!-- /.product-outer -->
                                                            </div>
                                                        </div>
                                                        <!-- .woocommerce -->
                                                    </div>
                                                    <!-- .container-fluid -->
                                                </div>
                                                <!-- .products-carousel -->
                                            </div>
                                            <!-- .tab-pane -->
                                        </div>
                                        <!-- .tab-content -->
                                    </div>
                                    <!-- .section-products-carousel-tabs-wrap -->
                                </section>
                                <!-- .section-products-carousel -->
                                <div class="banner full-width-banner">
                                    <a href="shop.html">
                                        <div style="background-size: cover; background-position: center center; background-image: url( <?php echo CMS_IMG.'image23.jpg'  ?> ); width: 100%; height: 358px;" class="banner-bg">
                                            <div class="caption">
                                                <div class="banner-info">
                                                    <h3 class="title">
                                                        <!-- <strong>Wai Wai</strong>
                                                        <br> Just in 5 minutes</h3> -->
                                                </div>
                                            </div>
                                            <!-- /.caption -->
                                        </div>
                                        <!-- /.banner-b -->
                                    </a>
                                    <!-- /.section-header -->
                                </div>
                                <!-- /.banner -->
                                
                                <!-- .brands-carousel -->
                                <section class="section-landscape-products-carousel recently-viewed" id="recently-viewed">
                                    <header class="section-header">
                                        <h2 class="section-title">Featured products</h2>
                                        <nav class="custom-slick-nav"></nav>
                                    </header>
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:2,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#recently-viewed .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce columns-5">
                                                <div class="products">
                                                                <?php 
                                                                    $args = array(
                                                                        'fields' => array(
                                                                                'products.id',
                                                                                'products.title',
                                                                                'products.price',
                                                                                'products.discount',
                                                                                '(SELECT image_name FROM product_images WHERE product_images.product_id = products.id LIMIT 0,1) as product_image'),
                                                                            'where' => array(
                                                                            'and' => array(
                                                                                'status'=> 'Available',
                                                                                'is_featured' => '1'
                                                                            )
                                                                        ),
                                                                        'order' => 'id ASC',
                                                                        'limit' => '0,25'
                                                                    );
                                                                    $clothing = $product->getProduct($args);
                                                                    //debugger($top_20,true);
                                                                    foreach ($clothing as $key => $top_products) {
                                                                ?>
                                                                <div class="product">
                                                                    <a href="product?id=<?php echo $top_products->id ?>" class="woocommerce-LoopProduct-link">
                                                                        <span class="onsale">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">NPR</span><?php echo number_format($top_products->price) ?></span>
                                                                        </span>
                                                                        <?php  
                                                                            if(file_exists(UPLOAD_DIR.'products/'.$top_products->product_image) && !empty($top_products->product_image)){

                                                                                $thumb = UPLOAD_URL.'products/'.$top_products->product_image;
                                                                            } else {
                                                                                $thumb = CMS_IMG.'default-image.jpg';
                                                                            }
                                                                        ?>
                                                                        <img src="<?php echo $thumb ?>" width="224" height="197" class="wp-post-image" alt="">

                                                                        <span class="price">
                                                                            <?php 
                                                                                $discount = $top_products->discount;
                                                                                $price = $top_products->price;

                                                                                if($discount > 0){
                                                                                    $price = $price-($price*$discount)/100;
                                                                                }
                                                                            ?>
                                                                            <ins>
                                                                                <span class="amount"> NPR <?php echo number_format($price); ?></span>
                                                                            </ins>
                                                                            <?php  
                                                                                if($discount > 0){
                                                                            ?>
                                                                            <del>
                                                                                <span class="amount">NPR <?php echo number_format($top_products->price); ?></span>
                                                                            </del>
                                                                        <?php } ?>
                                                                            <span class="amount"> </span>
                                                                        </span>
                                                                        <!-- /.price -->
                                                                        <h2 class="woocommerce-loop-product__title"><?php echo $top_products->title; ?></h2>
                                                                    </a>
                                                                    <div class="hover-area">
                                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                                <!-- /.product-outer -->
                                                            </div>
                                            </div>
                                            <!-- .woocommerce -->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </section>
                                <!-- .section-landscape-products-carousel -->
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- #primary -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .col-full -->
</div>
<!-- #content -->
            
<?php require 'inc/footer.php'; ?>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>