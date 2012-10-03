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
  'config-class' => 'mos-default',
  'stylesheet-all' => get_stylesheet_directory_uri().'/style.php', // development
  //'stylesheet-all' => get_stylesheet_directory_uri().'/style.css', // production
  //'stylesheet-print' => get_stylesheet_directory_uri().'/print.css',
  'modernizer' => get_stylesheet_directory_uri().'/js/modernizer.js',
  //'google-analytics' => 'the ga code',
  'favicon' => get_stylesheet_directory_uri().'/img/favicon.png',
  'site-logo' => "<img src='" . get_stylesheet_directory_uri() . "/img/logo_40x40.png' height='40' width='40' alt='logo' />",
  'site-title' => true,
  'site-slogan' => true,
  //'site-extra' => "<div>somecontent</div>",

  // General
  'show-title-on-pages' => true,

	// Navbars
	'navbar1-class' => 'nb-standard', //'nb-standard', 
	'navbar2-class' => false, //'nb-standard', 
	
	// Breadcrumb
	'breadcrumb-enable' => true, 
	'breadcrumb-on-home' => true, 
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
  'footer-first-col' => "
    <nav>
      <h4>Validators</h4>
      <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance&amp;profile=css3'>Unicorn</a>
      <a href='http://validator.w3.org/checklink?uri=<?=$mos_current_url?>'>Links</a>
      <a href='http://validator.w3.org/i18n-checker/check?uri=<?=$mos_current_url?>'>i18n</a>
    </nav>
  ",
  'footer-second-col' => '<h4>Footer column 2</h4>',
  'footer-third-col' => '<h4>Footer column 3</h4>',
  'footer-fourth-col' 	=> '<h4>Footer column 4</h4>',
  'footer-fifth-col' 	=> null,
  'footer-sixth-col' 	=> null,
  'footer-seventh-col' 	=> null,
  'footer-eight-col' 	=> null,
  'footer-nine-col' 	=> null,
  'footer-ten-col' 		=> null,
  'footer-eleven-col' 	=> null,
  'footer-twelve-col' 	=> null,
);

