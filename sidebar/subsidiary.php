<?php if ( is_active_sidebar( 'subsidiary') ) : ?>

  <aside <?php hybrid_attr( 'sidebar', 'subsidiary' ); ?>>

    <div class="wrap">
      <?php dynamic_sidebar( 'subsidiary' ); ?>
    </div>

  </aside><!-- .sidebar-subsidiary -->

<?php endif; ?>