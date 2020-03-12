<?php
/**
 * Template part for testimonial content
 *
 * @package shespeaksincode
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header>
    <div class="line"></div>
    <?php
    if(isset($src) && $src == 'single') {
      echo '<h1 class="sub dark">' . get_the_title() . '</h1>';
    }
    else {
      echo '<h2 class="sub dark">' . get_the_title() . '</h2>';
    }
    ?>
  </header>
  <?php the_content(); ?>
</article>