<?php
/**
 * Mos Theme No Two functions and definitions
 *
 */

/**
 * Include customizations for this theme
 *
 */
$mos_customize_file = __DIR__ . '/config.php';
if(is_file($mos_customize_file)) {
  include($mos_customize_file); 
}


/**
 * Return content to template page.
 *
 */
function mos_get_content($region) {
  global $mos_content_array;
  if(isset($mos_content_array[$region])) {
    return $mos_content_array[$region];
  } else {
    return __('No content for this region.');
  }  
}


/**
 * Check if content is defined for area.
 *
 * @param string ... $region one or severla regions to check.
 * @returns boolean true if content exists for any region, else false.
 *
 */
function mos_has_content($region) {
  global $mos_content_array;
  $regions = func_get_args($region);
  foreach($regions as $val) {
  	if(isset($mos_content_array[$region]) && !empty($mos_content_array[$region])) {
  		return true;
  	}
  }
  return false;
}


/**
 * Return the title.
 *
 */
function mos_get_title() {
	global $page, $paged;

	$title = wp_title( '|', false, 'right' ) . bloginfo( 'name' );

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
 */
function mos_breadcrumb() {
 	global $mos_content_array;
 	
 	if(!$mos_content_array['breadcrumb-enable']) {
 	  return;
 	}
 	
  $showOnHome 	= $mos_content_array['breadcrumb-on-home'];
  $home 				= $mos_content_array['breadcrumb-start'];
  $delimiter 		= $mos_content_array['breadcrumb-delimiter'];
  $showCurrent 	= $mos_content_array['breadcrumb-show-current'];
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
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
