<?php
/**
 *
 * @package legalpress
 */

//Return if the first widget area has no widgets
if ( !is_active_sidebar( 'footer-1' ) ) {
	return;
} ?>

<?php //user selected widget columns

	$legalpress_widget_num = esc_html(get_theme_mod('legalpress_footer_widgets', '4'));

	if ($legalpress_widget_num == '3-wide') :
		$legalpress_col1 = 'col-md-3';
		$legalpress_col2 = 'col-md-3';
		$legalpress_col3 = 'col-md-6 align-right';
	elseif ($legalpress_widget_num == '4') :
		$legalpress_col1 = 'col-md-3';
		$legalpress_col2 = 'col-md-3';
		$legalpress_col3 = 'col-md-3';
		$legalpress_col4 = 'col-md-3';
	elseif ($legalpress_widget_num == '3') :
		$legalpress_col1 = 'col-md-4';
		$legalpress_col2 = 'col-md-4';
		$legalpress_col3 = 'col-md-4';
	elseif ($legalpress_widget_num == '2') :
		$legalpress_col1 = 'col-md-6';
		$legalpress_col2 = 'col-md-6';
	else :
		$legalpress_col1 = 'col-md-12';
	endif;
?>
		
<?php 
	if ( is_active_sidebar( 'footer-1' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($legalpress_col1); ?>">
				<?php dynamic_sidebar( 'footer-1'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-2' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($legalpress_col2); ?>">
				<?php dynamic_sidebar( 'footer-2'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-3' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($legalpress_col3); ?>">
				<?php dynamic_sidebar( 'footer-3'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-4' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($legalpress_col4); ?>">
				<?php dynamic_sidebar( 'footer-4'); ?>
			</div>
		<?php
	endif;
?>