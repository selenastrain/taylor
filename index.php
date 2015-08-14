<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Taylor
 */

get_header(); ?>

	<main <?php hybrid_attr( 'content' ); ?>>

		<?php if ( is_archive() ) : ?>
			
			<?php locate_template( array( 'misc/loop-meta.php' ), true ); ?>

		<?php endif; ?>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : ?>

				<?php the_post(); ?>

				<?php hybrid_get_content_template(); ?>

				<?php if ( is_singular() ) : ?>

					<?php comments_template( '', true ); ?>

				<?php endif; ?>

			<?php endwhile; ?>

			<?php locate_template( array( 'misc/loop-nav.php' ), true ); ?>

		<?php else : ?>

			<?php locate_template( array( 'content/error.php' ), true ); ?>

		<?php endif; ?>

	</main><!-- #main -->
	
<?php get_footer(); ?>
