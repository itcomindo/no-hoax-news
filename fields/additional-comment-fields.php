<?php
/*
Plugin Name: Add Extra Comment Fields
Plugin URI: http://pmg.co/category/wordpress
Description: An example of how to add, save and edit extra comment fields in WordPress
Version: n/a
Author: Christopher Davis
Author URI: http://pmg.co/people/chris
License: MIT
*/

// UNUSE GK DIPAKE

/**
 * Add our field to the comment form
 */
add_action( 'comment_form_logged_in_after', 'pmg_comment_tut_fields' );
add_action( 'comment_form_after_fields', 'pmg_comment_tut_fields' );
function pmg_comment_tut_fields()
{
	?>
	<p class="comment-form-title">
		<label for="pmg_comment_title"><?php _e( 'Captcha' ); ?></label>
		<input type="text" name="pmg_comment_title" id="pmg_comment_title" />
	</p>
	<?php
}



/**
 * Add the title to our admin area, for editing, etc
 */
add_action( 'add_meta_boxes_comment', 'pmg_comment_tut_add_meta_box' );
function pmg_comment_tut_add_meta_box()
{
	add_meta_box( 'pmg-comment-title', __( 'Comment Title' ), 'pmg_comment_tut_meta_box_cb', 'comment', 'normal', 'high' );
}

function pmg_comment_tut_meta_box_cb( $comment )
{
	$title = get_comment_meta( $comment->comment_ID, 'pmg_comment_title', true );
	wp_nonce_field( 'pmg_comment_update', 'pmg_comment_update', false );
	?>
	<p>
		<label for="pmg_comment_title"><?php _e( 'Comment Title' ); ?></label>
		<input type="text" name="pmg_comment_title" value="<?php echo esc_attr( $title ); ?>" class="widefat" />
	</p>
	<?php
}

/**
 * Save our comment (from the admin area)
 */
add_action( 'edit_comment', 'pmg_comment_tut_edit_comment' );
function pmg_comment_tut_edit_comment( $comment_id )
{
	if( ! isset( $_POST['pmg_comment_update'] ) || ! wp_verify_nonce( $_POST['pmg_comment_update'], 'pmg_comment_update' ) ) return;
	if( isset( $_POST['pmg_comment_title'] ) )
		update_comment_meta( $comment_id, 'pmg_comment_title', esc_attr( $_POST['pmg_comment_title'] ) );
}

/**
 * Save our title (from the front end)
 */
add_action( 'comment_post', 'pmg_comment_tut_insert_comment', 10, 1 );
function pmg_comment_tut_insert_comment( $comment_id )
{
	if( isset( $_POST['pmg_comment_title'] ) )
		update_comment_meta( $comment_id, 'pmg_comment_title', esc_attr( $_POST['pmg_comment_title'] ) );
}


/**
 * add our headline to the comment text
 * Hook in way late to avoid colliding with default
 * WordPress comment text filters
 */
add_filter( 'comment_text', 'pmg_comment_tut_add_title_to_text', 99, 2 );
function pmg_comment_tut_add_title_to_text( $text, $comment )
{
	if( is_admin() ) return $text;
	if( $title = get_comment_meta( $comment->comment_ID, 'pmg_comment_title', true ) )
	{
		$title = '<h3>' . esc_attr( $title ) . '</h3>';
		$text = $title . $text;
	}
	return $text;
}