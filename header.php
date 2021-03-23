<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package divisima
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<link rel="preload" href="/wp-content/themes/divisima/assets/icon-fonts/fontawesome-webfont.woff2?v=4.7.0" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="/wp-content/plugins/side-cart-woocommerce/assets/css/fonts/Woo-Side-Cart.woff?le17z4" as="font" type="font/woff" crossorigin="anonymous">
	<link rel="preload" href="/wp-content/themes/divisima/assets/icon-fonts/Flaticon.woff" as="font" type="font/woff" crossorigin="anonymous">
	<meta charset="<?php echo wp_get_document_title(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 text-center text-lg-left mb-4 mb-lg-0">
                        <?php the_custom_logo(); ?>
                    </div>
                    <div class="d-flex justify-content-center col-xl-6 col-lg-6">
                        <?php echo do_shortcode('[aws_search_form]') ?>
                        <i class="flaticon-search"></i>
                    </div>
                    <div class="user-panel col-xl-4 col-lg-4">
                        <div class="up-item">
                            <div class="shopping-card">
                                <div>
                                    <?php if (!is_user_logged_in() ) : ?>
                                        <i class="flaticon-profile"></i><a href="<?php echo wc_get_page_permalink( 'myaccount' )?>"><?php pll_e('divisima-login') ?></a> <?php pll_e('divisima-or') ?><a href="<?php echo wc_get_page_permalink( 'myaccount' )?>"><?php pll_e('divisima-register') ?></a>
                                        <?php else: ?>
                                        <a href="<?php echo wc_get_page_permalink( 'myaccount' )?>"><i class="flaticon-profile"></i><?php pll_e('divisima-my-account') ?></a>
                                    <?php endif;?>
                                </div>
                                <div>
                                    <i class="flaticon-bag"></i>
                                    <span id="mini-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                                    <a href="<?php echo esc_url(wc_get_cart_url()) ?>"><?php pll_e('divisima-cart') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="main-navbar">
            <div class="container">
                <ul class="main-menu">
                    <?php
                    $my_lang = pll_current_language();  
                    if ( $my_lang == 'ru' ) { 
                        wp_nav_menu( [
                            'theme_location'  => 'header_menu_ru',
                            'menu'            => 'header_menu_ru', 
                            'container'       => false,
                            'container_class' => '', 
                            'container_id'    => '',
                            'echo'            => true,
                            'items_wrap'      =>  '%3$s',
                        ] );
                    } else {
                        wp_nav_menu( [
                            'theme_location'  => 'header_menu_en',
                            'menu'            => 'header_menu_en', 
                            'container'       => false,
                            'container_class' => '', 
                            'container_id'    => '',
                            'echo'            => true,
                            'items_wrap'      =>  '%3$s',
                        ] );
                    }
                    ?> 
                </ul>
            </div>
        </nav>
    </header>
    <?php 
    if(is_woocommerce() && !is_front_page() && !is_product()):?>
    <div class="page-top-info">
        <div class="container">
            <h4><?php echo woocommerce_page_title()?></h4>
            <?php echo woocommerce_breadcrumb() ?>
        </div>
    </div>
    <?php
    elseif(!is_front_page()):?>
    <div class="page-top-info">
        <div class="container">
            <h4><?php echo wp_title('')?></h4>
            <?php echo woocommerce_breadcrumb() ?>
        </div>
    </div>
    <?php endif;