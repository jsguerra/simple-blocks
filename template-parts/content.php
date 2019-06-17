<?php
/**
 * The template used for displaying standard post content
 *
 * @package Atomic Blocks
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('has-wide-image'); ?>>
	<div class="post-content">

    <?php if ( is_home() && has_post_thumbnail() ) { ?>
      <figure class="featured-image">
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'atomic-blocks-featured-image' ); ?></a>
      </figure>
    <?php } elseif ( is_home() && !has_post_thumbnail() ) { ?>
      <figure class="featured-image">
        <a href="<?php the_permalink(); ?>" rel="bookmark">
          <img width="1200" height="800" src="<?php bloginfo('stylesheet_directory'); ?>/images/theodoris-katis-default.jpg" class="wp-post-image" alt="<?php the_title(); ?>" srcset="<?php bloginfo('stylesheet_directory'); ?>/images/theodoris-katis-default-1200x800.jpg 1200w, <?php bloginfo('stylesheet_directory'); ?>/images/theodoris-katis-default-300x200.jpg 300w, <?php bloginfo('stylesheet_directory'); ?>/images/theodoris-katis-default-768x512.jpg 768w, <?php bloginfo('stylesheet_directory'); ?>/images/theodoris-katis-default-1024x683.jpg 1024w, <?php bloginfo('stylesheet_directory'); ?>/images/theodoris-katis-default-1400x933.jpg 1400w" sizes="(max-width: 1200px) 100vw, 1200px" />
        </a>
      </figure>
    <?php } ?>

		<header class="entry-header">
			<?php if( is_single() ) { ?>	
				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>
			<?php } else { ?>
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
			<?php } ?>
			
			<?php atomic_blocks_post_byline(); ?>
		</header>

    <?php if ( has_post_thumbnail() && !is_home() ) { ?>
      <figure class="featured-image">
        <?php the_post_thumbnail( 'atomic-blocks-featured-image' ); ?>
      </figure>
    <?php } ?>

		<div class="entry-content">

			<?php
            // Get the content
            if ( is_home() || is_category() || is_archive() ) {
                the_excerpt();
            } else {
                the_content( esc_html__( 'Read More', 'atomic-blocks' ) );
            }

			// Post pagination links
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'atomic-blocks' ),
				'after'  => '</div>',
			) );

			if ( is_single()  ) {
	        	// Post meta sidebar
	        	get_template_part( 'template-parts/content-meta' );

				// Author profile box
        atomic_blocks_author_box();
        
        // Add Jetpack Related Posts
        if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
          echo do_shortcode( '[jetpack-related-posts]' );
        }

				// Post navigations
				if( is_single() ) {
					if( get_next_post() || get_previous_post() ) {
						atomic_blocks_post_navs();
				} }

				// Comments template
				comments_template();
			} ?>
		</div><!-- .entry-content -->
	</div><!-- .post-content-->

</article><!-- #post-## -->
