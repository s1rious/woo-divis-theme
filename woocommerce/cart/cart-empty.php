<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;?>
<section class="cart-section spad">
    <form class="woocommerce-cart-form row" action="#">
        <div class="col-lg-8 cart-table">
            <?php do_action( 'woocommerce_before_cart_table' ); ?>
            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                <h3>Your Cart</h3>
                <?php if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
                    <?php do_action( 'woocommerce_cart_is_empty' );?>
                <?php endif; ?>
            </table>
        </div>
        <div class="col-lg-4 cart-collaterals">
            <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
            <a href="<?php echo esc_url(get_home_url() . '/shop'); ?>" class="site-btn sb-dark"><?php echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );?></a>
        </div>
    </form>
    <?php do_action( 'woocommerce_after_cart' ); ?>
</section>