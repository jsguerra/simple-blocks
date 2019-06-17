<?php
/**
 * @package Atomic Blocks Child Theme
 */

/**
 * Load the parent and child theme styles
 */
function atomic_blocks_parent_theme_style() {

	// Parent theme styles
	wp_enqueue_style( 'atomic-blocks-style', get_template_directory_uri(). '/style.css' );

	// Child theme styles
  wp_enqueue_style( 'atomic-blocks-child-style', get_stylesheet_directory_uri(). '/style.css' );
  
  // Child theme js
  wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/main.min.js', array ( 'jquery' ), 1.1, true);
}
add_action( 'wp_enqueue_scripts', 'atomic_blocks_parent_theme_style' );

// Override the Byline
function atomic_blocks_post_byline() { ?>
	<?php
		// Get the post author
		global $post;
		$author_id = $post->post_author;
	?>
	<p class="entry-byline">
    <?php if ( is_home() ) { ?>
      <span class="entry-byline-date"><?php echo 'Published on '.get_the_date(); ?></span>
    <?php } else { ?>
      <!-- Create an avatar link -->
      <a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'Posts by %s', 'atomic-blocks' ), get_the_author() ) ); ?>">
        <?php echo get_avatar( $author_id, apply_filters( 'atomic_blocks_author_bio_avatar', 44 ) ); ?>
      </a>
  
      <!-- Create an author post link -->
      <a class="entry-byline-author" href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>">
        <?php echo esc_html( 'By ' . get_the_author_meta( 'display_name', $author_id ) ); ?>
      </a>
      <span class="entry-byline-on"><?php esc_html_e( 'on', 'atomic-blocks' ); ?></span>
      <span class="entry-byline-date"><?php echo get_the_date(); ?></span>
    <?php } ?>
	</p>
<?php }

// Override Parent Excerpt Length
remove_filter( 'excerpt_length', 'atomic_blocks_search_excerpt_length' );

// Add new custom excerpt length
add_filter('excerpt_length', 'new_excerpt_length');
function new_excerpt_length($length) {
  return 30;
}

// Remove Related Posts from bottom of your posts
function jetpackme_remove_rp() {
  if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
      $jprp     = Jetpack_RelatedPosts::init();
      $callback = array( $jprp, 'filter_add_target_to_dom' );

      remove_filter( 'the_content', $callback, 40 );
  }
}
add_action( 'wp', 'jetpackme_remove_rp', 20 );