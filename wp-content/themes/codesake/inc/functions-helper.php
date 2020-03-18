<?php

/* 1.1 DEBUG / DUMP'N DIE
/––––––––––––––––––––––––*/
function debug($var) {
  echo '<pre>'.var_dump($var).'</pre>';
}
function dd($var) {
  echo '<pre>'.var_dump($var).'</pre>';
  die();
}


/**
 * Fool proof Image Alt Tags
 * Usage: echo alt($image);
 */
function alt($image) {
  $alt = $image['alt'];
  $title = $image['title'];
  $caption = $image['caption'];

  $sr = (!empty($alt)) ? $alt : '';
  if(!empty($alt)) {
    $sr = $alt;
  }
  elseif(!empty($caption)) {
    $sr = $caption;
  }
  elseif(!empty($title)) {
    $sr = $title;
  }
  else {
    $sr = 'She Speaks in Code';
  }
  return $sr;
}

/**
 * Output excerpts with custom lengths
 * Usage: If you want to output an excerpt of 25 words
 *	<?php echo codesake_excerpt(25); ?>
*/

function codesake_excerpt($limit) {
	 $excerpt = explode(' ', get_the_excerpt(), $limit);
	 if (count($excerpt)>=$limit) {
	 array_pop($excerpt);
	 $excerpt = implode(" ",$excerpt).'...';
	 } else {
	 $excerpt = implode(" ",$excerpt);
	 }
	 $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	 return $excerpt;
}



/**
 * Allows the passing of variables to a template file when loaded.  Should help
 * to remove the need for unnecessarily putting data into the $_GLOBAL scope.
 *
 * Usage:
 * // This example will expose two variables to the loaded template:
 * // $type = 'Foo', and $url = '//example.com/test.jpg'
 * codesake_load_template( 'partials/map.php', array(
 *   'type' => 'Foo',
 *   'url'  => '//example.com/test.jpg'
 * ) );
 *
 * @param string $filename Name of the file that you would typically pass to `get_template_part()` **WITH THE EXTENSION**
 * @param array $data array of information to be utilized in the template
 * @return null  This echos out the template, does not return it
 */
function codesake_load_template( $filename, $data = array() ) {
  $file = locate_template( $filename );
  if( $file ){
    extract( $data );
    include( $file );
  }
}


/**
 * ALLOWS YOU TO DISPLAY BACKUP IMAGES IF IMG IS NEEDED AND NONE EXISTS
 * Backup images can be managed on the "Global Settings" Options Page
 *
 * Usage Case 1: If you want to output a medium sized image as backup
 *  <img src="<?php echo backup_img('medium'); ?>" />
 * Usage Case 2: Output img url as background image
 *  <div style="background-image: url('<?php echo backup_img('full_screen'); ?>');"></div>
 *
 */

function backup_img($size) {
  $images = get_field('backup_images','option' );
  $rand = array_rand($images,1);
  $bu_img = $images[$rand]['sizes'][$size];
  return $bu_img;
}


// add page slug to body class
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function custom_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

add_action('init', 'custom_pagination'); // Add our HTML5 Pagination



/* 1.8 SLUGIFY
/––––––––––––––––––––––––*/
// from wpseed theme
// create slugs
// example: "LORÖM %< 123+ ipsüm!" will be "loroem-123-ipsuem-"
function slugify($text) {
  // trim (remove whitespace before/after string)
  $text = trim($text, '-');
  // replace umlaute
  $text = preg_replace (['/ä/','/ö/','/ü/','/ß/'] , ['ae','oe','ue','ss'], $text);
  // replace special symbols
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
  // set lowercase
  $text = strtolower($text);
  return $text;
 }

 /* 2.2 SANITIZER
/––––––––––––––––––––––––*/
// from wpseed theme
function sanitize_output($buffer) {
  $search = ['/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s'];
  $replace = ['>', '<', '\\1'];
  $buffer = preg_replace($search, $replace, $buffer);
  return $buffer;
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}