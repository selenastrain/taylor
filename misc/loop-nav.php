<?php 
  if ( is_singular( 'post' ) ) : // If viewing a single post page 

    the_post_navigation(
      array(
        'prev_text' => __( 'Previous Post: %title', 'selena' ),
        'next_text' => __( 'Next Post: %title', 'selena' )
      )
    ); 

  elseif ( is_home() || is_archive() || is_search() ) : // If viewing the blog, an archive or search results 

    the_posts_pagination(
      array(
        'mid_size'  => 2,
        'prev_text' => __( '&larr; Previous', 'selena' ),
        'next_text' => __( 'Next &rarr;', 'selena' )
      ) 
    ); 

  endif; // End check for type of page being viewed 
