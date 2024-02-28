<?php
/**
 *
 * @package legalblow
 */

//Return if the first widget area has no widgets
if ( !is_active_sidebar( 'footer-1' ) ) {
	return;
} ?>

<?php //user selected widget columns

	$legalblow_widget_num = esc_html(get_theme_mod('legalblow_footer_widgets', '4'));

	if ($legalblow_widget_num == '3-wide') :
		$legalblow_col1 = 'col-md-3';
		$legalblow_col2 = 'col-md-3';
		$legalblow_col3 = 'col-md-6 align-right';
	elseif ($legalblow_widget_num == '4') :
		$legalblow_col1 = 'col-md-3';
		$legalblow_col2 = 'col-md-3';
		$legalblow_col3 = 'col-md-3';
		$legalblow_col4 = 'col-md-3';
	elseif ($legalblow_widget_num == '3') :
		$legalblow_col1 = 'col-md-4';
		$legalblow_col2 = 'col-md-4';
		$legalblow_col3 = 'col-md-4';
	elseif ($legalblow_widget_num == '2') :
		$legalblow_col1 = 'col-md-6';
		$legalblow_col2 = 'col-md-6';
	else :
		$legalblow_col1 = 'col-md-12';
	endif;
?>
		
<?php 
	if ( is_active_sidebar( 'footer-1' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($legalblow_col1); ?>">
				<?php dynamic_sidebar( 'footer-1'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-2' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($legalblow_col2); ?>">
				<?php dynamic_sidebar( 'footer-2'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-3' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($legalblow_col3); ?>">
				<?php dynamic_sidebar( 'footer-3'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-4' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($legalblow_col4); ?>">
				<?php dynamic_sidebar( 'footer-4'); ?>
			</div>
		<?php
	endif;
?>