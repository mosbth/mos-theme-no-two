<?php
/**
 * Mos Theme No Two functions and definitions
 *
 */

/**
 * Add existing filters.
 */
add_filter( 'the_content', 'make_clickable', 12); // After shortcodes are executed


/**
 * Enable menues.
 */
register_nav_menus( array(
	'navbar1' => 'Navigation bar within header',
  'navbar2' => 'Navigation bar standard',
  'navbar3' => 'Navigation in left sidebar',
) );


/**
 * Include customizations for this theme
 *
 */
$mos_customize_file = __DIR__ . '/config/config.php';
$mos_customize_file_default = __DIR__ . '/config/config_default.php';
if(is_file($mos_customize_file)) {
  include($mos_customize_file); 
} elseif(is_file($mos_customize_file_default)) {
  include($mos_customize_file_default); 
}


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


/**
 * Return content to template page.
 *
 * @param string $region
 * @param boolen $text return "No content" or null.
 */
function mos_get_content($region, $text=true) {
  global $mos_content_array;
  if(isset($mos_content_array[$region])) {
    if(is_callable($mos_content_array[$region])) {
      return call_user_func($mos_content_array[$region]);
    } else {
      return $mos_content_array[$region];
    }
  } else {
    return $text ? __('No content for this region.') : null;
  }  
}


/**
 * Check if content is defined for area.
 *
 * @param string ... $region one or severla regions to check.
 * @returns boolean true if content exists for any region, else null.
 *
 */
function mos_has_content($region) {
  global $mos_content_array;
  $regions = func_get_args();
  foreach($regions as $val) {
  	if(!empty($mos_content_array[$val])) {
  		return true;
  	}
  }
  return null;
}


/**
 * Return the title.
 *
 */
function mos_get_title() {
	global $page, $paged;

	$title = wp_title( ' - ', false, 'right' ) . get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " | $site_description";
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= ' | ' . sprintf( __( 'Sida %s', 'mos' ), max( $paged, $page ) );
	}
	
	return $title;
}

/*
function mos_get_title( $title, $sep, $seplocation ) {
    // account for $seplocation
    $left_sep = ( $seplocation != 'right' ? ' ' . $sep . ' ' : '' );
    $right_sep = ( $seplocation != 'right' ? '' : ' ' . $sep . ' ' );
 
    // get special page type (if any)
    if( is_category() ) $page_type = $left_sep . 'Category' . $right_sep;
    elseif( is_tag() ) $page_type = $left_sep . 'Tag' . $right_sep;
    elseif( is_author() ) $page_type = $left_sep . 'Author' . $right_sep;
    elseif( is_archive() || is_date() ) $page_type = $left_sep . 'Archives'. $right_sep;
    else $page_type = '';
 
    // get the page number
    if( get_query_var( 'paged' ) ) $page_num = $left_sep. get_query_var( 'paged' ) . $right_sep; // on index
    elseif( get_query_var( 'page' ) ) $page_num = $left_sep . get_query_var( 'page' ) . $right_sep; // on single
    else $page_num = '';
 
    // concoct and return title
    return get_bloginfo( 'name' ) . $page_type . $title . $page_num;
}
add_filter( 'wp_title', 'mos_get_title', 10, 3 );*/


/**
 * Return meta information on post.
 *
 */
function mos_posted_on() {
/*	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'twentyeleven' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentyeleven' ), get_the_author() ) ),
		get_the_author()
  ); */
  $user = "<a href='" . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . "' title='" . esc_attr(sprintf( __( 'Visa alla poster av %s', 'mos' ), get_the_author())) . "'>" . get_the_author() . "</a>";
  $permalink = esc_url(get_permalink());
  $year = esc_html(get_the_date('Y'));
  $month = esc_html(get_the_date('n'));
  $day = esc_html(get_the_date('j'));
  $months = array('januari', 'februari', 'mars', 'april', 'maj', 'juni', 'juli', 'augusti', 'september',
    'oktober', 'november', 'december');
  $days = array(1,2,21,22,31);
  $e = in_array($day, $days) ? 'a' : 'e';
  return "Den {$day}:{$e} {$months[$month-1]} anno $year av $user";
}


/**
 * Create a breadcrumb, based on dimox_breadcrumbs()
 *
 * @param $pageTemplate to say what template is calling the method.
 */
function mos_breadcrumb($pageTemplate=null) {
 	global $mos_content_array;
 	
 	if($pageTemplate === null   && $mos_content_array['breadcrumb-enable'] ||
     $pageTemplate === 'home' && $mos_content_array['breadcrumb-enable-home'] ||
     $pageTemplate === 'archive' && $mos_content_array['breadcrumb-enable-archive'] ||
     $pageTemplate === 'single' && $mos_content_array['breadcrumb-enable-single']) {
    ; // pass
  } else {
    return;
  }
 	
  $showOnHome 	= $mos_content_array['breadcrumb-on-home'];
  $home 				= $mos_content_array['breadcrumb-start'];
  $delimiter 		= $mos_content_array['breadcrumb-delimiter'];
  $showCurrent 	= $mos_content_array['breadcrumb-show-current'];
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url') . '/' . $mos_content_array['breadcrumb-start-url'];
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome) echo '<ul class="breadcrumb"><li><a href="' . $homeLink . '">' . $home . '</a><li></ul>';
 
  } else {
 
    echo '<ul class="breadcrumb"><li><a href="' . $homeLink . '">' . $home . '</a></li> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, true, ' ' . $delimiter . ' '));
      echo $before . single_cat_title('', false) . $after;
 
    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a><li> ' . $delimiter . ' ';
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'sökresultat för "' . get_search_query() . '"' . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'taggad som "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'artiklar postade av ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</ul>';
  }
} 


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
						printf( __( '%1$s den %2$s <span class="says">säger:</span>', 'mos' ),
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
 * Get URL to current page.
 */
function mos_get_current_url() {
  $url = "http";
  $url .= (@$_SERVER["HTTPS"] == "on") ? 's' : '';
  $url .= "://";
  $serverPort = ($_SERVER["SERVER_PORT"] == "80") ? '' :
    (($_SERVER["SERVER_PORT"] == 443 && @$_SERVER["HTTPS"] == "on") ? '' : ":{$_SERVER['SERVER_PORT']}");
  $url .= $_SERVER["SERVER_NAME"] . $serverPort . htmlspecialchars($_SERVER["REQUEST_URI"]);
  return $url;
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
    $blogpost .= apply_filters('the_content', get_the_content(mos_get_content('read-more-text'))); 
  }

  $post = $postOrig;
  return $blogpost;
}



/**
 * Shortcode for audio, [aaudio]
 */
function mos_audio_shortcode($atts, $content = null) {
  global $mos_content;
  extract( shortcode_atts( array(
  'id' => '',
  'class' => '',
  ), $atts ) );

  // check if there is a pre-defined  size
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

  $output = <<<EOD
<div id="jquery_jplayer_2" class="jp-jplayer"></div>
<div id="jp_container_2" class="jp-audio {$class}">
  <div class="jp-type-playlist">
    <div class="jp-gui jp-interface">
      <ul class="jp-controls">
        <li><a href="javascript:;" class="jp-previous" tabindex="1">previous</a></li>
        <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
        <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
        <li><a href="javascript:;" class="jp-next" tabindex="1">next</a></li>
        <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
      </ul>
      <div class="jp-progress">
        <div class="jp-seek-bar">
          <div class="jp-play-bar"></div>
        </div>
      </div>
      <div class="jp-time-holder">
        <div class="jp-current-time"></div>
        <div class="jp-duration"></div>
      </div>
    </div>
      <div class="jp-playlist">
        <ul>
          <li></li> <!-- Empty <li> so your HTML conforms with the W3C spec -->
        </ul>
      </div>
    <div class="jp-no-solution">
      <span>Update Required</span>
      To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
    </div>
  </div>
</div>

EOD;

  return  $output;
}
add_shortcode('aaudio','mos_audio_shortcode');


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
 * Shortcode for youtube, [ayoutube]
 */
function mos_youtube_shortcode($atts, $content = null) {
  global $mos_content;
  extract( shortcode_atts( array(
  'id' => '',
  'width' => '',
  'height' => '',
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

  $class = empty($class) ? null : " class='{$class}'";
  $width = empty($width) ? null : " width='{$width}'";
  $height = empty($height) ? null : " height='{$height}'";
  $caption = empty($caption) ? null : "<figcaption>{$caption}</figcaption>";

  $output = "<figure{$class}><iframe src='http://www.youtube.com/embed/{$id}' frameborder='0'{$width}{$height}></iframe>{$caption}</figure>";

  //$output = "<figure{$class}><a href='{$srcOrig}'><img {$src}{$alt}{$width}{$height}{$class} /></a>{$caption}</figure>";
  return $output;
}
add_shortcode('ayoutube','mos_youtube_shortcode');


/**
 * Shortcode for images, [image]
 */
function mos_image_shortcode($atts, $content = null) {
  global $mos_content;
  extract( shortcode_atts( array(
  'src' => '',
  'alt' => '',
  'width' => '',
  'height' => '',
  'class' => '',
  'caption' => '',
  'resize' => false,
  'crop' => null,
  'croptofit' => false,
  'quality' => null,
  'no_link' => false,
  ), $atts ) );
  $srcOrig = $src;
  $file=$mos_content['webroot'].$src;
  if (file_exists($file)) {

    // check if there is a pre-defined size
    if(is_array($mos_content['img-sizes'])) {
      if($width) {
        $width = array_key_exists($width, $mos_content['img-sizes']) ? $mos_content['img-sizes'][$width] : $width;
      }
      if($height) {
        $height = array_key_exists($height, $mos_content['img-sizes']) ? $mos_content['img-sizes'][$height] : $height;
      }
    }

    if($resize || $crop || $croptofit || $quality) {
      $w = empty($width) ? null : "w={$width}&amp;";
      $h = empty($height) ? null : "h={$height}&amp;";
      $crop = empty($crop) ? null : "crop={$crop}&amp;";
      $croptofit = empty($croptofit) ? null : "crop-to-fit&amp;";
      $q = empty($quality) ? null : "q={$quality}&amp;";
      $src = "/image/" . substr($src, 5);
      $src = "{$src}?{$crop}{$w}{$h}{$croptofit}{$q}";
      $src = substr($src, 0, -5);
    }

    $src = "src='{$src}'";
    $alt = " alt='{$alt}'";
    $class = empty($class) ? null : " class='{$class}'";
    $width = empty($width) ? null : " width='{$width}'";
    $height = empty($height) ? null : " height='{$height}'";
    $caption = empty($caption) ? null : "<figcaption>{$caption}</figcaption>";

    // Do not link to original image
    $ahref = "<a href='{$srcOrig}'>";
    $aclose = "</a>";
    if($no_link) {
      $ahref = $aclose = null;
    }

    $output = "<figure{$class}>{$ahref}<img {$src}{$alt}{$width}{$height}{$class} />{$aclose}{$caption}</figure>";
    return $output;
  }
  else {
    trigger_error("'$src' image not found", E_USER_WARNING);
    return '';
  }
}
add_shortcode('image','mos_image_shortcode');


/**
 * Shortcode for gallery, [agallery]
 */
function mos_gallery_shortcode($atts, $content = null) {
  global $mos_content;
  extract( shortcode_atts( array(
  'src' => '',
  'rows' => 3,
  'cols' => 4,
  'class' => '',
  'caption' => '',
  ), $atts ) );

  $src = rtrim($src, '/');
  $dir = $mos_content['webroot'].$src;
  $config = $dir . '/config.json';
  if (!is_dir($dir)) {
    trigger_error("The path '$dir' to the gallery was not found", E_USER_WARNING);
    return '';
  } else if(!is_readable($config)) {
    trigger_error("The file config.json was not found in the directory '$dir'", E_USER_WARNING);
    return '';
  }

  // Get the items from the config-file
  $items = json_decode(file_get_contents($config), true);
  if(!$items) {
    trigger_error("The config.json was empty or contained errors in {$src}", E_USER_WARNING);
    return '';
  }

  // Deal with pages
  $getPage = get_query_var('page');
  $getCols = !empty($_GET['cols']) && is_numeric($_GET['cols']) ? $_GET['cols'] : null ;
  $cols = isset($getCols) ? $getCols : $cols;
  $getRows = !empty($_GET['rows']) && is_numeric($_GET['rows']) ? $_GET['rows'] : null ;
  $rows = isset($getRows) ? $getRows : $rows; 
  $getCols = isset($getCols) ? "&amp;cols={$getCols}" : null;
  $getRows = isset($getRows) ? "&amp;rows={$getRows}" : null;
  $colrow = $getCols . $getRows;
  $max = $rows * $cols;
  $nrImages = count($items);
  $nrPages = floor((($nrImages - 1) / $max) + 1);
  $currentPage = empty($getPage) ? 1 : $getPage ;
  $pages = '';
  $i = 1;
  while($i <= $nrPages) {
    if($i == $currentPage) {
      $pages .= " <strong>{$i}</strong>";
    } else {
      $pages .= " <a href='?page={$i}{$colrow}'>{$i}</a>";
    }
    $i++;
  }

  // Keep track on the navigation options
  $navLeftMost= '&nbsp;&nbsp; ';
  $navRightMost = ' &nbsp;&nbsp;';
  $navLeft = '&nbsp; ';
  $navRight = ' &nbsp;';
  if($currentPage != 1) {
    $navLeft = "<a href='?page=" . ($currentPage-1) . "{$colrow}'>&lt;</a> ";
  }
  if($currentPage > 2) {
    $navLeftMost = "<a href='?page=1{$colrow}'>&lt;&lt;</a> ";
  }
  if($currentPage != $nrPages) {
    $navRight = " <a href='?page=" . ($currentPage+1) . "{$colrow}'>&gt;</a>";
  }
  if($currentPage < ($nrPages - 1)) {
    $navRightMost = " <a href='?page={$nrPages}{$colrow}'>&gt;&gt;</a>";
  }
  $pages = "{$navLeftMost}{$navLeft}{$pages}{$navRight}{$navRightMost}";
  //$navLeft = isset($navLeft) ? $navLeft : '&nbsp;&nbsp; &nbsp; ';
  //$navRight = isset($navRight) ? $navRight : ' &nbsp; &nbsp;&nbsp;';

  // Out with the images
  $cols = "cols{$cols}";
  $size = array(
    'cols1' => 'w=612&h=500',
    'cols2' => 'w=266&h=260&crop-to-fit',
    'cols3' => 'w=177&h=220&crop-to-fit',
    'cols4' => 'w=133&h=152&crop-to-fit',
  );
  if(!isset($size[$cols])) {
    trigger_error("Can only display cols1 to cols4, not {$cols}", E_USER_WARNING);
  }
  $offset = ($currentPage - 1) * $max;
  $i = 0;
  $images = null;
  foreach($items as $key => $val) {
    if(++$i <= $offset) continue; 
    if($i > ($max + $offset)) break;
    $file = $dir . '/' . $key;
    $titleCaption = empty($val) ? null : " &mdash; {$val}";
    $title = " title='{$i} / {$nrImages}{$titleCaption}'";
    if(!is_readable($file)) {
      trigger_error("The image '{$key}' was not found in the directory '$dir'", E_USER_WARNING);
    } else {
      $imgSrc = "/image/" . substr($src, 5) . '/' . $key;
      $caption = $val;
      $href = ($cols == 'cols1') ? "href='{$src}/{$key}'" : "href='?page={$i}&amp;cols=1&amp;rows=1'";
      $images .= "<a {$href}{$title}><div class='container'><img src='{$imgSrc}?{$size[$cols]}' alt='' /></div></a>";
    }
  }

  $output = <<<EOD
<div class='ly-gallery{$class} {$cols}'>
  <div class='ly-gallery-nav-left'>{$navLeft}</div>
  <div class='ly-gallery-content'>{$images}</div>
  <div class='ly-gallery-nav-right'>{$navRight}</div>
  <div class='ly-gallery-nav-pages'>$pages</div>
</div>
<script>
  $(function() {
    $('.ly-gallery-content .container').hover(function(){
      var title = $(this).parent().attr('title');
      $('#ly-gallery-output').html(title);
    }, function() {
      $('#ly-gallery-output').html('');
    });
 });
</script>
EOD;

  return $output;
}
add_shortcode('agallery','mos_gallery_shortcode');

