<?php 
/*
Template Name:Главная страница
*/
get_header();
$my_lang = pll_current_language();  
?>
<section class="hero-section">
    <div class="hero-slider owl-carousel">
        <?php 
        if ($my_lang == 'ru') {
            $product_id = 687;
        }else{
            $product_id = 720;
        }
        if( have_rows('main_promo_slider') ):
            while(have_rows('main_promo_slider')) : the_row(); 
        ?>
        <div class="hs-item">
            <img class="hs-item-bg"
                src="<?php echo wp_get_attachment_image_url( get_sub_field('img') , 'full')?>"
                srcset="<?php echo wp_get_attachment_image_srcset( get_sub_field('img'), 'full'  ) ?>"
            >
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 text-white hs-item-content">
                        <span><?php pll_e('divisima-new-arrivals') ?></span>
                        <h2><?php echo wc_get_product($product_id)->get_name()?></h2>
                        <p><?php pll_e('divisima-hero-text') ?></p>
                        <a href="#" class="site-btn sb-line"><?php pll_e('divisima-discover') ?></a>
                        <a href="#" class="site-btn sb-white"><?php pll_e('divisima-add-to-cart') ?></a>
                    </div>
                </div>
                <div class="offer-card text-white">
                    <span><?php pll_e('divisima-from') ?></span>
                    <h2>2100₽</h2>
                    <p><?php pll_e('divisima-shop-now') ?></p>
                </div>
            </div>
        </div>
        <?php
        endwhile;
        else:?>
        <div class="container"><?php echo get_template_part('template-parts/content', 'none');?>
        </div>
        <?php
        endif; ?>
    </div>
</section>

<section class="features-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/icons/1.png'?>" alt="#">
                    </div>
                    <h2><?php pll_e('divisima-fast-secure') ?></h2>
                </div>
            </div>
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/icons/2.png'?>" alt="#">
                    </div>
                    <h2><?php pll_e('divisima-premium-products') ?></h2>
                </div>
            </div>
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/icons/3.png'?>" alt="#">
                    </div>
                    <h2><?php pll_e('divisima-free-fast') ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="top-letest-product-section">
    <div class="container">
        <div class="section-title">
            <h2><?php pll_e('divisima-latest-product') ?></h2>
        </div>
        <?php echo do_shortcode('[products limit="6" class="product-slider woocommerce-products owl-carousel" category="dress"]')?>
    </div>
</section>
<section class="product-filter-section">
    <div class="container">
        <div class="section-title">
            <h2><?php pll_e('divisima-top-selling')?></h2>
        </div>
        <?php echo do_shortcode('[products limit="8" class="row product-filter-section" ]')?>
        <div class="text-center">
			<a href="<?php echo get_permalink(woocommerce_get_page_id('shop'))?>" class="site-btn sb-line sb-dark"><?php pll_e('divisima-load-more')?></a>
		</div>
    </div>
</section>
<section class="banner-section">
    <div class="container">
        <div class="banner set-bg" data-setbg="<?php the_field('main_banner_img');?>">
            <div class="tag-new"><?php pll_e('divisima-new')?></div>
            <span><?php pll_e('divisima-new-arrivals')?></span>
            <a href="<?php echo get_permalink(woocommerce_get_page_id('shop'))?>" class="site-btn"><?php pll_e('divisima-shop-now')?></a>
        </div>
    </div>
</section>

<?php get_footer();?>