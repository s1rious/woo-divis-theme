<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="woocommerce-checkout-review-order-table product-list">
	<?php do_action( 'woocommerce_review_order_before_cart_contents' );?>
	<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$_product_thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
			$_product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
			$_product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<li class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
					<div class="pl-thumb"><?php echo $_product_thumbnail;?></div>
					<h6><?php echo $_product_name?></h6>
					<p><?php echo $_product_price?></p>
					<h6>	<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h6>
					<?php echo wc_get_formatted_cart_item_data( $cart_item )?>
				</li>
				<?php
			}
		}
		
	?>
	<?php do_action( 'woocommerce_review_order_after_cart_contents' );?>
	<ul class="price-list">
		<li><?php esc_html_e( 'Subtotal', 'woocommerce' ); wc_cart_totals_subtotal_html();?></li>
		<li class="total">
		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
		<?php esc_html_e( 'Total', 'woocommerce' ); ?>
		<?php wc_cart_totals_order_total_html(); ?>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
		</li>
	</ul>
</div>
