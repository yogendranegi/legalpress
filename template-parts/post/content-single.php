<?php
/**
 * Template part for displaying posts in a single post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package legalblow
 */
?>
    
    <?php $cb_values= explode(",",esc_html(get_theme_mod( 'legalblow_single_post_meta_pill_checkbox','date,author,categories,tags,comments,image,links' ))); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="blog-post">
        	<div class="title">
        		<h1 class="entry-title">
                    <?php the_title(); ?>
                </h1>
        	</div>
            <?php
                if(has_tag() && in_array("tags", $cb_values)) :
                    ?>
                        <div class="post-tags">
                            <i class="single-tags">#</i> <?php legalblow_tag(); ?>
                        </div>
                    <?php
                endif;
            ?>
            <div class="meta">
                <ul class="meta-list">
                    <li class="author-meta">
                        <?php 
                            if(in_array("author", $cb_values)) :
                                ?>
                                    <div class="author-inner">
                                        <span class="author-icon author-gravatar">
                                            <?php echo get_avatar( get_the_author_meta( 'ID' ) , 128, '',__("author-image","legalblow")); ?>
                                        </span>
                                        <span class="byline" itemprop="author" itemscope="" itemtype="https://schema.org/Person"> 
                                            <span itemprop="name">
                                                <a class="author-post-url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>" itemprop="url"><?php the_author() ?></a>
                                            </span>
                                        </span>
                                    </div>
                                <?php
                            endif;
                            if(in_array("date", $cb_values) && in_array("author", $cb_values) ) :
                                ?>
                                    <span class="posted-on" itemprop="datePublished">
                                        <p class="date-meta"><?php legalblow_posted_on(); ?></p>
                                    </span>
                                <?php
                        	elseif(in_array("date", $cb_values) && !in_array("author", $cb_values) ):
                        		?>
                                    <span class="posted-on" itemprop="datePublished">
                                        <p class="date-meta" style="margin-left: 0;"><?php legalblow_posted_on(); ?></p>
                                    </span>
                                <?php
                            endif;
                        ?>
                    </li> 
                </ul>
            </div>
            <?php
                if(in_array("image", $cb_values)) :
                    ?>
                        <div class="image">
                            <?php
                                if ( has_post_thumbnail()) :
                                    the_post_thumbnail('full',array( 'itemprop' => 'image' ));
                                endif;
                            ?>
                        </div>
                    <?php
                endif;
            ?>
            <div class="entry-content content" itemprop="text">
                <?php
                    the_content();
                    wp_link_pages(array(
                        'before' => '<div class="page-link">' . esc_html__('Pages:','legalblow'),
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    )); 
                ?>

                 <?php
                    if(in_array("categories", $cb_values)) :
                        ?>
                            <div class="post-categories">
                            	<h5><?php esc_html_e('Category: ','legalblow'); ?></h5>
                                <?php 
                                // legalblow_category(); 
                                ?>
                            </div>
                        <?php
                    endif;
                ?>
            </div>
        </div>
    </article>
    <?php 
    // esc_html(legalblow_single_post_after_content($post->ID));
     ?>