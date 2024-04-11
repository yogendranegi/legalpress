<?php
/**
 * Template part for displaying header menu
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package legalblow
 */

?>

<?php
	$page_val = is_front_page() ? 'home' : 'page' ;
?>
<header id="<?php echo esc_attr($page_val); ?>-inner" class="page-menu-anchor theme-menu-wrapper full-width-menu style1 page legalblow-header" role="banner" itemscope itemtype="https://schema.org/WPHeader">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'legalblow' ); ?></a>
	<div id="home" class="elementor-menu-anchor home-menu-anchor"></div>
	
	<div id="header-main" class="header-wrapper legalblow-wrapper">
		
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="clearfix"></div>
					<div class="col-md-4">
						<div class="logo" itemscope itemtype="https://schema.org/Organization">
							<?php 
						
							if(has_custom_logo()){
								legalblow_custom_logo();
							}
						?>
				
						<?php
							$alt_logo=esc_url(get_theme_mod('legalblow_sticky_logo'));
								if(!empty($alt_logo)){
									?>
										<a id="logo-alt" class="logo-alt" href="<?php echo esc_url(home_url('/'));?>"> <img src="<?php echo esc_url(get_theme_mod('legalblow_sticky_logo'));?>" alt="<?php esc_attr_e( 'logo', 'legalblow' ); ?>"></a>
									<?php
								}
							?>
							<?php
								$show_title   = ( true === get_theme_mod( 'legalblow_display_site_title_tagline', true ) );
								$header_class = $show_title ? 'site-title' : 'screen-reader-text';
								$description = esc_html(get_bloginfo( 'description', 'display' ));
								if(!empty(get_bloginfo( 'name' ))) {
									if ( is_front_page() ) {
										?>
											<?php 
												if(!empty($description)) {
													?>
														<h1 class="<?php echo esc_attr( $header_class ); ?>  not-empty-description">
															<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
														</h1>
													<?php
												}
												else{
													?>
														<h1 class="<?php echo esc_attr( $header_class ); ?> empty-description">
															<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
														</h1>
													<?php
												}
											?>
										<?php
										if(true === get_theme_mod( 'legalblow_display_site_title_tagline', true )) {
											
											if ( $description || is_customize_preview() ) { 
												?>
													<p class="site-description"><?php echo $description; ?></p>
												<?php 
											}
										}
									}
									else {

										if(!empty($description)) {
											?>
												<p class="<?php echo esc_attr( $header_class ); ?> not-empty-description">
													<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
												</p>
											<?php
										}
										else{
											?>
												<p class="<?php echo esc_attr( $header_class ); ?> empty-description">
													<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
												</p>
											<?php
										}

										if(true === get_theme_mod( 'legalblow_display_site_title_tagline', true )) {
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
					</div>
					<div class="col-md-8">
						<div class="topbar-right">
							<div class="topbar-content">
								<div class="call-us-section">
									<span class="call-us"><i class="fas fa-phone-alt"></i>  <?php echo esc_html(get_theme_mod( 'legalblow_header_topbar_call_us_label','Call Us:')) ?></span><span class="call-us-text"><?php echo esc_html(get_theme_mod( 'legalblow_header_topbar_call_us_text','123-456-7890')) ?></span>
									<span class="email"><i class="fas fa-envelope"></i><?php echo esc_html(get_theme_mod( 'legalblow_header_topbar_email_label','Email:')) ?></span><span class="email-text"><?php echo esc_html(get_theme_mod( 'legalblow_header_topbar_email_text','info@example.com')) ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="top-navigation">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="top-menu-wrapper">
							<nav class="top-menu" role="navigation" aria-label="<?php esc_attr_e( 'primary', 'legalblow' ); ?>" itemscope itemtype="https://schema.org/SiteNavigationElement">
								<div class="menu-header">
									<span><?php echo esc_html(get_theme_mod( 'legalblow_header_toggle_menu_text','MENU')) ?> </span>
									<button type="button" class="hd-bar-opener navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
										<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'legalblow' ); ?></span>
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
							<?php do_action('legalblow_woocommerce_show_cart'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="clearfix"></div>
    <?php
    	/**
        * Hook - legalblow_action_header_inner_content
        *
        * @hooked legalblow_header_inner_content - 10
        */
        do_action( 'legalblow_action_header_inner_content' );
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
        <a class="hd-bar-close" href="#"><?php esc_html_e( 'Close Menu', 'legalblow' ); ?></a>
    </div>
</section>
<div class="clearfix"></div>
<div id="content" class="elementor-menu-anchor"></div>