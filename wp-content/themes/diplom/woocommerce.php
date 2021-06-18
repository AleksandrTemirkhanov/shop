<?php
/**
 * The template for displaying woocommerce pages
 *
 * @since 1.0

 */

get_header('page');

?>
<body <?php body_class(); ?>>
<section class="hero-slider">
    <!-- Single Slider -->
    <div class="swiper-container mySwiper">
        <div class="swiper-wrapper">
            <div class="single-slider">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-9 offset-lg-3 col-12">
                            <div class="text-inner">
                                <div class="row">
                                    <div class="col-lg-7 col-12">

                                        <div class="hero-text">
                                            <div class="back-hero"></div>
                                            <div class="swiper-slide">
                                                <h1><span>СКИДКИ ДО 50%</span> Краски</h1>
                                                <p>Вы можете с нами связаться для консультации</p>
                                                <div class="button">
                                                    <a href="/kontakty/" class="btn">Обратная связь</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--/ End Single Slider -->
</section>
    <div class="container background">
        <section class="main">



                    <?php if (class_exists('WooCommerce') && is_woocommerce()) : ?>
                        <?php woocommerce_breadcrumb(); ?>
                    <?php endif; ?>

                    <?php woocommerce_content(); ?>


        </section>


    </div><!-- .container -->
</body>
<?php
get_footer();