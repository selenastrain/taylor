<article <?php hybrid_attr( 'post' ); ?>>
  
  <?php if ( is_singular( get_post_type() ) ) : // If viewing a single post ?>

    <?php if ( get_option( 'show_avatars' ) ) : // If avatars are enabled ?>

      <header class="entry-header">
        <?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
      </header><!-- .entry-header -->

    <?php endif; // End avatars check ?>

    <div <?php hybrid_attr( 'entry-content' ); ?>>
      <?php the_content(); ?>
      <?php wp_link_pages(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
      <div class="entry-meta">
        <?php hybrid_post_format_link(); ?>
        <span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
        <time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
        <?php hybrid_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'taylor' ) ) ); ?>
        <?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'taylor' ) ) ); ?>
        <?php edit_post_link( __( 'Edit', 'taylor' ), '<span class="edit-link">', '</span>' ); ?>
      </div>
    </footer><!-- .entry-footer -->

  <?php else : // If not viewing a single post ?>

    <?php if ( get_option( 'show_avatars' ) ) : // If avatars are enabled ?>

      <header class="entry-header">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_avatar( get_the_author_meta( 'email' ) ); ?></a>
      </header><!-- .entry-header -->

    <?php endif; // End avatars check ?>

    <div <?php hybrid_attr( 'entry-content' ); ?>>
      <?php the_content(); ?>
    </div><!-- .entry-content -->

    <?php if ( !get_option( 'show_avatars' ) ) : // If avatars are not enabled ?>

      <footer class="entry-footer">
        <div class="entry-meta">
          <?php hybrid_post_format_link(); ?>
          <time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
          <a href="<?php the_permalink(); ?>" class="entry-permalink" rel="bookmark" itemprop="url"><?php _e( 'Permalink', 'taylor' ); ?></a>
          <?php comments_popup_link( __( 'Leave a comment', 'taylor' ), __( '1 Comment', 'taylor' ), __( '% Comments', 'taylor' ), 'comments-link', '' ); ?>
          <?php edit_post_link( __( 'Edit', 'taylor' ), '<span class="edit-link">', '</span>' ); ?>
        </div>
      </footer><!-- .entry-footer -->

    <?php endif; // End avatars check ?>

  <?php endif; // End single post check ?>

</article><!-- .entry -->
