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
	'primary' => 'Primary Navigation',
	'secondary' => 'Secondary Navigation',
) );


/**
 * Set content data
 */
$mos_current_url = mos_get_current_url();
$mos_content_array = array(
  'stylesheet_all' => get_stylesheet_directory_uri().'/style.php', // development
  //'stylesheet_all' => get_stylesheet_directory_uri().'/style.css', // production
  'stylesheet_print' => get_stylesheet_directory_uri().'/print.css',
  'modernizer' => get_stylesheet_directory_uri().'/js/modernizer.js',
  'google-analytics' => 'UA-22093351-1',
  'site-logo' => "src='" . get_stylesheet_directory_uri() . "/img/logo_40x40.png' height='40' width='40'",
  'favicon' => get_stylesheet_directory_uri().'/img/favicon.png',

	// Breadcrumb
	'breadcrumb_on_home' => false, 
	'breadcrumb_start' => __('Hem'),
	'breadcrumb_delimiter' => '&raquo;',
	'breadcrumb_show_current' => true,

	// Flash
  'flash' 	=> "<h4>Flash</h4>",
  
	// Featured
  'featured-first' 	=> "<h4>Featured first</h4>",
  'featured-middle' => "<h4>Featured middle</h4>",
  'featured-last' 	=> "<h4>Featured last</h4>",
  
	// Triptych
  'triptych-first' 	=> "<h4>Triptych first</h4>",
  'triptych-middle' => "<h4>Triptych middle</h4>",
  'triptych-last' 	=> "<h4>Triptych last</h4>",
  
  // Footer
  'footer' 	=> __('Copyright &copy; Mikael Roos (me@mikaelroos.se)') . ' &ndash; Theme Mos-Theme-No-Two by Mikael Roos (me@mikaelroos.se)',
  'footer-first-col' => "
    <nav>
      <h4>Validators</h4>
      <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance&amp;profile=css3'>Unicorn</a>
      <a href='http://validator.w3.org/checklink?uri=<?=$mos_current_url?>'>Links</a>
      <a href='http://validator.w3.org/i18n-checker/check?uri=<?=$mos_current_url?>'>i18n</a>
    </nav>
  ",
  'footer-second-col' => "
    <nav>
      <h4>Second</h4>
    </nav>
  ",
  'footer-third-col' => "
    <nav>
      <h4>Third</h4>
    </nav>
  ",
  'footer-fourth-col' 	=> "
    <nav>
      <h4>Fourth</h4>
    </nav>
  ",
  'footer-fifth-col' 	=> null,
  'footer-sixth-col' 	=> null,
  'footer-seventh-col' 	=> null,
  'footer-eight-col' 	=> null,
  'footer-nine-col' 	=> null,
  'footer-ten-col' 		=> null,
  'footer-eleven-col' 	=> null,
  'footer-twelve-col' 	=> null,
);

