<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Taylor
 */
?>

    </div><!-- #primary -->

    <?php hybrid_get_sidebar( 'primary' ); // Loads the sidebar/primary.php template ?>

	</div><!-- #content -->

  <?php hybrid_get_sidebar( 'subsidiary' ); // Loads the sidebar/subsidiary.php template ?>



	<footer <?php hybrid_attr( 'footer' ); ?>>

		<div class="wrap">

      <?php hybrid_get_menu( 'subsidiary' ); // Loads the menu/subsidiary.php template ?>

      <p class="credit">
        <?php printf(
          // Translators: 1 is current year, 2 is site name/link, 3 is WordPress name/link and 4 is theme name/link
          __( 'Copyright &#169; %1$s %2$s. Powered by %3$s and %4$s.', 'taylor'),
          date_i18n( 'Y' ),
          hybrid_get_site_link(),
          hybrid_get_wp_link(),
          hybrid_get_theme_link()
        ); ?>
      </p>

    </div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
