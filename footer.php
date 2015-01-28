<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the id=main div and all content after
*
* @package PixKit
* @since PixKit 0.1.0
*/
?>

    <!-- FOOTER -->
    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container site-info">
            <div class="row">
                <div class="col-sm-4">
                    <?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
                     
                         <div id="footer-left" class="widget-area" role="footer">
                          <?php dynamic_sidebar( 'footer-left' ); ?>
                         </div><!-- #footer-left .widget-area -->
                     
                    <?php endif; ?>
                </div>
                <div class="col-sm-4">
                    <?php if ( is_active_sidebar( 'footer-center' ) ) : ?>
                     
                         <div id="footer-center" class="widget-area" role="footer">
                          <?php dynamic_sidebar( 'footer-center' ); ?>
                         </div><!-- #footer-center .widget-area -->
                     
                    <?php endif; ?>
                </div>
                <div class="col-sm-4">
                    <?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
                     
                         <div id="footer-right" class="widget-area" role="footer">
                          <?php dynamic_sidebar( 'footer-right' ); ?>
                         </div><!-- #footer-right .widget-area -->
                     
                    <?php endif; ?>
                </div>
                
            </div>

        </div><!-- /.container -->
        <div class="secondary-footer text-center">
            <?php do_action( 'pixkit_credits' ); ?>
            <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'pixkit' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'pixkit' ), 'WordPress' ); ?></a>
            <span class="sep"> | </span>
            <?php printf( __( 'Theme: %1$s by %2$s.', 'pixkit' ), 'pixkit', '<a href="http://pixlandmedia.com/" rel="designer">PixLand Media</a>' ); ?>
        </div>
    </footer><!-- #colophon .site-footer -->
</div><!-- #sb-site -->
 
<?php wp_footer(); ?>
 
</body>
</html>