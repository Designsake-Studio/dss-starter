<section class="page-content blog-content journal-intro">
  <div class="max-width-xs">
    <h1 class="entry-title sub-line">Search Results</h1>
    <div class="intro-content">
      <p class="lead">We couldn't find anything for the search phrase "<?php echo get_search_query(); ?>." Why don't you try again?</p>
      <?php get_search_form();

      get_template_part( 'partials/_social-media' ); ?>
    </div>
  </div>
</section>