<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package legalpress
 */

get_header();
legalpress_before_title();
do_action('legalpress_get_page_title',true,false,false,false);
legalpress_after_title();
$cb_values= explode(",",esc_html(get_theme_mod( 'legalpress_single_post_meta_pill_checkbox','date,author,categories,tags,comments,image,links' )));

?>
<div class="content-section img-overlay"></div>
<div id="primary" class="<?php echo esc_attr(get_theme_mod('legalpress_header_menu_style','style1')); ?> content-area">
	<main id="main" class="site-main legalpress-main" role="main">
		<div class="container">
			<div id="blog-section">
		        <div class="row">
		        	<?php
		        		if ( is_active_sidebar('sidebar-1')) :
		        			if('right'===esc_html(get_theme_mod('legalpress_blog_single_sidebar_layout','right'))) :
		        				?>
        							<div id="post-wrapper" class="col-md-9">
										<?php
											while ( have_posts() ) : the_post();

												get_template_part( 'template-parts/post/content', 'single');
												
												if(in_array("links", $cb_values)) :
													the_post_navigation(
													    array(
													        'prev_text' => '<span class="meta-nav" aria-hidden="true">'.esc_html__('Previous Article', 'legalpress') .'</span> ' .
																			'<span class="screen-reader-text"> '.esc_html__('Previous Article', 'legalpress') .' </span> ' .
																			'<h3 class="post-title">%title</h3>',
													        'next_text' => '<span class="meta-nav" aria-hidden="true">'.esc_html__('Next Article', 'legalpress') .'</span> ' .
																			'<span class="screen-reader-text">'.esc_html__('Next Article', 'legalpress') .'</span> ' .
																			'<h3 class="post-title">%title</h3>',
													        'screen_reader_text' => esc_html__('Posts navigation', 'legalpress')
													    )
													);
												endif;

												// If comments are open or we have at least one comment, load up the comment template.
												if(in_array("comments", $cb_values)) :
													if ( comments_open() || get_comments_number() ) :
														comments_template();
													endif;
												endif;
												

											endwhile; // End of the loop.
										?>							
									</div>
									<div id="sidebar-wrapper" class="col-md-3">
										<?php get_sidebar('sidebar-1'); ?>
									</div>	
		        				<?php
		        			elseif('left'===esc_html(get_theme_mod('legalpress_blog_single_sidebar_layout','right'))) :
		        				?>
        							<div id="sidebar-wrapper" class="col-md-3">
										<?php get_sidebar('sidebar-1'); ?>
									</div>
			        				<div id="post-wrapper" class="col-md-9">
										<?php
											while ( have_posts() ) : the_post();

												get_template_part( 'template-parts/post/content', 'single');

												if(in_array("links", $cb_values)) :
													the_post_navigation(
													    array(
													        'prev_text' => '<span class="meta-nav" aria-hidden="true">'.esc_html__('Previous Article', 'legalpress') .'</span> ' .
																			'<span class="screen-reader-text"> '.esc_html__('Previous Article', 'legalpress') .' </span> ' .
																			'<h3 class="post-title">%title</h3>',
													        'next_text' => '<span class="meta-nav" aria-hidden="true">'.esc_html__('Next Article', 'legalpress') .'</span> ' .
																			'<span class="screen-reader-text">'.esc_html__('Next Article', 'legalpress') .'</span> ' .
																			'<h3 class="post-title">%title</h3>',
													        'screen_reader_text' => esc_html__('Posts navigation', 'legalpress')
													    )
													);
												endif;

												// If comments are open or we have at least one comment, load up the comment template.
												if(in_array("comments", $cb_values)) :
													if ( comments_open() || get_comments_number() ) :
														comments_template();
													endif;
												endif;

											endwhile; // End of the loop.
										?>							
									</div>												
        						<?php
        					else:
        						?>
        							<div id="post-wrapper" class="col-md-12">
										<?php
											while ( have_posts() ) : the_post();

												get_template_part( 'template-parts/post/content', 'single');

												if(in_array("links", $cb_values)) :
													the_post_navigation(
													    array(
													        'prev_text' => '<span class="meta-nav" aria-hidden="true">'.esc_html__('Previous Article', 'legalpress') .'</span> ' .
																			'<span class="screen-reader-text"> '.esc_html__('Previous Article', 'legalpress') .' </span> ' .
																			'<h3 class="post-title">%title</h3>',
													        'next_text' => '<span class="meta-nav" aria-hidden="true">'.esc_html__('Next Article', 'legalpress') .'</span> ' .
																			'<span class="screen-reader-text">'.esc_html__('Next Article', 'legalpress') .'</span> ' .
																			'<h3 class="post-title">%title</h3>',
													        'screen_reader_text' => esc_html__('Posts navigation', 'legalpress')
													    )
													);
												endif;
												
												// If comments are open or we have at least one comment, load up the comment template.
												if(in_array("comments", $cb_values)) :
													if ( comments_open() || get_comments_number() ) :
														comments_template();
													endif;
												endif;

											endwhile; // End of the loop.
										?>							
									</div>	
        						<?php
		        			endif;
		        		else :
		        			?>
								<div class="col-md-12">
									<?php
										while ( have_posts() ) : the_post();

											get_template_part( 'template-parts/post/content', 'single');

											if(in_array("links", $cb_values)) :
												the_post_navigation(
												    array(
												        'prev_text' => '<span class="meta-nav" aria-hidden="true">'.esc_html__('Previous Article', 'legalpress') .'</span> ' .
																		'<span class="screen-reader-text"> '.esc_html__('Previous Article', 'legalpress') .' </span> ' .
																		'<h3 class="post-title">%title</h3>',
												        'next_text' => '<span class="meta-nav" aria-hidden="true">'.esc_html__('Next Article', 'legalpress') .'</span> ' .
																		'<span class="screen-reader-text">'.esc_html__('Next Article', 'legalpress') .'</span> ' .
																		'<h3 class="post-title">%title</h3>',
												        'screen_reader_text' => esc_html__('Posts navigation', 'legalpress')
												    )
												);
											endif;
											
											// If comments are open or we have at least one comment, load up the comment template.
											if(in_array("comments", $cb_values)) :
												if ( comments_open() || get_comments_number() ) :
													comments_template();
												endif;
											endif;

										endwhile; // End of the loop.
									?>
					            </div>
							<?php
		        		endif;
		        	?>							
				</div>
			</div>
		</div>		
	</main>
</div>

<?php
get_footer();
