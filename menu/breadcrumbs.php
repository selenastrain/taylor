<?php if ( function_exists( 'breadcrumb_trail' ) ) : ?>

  <?php breadcrumb_trail(
    array(
      'container'     => 'nav',
      'separator'     => '>',
      'show_on_front' => false,
      'labels'        => array(
        'browse' => __( 'You are here:', 'taylor' )
      )
    )
  ); ?>

<?php endif; ?>