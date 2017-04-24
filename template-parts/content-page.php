<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Glendale
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		    <?php if ( get_field( 'on_page_title' )){
		            echo '<h1 class="entry-title">' . get_field( 'on_page_title' ) . '</h1>';
		        } else {
		            the_title( '<h1 class="entry-title">', '</h1>' );
		        } ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			// Displays the Content Tagline at the bottom of the content on all pages
			if ( function_exists( 'glendale_content_tagline' ) ) {
			    glendale_content_tagline();
			}

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'glendale' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'glendale' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
