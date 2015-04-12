<?php
/**
 * Template filters
 *
 * @package PixKit
 * @since PixKit 0.1.0
 */


add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

/**
 * Add custom read more link button
 *
 * @since PixKit 0.1.0
 */
add_filter( 'the_content_more_link', 'pixkit_modify_read_more_link' );
function pixkit_modify_read_more_link() {
    return '<a class="more-link btn btn-primary" href="' . get_permalink() . '">' . __( 'Read more', 'pixkit' ) . '</a>';
}



/**
 * Add custom css class to pagination links
 *
 * @since PixKit 0.1.0
 */
add_filter('next_posts_link_attributes', 'pixkit_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'pixkit_posts_link_attributes');
function pixkit_posts_link_attributes() {
    return 'class="btn btn-primary"';
}



/**
 * Add custom css class to single post pagination links
 *
 * @since PixKit 0.1.0
 */
add_filter('next_post_link', 'pixkit_post_link_attributes');
add_filter('previous_post_link', 'pixkit_post_link_attributes');
function pixkit_post_link_attributes($output) {
    $code = 'class="btn btn-primary"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}


/**
 * Add custom comment form fields
 *
 * @since PixKit 0.1.0
 */
add_filter( 'comment_form_default_fields', 'pixkit_comment_form_fields' );
function pixkit_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();
    
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
    
    $fields   =  array(
        'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name', 'pixkit' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
        'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email', 'pixkit' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
        'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website', 'pixkit' ) . '</label> ' .
                    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>',
    );
    
    return $fields;
}


/**
 * Add custom comment form
 *
 * @since PixKit 0.1.0
 */
add_filter( 'comment_form_defaults', 'pixkit_comment_form' );
function pixkit_comment_form( $args ) {
    $args['comment_field'] = '<div class="form-group comment-form-comment">
            <label for="comment">' . _x( 'Comment', 'pixkit' ) . '</label> 
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
    return $args;
}



/**
 * Add custom submit button to comment form
 *
 * @since PixKit 0.1.0
 */
add_action('comment_form', 'pixkit_comment_button' );
function pixkit_comment_button() {
    echo '<button class="btn btn-primary" type="submit">' . __( 'Submit', 'pixkit' ) . '</button>';
}


/**
 * Add post-tumbnail to theme
 *
 * @since PixKit 0.1.2
 */
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}


