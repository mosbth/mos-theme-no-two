<?php
/**
 * Mos Theme No Two functions and definitions, customized items per site
 *
 */
class CMos implements ArrayAccess {

  /**
   * Properties
   *
   */
  public $data;


  /**
   * Constructor, feed it with the configuration for the site.
   *
   * @param array $config as the configuration array for this site.
   */
  public function __construct($config = array()) {
    $defaults = array(
      // Class attribute for <html> to apply specific style
      'html-class' => 'mos-default',

      // Path to webbroot
      'webroot' => realpath(__DIR__ . '/../../../../../'),

      // Meta
      'meta-description' => 'Some descriptive text about the site.',
      'meta-keywords' => 'wordpress, theme',

      // Stylesheets
      'stylesheet' => get_stylesheet_directory_uri().'/style/style.php',
      'favicon' => get_stylesheet_directory_uri().'/img/favicon.png',

      // JavaScript
      'modernizer' => get_stylesheet_directory_uri() . '/js/modernizer.js',
      'jquery' => null,
      'javascript-include' => null, // array(),
      'javascript-inline' => null,
      'google-analytics' => null, 

      // Site header
      'site-header' => null, // Define own header with custom elements.
      'site-logo' => null, //"<img src='" . get_stylesheet_directory_uri() . "/img/logo_40x40.png' height='40' width='40' alt='logo' />",
      'site-title' => true, // Use title as defined by wordpress
      'site-slogan' => true, // Use slogan as defined by wordpress
      'site-extra' => null, // Extra elements within site header.

      // Navbars
      'navbar1-class' => 'nb-plain', //nb-plain 
      'navbar2-class' => 'nb-plain', 
      'navbar3-class' => 'nb-plain', 

      // Breadcrumb
      'breadcrumb-enable' => false, 
      'breadcrumb-enable-home' => false,
      'breadcrumb-enable-single' => false,
      'breadcrumb-enable-archive' => false,
      'breadcrumb-on-home' => false, 
      'breadcrumb-start' => __('Hem'),
      'breadcrumb-start-url' => 'blogg', // ?
      'breadcrumb-delimiter' => '&raquo;',
      'breadcrumb-show-current' => false,

      // Flash
      //'flash'   => "<h4>Flash</h4>",
      
      // Featured
      //'featured-first'  => "<h4>Featured first</h4>",
      //'featured-middle' => "<h4>Featured middle</h4>",
      //'featured-last'   => "<h4>Featured last</h4>",
      
      // Triptych
      //'triptych-first'  => "<h4>Triptych first</h4>",
      //'triptych-middle' => "<h4>Triptych middle</h4>",
      //'triptych-last'   => "<h4>Triptych last</h4>",

      // General
      'show-title-on-pages' => true,
      'show-posted-on' => true,
      'display-blog-on-frontpage' => false,
      'link-blog-title' => true,
      'display-tagged-as' => true,
      'read-more-text' => 'Read more »', 
      'comments-enabled' => false,
      'edit-link-enabled' => true,
 
      // Sidebar left
      'sidebar-left-enabled' => false,
      'sidebar-left-template' => null, //'left', or custom sidebar

      // Sidebar right
      'sidebar-right-enabled' => true,
      'sidebar-right-template' => null, //'right', or custom sidebar

      // Sidebar tags & categories ('front', 'home', 'page', 'single', 'tag', 'categories')
      'sidebar-display-categories'  => array('home', 'single', 'tag', 'category', 'archive'),
      'sidebar-display-tags'        => array('home', 'single', 'tag', 'category', 'archive'),

      // Title on category widget
      'category-widget-title' => null,
      'tag-widget-title' => null,
      'widget-tag-options' => array('smallest' => 14, 'largest' => 22, 'unit' => 'px', ),

      // Site footer
      'footer-extra' => null, // "<img class='bg2' src='{$bg2}' alt=''/>",
      'footer-custom' => null,
      'footer'  => 'Copyright &copy; ' . get_bloginfo('name') . ' &bull; ' . get_bloginfo('description'),
      //'footer-column-one'     => null,
      //'footer-column-two'     => '<h4>Footer column 2</h4>',
      //'footer-column-three'   => '<h4>Footer column 3</h4>',
      //'footer-column-four'    => '<h4>Footer column 4</h4>',

      // 404
      '404-search'   => false,
      '404-triptych' => false,

      // Admin menu
      //'admin-menu-remove' => array('link-manager.php', 'tools.php', 'posts.php', 'edit-comments.php', 'edit.php'),

    );
    $this->data = array_merge($defaults, $config);
  }


  /**
   * Implementing ArrayAccess for $this->data
   */
  public function offsetSet($offset, $value) { if (is_null($offset)) { $this->data[] = $value; } else { $this->data[$offset] = $value; }}
  public function offsetExists($offset) { return isset($this->data[$offset]); }
  public function offsetUnset($offset) { unset($this->data[$offset]); }
  public function offsetGet($offset) { return isset($this->data[$offset]) ? $this->data[$offset] : null; }



  /**
   * Return content from $mos.
   *
   * @param string $key
   * @param $mixed the value of $key.
   */
  function Get($key) {
    if(isset($this->data[$key])) {
      if(is_callable($this->data[$key])) {
        return call_user_func($this->data[$key]);
      } else {
        return $this->data[$key];
      }
    }
    return null;
  }



  /**
   * Check if content is defined for area.
   *
   * @param  ... $region one or several regions to check.
   * @return boolean true if content exists for any region, else null.
   *
   */
  function Has($keys /* ... */) {
    if(is_array($keys)) {
      $regions = $keys;
    } else {
      $regions = func_get_args();
    }
    foreach($regions as $val) {
      if(!empty($this->data[$val])) {
        return true;
      }
    }
    return null;
  }



  /**
   * Return the title.
   *
   * @return string the page title.
   */
  public function GetTitle() {
    global $page, $paged;

    $title = wp_title( ' - ', false, 'right' ) . get_bloginfo( 'name' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
      $title .= " | $site_description";
    }

    // get special page type (if any)
/*    if( is_category() ) $page_type = $left_sep . 'Category' . $right_sep;
    elseif( is_tag() ) $page_type = $left_sep . 'Tag' . $right_sep;
    elseif( is_author() ) $page_type = $left_sep . 'Author' . $right_sep;
    elseif( is_archive() || is_date() ) $page_type = $left_sep . 'Archives'. $right_sep;
    else $page_type = '';
*/
    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 ) {
      $title .= ' | ' . sprintf( __( 'Sida %s', 'mos' ), max( $paged, $page ) );
    }
    
    return $title;
  }



  /**
   * Echo a breadcrumb, based on dimox_breadcrumbs()
   *
   * @param $pageTemplate to say what template is calling the method.
   */
  public function GetBreadcrumb($pageTemplate=null) {

    // Need to rewrite this test of page template.
    if($pageTemplate === null   && $this->data['breadcrumb-enable'] ||
       $pageTemplate === 'home' && $this->data['breadcrumb-enable-home'] ||
       $pageTemplate === 'archive' && $this->data['breadcrumb-enable-archive'] ||
       $pageTemplate === 'single' && $this->data['breadcrumb-enable-single']) {
      ; // pass
    } else {
      return;
    }
    
    $showOnHome   = $this->data['breadcrumb-on-home'];
    $home         = $this->data['breadcrumb-start'];
    $delimiter    = $this->data['breadcrumb-delimiter'];
    $showCurrent  = $this->data['breadcrumb-show-current'];
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
   
    global $post;
    $homeLink = get_bloginfo('url') . '/' . $this->data['breadcrumb-start-url'];
   
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
   * Return time when the post was posted.
   *
   * @return string the date when the post was posted.
   */
  public function PostedOn() {
  /*  printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'twentyeleven' ),
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
   * Get the page type.
   *
   * @return string as the current page type.
   */
  public function PageType() {
    if (is_home()) {
      return 'home';
    }
    elseif (is_front_page()) {
      return 'front';
    }
    elseif (is_page()) {
      return 'page';
    }
    else if (is_single()) {
      return 'single';
    }
    else if (is_tag()) {
      return 'tag';
    }
    else if (is_category()) {
      return 'category';
    }
    else if (is_archive()) {
      return 'archive';
    }
  }


}


/**
 * Functions for use in theme templates.
 */
function mos_get($key) { global $mos; return $mos->Get($key); }
function mos_has($keys /* ... */) { global $mos; return $mos->Has(func_get_args()); }
function mos_get_title() { global $mos; return $mos->GetTitle(); }
function mos_get_breadcrumb() { global $mos; return $mos->GetBreadcrumb(); }
function mos_posted_on() { global $mos; return $mos->PostedOn(); }
function mos_page_type() { global $mos; return $mos->PageType(); }


