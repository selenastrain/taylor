<article id="post-0" class="entry error-404 not-found">
  
  <header class="entry-header">
    <h1 class="entry-title"><?php _e( 'Nothing found', 'taylor' ); ?></h1>
  </header><!-- .entry-header -->

  <div <?php hybrid_attr( 'entry-content' ); ?>>
    <?php echo wpautop( __( 'It looks like nothing was found at this location. Maybe try a search or one of the links below?', 'taylor' ) ); ?>

    <?php get_search_form(); ?>

    <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

  </div><!-- .entry-content -->
  
</article><!-- .entry -->