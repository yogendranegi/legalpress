<?php
/**
 * LegalBlow : Dynamic CSS Stylesheet
 *
 */


function legalblow_dynamic_css_stylesheet() {

    $logo_width=absint(get_theme_mod('legalblow_logo_width_settings',200));
    $logo_spacing=absint(get_theme_mod('legalblow_logo_spacing_settings',12));

    $link_color= sanitize_hex_color(get_theme_mod( 'legalblow_link_color','#555' ));
    $link_hover_color= sanitize_hex_color(get_theme_mod( 'legalblow_link_hover_color','#000' ));
    $heading_color= sanitize_hex_color(get_theme_mod( 'legalblow_headings_title_color','#000' ));
	$single_post_width= absint(get_theme_mod( 'legalblow_single_post_width',65));

    $menu_items_spacing= absint(get_theme_mod('legalblow_menu_items_spacing',16));
    $header_toggle_menu_spacing=absint(get_theme_mod('legalblow_header_toggle_menu_spacing',0));
    $header_toggle_menu_btn_height=absint(get_theme_mod('legalblow_header_toggle_menu_btn_height',2));
    $header_toggle_menu_btn_padding=absint(get_theme_mod('legalblow_header_toggle_menu_btn_padding',2));


    $header_menu_last_button_bg_color= sanitize_hex_color(get_theme_mod( 'legalblow_header_menu_last_button_bg_color','#555' ));
    $header_menu_last_button_content_color= sanitize_hex_color(get_theme_mod( 'legalblow_header_menu_last_button_content_color','#c29852' ));


    $site_primary_color= sanitize_hex_color(get_theme_mod( 'legalblow_site_primary_color','#1e5154' ));
    $site_secondary_color=sanitize_hex_color(get_theme_mod( 'legalblow_site_secondary_color','#397b7e' ));

    $layout_content_width_settings=absint(get_theme_mod( 'legalblow_layout_content_width_settings',1170));

    $page_title_spacing_top= absint(get_theme_mod( 'legalblow_page_title_spacing_top',70 ));
    $page_title_spacing_bottom= absint(get_theme_mod( 'legalblow_page_title_spacing_bottom',70 ));
    $page_content_spacing_top_title= absint(get_theme_mod( 'legalblow_page_content_spacing_top_title',70 ));
    $page_title_color= sanitize_hex_color(get_theme_mod( 'legalblow_page_title_color','#fff' ));
    $page_title_breadcrumbs_color= sanitize_hex_color(get_theme_mod( 'legalblow_page_title_breadcrumbs_color','#fff' ));
    $page_title_bg_color= sanitize_hex_color(get_theme_mod( 'legalblow_page_title_bg_color','#8224e3' ));
    $page_title_img_overlay_color= sanitize_hex_color(get_theme_mod( 'legalblow_page_title_img_overlay_color','#000000' ));

    $footer_links_color= sanitize_hex_color(get_theme_mod( 'legalblow_footer_links_color','#b3b3b3' ));
    $footer_bg_color= sanitize_hex_color(get_theme_mod( 'legalblow_footer_bg_color','#0340b2' ));
    $footer_content_color= sanitize_hex_color(get_theme_mod( 'legalblow_footer_content_color','#dbdbdb' ));
    $footer_headings_color= sanitize_hex_color(get_theme_mod( 'legalblow_footer_headings_color','#dbdbdb' ));

    $footer_content_spacing= absint(get_theme_mod('legalblow_footer_content_spacing',70));
    $footer_spacing= absint(get_theme_mod('legalblow_footer_spacing',70));





    $css = '


    a{
        color: ' . $link_color . ';
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }

    .logo a.custom-logo-link {
        width: ' . $logo_width . 'px;
        margin: ' . $logo_spacing .'px 0;
        display: inline-block;
    }

    .top-menu .navigation > li > a {
        padding: 14px ' . $menu_items_spacing . 'px !important;
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
        border: none;
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

    .single article .title, 
    .single article .content,
    .single article #comments {
        width: ' . $single_post_width . '%;
        min-width: auto;
    }

    .single article p {
        width: 100%;
    }

    .container {
	    width: 95%;
	    margin: 0 auto;
	}

     .page-title h1 {
        color: ' . $page_title_color . ';
     }

    .page-title span,
    .page-title span a,
    .page-title #breadcrumbs,
    .page-title #breadcrumbs a {
        color: ' . $page_title_breadcrumbs_color . ';
    }

    .page-title .breadcrumbs li:after {
        content: ">";
        display: inline-block;
        color: ' . $page_title_breadcrumbs_color . ';
    }

    footer#footer {
        background: ' . $footer_bg_color . ';
        color: ' . $footer_content_color . ';
        padding-top: ' . $footer_content_spacing . 'px;
        margin-top: ' . $footer_spacing . 'px;
    }

    
    footer#footer li span,
    footer#footer p {
        color: ' . $footer_content_color . ';
    }

    footer#footer li a,
    footer#footer .copyright a {
        color: ' . $footer_links_color . ';
    }

    footer#footer h4 {
        color: ' . $footer_headings_color . ';
    }

';


//check if page title bg is enabled
if(true===get_theme_mod( 'legalblow_enable_page_title_bg',true) && !is_front_page()) :
    $css .='
        .page-title {
            background: ' . $page_title_bg_color . ';
         }

        .page .content-inner {
            margin-top: 70px;
            margin-bottom: 70px;
        }
        
    ';
else:
    if ( !legalblow_is_active_woocommerce() ) :
        $css .='
            header {
                border-bottom: 1px solid #fbfbfb;
            }

        ';
    endif;
endif;


//check if left page title
if(true===get_theme_mod( 'legalblow_enable_page_title_left',false)) :
    $css .='
        
        .page-title .main-title,
        .page-title {
            text-align: left;
        }

        .page-title .breadcrumbs li a {
            padding-left: 0 !important;
        }
    ';
endif;




if(false===get_theme_mod( 'legalblow_display_site_title_tagline',true)):
    $css .='
        h1.site-title,
        p.site-description{
        	display: none;
        }
    ';
endif;


if(false===get_theme_mod( 'legalblow_enable_posts_cat',true)):
    $css .='
        ul.post-categories {
        	display: none;
        }
    ';
endif;

if(false===get_theme_mod( 'legalblow_enable_header_menu_align',true)):
    $css .='
        .navigation>li {
        	display: none;
        }
    ';
endif;

if(false===get_theme_mod( 'legalblow_enable_posts_meta_date',true)):
    $css .='
        span.separator,
        span.date {
        	display: none;
        }
    ';
endif;

if(false===get_theme_mod( 'legalblow_enable_posts_meta_author',true)):
    $css .='
        span.author,
        span.by{
        	display: none;
        }
    ';
endif;

if(false===get_theme_mod( 'legalblow_enable_posts_meta_comments',true)):
    $css .='
        span.comments{
        	display: none;
        }
    ';
endif;

if(false===get_theme_mod( 'legalblow_label_header_menu_last_button',true)):
   $css .=' 
   .top-menu .navigation>li:last-child a{
    background: red;
    }
';                                                                                                        
endif;


if(false===get_theme_mod( 'legalblow_enable_single_post_cat',true)):
    $css .='
        .single div.post-categories {
        	display: none;
        }
    ';
endif;

if(false===get_theme_mod( 'legalblow_enable_single_post_tags',true)):
    $css .='
        .single div.post-tags {
        	display: none;
        }
    ';
endif;

if(false===get_theme_mod( 'legalblow_enable_single_post_meta_date',true)):
    $css .='
        .single span.date-single {
        	display: none;
        }
    ';
endif;

if(false===get_theme_mod( 'legalblow_enable_single_post_meta_author',true)):
    $css .='
        .single span.author-single {
        	display: none;
        }
    ';
endif;

if(false===get_theme_mod( 'legalblow_enable_single_post_meta_comments',true)):
    $css .='
        .single span.comments-single {
        	display: none;
        }
    ';
endif;

if('both-sidebars'===esc_html(get_theme_mod('legalblow_home_page_layout','both-sidebars'))):
    if ( is_active_sidebar( 'legalblow-hp-left-section' ) && is_active_sidebar( 'legalblow-hp-right-section' ) ) :
        $css .='
	        .both-sidebars .container {
	        	width: 90%;
	        	margin: 0 auto;
	        }
	    ';   
    endif;
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
endif;

if(true===get_theme_mod( 'legalblow_enable_header_menu_align',false)) :
    $css .='
        .top-menu .navigation {
            text-align:right;
        }
    ';
endif;

if('no-sidebars'===esc_html(get_theme_mod('legalblow_home_page_layout','both-sidebars'))) :
    if ( is_active_sidebar( 'legalblow-hp-left-section' ) && is_active_sidebar( 'legalblow-hp-right-section' ) ) :
        $css .='
	        .no-sidebar .container {
	        	width: 90%;
	        	margin: 0 auto;
	        }
	    ';   
    endif;
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
endif;


if('round'===esc_html(get_theme_mod('legalblow_choose_forms_button_styles','square'))) :
    $css .='
        form.wpcf7-form input[type="submit"] {
            border-radius: 45px;
        }
    ';
endif;

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



// breadcrumb enable
if( true === get_theme_mod( 'legalblow_enable_page_breadcrumbs',true)) :
    $css .='

        .page-title h1 {
            padding-bottom: 0;
        }

        .page-title #breadcrumbs {
            margin-top: 10px;
            margin-bottom: 30px;
        }

        .page-title span {
            display: inline-block;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        .page-title .breadcrumbs li {
            display: inline-block;
            padding: 0 3px;
        }

        .page-title .breadcrumbs li:after {
            content: ">";
            display: inline-block;
        }

        .page-title .breadcrumbs li:last-child::after {
            display: none;
        }

        .page-title .breadcrumbs li a {
            padding-left: 10px;
        }

        .page-title h1 {
            padding-bottom: 0;
        }

        .page-title span {
            display: inline-block;
            margin-top: 5px;
            margin-bottom: 15px;
        }
    ';
endif;



//add sticky header css
if ( get_theme_mod( 'legalblow_enable_stickyheader', false )) :
    $css .='

        #header-main.sticky {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 99;
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
            box-shadow: -20px -20px 12px 0;
            -webkit-box-shadow: -20px -20px 12px 0;
            -moz-box-shadow: -20px -20px 12px 0;
        }

        header.style1 #header-main.sticky {
            margin-top: 0 !important;
            box-shadow: -20px -20px 12px 0;
            -webkit-box-shadow: -20px -20px 12px 0;
            -moz-box-shadow: -20px -20px 12px 0;
        }

        .admin-bar header.style2 #header-main.sticky {
            padding-top: 30px;
            margin-top: 30px !important;
            box-shadow: -20px -20px 12px 0;
            -webkit-box-shadow: -20px -20px 12px 0;
            -moz-box-shadow: -20px -20px 12px 0;
        }

        header.style2 #header-main.sticky {
            padding-top: 30px;
            margin-top: 0 !important;
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
endif;


//check if last menu as button
if(true === get_theme_mod( 'legalblow_enable_header_menu_last_button',false )) :
    $css .='
        .top-menu .navigation > li:last-child a {
            background: ' . $header_menu_last_button_bg_color . ';
            color: ' . $header_menu_last_button_content_color . ';
        }
    ';

    if('square' == get_theme_mod( 'legalblow_choose_style_menu_last_button','square' )) :
        $css .='
            .top-menu .navigation > li:last-child {
                float: right;
                margin-top: 5px;
            }

            .top-menu .navigation > li:last-child a {
                border-radius: 5px;
                padding: 8px 50px;
            }

            .top-menu .navigation > li:last-child a {
                padding: 8px 50px !important;
            }
        ';
    else:
        $css .='
            .top-menu .navigation > li:last-child {
                float: right;
                margin-top: 5px;
            }

            .top-menu .navigation > li:last-child a {
                border-radius: 45px;
                padding: 8px 50px;
            }

            .top-menu .navigation > li:last-child a {
                padding: 8px 50px !important;
            }
        ';
    endif;
    
else:
	$css .='
		.top-menu .navigation > li:last-child {
            float: none;
            margin: 0;
        }

        .top-menu .navigation > li:last-child a {
            padding: 0;
            background: none;
            color: #fff;
            border-radius: 0;
        }
	';
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



//content width settings//
if( 1170 != absint(get_theme_mod( 'legalblow_layout_content_width_settings',1170))) :
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
if(true===get_theme_mod( 'legalblow_enable_center_copyrights_text',true)) :
    $css .='

        .footer-copyrights-wrapper {
            text-align:center;
        }

    ';
endif;


//check if single page post text is align to center
if(true===get_theme_mod( 'legalblow_enable_single_post_align_center',false)) :
    $css .='
        .single article .title, 
        .single article .content,
        .single article #comments {
            margin: 0 auto;
        }

        .single .blog-post .image {
            text-align: center;
        }

        .single article .post-tags,
        .single article .meta {
            text-align: center;
        }

        .single .date-meta {
            margin-left: 45px;
        }
    ';
endif;

/* Preloader */
if(true === get_theme_mod( 'legalblow_enable_preloader',false )) :
    $css .='

        .loader-wrapper {
            background: #fff;
            width: 100%;
            height: 100%;
            position: fixed !important;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 100000;
        }

        #pre-loader {
            height: 30px;
            width: 30px;
            position: absolute;
            top: 45%;
            left: 47%;
        }

        .loader-pulse {
            width: 50px;
            height: 50px;
            background-color: #555;
            border-radius: 100%;
            animation: loader-pulse 1.2s infinite cubic-bezier(0.455, 0.03, 0.515, 0.955); 
        }

        @keyframes loader-pulse {
            0% {
                transform: scale(0); 
            } 100% {
                transform: scale(1);
                opacity: 0; 
            }
        }

    ';
endif;


// check if image overlay enabled
if(true===get_theme_mod( 'legalblow_enable_page_title_overlay',false)) :
    $hex = $page_title_img_overlay_color;
    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
    
    $css .='
         .page-title .img-overlay {
            background: rgba(' . $r . ',' . $g . ',' . $b . ',.5);
        }
    ';
endif;


return apply_filters( 'legalblow_dynamic_css_stylesheet', legalblow_minimize_css($css));

}

