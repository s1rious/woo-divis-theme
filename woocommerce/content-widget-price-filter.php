<?php
/**
 * The template for displaying product price filter widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-price-filter.php
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.1
 */

defined( 'ABSPATH' ) || exit;

?>
<?php do_action( 'woocommerce_widget_price_filter_start', $args ); ?>

<form method="get" action="<?php echo esc_url( $form_action ); ?>">
    <div class="price_slider_wrapper">
        <div class="price-range-wrap">
            <div class="range-slider">
                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                    data-min="<?php echo esc_attr( $min_price ); ?>" data-max="<?php echo esc_attr( $max_price ); ?>">
                    <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
                    </span>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
                    </span>
                </div>
                <div class="price-input">
                    <input type="text" id="minamount" name="min_price"
                        value="<?php echo esc_attr( $current_min_price ); ?>"
                        placeholder="<?php echo esc_attr__( 'Min price', 'woocommerce' ); ?>" />
                    <input type="text" id="maxamount" name="max_price"
                        value="<?php echo esc_attr( $current_max_price ); ?>"
                        placeholder="<?php echo esc_attr__( 'Max price', 'woocommerce' ); ?>" />
                </div>
            </div>
        </div>
</form>

<?php do_action( 'woocommerce_widget_price_filter_end', $args ); ?>