<?php
/**
 * Template part for career card
 *
 * @package shespeaksincode
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }
global $post;

?>

<div class="card-post card-career card-split no-post-thumb">
  <div class="content-wrap">
    <header>
      <div class="line"></div>
      <!-- <p class="sub">Posted on: <time datetime="<?php the_time('Y-m-d'); ?>" itemprop="datePublished"><?php the_time('M d, Y'); ?></time></p> -->
      <h3 class="header"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
    </header>

    <div class="content">
      <div class="text-wrap text-justify">
        <p><?php echo niche_excerpt(40); ?></p>
      </div><!-- /text-wrap -->
      <footer>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark" class="text-link">Read More</a>
      </footer>
    </div><!-- /content -->

  </div><!-- /content-wrap -->
</div><!-- /card-post -->
