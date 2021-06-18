<?php
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
wp_register_style( 'mihalica-woocommerce', get_template_directory_uri() . '/woocommerce.css', null, 1.0, 'screen' );
wp_enqueue_style( 'mihalica-woocommerce' );
add_action( 'wp_enqueue_scripts', 'woo_style' );