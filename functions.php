<?php
/**
 * divisima functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package divisima
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}
if ( ! function_exists( 'divisima_setup' ) ) :
	function divisima_setup() {
		function debug($arr){
			echo "<pre>";
			var_dump($arr);
			echo "</pre>;";
		}
	/**
	 * Отключаем принудительную проверку новых версий WP, плагинов и темы в админке,
	 * чтобы она не тормозила, когда долго не заходил и зашел...
	 * Все проверки будут происходить незаметно через крон или при заходе на страницу: "Консоль > Обновления".
	 *
	 * @see https://wp-kama.ru/filecode/wp-includes/update.php
	 * @author Kama (https://wp-kama.ru)
	 * @version 1.1
	 */
	if( is_admin() ){
		// отключим проверку обновлений при любом заходе в админку...
		remove_action( 'admin_init', '_maybe_update_core' );
		remove_action( 'admin_init', '_maybe_update_plugins' );
		remove_action( 'admin_init', '_maybe_update_themes' );

		// отключим проверку обновлений при заходе на специальную страницу в админке...
		remove_action( 'load-plugins.php', 'wp_update_plugins' );
		remove_action( 'load-themes.php', 'wp_update_themes' );

		// оставим принудительную проверку при заходе на страницу обновлений...
		//remove_action( 'load-update-core.php', 'wp_update_plugins' );
		//remove_action( 'load-update-core.php', 'wp_update_themes' );

		// внутренняя страница админки "Update/Install Plugin" или "Update/Install Theme" - оставим не мешает...
		//remove_action( 'load-update.php', 'wp_update_plugins' );
		//remove_action( 'load-update.php', 'wp_update_themes' );

		// событие крона не трогаем, через него будет проверяться наличие обновлений - тут все отлично!
		//remove_action( 'wp_version_check', 'wp_version_check' );
		//remove_action( 'wp_update_plugins', 'wp_update_plugins' );
		//remove_action( 'wp_update_themes', 'wp_update_themes' );

		/**
		 * отключим проверку необходимости обновить браузер в консоли - мы всегда юзаем топовые браузеры!
		 * эта проверка происходит раз в неделю...
		 * @see https://wp-kama.ru/function/wp_check_browser_version
		 */
		add_filter( 'pre_site_transient_browser_'. md5( $_SERVER['HTTP_USER_AGENT'] ), '__return_empty_array' );
	}
		load_theme_textdomain( 'divisima', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_filter( 'wp_get_attachment_image_attributes', 'unset_attach_srcset_attr', 99 );
		function unset_attach_srcset_attr( $attr ){
			unset($attr['sizes']);
			return $attr;
		}
		add_theme_support( 'woocommerce');
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support('menus');
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		add_filter( 'comment_post_redirect', 'redirect_after_comment', 10, 2 );
		function redirect_after_comment($location, $comment ){
			$location = str_replace( "#comment-{$comment->comment_ID}", '', $location );

			return $location;
		}
		register_nav_menu( 'header_menu_en', 'Header menu en' );
		register_nav_menu( 'header_menu_ru', 'Header menu ru' );
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 30,
				'width'       => 160,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		add_action( 'wp_enqueue_scripts', 'sa_add_ajax_support' );
		/**
		 * Adds support for WordPress to handle asynchronous requests on both the front-end
		 * and the back-end of the website.
		 *
		 * @since    1.0.0
		 */
		function sa_add_ajax_support() {
			
			wp_localize_script(
				'ajax-script',
				'sa_demo',
				array(
					'ajaxurl' => admin_url( 'admin-ajax.php' )
				)
			);
			
		}
		function removeHtmlComments($html) {
			return preg_replace('/<!--(.*?)-->/', '', $html);
		}
		 
		function bufferStart() {
			ob_start('removeHtmlComments');
		}
		 
		function bufferEnd() {
			ob_end_flush();
		}
		add_action('get_header', 'bufferStart');
		add_action('wp_footer', 'bufferEnd');	
		require 'woocommerce/classes/class-wc-product-cat-list-walker.php';
		require 'woocommerce/classes/class-wc-widget-product-categories.php';
		require 'woocommerce/classes/class-wc-widget-layered-nav.php';
		require get_template_directory() . '/inc/polylang.php';
		require get_template_directory() . '/woocommerce/wc-functions.php';
		require get_template_directory() . '/inc/customizer.php';
	}
endif;
add_action( 'after_setup_theme', 'divisima_setup' );

function divisima_styles() {
	wp_enqueue_style( 'divisima-jquery-ui', get_stylesheet_directory_uri() . '/assets/css/jquery-ui.min.css' );
	wp_enqueue_style( 'divisima-bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style( 'divisima-animate', get_stylesheet_directory_uri() . '/assets/css/animate.css');
	wp_enqueue_style( 'divisima-font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'divisima-font', get_stylesheet_directory_uri() . '/assets/css/flaticon.css');
	wp_enqueue_style( 'divisima-owl', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css' );
	wp_enqueue_style( 'divisima-slick-nav', get_stylesheet_directory_uri() . '/assets/css/slicknav.min.css' );
	wp_enqueue_style( 'divisima-style', get_stylesheet_uri(), array('divisima-bootstrap') );
	wp_enqueue_style( 'divisima-google-font', 'https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap');
};
add_action( 'wp_enqueue_scripts', 'divisima_styles' );
function divisima_scripts() {
	wp_enqueue_script('divisima-jquery', get_stylesheet_directory_uri() . '/assets/js/jquery-3.2.1.min.js');
	wp_enqueue_script('divisima-owl', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('divisima-jquery')); 
	wp_enqueue_script('divisima-bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js'); 
	wp_enqueue_script('divisima-jquery-ui', get_stylesheet_directory_uri() . '/assets/js/jquery-ui.min.js', array('divisima-jquery')); 
	wp_enqueue_script('divisima-jquery-scroll', get_stylesheet_directory_uri() . '/assets/js/jquery.nicescroll.min.js', array('divisima-jquery')); 
	wp_enqueue_script('divisima-jquery-slick-nav', get_stylesheet_directory_uri() . '/assets/js/jquery.slicknav.min.js', array('divisima-jquery'));
	wp_enqueue_script('divisima-script', get_stylesheet_directory_uri() . '/assets/js/main.js', array('divisima-jquery', 'divisima-owl')); 
};
add_action( 'wp_enqueue_scripts', 'divisima_scripts' );
function divisima_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'divisima' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'divisima' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	unregister_widget( 'WC_Widget_Product_Categories' );
	unregister_widget( 'WC_Widget_Layered_Nav' );
	register_widget( '_WC_Widget_Product_Categories' );
	register_widget( '_WC_Widget_Layered_Nav' );
}
add_action( 'widgets_init', 'divisima_widgets_init' );

function js_variables(){
	add_filter( 'woocommerce_currency_symbols', 'pound_new_symbol' );
	function pound_new_symbol( $all_symbols ) {
		$all_symbols['GBP'] = '£';
		return $all_symbols; 
	}
    $variables = array (
        'ajax_url' => admin_url('admin-ajax.php'),
		'is_mobile' => wp_is_mobile(),
		'currency_symbol' => get_woocommerce_currency_symbol( $currency = '' )
	);
    echo '<script>window.wp_data = '.json_encode($variables).';</script>';
}
add_action('wp_head','js_variables');
?>