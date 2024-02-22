<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package legalpress
 */

?>
	</div>
	<!-- Begin Footer Section -->
	<footer id="footer" class="legalpress-footer" itemscope itemtype="https://schema.org/WPFooter">
		<div class="container">
			<div class="row">
				<div class="footer-widgets-wrapper">
	                <?php get_sidebar( 'footer' ); ?>
	            </div>
	        </div>
			<div class="footer-copyrights-wrapper">
				<?php
			        /**
			         * Hook - legalpress_action_footer.
			         *
			         * @hooked legalpress_footer_copyrights - 10
			         */
			        do_action( 'legalpress_action_footer' );
		        ?>
		    </div>
		</div>
    </footer>
	<?php wp_footer(); ?>
</body>
</html>