<?php

$img = get_sub_field('headshot');
$name = get_sub_field('name');
$role = get_sub_field('role');
$certs = get_sub_field('certifications');
$bio = get_sub_field('bio');
?>

<div class="card-team card-split">
  <div class="img-wrap">
    <?php if(!empty($img)) { ?> <img src="<?php echo $img['sizes']['alt_med']; ?>" class="img" alt="<?php echo alt($img); ?>" /><?php } ?>
  </div><!-- /img-wrap -->
  <div class="content-wrap">
    <header>

       <?php
       if(!empty($img)) { ?> <img src="<?php echo $img['sizes']['medium']; ?>" class="img mobile-img" alt="<?php echo alt($img); ?>" /><?php }
       echo '<div class="headings">';
      if(!empty($name)) {
        echo '<h2 class="header">'.$name.'</h2>';
      }
      if(!empty($role)) {
        echo '<h4 class="sub dark">'.$role.'</h4>';
      }
      if(!empty($certs)) {
        echo '<h5 class="sub">'.$certs.'</h5>';
      }
      echo '</div>';
      ?>
    </header>
    <div class="content">

     <?php
      if(!empty($bio)) {
        echo '<div class="text-wrap text-justify wysiwyg">'.$bio.'</div>';
      }
      ?>
      <div class="line"></div>
    </div><!-- /content -->
  </div>
</div>