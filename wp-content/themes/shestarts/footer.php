<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shespeaksincode
 */

?>

  </div><!-- #content -->




<footer class="site-footer">

  <?php //gravity_form( 1, true, true, false, '', true ); ?>


  <p class="copyright">
    <?php echo sprintf( __( '%1$s %2$s %3$s'), '&copy;', esc_html(get_bloginfo('name')), date('Y'));  ?>
  </p>



  <?php //get_template_part( 'partials/_social-media' ); ?>



</footer><!-- footer -->

</div><!-- .body -->

<?php wp_footer(); ?>

</body>
</html>