<?php
    if(get_field('social_media','option')) :
        echo '<ul class="social-bar">';
        while(has_sub_field('social_media','option')) : ?>
        <li>
          <a href="<?php the_sub_field('sm_social_link','option'); ?>" target="_blank"><i class="fab fa-<?php the_sub_field('sm_social_site','option'); ?>"></i></a>
        </li>
        <?php endwhile;
        echo '</ul><!-- /social-bar -->';
      endif; ?>