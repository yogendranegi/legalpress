<?php 
/**
 * 
 * @package legalpress
 */

 //Return if the first widget area has no widgets
 if ( !is_active_sidebar('footer-1')) {
    return;
 } ?>

 <?php //User selected widget columns

    $legalpress_widget_num=esc_html(get_theme_mod('legalpress_footer_widgets','4'));

    if($legalpress_widget_num=='4') {
        $legalpress_cols='col-md-3';
    } elseif($legalpress_widget_num=='3') {
        $legalpress_cols='col-md-4';
    } elseif($legalpress_widget_num=='2') {
        $legalpress_cols='col-md-6';
    } else {
        $legalpress_cols='col-md-12';
    }
?>

<?php 
    if(is_active_sidebar('footer-1')) {
        ?>
            <div class="widget-column <?php echo esc_attr(_cols); ?>">
                <?php dynamic_sidebar('footer-1'); ?>
            </div>
        <?php 
    }
    if(is_active_sidebar( 'footer-2' )) {
        ?>
            <div class="widget_column <?php echo esc_attr($legalpress_cols); ?>">
                <?php dynamic_sidebar( 'footer-2' ); ?>
            </div>
        <?php 
    }
    if ( is_active_sidebar( 'footer-3' ) ){
		?>
			<div class="widget-column <?php echo esc_attr($legalpress_cols); ?>">
				<?php dynamic_sidebar( 'footer-3'); ?>
			</div>
		<?php
	}
	if ( is_active_sidebar( 'footer-4' ) ){
		?>
			<div class="widget-column <?php echo esc_attr($legalpress_cols); ?>">
				<?php dynamic_sidebar( 'footer-4'); ?>
			</div>
		<?php
	}
?>