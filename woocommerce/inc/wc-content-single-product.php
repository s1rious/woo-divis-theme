<?php 
    remove_action('woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);
    remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
    remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    function wc_content_single_product_wrap_image_start(){
        ?>
        <div class="col-lg-6">
        <?php
    }
    function wc_content_single_product_wrap_image_end(){
        ?>   
        </div>
        <?php
    }
    
    function wc_content_single_product_wrap_details_start(){
        ?>   
        <div class="col-lg-6 product-details">
        <?php
    }
        function wc_content_single_product_title_start(){
            ?> 
            <div class="p-title">
            <?php
        }
        function wc_content_single_product_title_end(){
            ?> 
            </div>
            <?php
        }
        function wc_content_single_product_price_start(){
            ?> 
            <div class="p-price">
            <?php
        }
        function wc_content_single_product_price_end(){
            ?> 
            </div>
            <?php
        }
        function wc_content_single_product_stock_start(){
            global $product;
            $stock = '';
            if ($product->is_in_stock()) {
                $stock = pll__('divisima-is-in-stock');
            }else{
                $stock = pll__('divisima-is-not-in-stock');
            }
            ?> 
            <div class="p-stock"><?php pll_e('divisima-available') ?>:
            <span><?php echo $stock ?></span>
            <?php
        }
        function wc_content_single_product_stock_end(){
            ?> 
            </div>
            <?php
        }
        function wc_content_single_product_rating_start(){
            ?> 
            <div class="p-rating">
            <?php
        }
        function wc_content_single_product_rating_end(){
            ?> 
            </div>
            <?php
        }
        function wc_content_single_product_information_start(){ 
            ?>
            <div id="accordion" class="accordion-area">
            <?php
        }
            function wc_content_single_product_information_post_content(){
                global $product;
                ?>
                <div class="panel">
                    <div class="panel-header" id="headingOne">
                        <button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            <?php pll_e('divisima-information') ?>
                        </button>
                    </div>
                    <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="panel-body">
                            <p><?php echo $product->post->post_content ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            function wc_content_single_product_information_details(){
                global $product;
                ?>
                <div class="panel">
                    <div class="panel-header" id="headingTwo">
                        <button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                            <?php pll_e('divisima-details') ?>
                        </button>
                    </div>
                    <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="panel-body">
                            <?php echo wc_display_product_attributes( $product );?>
                        </div>
                    </div>
                </div>
                <?php
            }
            function wc_content_single_product_information_cards(){
                ?>
                <div class="panel">
                    <div class="panel-header" id="headingTwo">
                        <button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                            <?php pll_e('divisima-care-details') ?>
                        </button>
                    </div>
                    <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="panel-body">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/card.png'?>" alt="cards">
                            <p><?php pll_e('divisima-fish-text') ?></p>
                        </div>
                    </div>
                </div> 
                <?php
            }
        function wc_content_single_product_information_end(){
            ?>
            </div>
            <?php
        }
    function wc_content_single_product_wrap_details_end(){
        ?>
        </div>
        <?php
    }
    function wc_content_single_product_reviews(){
        ?>
        <div class="col-12 mt-5">
        	<?php comments_template();?>
		</div>
		<?php
    }
    function wc_content_single_product_wrap_related_start(){
        ?>
        <div class="container">
        <?php
    }
    function wc_content_single_product_wrap_related_end(){
        ?>
        </div>
        <?php
    }
    add_action('woocommerce_before_single_product_summary', 'wc_content_single_product_wrap_image_start', 5);
    add_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 10);
    add_action('woocommerce_before_single_product_summary', 'wc_content_single_product_wrap_image_end', 15);
    
    add_action('woocommerce_single_product_summary', 'wc_content_single_product_wrap_details_start', 1);
        add_action('woocommerce_single_product_summary', 'wc_content_single_product_title_start', 5);
        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 10);
        add_action('woocommerce_single_product_summary', 'wc_content_single_product_title_end', 15);

        add_action('woocommerce_single_product_summary', 'wc_content_single_product_price_start', 20);
        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 25);
        add_action('woocommerce_single_product_summary', 'wc_content_single_product_price_end', 30);

        add_action('woocommerce_single_product_summary', 'wc_content_single_product_stock_start', 35);
        add_action('woocommerce_single_product_summary', 'wc_content_single_product_stock_end', 40);

        add_action('woocommerce_single_product_summary', 'wc_content_single_product_rating_start', 45);
        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 50);
        add_action('woocommerce_single_product_summary', 'wc_content_single_product_rating_end', 55);

        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 60);
        add_action('woocommerce_single_product_summary', 'wc_content_single_product_information_start', 65);
            add_action('woocommerce_single_product_summary', 'wc_content_single_product_information_post_content', 70);
            add_action('woocommerce_single_product_summary', 'wc_content_single_product_information_details', 75);
            add_action('woocommerce_single_product_summary', 'wc_content_single_product_information_cards', 80);
        add_action('woocommerce_single_product_summary', 'wc_content_single_product_information_end', 85);

    add_action('woocommerce_single_product_summary', 'wc_content_single_product_wrap_details_end', 90);

    add_action('woocommerce_after_single_product_summary', 'wc_content_single_product_reviews', 1);
    add_action('woocommerce_after_single_product_summary', 'wc_content_single_product_wrap_related_start', 5);
    add_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 10);
    add_action('woocommerce_after_single_product_summary', 'wc_content_single_product_wrap_related_end', 15);
?>