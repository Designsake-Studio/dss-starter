<?php

/**
 *  Print Pretty var dump
 */
function debug($bug) {
	echo '<pre>';
		print_r($bug);
	echo '</pre>';
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
 *	<?php echo she_excerpt(25); ?>
*/

function she_excerpt($limit) {
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
 * Output content with custom lengths
 * Usage: If you want to output an excerpt of 25 words
 *	<?php echo she_content(25); ?>
*/
function she_content($limit) {
	 $content = explode(' ', get_the_content(), $limit);
	 if (count($content)>=$limit) {
	 array_pop($content);
	 $content = implode(" ",$content).'...';
	 } else {
	 $content = implode(" ",$content);
	 }
	 $content = preg_replace('/[.+]/','', $content);
	 $content = apply_filters('the_content', $content);
	 $content = str_replace(']]>', ']]&gt;', $content);
	 return $content;
}


/**
 * Allows the passing of variables to a template file when loaded.  Should help
 * to remove the need for unnecessarily putting data into the $_GLOBAL scope.
 *
 * Usage:
 * // This example will expose two variables to the loaded template:
 * // $type = 'Foo', and $url = '//example.com/test.jpg'
 * she_load_template( 'partials/map.php', array(
 *   'type' => 'Foo',
 *   'url'  => '//example.com/test.jpg'
 * ) );
 *
 * @param string $filename Name of the file that you would typically pass to `get_template_part()` **WITH THE EXTENSION**
 * @param array $data array of information to be utilized in the template
 * @return null  This echos out the template, does not return it
 */
function she_load_template( $filename, $data = array() ) {
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