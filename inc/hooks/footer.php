<?php

/**
* Footer copyrights
*/

if ( ! function_exists( 'legalblow_footer_copyrights' ) ) :
function legalblow_footer_copyrights() {
    ?>
        <div class="row">
            <div class="copyrights">
                <p>
                    <?php
                        if("" != esc_html(get_theme_mod( 'legalblow_footer_copyright_text'))) :
                            echo esc_html(get_theme_mod( 'legalblow_footer_copyright_text'));
                            if(get_theme_mod('legalblow_en_footer_credits',true)) :
                                ?><span><?php esc_html_e(' | Theme by ','legalblow') ?><a href="<?php echo esc_url(LEGALBLOW_THEME_AUTH); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e('Spiracle Themes','legalblow') ?></a></span>
                                <?php   
                            endif;
                        else :
                            echo date_i18n(
                                /* translators: Copyright date format, see https://secure.php.net/date */
                                _x( 'Y', 'copyright date format', 'legalblow' )
                            );
                            ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                                <span><?php esc_html_e(' | Theme by ','legalblow') ?><a href="<?php echo esc_url(LEGALBLOW_THEME_AUTH); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e('Spiracle Themes','legalblow') ?></a></span>
                            <?php
                        endif;
                    ?>
                </p>
            </div>
        </div>
    <?php
}
endif;
add_action( 'legalblow_action_footer', 'legalblow_footer_copyrights' );