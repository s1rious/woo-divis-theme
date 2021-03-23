<?php 
    remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
    remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    function wc_content_product_open(){
        ?>
        <div class="product-item">
        <?php
    }
        function wc_content_product_inner_start(){
            ?>
            <div class="pi-pic">
            <?php
        }
            function wc_content_product_links_start(){
                ?>
                <div class="pi-links">
                <?php
            }
            function wc_content_product_links_end(){
                ?>
                </div>
                <?php
            }
        function wc_content_product_inner_end(){
            ?>
            </div>
            <?php
        }
        function wc_content_product_text_start(){
            ?>
            <div class="pi-text">
                <?php
        }
            function wc_content_product_text_price_start(){
                ?>
                <h6>
                <?php
            }
            function wc_content_product_text_price_end(){
                ?>
                </h6>
                <?php
            }
            function wc_content_product_text_title_start(){
                ?>
                <div>
                <?php
            }
            function wc_content_product_text_title_end(){
                ?>
                </div>
                <?php
            }
        function wc_content_product_text_end(){
            ?>
            </div>
            <?php
        }
    function wc_content_product_close(){
        ?>
        </div>
        <?php
    }
    add_action('woocommerce_before_shop_loop_item', 'wc_content_product_open', 1);
        
        add_action('woocommerce_before_shop_loop_item', 'wc_content_product_inner_start', 5);
            add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
                add_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_thumbnail', 15);
                
                add_action('woocommerce_before_shop_loop_item', 'wc_content_product_links_start', 20);
                add_action('woocommerce_before_shop_loop_item', 'wc_content_product_links_end',30);
                
            add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_close', 15 );
        add_action('woocommerce_before_shop_loop_item', 'wc_content_product_inner_end',40);
        
        add_action('woocommerce_before_shop_loop_item', 'wc_content_product_text_start', 45);
        
            add_action('woocommerce_before_shop_loop_item', 'wc_content_product_text_price_start',50);
            add_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_price',55);
            add_action('woocommerce_before_shop_loop_item', 'wc_content_product_text_price_end',60);
            
            add_action('woocommerce_before_shop_loop_item', 'wc_content_product_text_title_start',65);
            add_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_title',70);
            add_action('woocommerce_before_shop_loop_item', 'wc_content_product_text_title_end',75);
        
        add_action('woocommerce_before_shop_loop_item', 'wc_content_product_text_end',80);
    
    add_action('woocommerce_after_shop_loop_item', 'wc_content_product_close', 100);
?>