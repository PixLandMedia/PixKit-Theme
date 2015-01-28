<?php
/**
 * The Template for displaying all single posts.
 *
 * @package PixKit
 * @since PixKit 0.1.0
 */
 
get_header(); ?>

<section>
    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 ">
                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php pixkit_content_nav( 'nav-above' ); ?>

                            <?php get_template_part( 'content', 'single' ); ?>

                            <?php pixkit_content_nav( 'nav-below' ); ?>

                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template( '', true );
                            ?>

                        <?php endwhile; // end of the loop. ?>                            
                    </div>
                    <div class="col-sm-4">
                        <?php get_sidebar(); ?>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->
</section>
<?php get_footer(); ?>