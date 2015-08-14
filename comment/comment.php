<li <?php hybrid_attr( 'comment' ); ?>>
  
  <article>
    <header class="comment-header">
      <?php echo get_avatar( $comment ); ?>
      <div class="comment-meta">
        <cite <?php hybrid_attr( 'comment-author' ); ?>><?php comment_author_link(); ?></cite><br />
        <time <?php hybrid_attr( 'comment-published' ); ?>><?php printf( __( '%s ago', 'taylor' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></time>
        <a <?php hybrid_attr( 'comment-permalink' ); ?>><?php _e( 'Permalink', 'taylor' ); ?></a>
        <?php edit_comment_link(); ?>
      </div>
    </header><!-- .comment-header -->

    <div <?php hybrid_attr( 'comment-content' ); ?>>
      <?php comment_text(); ?>
    </div><!-- .comment-content -->

    <?php hybrid_comment_reply_link(); ?>
  </article>

<?php // No closing </li> is needed. WordPress knows where to add it ?>