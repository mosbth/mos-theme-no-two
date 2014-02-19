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
      
      // Localise
      'lang' => 'en',

      // Path to webbroot
      'webroot' => realpath(__DIR__ . '/../../../../../../'),
      //'webroot' => realpath(dirname(__FILE__) . '/../../../../../../'),

      // Meta
      'meta-description' => 'Some descriptive text about the site.',
      'meta-keywords' => 'wordpress, theme',

      // Stylesheets
      'stylesheet' => get_stylesheet_directory_uri().'/style/style.php',
      'stylesheets' => array(),
      'favicon' => get_stylesheet_directory_uri().'/img/favicon.png',

      // JavaScript
      'modernizer' => get_stylesheet_directory_uri() . '/js/modernizer.js',
      'jquery' => null,
      'javascript-include' => array(),
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
      'show-title-on-posts' => true,
      'display-blog-on-frontpage' => false,
      'link-blog-title' => true,
      'display-tagged-as' => true,
      'read-more-text' => __('Read more »', 'mos'), 
      'comments-enabled' => false,
      'leave-reply-link-enabled' => false,
      'edit-link-enabled' => true,
      'share-link-enabled' => false,
 
      // Format the text when post is posted
      'show-posted-on' => true,
      'format-posted-on' => 1,
      'posted-on-display-author' => true,

      // Sidebar left
      'sidebar-left-enabled' => false,
      'sidebar-left-template' => null, //'left', or custom sidebar

      // Sidebar right
      'sidebar-right-enabled' => true,
      'sidebar-right-template' => null, //'right', or custom sidebar

      // Display content in sidebar, use page id or page type
      //'sidebar-page-21' => 134,
      //'sidebar-page-last-21' => 134,
      //'sidebar-page-home'         => 271,
      //'sidebar-page-last-home'    => 1120,

      // Sidebar tags & categories ('front', 'home', 'page', 'single', 'tag', 'categories')
      'sidebar-display-categories'  => array('home', 'single', 'tag', 'category', 'archive', 'search'),
      'sidebar-display-tags'        => array('home', 'single', 'tag', 'category', 'archive', 'search'),
      'sidebar-display-searchform'  => array('home', 'single', 'tag', 'category', 'archive'),

      // Sidebar recent posts
      'sidebar-display-recent-posts' => array('home', 'single', 'tag', 'category', 'archive'),
      'recent-posts-args' => array( 'numberposts' => '7' ),

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

      // Admin menu
      //'admin-menu-remove' => array('link-manager.php', 'tools.php', 'posts.php', 'edit-comments.php', 'edit.php'),

      // Image sizes predefined for img.php and /image
      'column-width' => 30,
      'gutter-width' => 10,
      'columns' => 24,
      'img-sizes' => array(),

      // Sizes of wordpress scaled images, width, height, crop (should be part of theme settings)
      /*'thumbnail' => array(150, 150, 1),
      'medium' => array(251, 250, 0),
      'large' => array(510, 511, 0),
      'wp-image-sizes' => array('thumbnail', 'medium', 'large'),*/

      // Shortcode jplayer defaults
      'shortcode-jplayer' => false,
      'jplayer-path' => get_stylesheet_directory_uri() . '/src/jplayer/jplayer',
      'jplayer-src' => 'jquery.jplayer.min.js',
      'jplayer-jquery' => '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js',
      'jplayer-skin-path' => get_stylesheet_directory_uri() . '/src/jplayer/skin',
      'jplayer-skin' => 'blue.monday',
      'jplayer-view-path' => get_stylesheet_directory() . '/src/jplayer/view',
      'jplayer-view' => 'jplayer-default.tpl.php',
      'jplayer-js-path' => get_stylesheet_directory_uri() . '/src/jplayer/js',
      'jplayer-js' => 'jplayer-default.js',
      'jplayer-playlist' => false,
      'jplayer-playlist-path' => get_stylesheet_directory_uri() . '/src/jplayer/jplayer/add-on',
      'jplayer-playlist-js' => 'jplayer.playlist.min.js',


    );
    $this->data = array_merge($defaults, $config);

    // Create image sizes according to grid, c1 to c . 'columns'
    for($i = 1; $i <= $this->data['columns']; $i++) {
      $this->data['img-sizes']['c' . $i] = $i * ($this->data['column-width'] + $this->data['gutter-width']) - $this->data['gutter-width'];
    }

    // Include stylesheet for jPlayer if its in use
    if($this->data['shortcode-jplayer']) {
      $this->data['stylesheets'][] = $this->data['jplayer-skin-path'] . '/' . $this->data['jplayer-skin'] . '/jplayer.' . $this->data['jplayer-skin'] . '.css';
    }

    // Update wp image sizes
    /*foreach($this->data['wp-image-sizes'] as $val) {
      update_option($val . '_size_w', $this->data[$val][0]);
      update_option($val . '_size_h', $this->data[$val][s]);
      update_option($val . '_crop', $this->data[$val][2]);
    }*/

    load_theme_textdomain( 'mos', get_template_directory() . '/languages' );

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
    $author = " <a href='" . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . "' title='" . esc_attr(sprintf( __( 'Show all posts made by %s', 'mos' ), get_the_author())) . "'>" . get_the_author() . "</a>";
    $permalink = esc_url(get_permalink());
    $year   = esc_html(get_the_date('Y'));
    $month  = esc_html(get_the_date('n'));
    $mnt    = esc_html(get_the_date('M'));
    $day    = esc_html(get_the_date('j'));
    $hour   = esc_html(get_the_date('H'));
    $min    = esc_html(get_the_date('i'));

    if($this->data['lang'] == 'sv') {
      $months = array('januari', 'februari', 'mars', 'april', 'maj', 'juni', 'juli', 'augusti', 'september', 'oktober', 'november', 'december');
      $days = array(1,2,21,22,31);
      $e = in_array($day, $days) ? 'a' : 'e';
    }
    else {
      $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'Oktober', 'November', 'December');
    }

    switch($this->data['format-posted-on'] . $this->data['lang']) {
      case '1sv': return "Den {$day}:{$e} {$months[$month-1]} anno $year" . ($this->data['posted-on-display-author'] ? " av $author" : null); break;
      case '1en': return __('Published', 'mos') . " {$months[$month-1]} {$day}, $year" . ($this->data['posted-on-display-author'] ? " by $author" : null); break;

      case '2sv':
      case '2en':  return "{$day} {$mnt} $year"; break;
    }
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
    else if (is_search()) {
      return 'search';
    }
    else if (is_404()) {
      return '404';
    }
  }



  /**
   * Calculate width and height based on predefifined widths and heights.
   *
   * @param int $width the width if any.
   * @param int $height the height if any.
   * @param int $aspectRatio the aspect ratio if any.
   * @return array with $width and $height.
   */
  protected function CalculateWidthAndHeight($width, $height, $aspectRatio) {
    if(is_array($this->data['img-sizes'])) {
      if($width) {
        $width = array_key_exists($width, $this->data['img-sizes']) ? $this->data['img-sizes'][$width] : $width;
      }
      if($height) {
        $height = array_key_exists($height, $this->data['img-sizes']) ? $this->data['img-sizes'][$height] : $height;
      }
      else if($aspectRatio) {
        switch($aspectRatio) {
          case '4:3':   $height = round($width / (4/3)); break; 
          case '16:9':  $height = round($width / (16/9)); break; 

          case '16:10': 
          default:      $height = round($width / (16/10));
        }
      }
    }
    return array($width, $height);
  }



  /**
   * Shortcode for images, [image]
   *
   * @param array $atts attributes for shortcode.
   * @param string $content the content of the shortcode, if any.
   * @return string as the result from the shortcode operation.
   */
  public function ShortcodeImage($atts, $content = null) {
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
      'aspect_ratio' => false,
    ), $atts ) );

    $srcOrig = $src;
    $file = $this->data['webroot'] . $src;

    if (file_exists($file)) {

      list($width, $height) = $this->CalculateWidthAndHeight($width, $height, $aspect_ratio);

      if(is_array($this->data['img-sizes'])) {
        if($width) {
          $width = array_key_exists($width, $this->data['img-sizes']) ? $this->data['img-sizes'][$width] : $width;
        }
        if($height) {
          $height = array_key_exists($height, $this->data['img-sizes']) ? $this->data['img-sizes'][$height] : $height;
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
      echo $file;
      var_dump(file_exists($file));
      echo $this->data['webroot'];
      trigger_error("'$src' image not found", E_USER_WARNING);
      return '';
    }
  }



  /**
   * Shortcode for gallery, [agallery]
   *
   * @param array $atts attributes for shortcode.
   * @param string $content the content of the shortcode, if any.
   * @return string as the result from the shortcode operation.
   */
  public function ShortcodeGallery($atts, $content = null) {
    global $mos_content;

    extract( shortcode_atts( array(
      'src' => '',
      'rows' => 3,
      'cols' => 4,
      'class' => '',
      'caption' => '',
      'single_to_next' => true, // Click image when cols=1 & rows=1 takes to next
    ), $atts ) );

    // Check environment
    $src = rtrim($src, '/');
    $dir = $this->data['webroot'] . $src;
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
    $isSingle = ($cols == 1 && $rows == 1) ? true : false;
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
        $pages .= " <span class='selected'>{$i}</span>";
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
      'cols1' => 'w=612&amp;h=500',
      'cols2' => 'w=266&amp;h=260&amp;crop-to-fit',
      'cols3' => 'w=177&amp;h=220&amp;crop-to-fit',
      'cols4' => 'w=133&amp;h=152&amp;crop-to-fit',
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

        // Where to navigate when clicking an image
        if ($single_to_next) {
          $navNext = ($currentPage != $nrPages) ? $currentPage + 1 : 0; 
          $href = "href='?page={$navNext}&amp;cols=1&amp;rows=1'";
        }
        else {
          $href = ($cols == 'cols1') ? "href='{$src}/{$key}'" : "href='?page={$i}&amp;cols=1&amp;rows=1'";
        }
        $images .= "\n<div class='container'><a {$href}{$title}><img src='{$imgSrc}?{$size[$cols]}' alt='' /></a></div>";
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

    //return do_shortcode('[raw]'.$output.'[/raw]');
    return $output;
  }





  /**
   * Shortcode for youtube, [ayoutube]
   *
   * @param array $atts attributes for shortcode.
   * @param string $content the content of the shortcode, if any.
   * @return string as the result from the shortcode operation.
   */
  function ShortcodeYouTube($atts, $content = null) {
    extract( shortcode_atts( array(
    'id' => '',
    'width' => '',
    'height' => '',
    'class' => '',
    'caption' => '',
    'resolution' => null, // Obsolete
    'aspect_ratio' => '16:9',
    ), $atts ) );

    $aspect_ratio = $resolution ? $resolution : $aspect_ratio; // Remove when resolution is removed.
    list($width, $height) = $this->CalculateWidthAndHeight($width, $height, $aspect_ratio);

    $class = empty($class) ? null : " class='{$class}'";
    $width = empty($width) ? null : " width='{$width}'";
    $height = empty($height) ? null : " height='{$height}'";
    $caption = empty($caption) ? null : "<figcaption>{$caption}</figcaption>";

    $output = "<figure{$class}><iframe src='http://www.youtube.com/embed/{$id}' frameborder='0'{$width}{$height}></iframe>{$caption}</figure>";
    return $output;
  }



  /**
   * Shortcode for a blogpost title, [title]
   *
   * @param array $atts attributes for shortcode.
   * @param string $content the content of the shortcode, if any.
   * @return string as the result from the shortcode operation.
   */
  function ShortcodeTitle($atts, $content = null) {
    global $post;

    $title = get_the_title($post->ID);

    if($this->PageType() != 'single' && $this['link-blog-title']) {
      $title = "<a href='" . get_permalink($post->ID) . "'>$title</a>";
    }

    return "<h1 class='wp-post-title'>$title</h1>";
  }



  /**
   * Shortcode for jplayer
   *
   * @param array $atts attributes for shortcode.
   * @param string $content the content of the shortcode, if any.
   * @return string as the result from the shortcode operation.
   */
  public function ShortcodeJPlayer($atts, $content = null) {
    extract( shortcode_atts( array(
    'id' => '',
    'class' => '',
    'path' => $this->data['jplayer-path'],
    'src' => $this->data['jplayer-src'],
    'jquery' => $this->data['jplayer-jquery'],
    'view_path' => $this->data['jplayer-view-path'],
    'view' => $this->data['jplayer-view'],
    'js_path' => $this->data['jplayer-js-path'],
    'js' => $this->data['jplayer-js'],
    'playlist' => $this->data['jplayer-playlist'],
    'playlist_path' => $this->data['jplayer-playlist-path'],
    'playlist_js' => $this->data['jplayer-playlist-js'],
    ), $atts ) );

    $this->data['jquery'] = $this->data['jquery'] ? $this->data['jquery'] : $jquery;
    $this->data['javascript-include'][] = $path . '/' . $src;
    if($playlist) {
      $this->data['javascript-include'][] = $playlist_path . '/' . $playlist_js;
    }
    $this->data['javascript-include'][] = $js_path . '/' . $js;

    $view = $view_path . '/' . $view;
    if(is_file($view)) {
      $output = file_get_contents($view);
    } 
    else {
      trigger_error("jPlayer '$view' view not found", E_USER_WARNING);
      return '';
    }

    return $output;
  }



  /**
   * Add page/post slug to body class.
   *
   * @param array $atts attributes for shortcode.
   * @param string $content the content of the shortcode, if any.
   * @return string as the result from the shortcode operation.
   */
  function AddSlugToBodyClass($classes)  {
    global $post;
  
    if(!is_home()) {
      $classes[] = $post->post_name; 
    }
  
    return array_unique($classes);
  }



}



/**
 * Functions for use in theme templates from functions.php.
 */
function mos_get($key) { global $mos; return $mos->Get($key); }
function mos_has($keys /* ... */) { global $mos; return $mos->Has(func_get_args()); }
function mos_get_title() { global $mos; return $mos->GetTitle(); }
function mos_get_breadcrumb() { global $mos; return $mos->GetBreadcrumb(); }
function mos_posted_on() { global $mos; return $mos->PostedOn(); }
function mos_page_type() { global $mos; return $mos->PageType(); }
function mos_shortcode_image($atts, $content = null) { global $mos; return $mos->ShortcodeImage($atts, $content); }
function mos_shortcode_gallery($atts, $content = null) { global $mos; return $mos->ShortcodeGallery($atts, $content); }
function mos_shortcode_youtube($atts, $content = null) { global $mos; return $mos->ShortcodeYouTube($atts, $content); }
function mos_shortcode_title($atts, $content = null) { global $mos; return $mos->ShortcodeTitle($atts, $content); }
function mos_shortcode_jplayer($atts, $content = null) { global $mos; return $mos->ShortcodeJPlayer($atts, $content); }
function mos_slug2bodyclass($classes) { global $mos; return $mos->AddSlugToBodyClass($classes); }


