<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package legalpress
 */

get_header(); 
// legalpress_before_title();
if(true===get_theme_mod( 'legalpress_enable_page_title',true)) :
	do_action('legalpress_get_page_title',false,false,false,false);
endif;
// legalpress_after_title();

?>
<div class="page">
	<div id="primary" class="<?php echo esc_attr(get_theme_mod('legalpress_header_menu_style','style1')); ?> content-area">
		<main id="main" class="site-main legalpress-main" role="main">
			<div class="<?php echo (true===get_theme_mod( 'legalpress_enable_full_width_page_content',false)) ? 'content-inner': 'container' ?>">
				<div class="row">
					<?php
						while ( have_posts() ) : the_post();
							// if ( legalpress_is_active_woocommerce() ) :
							// 	if ( is_page( 'cart' ) || is_cart() ) :
							// 		get_template_part( 'template-parts/page/content', 'cart-page' );
							// 	elseif ( is_page( 'checkout' ) || is_checkout() ) :
							// 		get_template_part( 'template-parts/page/content', 'checkout-page' );
							// 	elseif ( is_page( 'my-account' ) || is_account_page() ) :
							// 		get_template_part( 'template-parts/page/content', 'myaccount-page' );
							// 	else :
							// 		get_template_part( 'template-parts/page/content', 'page' );
							// 	endif;
							// else:
							// 	get_template_part( 'template-parts/page/content', 'page' );
							// endif;

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
			                    comments_template();  
							endif;
						endwhile; // End of the loop.	
					?>
				</div>
			</div>
		</main>
	</div>
</div>
<?php

get_footer();