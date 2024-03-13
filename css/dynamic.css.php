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
    $margin_bottom=get_theme_mod('legalblow_menu_spacing_from_bottom',30);
    $vertical_spacing=get_theme_mod('legalblow_header_toggle_menu_spacing',0);
    $button_height=get_theme_mod('legalblow_header_toggle_menu_btn_height',2);
    $button_padding=get_theme_mod('legalblow_header_toggle_menu_btn_padding',2);

    $menu_color=get_theme_mod('legalblow_transparent_header_menu_color','#135E96');


    $bg_color= sanitize_hex_color(get_theme_mod( 'legalblow_header_menu_last_button_bg_color','#555' ));
    $text_color= sanitize_hex_color(get_theme_mod( 'legalblow_header_menu_last_button_content_color','#c29852' ));


    $primary_color=get_theme_mod( 'legalblow_site_primary_color','#8224E3' );

    $layout_width=get_theme_mod( 'legalblow_layout_content_width_settings','1170');

    $page_content_spacing_top_title= absint(get_theme_mod( 'legalblow_page_content_spacing_top_title','70' ));

    $spacing= get_theme_mod('legalblow_footer_copyrights_spacing',30);

    $logo_width=get_theme_mod('legalblow_logo_width_settings',200);

    $footer_copyright_text=get_theme_mod('legalblow_footer_copyrights_spacing',30);

    $footer_content_spacing=get_theme_mod('legalblow_footer_content_spacing',0);
    $footer_links_color= sanitize_hex_color(get_theme_mod( 'legalblow_footer_links_color','#b3b3b3' ));
    $footer_bg_color= sanitize_hex_color(get_theme_mod( 'legalblow_footer_bg_color','#0340b2' ));
    $footer_content_color= sanitize_hex_color(get_theme_mod( 'legalblow_footer_content_color','#dbdbdb' ));


    $css = '


    a{
        color: ' . $link_color . ';
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }

    .top-menu-wrapper {
        padding: 0px ' . $padding . 'px;
        margin-top: ' . $margin_top . 'px ;
        margin-bottom: ' . $margin_bottom . 'px ;
        color: ' . $menu_color . 'px;
    } 
    
    .copyright span{ 
        padding: ' . $footer_copyright_text . 'px;
    }
    .copyright span a{
        padding: ' . $footer_copyright_text . 'px;
        color: ' . $footer_links_color . ';
    }

    .copyright{ 
        padding: ' . $footer_content_spacing . 'px;
    }


    .copyright {
        background-color:' . $footer_bg_color . ';
        color:' . $footer_content_color . ';
    }

    .copyright span a{
        
    }

    .footer-copyrights-wrapper {
        background-color:' . $footer_bg_color . ';
        color:' . $footer_content_color . ';
    }


    .logo {
        width: ' . $logo_width . 'px;
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
        }
    ';

    else :
    $css.='
    .top-menu .navigation > li:last-child a{
        border-radius: 20px;    ';
    endif;


if(false===get_theme_mod( 'legalblow_display_site_title_tagline',true)){
    $css .='
        h1.site-title,
        p.site-description{
        	display: none;
        }
    ';
}

if(false===get_theme_mod( 'legalblow_footer_copyright_text',true)){
    $css .='
    footer-copyrights-wrapper{
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

// check it's not a homepage
if(!is_front_page()):
    $css .='
        .page .content-page {
            margin-top: ' . $page_content_spacing_top_title . 'px !important;
        }

        .page #sidebar-wrapper {
            margin-top: ' . $page_content_spacing_top_title . 'px !important;
        }

        .page-title .content-section {
            padding-top: ' . $page_title_spacing_top . 'px;
            padding-bottom: ' . $page_title_spacing_bottom . 'px;
        }
    ';
endif;


/* check if header transparent enable and page title disabled */
if(true===get_theme_mod( 'legalblow_enable_header_transparent',false) && false===get_theme_mod( 'legalblow_enable_page_title',true)) :
    $blog_bg_color= sanitize_hex_color(get_theme_mod( 'legalblow_blog_bg_color','#ca2e49' ));
    $css .='
        .blog .page-title .content-section, 
        .single .page-title .content-section, 
        .archive .page-title .content-section, 
        .author .page-title .content-section,
        .search .page-title .content-section, 
        .error404 .page-title .content-section {
            background: ' . $blog_bg_color . ';
            padding-top: 150px;
            padding-bottom: 70px;
         }

        .blog .page-title h1, 
        .single .page-title h1, 
        .archive .page-title h1, 
        .author .page-title h1,
        .search .page-title h1, 
        .error404 .page-title h1 {
            padding-top: 0;
        }

        .page .content-inner {
            margin-top: 70px;
            margin-bottom: 70px;
        }
    ';

endif;


//content width settings//
if( 1170 != absint(get_theme_mod( 'legalblow_layout_content_width_settings','1170'))) :
    $css .='
         @media (min-width: 1200px) {
            .container {
                width: ' . $layout_content_width . 'px ;
            }
        }
    ';
endif;


//sticky header logo
if ( get_theme_mod( 'legalblow_enable_logo_stickyheader', false )) :
	$css .='
		#header-main.sticky .logo a.logo-alt img {
			max-height: 65px;
			width: auto !important;
		}
	';
endif;


//check if center copyrights text
if(true===get_theme_mod( 'colon_enable_center_copyrights_text',true)) :
    $css .='
         footer .copyrights {
            text-align: center;
         }
    ';
endif;


return apply_filters( 'legalblow_dynamic_css_stylesheet', legalblow_minimize_css($css));

}

