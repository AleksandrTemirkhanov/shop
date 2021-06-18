<?php

echo do_shortcode('[google-translator]');

?>

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= get_stylesheet_directory_uri()?>/images/favicon.png">
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri()?>/css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri()?>/css/magnific-popup.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri()?>/css/font-awesome.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri()?>/css/jquery.fancybox.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri()?>/css/themify-icons.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri()?>/css/niceselect.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri()?>/css/animate.css">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri()?>/css/flex-slider.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri()?>/css/owl-carousel.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri()?>/css/slicknav.min.css">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri()?>/css/reset.css">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri()?>/style.css">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri()?>/css/responsive.css">

    <!-- Slider Revolution -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Slider Revolution -->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>
<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- End Preloader -->

<!-- Header -->
<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt"></i> +7(999)999-99-99</li>
                            <li><i class="ti-email"></i> info@shop.ru</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <?php
                            if(is_user_logged_in()){
                                echo '  <li><i class="ti-user"></i> <a href="/wp-admin/admin.php?page=wc-admin&path=%2Fanalytics%2Foverview">Мой аккаунт</a></li>';
                            }
                            ?>

                            <?php
                            if(is_user_logged_in()){
                                echo '<li><i class="ti-power-off"></i><a href="/wp-login.php?action=logout">Выйти</a></li>';
                            }else{
                                echo '  <li><i class="ti-power-off"></i><a href="/wp-login.php">Войти</a></li>';
                            }
                            ?>

                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="/"><img src="<?= get_stylesheet_directory_uri()?>/images/logo.png" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">



                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">

                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <?php
                    if(is_front_page()){
                        ?>
                    <div class="col-lg-3">
                        <div class="all-category">
                            <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>КАТЕГОРИИ</h3>
                            <!--<ul class="main-category">-->
                            <?php
                            $taxonomy     = 'product_cat';
                            $orderby      = 'name';
                            $show_count   = 0;      // 1 for yes, 0 for no
                            $pad_counts   = 0;      // 1 for yes, 0 for no
                            $hierarchical = 1;      // 1 for yes, 0 for no
                            $title        = '';
                            $empty        = 0;

                            $args = array(
                                'taxonomy'     => $taxonomy,
                                'orderby'      => $orderby,
                                'show_count'   => $show_count,
                                'pad_counts'   => $pad_counts,
                                'hierarchical' => $hierarchical,
                                'title_li'     => $title,
                                'hide_empty'   => $empty,
                                'number'       => 8,
                            );
                            $all_categories = get_categories( $args );
                            echo '<div><ul class="main-category">';
                            ?>
                            <li><a href="#">Свежие поступления <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                <ul class="sub-category">
                                    <?php
                                    $args = array( 'post_type' => 'product' ,'orderby' => 'date','category' => 0,  'numberposts' => 6);
                                    $products = get_posts( $args );
                                    foreach( $products as $product ) :
                                        echo '<li> <a href="#">'.$product->post_title.'</a></li>
                              ';
                                    endforeach;
                                    ?>
                                </ul>
                            </li>
                            <li class="main-mega"><a href="#">Хиты продаж <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                <ul class="mega-menu">
                                    <div class="swiper-container HotSwiper">
                                        <div class="swiper-wrapper">
                                            <?php

                                            $args = array( 'post_type' => 'product' ,'orderby' => 'date','product_cat' => 'guash',  'numberposts' => 12);
                                            $hots = get_posts( $args );
                                            foreach($hots as $hot){
                                                ?>
                                                <div class="swiper-slide">
                                                    <li class="single-menu">
                                                        <a href="#" class="title-link"><?=$hot->post_title?></a>
                                                        <div class="image">
                                                            <?php echo get_the_post_thumbnail( $hot->ID, 'thumbnail')?>
                                                        </div>
                                                        <a href="<?php get_site_url()?>/?add-to-cart=<?= $hot->ID?>" class="btn custom_button">В корзину</a>
                                                    </li>
                                                </div>
                                                <?php
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                            <?php
                            foreach ($all_categories as $category){

                                echo '<li><a href="/product-category/'.$category->slug.'">'.$category->name.'</a></li>';
                            }
                            echo '</ul></div>';

                            ?>


                        </div>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <!--  <ul class="nav main-menu menu navbar-nav">-->
                                        <?php
                                        wp_nav_menu( [
                                            'theme_location'  => '',
                                            'menu'            => 'Top',
                                            'container'       => 'div',
                                            'container_class' => '',
                                            'container_id'    => '',
                                            'menu_class'      => 'menu',
                                            'menu_id'         => '',
                                            'echo'            => true,
                                            'fallback_cb'     => 'wp_page_menu',
                                            'before'          => '',
                                            'after'           => '',
                                            'link_before'     => '',
                                            'link_after'      => '',
                                            'items_wrap'      => '<ul id="%1$s" class="nav main-menu menu navbar-nav">%3$s</ul>',
                                            'depth'           => 0,
                                            'walker'          => '',
                                        ] );
                                        ?>

                                        <!-- <li class="active"><a href="#">Home</a></li>
                                         <li><a href="#">Product</a></li>
                                         <li><a href="#">Service</a></li>
                                         <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                             <ul class="dropdown">
                                                 <li><a href="cart.html">Cart</a></li>
                                                 <li><a href="checkout.html">Checkout</a></li>
                                             </ul>
                                         </li>
                                         <li><a href="#">Pages</a></li>
                                         <li><a href="#">Blog<i class="ti-angle-down"></i></a>
                                             <ul class="dropdown">
                                                 <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
                                             </ul>
                                         </li>
                                         <li><a href="contact.html">Contact Us</a></li>
                                     </ul>-->

                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>



                    <?php
                    }else{
                        ?>
                <div class="col-lg-3">

                </div>
                <div class="col-lg-9 col-12">
                    <div class="menu-area">
                        <!-- Main Menu -->
                        <nav class="navbar navbar-expand-lg">
                            <div class="navbar-collapse">
                                <div class="nav-inner">
                                    <!--  <ul class="nav main-menu menu navbar-nav">-->
                                    <?php
                                    wp_nav_menu( [
                                        'theme_location'  => '',
                                        'menu'            => 'Top',
                                        'container'       => 'div',
                                        'container_class' => '',
                                        'container_id'    => '',
                                        'menu_class'      => 'menu',
                                        'menu_id'         => '',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'before'          => '',
                                        'after'           => '',
                                        'link_before'     => '',
                                        'link_after'      => '',
                                        'items_wrap'      => '<ul id="%1$s" class="nav main-menu menu navbar-nav">%3$s</ul>',
                                        'depth'           => 0,
                                        'walker'          => '',
                                    ] );
                                    ?>

                                    <!-- <li class="active"><a href="#">Home</a></li>
                                     <li><a href="#">Product</a></li>
                                     <li><a href="#">Service</a></li>
                                     <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                         <ul class="dropdown">
                                             <li><a href="cart.html">Cart</a></li>
                                             <li><a href="checkout.html">Checkout</a></li>
                                         </ul>
                                     </li>
                                     <li><a href="#">Pages</a></li>
                                     <li><a href="#">Blog<i class="ti-angle-down"></i></a>
                                         <ul class="dropdown">
                                             <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
                                         </ul>
                                     </li>
                                     <li><a href="contact.html">Contact Us</a></li>
                                 </ul>-->

                                </div>
                            </div>
                        </nav>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
                <?php
                    }


                    ?>

            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!--/ End Header -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".HotSwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
        loop: true,
        autoplay: {
            delay: 1500,
            disableOnInteraction: false,
        },
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
