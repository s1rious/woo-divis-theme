<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;
do_action( 'woocommerce_before_main_content' );
get_header();
?>
<section class="category-section spad">
    <div class="container">
        <?php echo do_shortcode('[br_filter_single filter_id=230]')?>
        <div class="row">
            <div class="col-lg-3 sidebar">
                <?php do_action( 'woocommerce_sidebar' );?>
            </div>
            <?php
            if ( woocommerce_product_loop() ) : 
                woocommerce_product_loop_start();
            ?>
            <div class="col-lg-9 mb-5 mb-lg-0">
                <?php do_action( 'woocommerce_before_shop_loop' );?>
                <div class="row shop-wrapper">
                    <?php
                    if ( wc_get_loop_prop( 'total' ) ) :
                        while ( have_posts() ) :
                            the_post();
                            do_action( 'woocommerce_shop_loop' );
                            wc_get_template_part( 'content', 'product' );do_action( 'woocommerce_shop_loop' );
                        endwhile;
                    endif;
                    do_action( 'woocommerce_after_shop_loop' );
                    woocommerce_product_loop_end();?>
                </div>
            </div>
            <?php else:?>
            <div class="col-lg-9  mb-5 mb-lg-0">
                <div class="row">
                    <?php do_action( 'woocommerce_no_products_found' )?>
                </div>
            </div>
            <?php endif;?>
        </div>
    </div>
</section>
<?php do_action( 'woocommerce_after_main_content' );?>
<?php get_footer();?>