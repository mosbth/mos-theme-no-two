<?php
/**
 * Mos Theme No Two functions and definitions
 *
 */

if(!defined('__DIR__')) {
  define('__DIR__', dirname(__FILE__));
}

/*error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly
*/

/**
 * Load translation
 */
//load_theme_textdomain('mos');



/**
 * Add existing filters.
 */
add_filter( 'the_content', 'make_clickable', 12); // After shortcodes are executed



/**
 * Add image size
 */
//add_image_size('thumbnail-small', 80, 80, true);
//add_image_size('thumbnail-gallery', 120, 120, true);



/**
 * init_sessions()
 *
 * @uses session_id()
 * @uses session_start()
 */
function init_sessions() {
    if (!session_id()) {
        session_start();
    }
}
add_action('init', 'init_sessions');



/**
 * Enable menues.
 */
register_nav_menus( array(
	'navbar1' => 'Navigation bar within header',
  'navbar2' => 'Navigation bar standard',
  'navbar3' => 'Navigation in left sidebar',
) );


/**
 * Remove admin menues.
 *
 */
function mos_remove_admin_menus() {
  global $mos_content;
  if(isset($mos_content['admin-menu-remove'])) {
    foreach($mos_content['admin-menu-remove'] as $val) {
      remove_menu_page($val);
    }
  }
}
add_action( 'admin_menu', 'mos_remove_admin_menus' );


// Leave <div> untouched in wysiwyg editor
add_filter('tiny_mce_before_init', function($init) {
  $init['extended_valid_elements'] = 'div[*]';
  //$init['theme_advanced_blockformats'] = 'p,address,pre,code,h1,h2,h3,h4,h5,h6';
  //$init['theme_advanced_disable'] = 'forecolor';
  return $init;
});




/**
 * Include customizations for this theme and create the mos object and its interface
 *
 */
include(__DIR__ . "/src/CMos/CMos.php");

$mos_customize_file = __DIR__ . '/config/config.php';
$mos_customize_file_default = __DIR__ . '/config/config_default.php';

if (is_file($mos_customize_file)) {
  $mos = new CMos(include $mos_customize_file); 
} else {
  $mos = new CMos(require $mos_customize_file_default); 
}


// Remove automatic paragraphs
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop', 100 );

add_filter( 'no_texturize_shortcodes', function ($shortcodes) {
    $shortcodes[] = 'agallery';
    return $shortcodes;
}

);

// Register shortcodes
add_shortcode('image','mos_shortcode_image');
add_shortcode('agallery','mos_shortcode_gallery');
add_shortcode('youtube','mos_shortcode_youtube');
add_shortcode('title','mos_shortcode_title');
add_shortcode('jplayer','mos_shortcode_jplayer');
add_shortcode('instagram','mos_shortcode_instagram');
add_shortcode('soundcloud','mos_shortcode_soundcloud');
add_shortcode('jgallery','mos_shortcode_jgallery');
add_shortcode('jgalleryimg','mos_shortcode_jgalleryimg');



/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

  register_sidebar( array(
    'name'          => 'Sidebar 1',
    'id'            => 'sidebar-1',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );



/**
 * Add filter for slug to body class.
 */
add_filter('post_class', 'mos_slug2bodyclass');
add_filter('body_class', 'mos_slug2bodyclass');



/**
 * Do jump to top of page when clicking on <!--more--> tag.
 *
 */
function mos_remove_more_jump_link($link) { 
  $offset = strpos($link, '#more-');
  if ($offset) {
    $end = strpos($link, '"',$offset);
  }
  if ($end) {
    $link = substr_replace($link, '', $offset, $end-$offset);
  }
  return $link;
}
add_filter('the_content_more_link', 'mos_remove_more_jump_link');




/**
 * Add extra elements, specific for each page.
 *
 *
 */
function mos_add_content_for($id)
{
  global $post; 

  $keys = array(
    $id . $post->ID,
    $id . mos_page_type(),    
    $id . $post->post_name,
  ); 

  foreach($keys as $key) {
    if(mos_has($key, false)) {
      return mos_get($key);
    }
  }
}



/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function mos_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<div class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyeleven' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Redigera', 'mos' ), '<span class="edit-link">', '</span>' ); ?></p>
	</div>
	<?php
			break;
		default :
	?>
	<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s den %2$s <span class="says">says:</span>', 'mos' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s den %2$s', 'mos' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Din kommentar väntar på moderering.', 'mos' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php //comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Svara <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				<?php edit_comment_link( __( 'Redigera', 'mos' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
  </div>
	<?php
			break;
	endswitch;
}



/**
 * Get a (list of) blogpost with content.
 *
 * @param int $posts the number of posts to get.
 * @return string with html for the blogpost/list.
 */
function mos_get_blog_post($posts=1) {
  global $post, $more, $mos_content;

  $postOrig = $post;
  $blogpost = null;
  $my_query = new WP_Query(array('posts_per_page' => 1));

  while ($my_query->have_posts()) {
    $my_query->the_post();
    $more = 0;
    $blogpost  = "<h2>" . get_the_title() . "</h2>";
    $blogpost .= apply_filters('the_content', get_the_content(mos_get('read-more-text'))); 
  }

  $post = $postOrig;
  return $blogpost;
}



/**
 * Shortcode for video, [avideo]
 */
function mos_video_shortcode($atts, $content = null) {
  global $mos_content;
  extract( shortcode_atts( array(
  'id' => '',
  'class' => '',
  'caption' => '',
  ), $atts ) );

  // check if there is a pre-defined size
  if(is_array($mos_content['img-sizes'])) {
    if($width) {
      $width = array_key_exists($width, $mos_content['img-sizes']) ? $mos_content['img-sizes'][$width] : $width;
    }
    if($height) {
      $height = array_key_exists($height, $mos_content['img-sizes']) ? $mos_content['img-sizes'][$height] : $height;
    }
  }

  $is = empty($id) ? null : " id='{$id}'";
  //$class = empty($class) ? null : " class='{$class}'";
  $output = "<div{$id}{$class}></div>";
  $caption = !empty($caption) ? "<p class='figcaption'>{$caption}</p>" : null;

  $output = <<<EOD
<div id="jp_container_1" class="jp-video {$class}">
  <div class="jp-type-single">
    <div id="jquery_jplayer_1" class="jp-jplayer"></div>
    <div class="jp-gui">
      <div class="jp-interface">
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </div>
        </div>
        <div class="jp-current-time"></div>
        <div class="jp-duration"></div>
        <div class="jp-controls-holder">
          <ul class="jp-controls">
            <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
            <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
            <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
            <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
            <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
            <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
          </ul>
          <div class="jp-volume-bar">
            <div class="jp-volume-bar-value"></div>
          </div>
          <ul class="jp-toggles">
            <li><a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full screen</a></li>
            <li><a href="javascript:;" class="jp-restore-screen" tabindex="1" title="restore screen">restore screen</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="jp-no-solution">
      <span>Update Required</span>
      To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
    </div>
  </div>
{$caption}
</div>

EOD;

  return  $output;
}
add_shortcode('avideo','mos_video_shortcode');



/**
 * Shortcode for slideshow, [aslideshow]
 */
function mos_slideshow_shortcode($atts, $content = null) {
  global $mos_content;
  extract( shortcode_atts( array(
  'id' => '',
  'class' => '',
  'width' => '',
  'height' => '',
  ), $atts ) );

  $is = empty($id) ? null : " id='{$id}'";
  $class = empty($class) ? null : " class='{$class}'";
  $output = "<div{$id}{$class}><div class='mos_slideshow_items'>" . do_shortcode($content) . "</div></div>";

  return $output;
}
add_shortcode('aslideshow','mos_slideshow_shortcode');



/**
 * Dump a variable.
 *
 * @param mixed $a the variable to output.
 */
function dump($a) {
  echo "<pre>" . print_r($a, 1) . "</pre>";
}
