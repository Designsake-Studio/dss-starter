<nav class="cat-links">
  <div class="max-width">
    <ul class="menu js-cat-menu">
      <li class="visible-xs"><a href="/journal/">Journal</a></li>
      <li class="dropdown parent-wrap"><a href="" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Categories</a>
        <ul class="dropdown-menu">
      <?php wp_nav_menu( array('theme_location' => 'cat-menu', 'container' => false, 'items_wrap' => '%3$s')); ?></ul></li>
      <li class="search-item"><a href="#search" class="js-o-trigger"><span class="text">Search </span> <i class="fas fa-search"></i></a></li>
    </ul><!-- /menu -->
  </div>
</nav>