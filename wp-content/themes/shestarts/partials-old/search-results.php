<?php
global $wp_query;
$total_results = $wp_query->found_posts;
?>

<section class="page-content blog-content journal-intro">
  <div class="max-width-xs">
    <h1 class="entry-title sub-line">Search Results</h1>
    <div class="intro-content">
      <p class="lead">We found <?php echo $total_results; ?> result(s) for "<?php echo get_search_query(); ?>"</p>
      <?php
      get_search_form();

      get_template_part( 'partials/_social-media' );
      ?>
    </div><!-- /intro-content -->
  </div>
</section>

<section class="panel-post-feed panel-image-content-split">
  <div class="max-width-xs">

    <?php
    while ( have_posts() ) : the_post();

      $post_type = get_post_type();
    ?>

<div class="search-card">



  <div class="content-wrap">
    <header>


      <?php
      if($post_type == 'career') {
        echo '<a href="/careers/" class="btn-secondary btn btn-xs" rel="bookmark">Careers</a>';
      }
      elseif($post_type == 'testimonial') {
        echo '<a href="/testimonials/" class="btn-secondary btn btn-xs" rel="bookmark">Praise</a>';
      }
      elseif($post_type == 'post') { ?>
        <a href="/journal/" class="btn-secondary btn btn-xs" rel="bookmark">Journal</a>
      <?php
      }

      ?>
      <h3 class="header"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
    </header>
    <div class="content">
      <div class="text-wrap text-justify">
        <?php
         if($post_type == 'post') { ?>
        <p class="sub"><time datetime="<?php the_time('Y-m-d'); ?>" itemprop="datePublished"><?php the_time('M d, Y'); ?></time></p>
      <?php
      } ?>
        <p><?php echo niche_excerpt(40); ?></p>
      </div><!-- /text-wrap -->

      <footer>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark" class="text-link">Read More</a>
        <div class="line"></div>
      </footer>
    </div><!-- /content -->
  </div><!-- /content-wrap -->
</div><!-- /card-post -->

<?php
    endwhile;

    if ( function_exists('wp_bootstrap_pagination') )
              wp_bootstrap_pagination();
    ?>
  </div><!-- /max-width -->
</section>