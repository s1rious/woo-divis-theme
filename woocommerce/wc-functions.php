<?php
    function change_price_filter_step() {
        return 1;
    }
    add_filter( 'woocommerce_price_filter_widget_step', 'change_price_filter_step', 10, 3 );
    add_action( 'wp_ajax_filter_price', 'filter_price' );
    add_action( 'wp_ajax_nopriv_filter_price', 'filter_price' ); 
    function filter_price(){
        $min = intval($_POST['min']);
        $max = intval($_POST['max']);
        $posts = get_posts( array(
            'numberposts' => -1,
            'orderby'     => 'date',
            'order'       => 'ASC',
            'post_type'   => 'product',
            'meta_query' => array(
                array(
                    'key' => '_price',
                    'value' => [$min, $max],
                    'compare' => 'BETWEEN',
                    'type'    => 'NUMERIC'
                ),
            )
        ) );
        foreach( $posts as $post ){
            setup_postdata($post);
            echo do_shortcode('[products class="col-lg-4 col-sm-6" ids='.$post->ID.']');
        }
        wp_reset_postdata();
        die;
    }
    add_filter('woocommerce_product_categories_widget_args', 'product_categories_widget_args', 10, 1);
    
    function product_categories_widget_args($args) {
        $args['walker'] = new _WC_Product_Cat_List_Walker;
        return $args;
    }
    add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
        return array(
            'width' => 150,
            'height' => 150,
            'crop' => 0,
        );
    } );

    add_filter('woocommerce_single_product_image_thumbnail_html','wc_remove_link_on_thumbnails' );
    function wc_remove_link_on_thumbnails( $html ) {
        return strip_tags( $html,'<div><img>' );
    }

    add_filter( 'woocommerce_get_availability', 'woocommerce_get_availability_remove', 10, 2 );
    function woocommerce_get_availability_remove( $array, $that ){
        return false;
    }	
    add_filter('woocommerce_single_product_carousel_options', 'ud_update_woo_flexslider_options');
    function ud_update_woo_flexslider_options($options) {
        // $options['directionNav'] = true;
        $options['animation'] = "slide";
        $options['smoothHeight'] = false;
        $options['animationLoop'] = true;
        $options['controlNav'] = "thumbnails";
        return $options;
    }
    
    add_filter( 'woocommerce_gallery_image_html_attachment_image_params', 'filter_function_name_3328', 10, 4 );
    function filter_function_name_3328( $array, $attachment_id, $image_size, $main_image ){
        $array['class'] = 'woocommerce-product-gallery__image--mini';
        return $array;
    }
    add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
    function wc_refresh_mini_cart_count($fragments){
        ob_start();
        ?>
        <span id="mini-cart-count">
            <?php echo WC()->cart->get_cart_contents_count(); ?>
        </span>
        <?php
            $fragments['#mini-cart-count'] = ob_get_clean();
        return $fragments;
    }
    if ( class_exists( 'WooCommerce' ) ) {
        require get_template_directory() . '/inc/woocommerce.php';
    }
    add_filter( 'woocommerce_variation_option_name', 'display_price_in_variation_option_name' );
    function display_price_in_variation_option_name( $term ) {
        global $wpdb, $product;
        if ( empty( $term ) ) return $term;
        if ( empty( $product->id ) ) return $term;
        $result = $wpdb->get_col( "SELECT slug FROM {$wpdb->prefix}terms WHERE name = '$term'" );
        $term_slug = ( !empty( $result ) ) ? $result[0] : $term;
        $query = "SELECT postmeta.post_id AS product_id
                    FROM {$wpdb->prefix}postmeta AS postmeta
                        LEFT JOIN {$wpdb->prefix}posts AS products ON ( products.ID = postmeta.post_id )
                    WHERE postmeta.meta_key LIKE 'attribute_%'
                        AND postmeta.meta_value = '$term_slug'
                        AND products.post_parent = $product->id";
        $variation_id = $wpdb->get_col( $query );
        $parent = wp_get_post_parent_id( $variation_id[0] );
        if ( $parent > 0 ) {
            $_product = new WC_Product_Variation( $variation_id[0] );
            return ' (' . wp_kses( woocommerce_price( $_product->get_price() ), array() ) . ')';
        }
        return $term;
    }
    add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
    function custom_override_checkout_fields( $fields ) {
        unset($fields['billing']['billing_company']);
        unset($fields['billing']['billing_address_2']);
        $fields['billing']['billing_phone']['placeholder'] = 'Введите номер телефон';
        $fields['billing']['billing_email']['placeholder'] = 'Введите email';
        $fields['billing']['billing_first_name']['placeholder'] = 'Введите имя';
        $fields['billing']['billing_last_name']['placeholder'] = 'Введите фамилию';
        $fields['billing']['billing_postcode']['placeholder'] = 'Введите почтовый индекс';
        $fields['billing']['billing_phone']['placeholder'] = 'Введите телефон';
        $fields['billing']['billing_city']['placeholder'] = 'Введите город';
        $fields['billing']['billing_state']['placeholder'] = 'Введите область';

        $fields['shipping']['shipping_first_name']['placeholder'] = 'Введите имя';
        $fields['shipping']['shipping_last_name']['placeholder'] = 'Введите фамилию';
        $fields['shipping']['shipping_postcode']['placeholder'] = 'Введите почтовый индекс';
        $fields['shipping']['shipping_phone']['placeholder'] = 'Введите телефон';
        $fields['shipping']['shipping_city']['placeholder'] = 'Выберите город';
        return $fields;
    }
    add_filter( 'woocommerce_cart_needs_payment', '__return_false' );
    remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form' );
    
    require get_template_directory() . '/woocommerce/inc/wc-content-single-product.php';
    require get_template_directory() . '/woocommerce/inc/wc-archive-product.php';
    require get_template_directory() . '/woocommerce/inc/wc-content-product.php';
?>