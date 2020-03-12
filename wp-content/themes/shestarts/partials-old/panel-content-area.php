<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $post;

/**
 * Template part for panel content area
 *
 * @package shespeaksincode
 */

$content = get_sub_field('content');
//$width = get_sub_field('content_width');
$justify = get_sub_field('justify');

$classes = '';

//$classes .= (!empty($width) && $width != 'default') ? ' width-'.$width : '';
$classes .= $justify ? '' : ' no-justify';
if(!empty($content)) :
?>
<section class="flex-panel panel-content-area<?php echo $classes; ?>">
  <div class="max-width">

        <div class="entry-content wysiwyg">
          <?php echo $content; ?>
        </div>

  </div><!-- /container -->
</section>
<?php endif;