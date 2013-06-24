<?php
/**
 * Set content data
 */
$imgFullWidth = 670;
$imgFullHeight = 525;

$mos_config = array(

  // Class attribute for <html> to apply specific style
  //'html-class' => 'mos-default',

  // Meta
  'meta-description' => 'Some descriptive text about the site.',
  'meta-keywords' => 'wordpress, theme',

  // Style classes for main content on individual pages
  //'page-class-2'  => 'full-width',

  // Sidebar content, use post id or page type
  //'sidebar-page-2'    => 7,
  //'sidebar-page-home' => 38,

  // Footer
  //'footer' 	=> 'Copyright &copy; ' . get_bloginfo('name') . ' &bull; ' . get_bloginfo('description'),

  // Image sizes predefined
  'img-sizes' => array(
    'w100'=>$imgFullWidth, 'w67'=>round($imgFullWidth*0.67), 'w50'=>round($imgFullWidth*0.50), 'w33'=>round($imgFullWidth*0.33), 'w25'=>round($imgFullWidth*0.25), 'wsb'=>300, 'w2'=>390, 'wslide'=>600,
    'h100'=>$imgFullHeight, 'h67'=>round($imgFullHeight*0.67), 'h50'=>round($imgFullHeight*0.50), 'h33'=>round($imgFullHeight*0.33), 'h25'=>round($imgFullHeight*0.25), 'hsb'=>150, 'hslide'=>750,
  ),

);

