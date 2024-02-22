<?php
/**
 * Template part for displaying header menu
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package legalpress
 */

?>

<?php
	$page_val = is_front_page() ? 'home' : 'page' ;
?>
<header id="<?php echo esc_attr($page_val); ?>-inner" class="page-menu-anchor theme-menu-wrapper full-width-menu style1 page legalpress-header" role="banner" itemscope itemtype="https://schema.org/WPHeader">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'legalpress' ); ?></a>
	<div id="home" class="elementor-menu-anchor home-menu-anchor"></div>
	<?php
		if(true===get_theme_mod('legalpress_enable_header_topbar',false)) :
			/**
	        * Hook - legalpress_action_enable_header_topbar_style1
	        *
	        * @hooked legalpress_enable_header_topbar_style1 - 10
	        */
	        do_action( 'legalpress_action_enable_header_topbar_style1' );
		endif;
	?>
	<div id="header-main" class="header-wrapper legalpress-wrapper">
		<div class="container">
			<div class="clearfix"></div>
			<div class="logo" itemscope itemtype="https://schema.org/Organization">
       			<?php 
       				if (has_custom_logo()) :
	                	legalpress_custom_logo();
	                endif;               		                	
                ?>
                <?php 
                	if ( get_theme_mod( 'legalpress_enable_logo_stickyheader', false )) :
                		$alt_logo=esc_url(get_theme_mod( 'legalpress_logo_stickyheader' ));
	                	if(!empty($alt_logo)) :
		                	?>
		                		<a id="logo-alt" class="logo-alt" href="<?php echo esc_url(home_url( '/' )); ?>"><img src="<?php echo esc_url( get_theme_mod( 'legalpress_logo_stickyheader' ) ); ?>" alt="<?php esc_attr_e( 'logo', 'legalpress' ); ?>"></a>
		                	<?php
		                endif;
                	endif;
                ?>
                <?php
	                $show_title   = ( true === get_theme_mod( 'legalpress_display_site_title_tagline', true ) );
					$header_class = $show_title ? 'site-title' : 'screen-reader-text';
					if(!empty(get_bloginfo( 'name' ))) {
						if ( is_front_page() ) {
					        ?>
	                			<h1 class="<?php echo esc_attr( $header_class ); ?>">
							        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
							    </h1>

							<?php

							if(true === get_theme_mod( 'legalpress_display_site_title_tagline', true )) {
								$description = esc_html(get_bloginfo( 'description', 'display' ));
						        if ( $description || is_customize_preview() ) { 
						            ?>
						                <p class="site-description"><?php echo $description; ?></p>
						            <?php 
						        }
							}
						}
						else {
							?>
								<p class="<?php echo esc_attr( $header_class ); ?>">
							        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
							    </p>
							<?php

							if(true === get_theme_mod( 'legalpress_display_site_title_tagline', true )) {
								$description = esc_html(get_bloginfo( 'description', 'display' ));
						        if ( $description || is_customize_preview() ) { 
						            ?>
						                <p class="site-description"><?php echo $description; ?></p>
						            <?php 
						        }
							}
						}
					}
                ?>	
			</div>
			<div class="top-menu-wrapper">
				<nav class="top-menu" role="navigation" aria-label="<?php esc_attr_e( 'primary', 'legalpress' ); ?>" itemscope itemtype="https://schema.org/SiteNavigationElement">
					<div class="menu-header">
						<span><?php echo esc_html(get_theme_mod( 'legalpress_header_toggle_menu_text','MENU')) ?> </span>
				     	<button type="button" class="hd-bar-opener navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
					       	<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'legalpress' ); ?></span>
					      	<span class="icon-bar"></span>
					       	<span class="icon-bar"></span>
					       	<span class="icon-bar"></span>
				     	</button>
				   	</div>
					<div class="navbar-collapse collapse clearfix" id="navbar-collapse-1">
				   		<?php
			                wp_nav_menu( array(			                  	
			                  	'theme_location'    => 'primary',
			                  	'depth'             => 3,
			                  	'container'         => 'ul',
			                  	'container_class'   => 'navigation',
			                  	'container_id'      => 'menu-primary',
			                  	'menu_class'        => 'navigation',
			                  	)
			                );
		             	?>
				   	</div>
				</nav>
	        </div>
		</div>
    </div>
    <div class="clearfix"></div>
    <?php
    	/**
        * Hook - legalpress_action_header_inner_content
        *
        * @hooked legalpress_header_inner_content - 10
        */
        do_action( 'legalpress_action_header_inner_content' );
    ?>
</header>

<!-- Side Bar -->
<section id="hd-left-bar" class="hd-bar left-align mCustomScrollbar" data-mcs-theme="dark">
    <div class="hd-bar-wrapper">
    	<div class="hd-bar-closer">
	        <button><span class="qb-close-button"></span></button>
	    </div>
        <div class="side-menu">
        	<nav role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
	            <div class="side-navigation clearfix" id="navbar-collapse-2">
			   		<?php
		                wp_nav_menu( array(			                  	
		                  	'theme_location'    => 'primary',
		                  	'depth'             => 3,
		                  	'container'         => 'ul',
		                  	'container_class'   => 'navigation',
		                  	'container_id'      => 'menu-primary-mobile',
		                  	'menu_class'        => 'navigation',
		                  	)
		                );
	             	?>						
			   	</div>
			</nav>
        </div>
        <a class="hd-bar-close" href="#"><?php esc_html_e( 'Close Menu', 'legalpress' ); ?></a>
    </div>
</section>
<div class="clearfix"></div>
<div id="content" class="elementor-menu-anchor"></div>