<?php
/**
 * Mos Theme No Two functions and definitions, customized items per site
 *
 */

/**
 * Set content data
 */
$imgFullWidth = 670;
$imgFullHeight = 525;

$mos_current_url = mos_get_current_url();
$mos_content_array = array(

  'config-class' => 'mos-default',
  'webroot' => realpath(__DIR__ . '/../../../../../'),
  'stylesheet-all' => get_stylesheet_directory_uri().'/style/style.php', // development
  //'stylesheet_all' => get_stylesheet_direcstytory_uri().'/style.css', // production
  //'stylesheet_print' => get_stylesheet_directory_uri().'/print.css',
  'stylesheets' => array(
    //'/css/midnight-black/jplayer.midnight.black.css',
  ),
  //'google-analytics' => 'UA-xxx',
  //'site-logo' => "src='" . get_stylesheet_directory_uri() . "/img/logo.jpg' height='34' width='137'",
  'favicon' => get_stylesheet_directory_uri().'/img/favicon.png',
  //'favicon' => '/favicon.jpg',
  //'site-logo' => "<img src='" . get_stylesheet_directory_uri() . "/img/logo_40x40.png' height='40' width='40' alt='logo' />",
  'site-title' => true,
  'site-slogan' => true,
  //'site-extra' => "<img src='/img/sign.jpg' height='53' width='111' alt='' />",


  // Admin menu
  //'admin-menu-remove' => array('link-manager.php', 'tools.php', 'posts.php', 'edit-comments.php', 'edit.php'),


  // Image sizes predefined
  'img-sizes' => array(
    'w100'=>$imgFullWidth, 'w67'=>round($imgFullWidth*0.67), 'w50'=>round($imgFullWidth*0.50), 'w33'=>round($imgFullWidth*0.33), 'w25'=>round($imgFullWidth*0.25), 'wsb'=>300, 'w2'=>390, 'wslide'=>600,
    'h100'=>$imgFullHeight, 'h67'=>round($imgFullHeight*0.67), 'h50'=>round($imgFullHeight*0.50), 'h33'=>round($imgFullHeight*0.33), 'h25'=>round($imgFullHeight*0.25), 'hsb'=>150, 'hslide'=>750,
  ),


  // Meta
  'meta-description' => 'Some descriptive text about the site.',
  'meta-keywords' => false,


  // General
  'show-title-on-pages' => true,
  'show-posted-on' => false,

  // JavaScript
  'modernizer' => get_stylesheet_directory_uri() . '/js/modernizer.js',
  //'jquery' => get_stylesheet_directory_uri().'/js/jquery.min.js',
  //'jquery' => '//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js',
  /*'javascript-include' => array(
     '/js/jquery.jplayer.min.js',
     '/js/jplayer.playlist.min.js',
     get_stylesheet_directory_uri().'/js/main_lokauppi.js',
  ),*/
  'javascript-inline' => false,


  // Navbars
  'navbar1-class' => false, 
  'navbar2-class' => 'nb-plain', 
  'navbar3-class' => false, 

	
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


  // Sidebars
  'sidebar-left-enabled' => false,
  'sidebar-right-enabled' => false,
   

  // Comments
  'comments-enabled' => false,


  // Edit link at content
  'edit-link-enabled' => false,
 

	// Flash
  //'flash' 	=> "<h4>Flash</h4>",
  

	// Featured
  //'featured-first' 	=> "<h4>Featured first</h4>",
  //'featured-middle' => "<h4>Featured middle</h4>",
  //'featured-last' 	=> "<h4>Featured last</h4>",
  

	// Triptych
  //'triptych-first' 	=> "<h4>Triptych first</h4>",
  //'triptych-middle' => "<h4>Triptych middle</h4>",
  //'triptych-last' 	=> "<h4>Triptych last</h4>",


  // 404
  '404-search'   => false,
  '404-triptych' => false,


  // Footer
  'footer' 	=> 'Copyright &copy; ' . get_bloginfo('name') . ' &bull; ' . get_bloginfo('description'),
  'footer-column-one'     => "
    <nav>
      <h4>Validators</h4>
      <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance&amp;profile=css3'>Unicorn</a>
      <a href='http://validator.w3.org/checklink?uri=<?=$mos_current_url?>'>Links</a>
      <a href='http://validator.w3.org/i18n-checker/check?uri=<?=$mos_current_url?>'>i18n</a>
    </nav>
  ",
  'footer-column-two'     => '<h4>Footer column 2</h4>',
  'footer-column-three'   => '<h4>Footer column 3</h4>',
  'footer-column-four'    => '<h4>Footer column 4</h4>',
  'footer-column-five'    => null,
  'footer-column-six'     => null,
  'footer-column-seven'   => null,
  'footer-column-eight'   => null,
  'footer-column-nine'    => null,
  'footer-column-ten'     => null,
  'footer-column-eleven'  => null,
  'footer-column-twelve'  => null,


  // Development tools
  /*'development' => "<div class='development-links'><a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance&amp;profile=css3'>Unicorn</a>
      <a href='http://validator.w3.org/checklink?uri=<?=$mos_current_url?>'>Links</a>
      <a href='http://validator.w3.org/i18n-checker/check?uri=<?=$mos_current_url?>'>i18n</a></div>",
      */

);

$mos_content = &$mos_content_array;


