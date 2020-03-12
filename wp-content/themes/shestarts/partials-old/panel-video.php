<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $post;

/**
 * Template part for panel video
 *
 * @package shespeaksincode
 */


?>
<section class="flex-panel panel-video">
  <div class="max-width">
    <?php
    niche_load_template( 'partials/card-video.php', array(
    'src' => 'sub'

  ) );

    ?>
  </div><!-- /container -->
</section>
