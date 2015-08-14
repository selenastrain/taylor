<?php if ( has_nav_menu( 'subsidiary' ) ) : ?>

  <nav <?php hybrid_attr( 'menu', 'subsidiary' ); ?>>
    
    <?php wp_nav_menu(
      array(
        'theme_location'  => 'subsidiary',
        'container'       => '',
        'menu_id'         => 'menu-subsidiary-items',
        'menu_class'      => 'menu-items',
        'depth'           => 1,
        'fallback_cb'     => '',
        'items_wrap'      => '<div class="wrap"><ul id="%s" class="%s">%s</ul></div>'
      )
    ); ?>

  </nav><!-- .subsidiary-navigation -->

<?php endif; ?>