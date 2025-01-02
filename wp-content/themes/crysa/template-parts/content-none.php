<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Crysa
 */

?>

<div class="page-content">

	<h4 class="page-title"><?php esc_html_e( 'Nothing Found', 'crysa' ); ?></h4>
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p>
			<?php
			printf(
				wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'crysa' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				),
				esc_url( admin_url( 'post-new.php' ) )
			);
			?>
		</p>

	<?php elseif ( is_search() ) : ?>

		<p><?php esc_html_e( 'Sorry, We could not find any results for your search. You can give it another try through the search form below. Please try again with some different keywords.', 'crysa' ); ?></p>
		<?php echo get_search_form(); ?>

	<?php else : ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'crysa' ); ?></p>
		<?php echo get_search_form(); ?>

	<?php endif; ?>

</div>