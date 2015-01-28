<?php
/**
 * The template for displaying Search Results pages.
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
                            
                        <?php if ( have_posts() ) : ?>
 
                            <header class="page-header">
                                <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'pixkit' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                            </header><!-- .page-header -->
             
                            <?php //pixkit_content_nav( 'nav-above' ); ?>
             
                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>
             
                                <?php get_template_part( 'content', 'search' ); ?>
             
                            <?php endwhile; ?>
             
                            <?php pixkit_content_nav( 'nav-below' ); ?>
             
                        <?php else : ?>
             
                            <?php get_template_part( 'no-results', 'search' ); ?>
             
                        <?php endif; ?>
                        
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