<?php
/**
 * Mos Theme No Two functions and definitions, customized items per site
 *
 */

/**
 * Add existing filters.
 *
 */
add_filter( 'the_content', 'make_clickable', 12); // After shortcodes are executed


/**
 * Set content data
 *
 */
$mos_current_url = mos_get_current_url();
$mos_content_array = array(
  'stylesheet_all' => get_stylesheet_directory_uri().'/style.php', // development
  //'stylesheet_all' => get_stylesheet_directory_uri().'/style.css', // production
  'stylesheet_print' => get_stylesheet_directory_uri().'/print.css',
  'modernizer' => get_stylesheet_directory_uri().'/js/modernizer.js',
  'google-analytics' => 'UA-22093351-1',
  'site-copyright' => __('Copyright &copy; Mikael Roos (mos@dbwebb.se)'),
  'site-logo' => "src='" . get_stylesheet_directory_uri() . "/img/logo_40x40.png' height='40' width='40'",
  'favicon' => get_stylesheet_directory_uri().'/img/favicon.png',
  'triptych-first' => "
    <h4>Senaste i bloggen</h4>
  ",
  'triptych-middle' => "
    <h4>Senaste i forumet</h4>
  ",
  'triptych-last' => "
    <h4>Senaste i chatten</h4>
  ",
  'footer-first-col' => "
    <nav>
      <h4>Validatorer</h4>
      <a href='http://validator.w3.org/check/referer'>HTML5</a>
      <a href='http://jigsaw.w3.org/css-validator/check/referer?profile=css3'>CSS3</a>
      <a href='http://jigsaw.w3.org/css-validator/check/referer?profile=css21'>CSS21</a>
      <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a>
      <a href='http://validator.w3.org/checklink?uri=<?=$mos_current_url?>'>Links</a>
      <a href='http://validator.w3.org/i18n-checker/check?uri=<?=$mos_current_url?>'>i18n</a>
      <!-- <a href='link?'>http-header</a> -->
      <a href='http://csslint.net/'>CSS-lint</a>
      <a href='http://jslint.com/'>JS-lint</a>
      <a href='http://jsperf.com/'>JS-perf</a>
    </nav>
  ",
  'footer-second-col' => "
    <nav>
      <h4>Manualer</h4>
      <a href='http://www.w3.org/2009/cheatsheet'>Cheatsheet</a>
      <a href='http://dev.w3.org/html5/spec/spec.html'>HTML5</a>
      <a href='http://www.w3.org/TR/CSS2'>CSS2</a>
      <a href='http://www.w3.org/Style/CSS/current-work#CSS3'>CSS3</a>
      <a href='http://php.net/manual/en/index.php'>PHP</a>
      <a href='http://www.sqlite.org/lang.html'>SQLite</a>
      <a href='http://dev.mysql.com/doc/'>MySQL</a>
      <a href='http://http://www.w3.org/'>W3C</a>      
      <a href='http://www.w3schools.com/'>w3schools</a>
    </nav>
  ",
  'footer-third-col' => "
    <nav>
      <h4>Verktyg</h4>
      <a href='http://www.workwithcolor.com/hsl-color-schemer-01.htm'>Colors</a>
    </nav>
  ",
  'footer-fourth-col' => "
    <nav>
      <h4>Boilerplates & Kod</h4>
      <a href='http://html5boilerplate.com/'>html5boilerplate</a>
      <a href='http://www.blueprintcss.org/'>Blueprint</a>
      <a href='http://lesscss.org/'>LESS</a>
      <a href='http://leafo.net/lessphp/'>lessphp</a>      
      <a href='http://semantic.gs/'>semantic.gs/</a>
      <a href='http://www.modernizr.com/'>Modernizer</a>
      <a href='http://jquery.com/'>jQuery</a>
      <a href='http://sass-lang.com/'>Sass</a>
    </nav>
  ",
  'footer-fifth-col' => "
    <nav>
      <h4>Utvecklingsverktyg</h4>
      <a href='https://github.com/'>GitHub</a>
      <a href='http://git-scm.com/'>Git</a>
      <a href='http://www.simpletest.org/'>Simpletest</a>
      <a href='http://seleniumhq.org/'>Selenium</a>
    </na>
  ",
  'footer-sixth-col' => "
    <nav>
      <h4>MVC / CMS / CMF</h4>
      <a href='http://wordpress.org'>Wordpress</a>
      <a href='http://drupal.org'>Drupal</a>
      <a href='http://www.phpbb.com/'>phpBB</a>
      <a href='http://codeigniter.com'>CodeIgniter</a>
    </nav>
  ",
  'footer-seventh-col' => "
    <nav>
      <h4>Artiklar & Magasin</h4>
      <a href='http://www.alistapart.com/'>A List Apart</a>
      <a href='http://net.tutsplus.com/'>nettuts+</a>
      <a href='http://coding.smashingmagazine.com/'>Smashing Magazine</a>
      <a href='http://www.sitepoint.com/'>Sitepoint</a>
      <a href='http://html5doctor.com/'>HTML5 Doctor</a>
    </nav>
  ",
  'footer-eight-col' => "
    <nav>
      <h4>Från webbvärlden</h4>
      <a href=''></a>
    </nav>
  ",
  'footer-nine-col' => "
    <nav>
      <h4>Studerandeadm</h4>
      <a href=''></a>
    </nav>
  ",
  'footer-ten-col' => "
    <nav>
      <h4>Händer på BTH & COM</h4>
      <a href=''></a>
    </nav>
  ",
  'footer-eleven-col' => "
    <nav>
      <h4>Vad gör Mos?</h4>
      <a href=''></a>
    </nav>
  ",
  'footer-twelve-col' => "
    <nav>
      <h4>dbwebb.se</h4>
      <a href='http://dbwebb.se/blog'>blog</a>
      <a href='http://dbwebb.se/forum'>forum</a>
      <a href='http://dbwebb.se/style'>style</a>
      <a href='https://github.com/mosbth'>github</a>
    </na>
  ",
);

