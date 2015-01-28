<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
						<div id="content" class="site-content" role="main">
							<?php while ( have_posts() ) : the_post(); ?>
			 
			                    <?php get_template_part( 'content', 'page' ); ?>
			 				    <?php comments_template( '', true ); ?>
			 
			                <?php endwhile; // end of the loop. ?>
						</div><!-- #content .site-content -->
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