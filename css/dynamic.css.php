<?php
/**
 * LegalBlow : Dynamic CSS Stylesheet
 *
 */


function legalblow_dynamic_css_stylesheet() {

    $link_color= sanitize_hex_color(get_theme_mod( 'legalblow_link_color','#555' ));
    $link_hover_color= sanitize_hex_color(get_theme_mod( 'legalblow_link_hover_color','#000' ));
    $heading_color= sanitize_hex_color(get_theme_mod( 'legalblow_headings_title_color','#000' ));
	$single_post_width= absint(get_theme_mod( 'legalblow_single_post_width',65));

    $padding= get_theme_mod('legalblow_menu_items_spacing',16);
    $margin_top= get_theme_mod('legalblow_menu_spacing_from_top',0);
    $margin_bottom=get_theme_mod('legalblow_menu_spacing_from_bottom',0);
    $vertical_spacing=get_theme_mod('legalblow_header_toggle_menu_spacing',0);
    $button_height=get_theme_mod('legalblow_header_toggle_menu_btn_height',2);
    $button_padding=get_theme_mod('legalblow_header_toggle_menu_btn_padding',2);

    $menu_color=get_theme_mod('legalblow_transparent_header_menu_color','#135E96');


    $bg_color= sanitize_hex_color(get_theme_mod( 'legalblow_header_menu_last_button_bg_color','#555' ));
    $text_color= sanitize_hex_color(get_theme_mod( 'legalblow_header_menu_last_button_content_color','#c29852' ));


    $primary_color=get_theme_mod( 'legalblow_site_primary_color','#8224E3' );


    $css = '

    a{
        color: ' . $link_color . ';
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }

    .top-menu .navigation > li {
        padding: 0px ' . $padding . 'px;
        margin-top: ' . $margin_top . 'px ;
        margin-bottom: ' . $margin_bottom . 'px ;
        color: ' . $menu_color . 'px;
    } 
    
    .top-menu .navigation > li:last-child a {
        margin-top: ' . $vertical_spacing .'px;
        margin-top: ' . $button_height .'px;
        margin-top: ' . $button_padding .'px;

        background-color:' . $bg_color . ';
        color:' . $text_color . ';
        

    }
    . {
        color: ' . $primary_color . ';
    }


    a:hover,a:focus{
        color: ' . $link_hover_color . ';
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }

    h1,h2,h3,h4,h5,h6{
        color: ' . $heading_color . ';
    }

    .pagination .nav-links .current{
        background: ' . $link_hover_color . ' !important;
    }

    .top-menu .navigation > li > a:hover {
    	color: ' . $link_hover_color . ';
    }


    form.wpcf7-form input,
    form.wpcf7-form textarea,
    form.wpcf7-form radio,
    form.wpcf7-form checkbox{
        border: 1px solid #d0d0d0;
        color: #555;
    }

    form.wpcf7-form input::placeholder,
    form.wpcf7-form textarea::placeholder{
        color: #555;
    }

    form.wpcf7-form input[type="submit"]{
        color: #fff;
    }

    form.wpcf7-form label{
        color: #555;
    }

    button.navbar-toggle,
    button.navbar-toggle:hover{
        background: none !important;
        box-shadow: none;
    }

    .menu-social li a{
        color: ' . $link_color . ';
    }

    .menu-social li a:hover{
        color: ' . $link_hover_color . ';
    }

    aside h4.widget-title:hover{
        color: inherit;
    }

    .single h1.entry-title a,
    .cat-item a,
    .latest-posts-area-content a{
        color: #555;
        transition: all 0.3s ease-in-out;
    }

    .cat-item a:hover,
    .latest-posts-area-content a:hover,
    .layout-1-area-content .title h3 a:hover{
        color: #000;
        transition: all 0.3s ease-in-out;
    }

    .blog.single-no-sidebar article{
        width: 100%;
    }

    .single article .title, 
    .single article .content,
    .single article #comments {
        width: ' . $single_post_width . '%;
        margin: 0 auto;
    }

    .container {
	    width: 95%;
	    margin: 0 auto;
	}

';


if('square'==esc_html(get_theme_mod('legalblow_choose_style_menu_last_button','square'))) :
    $css .='
        .top-menu .navigation > li:last-child a{
            border-radius: 0;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px; 
            cursor: pointer;
        }
    ';

    else :
    $css.='
    .top-menu .navigation > li:last-child a{
        border-radius: 50%;
        padding: 15px 23px; 
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;    
    ';
    endif;


if(false===get_theme_mod( 'legalblow_display_site_title_tagline',true)){
    $css .='
        h1.site-title,
        p.site-description{
        	display: none;
        }
    ';
}

if(false===get_theme_mod( 'legalblow_enable_posts_cat',true)){
    $css .='
        ul.post-categories {
        	display: none;
        }
    ';
}

if(false===get_theme_mod( 'legalblow_enable_header_menu_align',true)){
    $css .='
        .navigation>li {
        	display: none;
        }
    ';
}

if(false===get_theme_mod( 'legalblow_enable_posts_meta_date',true)){
    $css .='
        span.separator,
        span.date {
        	display: none;
        }
    ';
}

if(false===get_theme_mod( 'legalblow_enable_posts_meta_author',true)){
    $css .='
        span.author,
        span.by{
        	display: none;
        }
    ';
}

if(false===get_theme_mod( 'legalblow_enable_posts_meta_comments',true)){
    $css .='
        span.comments{
        	display: none;
        }
    ';
}

if(false===get_theme_mod( 'legalblow_label_header_menu_last_button',true)){
   $css .=' 
   .top-menu .navigation>li:last-child a{
    background: red;
    }
';                                                                                                        
}


if(false===get_theme_mod( 'legalblow_enable_single_post_cat',true)){
    $css .='
        .single div.post-categories {
        	display: none;
        }
    ';
}

if(false===get_theme_mod( 'legalblow_enable_single_post_tags',true)){
    $css .='
        .single div.post-tags {
        	display: none;
        }
    ';
}

if(false===get_theme_mod( 'legalblow_enable_single_post_meta_date',true)){
    $css .='
        .single span.date-single {
        	display: none;
        }
    ';
}

if(false===get_theme_mod( 'legalblow_enable_single_post_meta_author',true)){
    $css .='
        .single span.author-single {
        	display: none;
        }
    ';
}

if(false===get_theme_mod( 'legalblow_enable_single_post_meta_comments',true)){
    $css .='
        .single span.comments-single {
        	display: none;
        }
    ';
}

if('both-sidebars'===esc_html(get_theme_mod('legalblow_home_page_layout','both-sidebars'))) {
    if ( is_active_sidebar( 'legalblow-hp-left-section' ) && is_active_sidebar( 'legalblow-hp-right-section' ) ) {
        $css .='
	        .both-sidebars .container {
	        	width: 90%;
	        	margin: 0 auto;
	        }
	    ';   
    }
    $css .='
        .home.elementor-page.both-sidebars .container {
        	width: 90%;
        	margin: 0 auto;
        }

        .home.elementor-page.both-sidebars .elementor-section.elementor-section-boxed>.elementor-container {
        	width: 90% !important;
        	max-width: 90% !important;
        }
    ';
}

if(true===get_theme_mod( 'legalblow_enable_header_menu_align',false)) {
    $css .='
        .top-menu .navigation {
            text-align:right;
        }
    ';
}

if('no-sidebars'===esc_html(get_theme_mod('legalblow_home_page_layout','both-sidebars'))) {
    if ( is_active_sidebar( 'legalblow-hp-left-section' ) && is_active_sidebar( 'legalblow-hp-right-section' ) ) {
        $css .='
	        .no-sidebar .container {
	        	width: 90%;
	        	margin: 0 auto;
	        }
	    ';   
    }
    $css .='
        .home.elementor-page.no-sidebar .container {
        	width: 90%;
        	margin: 0 auto;
        }

        .home.elementor-page.no-sidebar .elementor-section.elementor-section-boxed>.elementor-container {
        	width: 90% !important;
        	max-width: 90% !important;
        }
    ';
}


if(true===get_theme_mod( 'legalblow_enable_single_post_full_width',false)){
    $css .='
        .single .title, 
        .single .content,
        .single #comments {
        	width: 100%;
        	margin: 0 auto;
        }
    ';
}



//add sticky header css
if ( get_theme_mod( 'legalblow_enable_stickyheader', false )) :
    $css .='

        #header-main.sticky {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 99;
            background: #fff !important;
        }

        #header-main.sticky .site-title a,
        #header-main.sticky .site-description,
        #header-main.sticky .top-bar li a,
        #header-main.sticky .top-bar div,
        #header-main.sticky .top-bar span {
        	color: #333 !important;
    	}

        .admin-bar header.style1 #header-main.sticky {
            margin-top: 30px !important;
            padding-top: 20px;
            border-bottom: 1px solid #f5f5f5;
            box-shadow: -20px -20px 12px 0;
            -webkit-box-shadow: -20px -20px 12px 0;
            -moz-box-shadow: -20px -20px 12px 0;
        }

        header.style1 #header-main.sticky {
            margin-top: 0 !important;
            padding-top: 20px;
            border-bottom: 1px solid #f5f5f5;
            box-shadow: -20px -20px 12px 0;
            -webkit-box-shadow: -20px -20px 12px 0;
            -moz-box-shadow: -20px -20px 12px 0;
        }

        .admin-bar header.style2 #header-main.sticky {
            padding-top: 30px;
            margin-top: 30px !important;
            border-bottom: 1px solid #f5f5f5;
            box-shadow: -20px -20px 12px 0;
            -webkit-box-shadow: -20px -20px 12px 0;
            -moz-box-shadow: -20px -20px 12px 0;
        }

        header.style2 #header-main.sticky {
            padding-top: 30px;
            margin-top: 0 !important;
            border-bottom: 1px solid #f5f5f5;
            box-shadow: -20px -20px 12px 0;
            -webkit-box-shadow: -20px -20px 12px 0;
            -moz-box-shadow: -20px -20px 12px 0;
        }

        .style2 #header-main.sticky .top-menu-wrapper {
            border-bottom: none;
            box-shadow: none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
        }

        @media only screen and (max-width: ' . $tablet_breakpoint . 'px) {
        	#header-main.sticky {
		        margin-top: 0 !important;
		        position: relative;
		    }
        }
    ';

    if(true === get_theme_mod( 'legalblow_enable_header_menu_last_button',false )) :
    	$css .='
    		#header-main.sticky ul.navigation > li > a:not(#header-main.sticky .top-menu-wrapper ul.navigation > li:nth-last-child(1) > a) {
    			color: #333 !important;
    		}
    	';
    else:
    	$css .='
    		#header-main.sticky ul.navigation > li > a {
    			color: #333 !important;
    		}
    	';
    endif;

endif;

//sticky header logo
if ( get_theme_mod( 'legalblow_enable_logo_stickyheader', false )) :
	$css .='
		
		header .logo a.logo-alt {
			display: none;
		}
		header .logo a.custom-logo-link {
			display: block;
		}

		#header-main.sticky .logo a.logo-alt {
			display: block;
		}
		#header-main.sticky .logo a.custom-logo-link {
			display: none;
		}
		#header-main.sticky .logo a.logo-alt img {
			max-height: 65px;
			width: auto !important;
		}
	';
endif;

return apply_filters( 'legalblow_dynamic_css_stylesheet', legalblow_minimize_css($css));

}

