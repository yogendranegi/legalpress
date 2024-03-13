<?php
/**
 *
 * @package legalblow
 */


if ( ! is_active_sidebar( 'topbar' ) ) :
	return;
endif;

?>
<div class="left-sidebar-wrapper">
	<?php dynamic_sidebar( 'topbar' ); ?>
</div>

