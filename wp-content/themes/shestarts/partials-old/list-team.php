<?php
/**
 * Template part for team list
 *
 * @package shespeaksincode
 */


if(get_field('team_members')) : ?>

<section class="panel-list-team panel-image-content-split">
  <div class="max-width">

    <?php
    while( has_sub_field('team_members') ) :

      get_template_part('partials/card-team');

    endwhile;
    ?>
  </div><!-- /max-width -->
</section>

<?php endif;