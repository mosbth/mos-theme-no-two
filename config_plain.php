<?php
/**
 * Mos Theme No Two functions and definitions, customized items per site
 *
 */

/**
 * Set content data
 */
$mos_current_url = mos_get_current_url();
$mos_content_array = array(
  'config-class' => 'mos-plain',
  'stylesheet_all' => get_stylesheet_directory_uri().'/style.php', // development
  //'stylesheet_all' => get_stylesheet_directory_uri().'/style.css', // production
  //'stylesheet_print' => get_stylesheet_directory_uri().'/print.css',
  'modernizer' => get_stylesheet_directory_uri().'/js/modernizer.js',
  //'google-analytics' => 'the ga code',
  'favicon' => get_stylesheet_directory_uri().'/img/favicon.png',
  'site-logo' => "<img src='" . get_stylesheet_directory_uri() . "/img/logo_40x40.png' height='40' width='40' alt='logo' />",
  'site-title' => true,
  'site-slogan' => false,
  //'site-extra' => "<div>somecontent</div>",

  // General
  'show-title-on-pages' => false,

	// Navbars
	'navbar1-class' => 'nb-plain', //'nb-standard', 
	'navbar2-class' => false, //'nb-standard', 
	
	// Breadcrumb
	'breadcrumb-enable' => false, 
	'breadcrumb-on-home' => false, 
	'breadcrumb-start' => __('Hem'),
	'breadcrumb-delimiter' => '&raquo;',
	'breadcrumb-show-current' => true,

  // Sidebars
  'sidebar-left-enabled' => false,
  'sidebar-right-enabled' => false,
  'sidebar-left-content-default' => false,
  'sidebar-left-content-before' => false,
  'sidebar-left-content-after' => false,
  //'sidebar-left-content-page-2' => 115,
  
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
  
  // Footer
  'footer' 	=> 'Copyright &copy; ' . get_bloginfo('name') . ' &bull; ' . get_bloginfo('description'),
  'footer-first-col' => null,
  'footer-second-col' => null,
  'footer-third-col' => null,
  'footer-fourth-col' 	=> null,
  'footer-fifth-col' 	=> null,
  'footer-sixth-col' 	=> null,
  'footer-seventh-col' 	=> null,
  'footer-eight-col' 	=> null,
  'footer-nine-col' 	=> null,
  'footer-ten-col' 		=> null,
  'footer-eleven-col' 	=> null,
  'footer-twelve-col' 	=> null,
);

