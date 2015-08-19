<article <?php hybrid_attr( 'post' ); ?>>
  
  <?php
    get_the_image(
      array(
        'size'          => 'taylor-full',
        'split_content' => true,
        'scan_raw'      => true,
        'scan'          => true,
        'order'         => array( 'scan_raw', 'scan', 'featured', 'attachment' )
      )
    );
  ?>

  <?php if ( is_singular( get_post_type() ) ) : // If viewing a single post ?>

    <header class="entry-header">

      <h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

      <div class="entry-meta">
        <?php hybrid_post_format_link(); ?>
        <span class="sep">&mdash;</span>
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
    </footer><!-- .entry-footer -->

  <?php else : // If not viewing a single post ?>

    <header class="entry-header">

      <?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

      <div class="entry-meta">
        <?php hybrid_post_format_link(); ?>
        <span class="sep">&mdash;</span>
        <span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
        <span class="sep">&mdash;</span>
        <time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
        <span class="sep">&mdash;</span>
        <?php comments_popup_link( __( 'Leave a comment', 'taylor' ), __( '1 Comment', 'taylor' ), __( '% Comments', 'taylor' ), 'comments-link', '' ); ?>
      </div><!-- .entry-meta -->

    </header><!-- .entry-header -->

    <div <?php hybrid_attr( 'entry-summary' ); ?>>
      <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

    <footer class="entry-footer">
      <?php edit_post_link( __( 'Edit', 'taylor' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->

  <?php endif; // End single post check ?>

</article><!-- .entry -->