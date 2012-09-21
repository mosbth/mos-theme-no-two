<?php
/**
 * Mos Theme No Two functions and definitions, customized items per site
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
	'navbar2' => 'Navigation bar within header',
	'navbar1' => 'Navigation bar standard',
	'secondary' => 'Secondary Navigation',
) );


/**
 * Set content data
 */
$mos_current_url = mos_get_current_url();
$mos_content_array = array(
  'stylesheet_all' => get_stylesheet_directory_uri().'/style.php', // development
  //'stylesheet_all' => get_stylesheet_directory_uri().'/style.css', // production
  //'stylesheet_print' => get_stylesheet_directory_uri().'/print.css',
  'modernizer' => get_stylesheet_directory_uri().'/js/modernizer.js',
  //'google-analytics' => 'UA-22093351-1',
  //'favicon' => get_stylesheet_directory_uri().'/img/favicon.png',
  //'site-logo' => "src='" . get_stylesheet_directory_uri() . "/img/logo.jpg' height='34' width='137'",
  'favicon' => '/favicon.png',
  'site-logo' => "<img src='/img/logo.jpg' height='34' width='137' alt='logo' />",
  'site-title' => false,
  'site-slogan' => false,
  'site-extra' => "<img src='/img/sign_anna_handell.jpg' height='83' width='140' alt='Anna Handell' />",

	// Navbars
	'navbar1-class' => false, //'nb-standard', 
	'navbar2-class' => 'nb-anna', //'nb-standard', 
	
	// Breadcrumb
	'breadcrumb-enable' => false, 
	'breadcrumb-on-home' => false, 
	'breadcrumb-start' => __('Hem'),
	'breadcrumb-delimiter' => '&raquo;',
	'breadcrumb-show-current' => true,

  // Sidebars
  'sidebar-left-enabled' => true,
  'sidebar-right-enabled' => false,
  'sidebar-left-content-default' => false,
  'sidebar-left-content-before' => false,
  'sidebar-left-content-after' => false,
  //'sidebar-left-content-2' => "<img src='/img/text1.jpg' class='sb-top-image' alt='Jag formger skriver ritar och designar på papper och webb'/>",
  'sidebar-left-content-page-2' => 115,
  'sidebar-left-content-page-10' => 121,
  'sidebar-left-content-page-8' => 123,
  'sidebar-left-content-page-12' => 125,
  'sidebar-left-content-page-19' => 127,
  'sidebar-left-content-page-17' => 129,
  'sidebar-left-content-page-15' => 132,
  'sidebar-left-content-page-21' => 134,
  
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
  'footer' 	=> 'Montage, Illustration & Design 2001&ndash;2012 &bull; Webbdesign, Illustration och Grafisk design &bull; Anna Handell grafisk formgivare och illustratör &bull; Lund, Malmö, Öresund.',
  'footer-first-col' => "
    <nav>
      <h4>Validators</h4>
      <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance&amp;profile=css3'>Unicorn</a>
      <a href='http://validator.w3.org/checklink?uri=<?=$mos_current_url?>'>Links</a>
      <a href='http://validator.w3.org/i18n-checker/check?uri=<?=$mos_current_url?>'>i18n</a>
    </nav>
  ",
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

