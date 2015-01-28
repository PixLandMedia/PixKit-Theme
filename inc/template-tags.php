<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package PixKit
 * @since PixKit 0.1.0
 */




if ( ! function_exists( 'pixkit_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since PixKit 0.1.0
 */
function pixkit_posted_on() {
    
    printf( '<ul class="list-inline byline">' );

    printf( __( '
                    <li>
                        by 
                        <span class="author vcard">
                            <a class="url fn n" href="%5$s" title="%6$s" rel="author">
                            %7$s
                            </a>
                        </span>
                    </li>
                    <li>
                        <i class="fa fa-clock-o"></i>
                        <a href="%1$s" title="%2$s" rel="bookmark">
                            <time class="entry-date" datetime="%3$s" pubdate>%4$s</time>
                        </a>
                    </li>
                ', 'pixkit' ),
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'View all posts by %s', 'pixkit' ), get_the_author() ) ),
        esc_html( get_the_author() )
    );

    if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) :
    
        printf( '
            <li>
                <span class="comments-link">
                    <i class="fa fa-comments"></i>
        ' );
        
        comments_popup_link( __( 'Leave a comment', 'pixkit' ), __( '1 Comment', 'pixkit' ), __( '% Comments', 'pixkit' ) );
        
        printf( '
                </span>
            </li>
        ' );
        
    endif;

    printf( '</ul>' );
}
endif;
 




/**
 * Returns true if a blog has more than 1 category
 *
 * @since PixKit 0.1.0
 */
function pixkit_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
        // Create an array of all the categories that are attached to posts
        $all_the_cool_cats = get_categories( array(
            'hide_empty' => 1,
        ) );
 
        // Count the number of categories that are attached to the posts
        $all_the_cool_cats = count( $all_the_cool_cats );
 
        set_transient( 'all_the_cool_cats', $all_the_cool_cats );
    }
 
    if ( '1' != $all_the_cool_cats ) {
        // This blog has more than 1 category so pixkit_categorized_blog should return true
        return true;
    } else {
        // This blog has only 1 category so pixkit_categorized_blog should return false
        return false;
    }
}
 



/**
 * Flush out the transients used in pixkit_categorized_blog
 *
 * @since PixKit 0.1.0
 */
function pixkit_category_transient_flusher() {
    // Like, beat it. Dig?
    delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'pixkit_category_transient_flusher' );
add_action( 'save_post', 'pixkit_category_transient_flusher' );







if ( ! function_exists( 'pixkit_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since PixKit 0.1.0
 */
function pixkit_content_nav( $nav_id ) {
    global $wp_query, $post;
 
    // Don't print empty markup on single pages if there's nowhere to navigate.
    if ( is_single() ) {
        $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
        $next = get_adjacent_post( false, '', false );
 
        if ( ! $next && ! $previous )
            return;
    }
 
    // Don't print empty markup in archives if there's only one page.
    if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
        return;
 
    $nav_class = 'site-navigation paging-navigation clearfix';
    if ( is_single() )
        $nav_class = 'site-navigation post-navigation clearfix';
 
    ?>
    <nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
        <h1 class="assistive-text"><?php _e( 'Post navigation', 'pixkit' ); ?></h1>
 
    <?php if ( is_single() ) : // navigation links for single posts ?>
 
        <?php previous_post_link( '<div class="nav-previous pull-left">%link</div>', '<i class="fa fa-chevron-left fa-inverse"></i> %title' ); ?>
        <?php next_post_link( '<div class="nav-next pull-right">%link</div>', '%title <i class="fa fa-chevron-right fa-inverse"></i>' ); ?>
 
    <?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
 
        <?php if ( get_next_posts_link() ) : ?>
        <div class="nav-previous pull-left"><?php next_posts_link( __( '<i class="fa fa-chevron-left fa-inverse"></i> Older posts', 'pixkit' ) ); ?></div>
        <?php endif; ?>
 
        <?php if ( get_previous_posts_link() ) : ?>
        <div class="nav-next pull-right"><?php previous_posts_link( __( 'Newer posts <i class="fa fa-chevron-right fa-inverse"></i>', 'pixkit' ) ); ?></div>
        <?php endif; ?>
 
    <?php endif; ?>
 
    </nav><!-- #<?php echo $nav_id; ?> -->
    <?php
}
endif; // pixkit_content_nav



if ( ! function_exists( 'pixkit_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since PixKit 0.1.0
 */
function pixkit_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'pixkit' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'pixkit' ), ' ' ); ?></p>
    <?php
            break;
        default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment">
            <footer>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="comment-author vcard">
                            <?php echo get_avatar( $comment, 40 ); ?>
                            <?php printf( __( '%s <span class="says">says:</span>', 'pixkit' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                        </div><!-- .comment-author .vcard -->
                        <?php if ( $comment->comment_approved == '0' ) : ?>
                            <em><?php _e( 'Your comment is awaiting moderation.', 'pixkit' ); ?></em>
                            <br />
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-6 text-right">
                        <div class="comment-meta commentmetadata">
                            <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
                            <?php
                                /* translators: 1: date, 2: time */
                                printf( __( '%1$s at %2$s', 'pixkit' ), get_comment_date(), get_comment_time() ); ?>
                            </time></a>
                            <?php edit_comment_link( __( '(Edit)', 'pixkit' ), ' ' );
                            ?>
                        </div><!-- .comment-meta .commentmetadata -->
                    </div>
                </div>
 
            </footer>
 
            <div class="comment-content"><?php comment_text(); ?></div>
 
            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div><!-- .reply -->
        </article><!-- #comment-## -->
 
    <?php
            break;
    endswitch;
}
endif; // ends check for pixkit_comment()




