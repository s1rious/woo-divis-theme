<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package divisima
 */

?>
<?php wp_footer(); ?>
<footer class="footer-section">
    <div class="container">
        <div class="footer-logo text-center">
            <a href="<?php get_home_url(); ?>" class="site-logo">
                <img src="<?php echo get_theme_mod('footer_logo') ?>">
            </a>
        </div>
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="footer-widget about-widget">
                    <h2>О нас</h2>
                    <p><?php pll_e('divisima-fish-text') ?></p>
                </div>
            </div>
            <div class="col-12 col-sm-4 d-md-flex flex-direction-column justify-content-center">
                <div class="footer-widget about-widget">
                    <h2>Questions</h2>
                    <div class="fw-latest-post-widget">
                        <div class="lp-item">
                            <div class="lp-content">
                                <h6>what shoes to wear</h6>
                                <span>Oct 21, 2018</span>
                                <a href="#" class="readmore">Read More</a>
                            </div>
                        </div>
                        <div class="lp-item">
                            <div class="lp-content">
                                <h6>trends this year</h6>
                                <span>Oct 21, 2018</span>
                                <a href="#" class="readmore">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="footer-widget contact-widget">
						<h2>Questions</h2>
						<div class="con-info">
							<span>B.</span>
							<p>1481 Creekside Lane  Avila Beach, CA 93424, P.O. BOX 68 </p>
						</div>
						<div class="con-info">
							<span>T.</span>
							<p>+53 345 7953 32453</p>
						</div>
						<div class="con-info">
							<span>E.</span>
							<p>office@youremail.com</p>
						</div>
					</div>
            </div>
        </div>
    </div>
    <div class="social-links-warp">
        <div class="container">
            <div class="social-links">
                <a href="#" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
                <a href="#" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
                <a href="#" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
                <a href="#" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
                <a href="#" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
            </div>
        </div>
    </div>
</footer>
</body>


</html>