<article <?php hybrid_attr( 'post' ); ?>>

  <?php if ( is_singular( get_post_type() ) ) : // If viewing a single post ?>

    <header class="entry-header">

      <h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

      <div class="entry-meta">
        <span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
        <span class="sep">&mdash;</span>
        <time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
        <span class="sep">&mdash;</span>
        <?php comments_popup_link( __( 'Leave a comment', 'taylor' ), __( '1 Comment', 'taylor' ), __( '% Comments', 'taylor' ), 'comments-link', '' ); ?>
      </div><!-- .entry-meta -->

    </header><!-- .entry-header -->

    <div <?php hybrid_attr( 'entry-content' ); ?>>
      <?php the_content(); ?>
      <?php wp_link_pages(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
      <div class="entry-meta">
        <?php hybrid_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'taylor' ) ) ); ?>
        <?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'taylor' ) ) ); ?>
        <?php edit_post_link( __( 'Edit', 'taylor' ), '<span class="edit-link">', '</span>' ); ?>
      </div>
    </footer><!-- .entry-footer -->

  <?php else : // If not viewing a single post ?>

    <?php get_the_image(
      array(
        'size'    => 'taylor-full',
        'order'   => array( 'featured' ),
        'before'  => '<div class="featured-media">',
        'after'   => '</div>'
      )
    ); ?>

    <header class="entry-header">

      <?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

      <div class="entry-meta">
        <span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
        <span class="sep">&mdash;</span>
        <time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
        <span class="sep">&mdash;</span>
        <?php comments_popup_link( __( 'Leave a comment', 'taylor' ), __( '1 Comment', 'taylor' ), __( '% Comments', 'taylor' ), 'comments-link', '' ); ?>
      </div><!-- .entry-meta -->

    </header><!-- .entry-header -->

    <div <?php hybrid_attr( 'entry-content' ); ?>>
      <?php the_content(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
      <div class="entry-meta">
        <?php hybrid_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'taylor' ) ) ); ?>
        <?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'taylor' ) ) ); ?>
      </div>
    </footer><!-- .entry-footer -->

  <?php endif; // End single post check ?>

</article><!-- .entry -->
