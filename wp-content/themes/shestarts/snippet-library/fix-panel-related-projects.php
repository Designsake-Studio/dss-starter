<?php

$related = get_field('related_projects');

if(empty($related)) :

  return;

else :

$posts = $related; ?>
<section class="panel-related-projects">
  <header class="max-width" style="text-align: center;">
    <h3 class="sub-line">Related Projects</h3>
  </header>
  <section class="grid-projects post-grid">
    <div class="wrapper">

    <?php foreach( $posts as $post):
      setup_postdata($post); get_template_part('partials/card-project');

    endforeach;

   wp_reset_postdata();  ?>
 </div>
  </section>
</section>
<?php endif;