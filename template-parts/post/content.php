<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package legalblow
 */
?>

    <?php $cb_values= explode(",",esc_html(get_theme_mod( 'legalblow_blog_post_meta_pill_checkbox','author,date,comments,readmore,image' ))) ; ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog">
        <div class="blog-post">
            <div class="row">
                <?php
                    if ( has_post_thumbnail() && in_array("image", $cb_values) ) : 
                        ?>   
                            <div class="image">
                                <?php
                                    the_post_thumbnail('full',array( 'itemprop' => 'image' ));
                                ?>
                            </div>
                           
                        <?php
                    endif;
                ?>  
                <div class="content-wrapper">
                    <div class="col-md-12">
                        <div class="meta">
                            <ul class="meta-list">
                                <?php
                                    if(in_array("author", $cb_values)) :
                                        ?>
                                            <li class="author-meta">                                            
                                                <span class="byline" itemprop="author" itemscope="" itemtype="https://schema.org/Person"> 
                                                    <span itemprop="name"><i class="fa fa-user"></i><a class="author-post-url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>" itemprop="url"><?php the_author() ?></a></span>
                                                </span>
                                            </li>
                                        <?php
                                    endif;
                                    if(in_array("date", $cb_values)) :
                                        ?>
                                            <li class="date-meta">
                                                <span class="post-day-icon meta-icon"><i class="fa fa-calendar"></i>
                                                <?php legalblow_posted_on(); ?>
                                            </li>
                                        <?php
                                    endif;
                                    if(in_array("comments", $cb_values)) :
                                        ?>
                                            <li class="comments-meta">                                           
                                                <span itemprop="commentCount"><a class="post-comments-url" href="<?php the_permalink() ?>#comments"><?php comments_number('0','1','%'); ?> <?php esc_html_e('Comments','legalblow'); ?></a></span>
                                            </li>
                                        <?php
                                    endif;
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="content">
                            <h2 class="entry-title" itemprop="headline">
                                <?php
                                    if ( is_sticky() && is_home() ) :
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="#626262" d="M11 6.5V1h1V0H4v1h1v5.5S3 8 3 10c0 .5 1.9.7 4 .7v2.2c0 .7.2 1.4.5 2.1l.5 1l.5-1c.3-.6.5-1.3.5-2.1v-2.2c2.1 0 4-.3 4-.7c0-2-2-3.5-2-3.5zm-4 .1s-.5.3-1.6 1.4c-1 1-1.5 1.9-1.5 1.9s.1-1 .8-1.9C5.6 6.9 6 6.6 6 6.6V1h1v5.6z"/></svg>';
                                    endif;
                                ?>
                                <a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
                            </h2>                   
                            <div class="blog-excerpt">
                                <div class="entry-content" itemprop="text">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <?php
                                    if(in_array("readmore", $cb_values)) :
                                        ?>
                                            <div class="read-more">
                                                <a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e('READ MORE','legalblow'); ?></a>
                                            </div>
                                        <?php
                                    endif;
                                ?>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    