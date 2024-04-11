<?php
/**
 * @package legalblow
 */

get_header();

?>
<div class="page-title">
    	<?php
	if(true===get_theme_mod( 'legalblow_enable_page_title',true)) :
	do_action('legalblow_get_shop_page_title');
endif;
	?>
  </div>
<div class="woo-wrapper">
	<div id="primary" class="content-area">
	    <main id="main" class="site-main legalblow-main" role="main">
	    	<div class="container">
	    		<div class="page-content-area">
			        <?php
			            get_template_part( 'template-parts/shop/content', 'woocommerce' );           
			        ?>
		    	</div>
		    </div>
	    </main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php
	get_footer();
?>