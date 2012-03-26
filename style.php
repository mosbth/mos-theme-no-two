<?php
/**
 * With complements to:
 * http://leafo.net/lessphp/docs/#php_interface
 * http://net.tutsplus.com/tutorials/php/how-to-squeeze-the-most-out-of-less/
 *
 */
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler");  
else ob_start();  

include __DIR__."/incl/lessc.inc.php";

function auto_compile_less($less_fname, $css_fname) {
  $cache_fname = $less_fname.".cache";
  if (file_exists($cache_fname)) {
    $cache = unserialize(file_get_contents($cache_fname));
  } else {
    $cache = $less_fname;
  }

  $changed = false;
  $new_cache = lessc::cexecute($cache);
  if (!is_array($cache) || $new_cache['updated'] > $cache['updated']) {
    file_put_contents($cache_fname, serialize($new_cache));    
    file_put_contents($css_fname, file_get_contents(__DIR__.'/style.top.css') . $new_cache['compiled']);
    $changed = true;
  }
  return $changed;
}

$file = 'style';
$time = mktime(0,0,0,21,5,1980);  
$changed = auto_compile_less("$file.less", "$file.css");

if(!$changed && isset($_SERVER['If-Modified-Since']) && strtotime($_SERVER['If-Modified-Since']) >= $time){  
  header("HTTP/1.0 304 Not Modified");  
} else {  
  header('Content-type: text/css');  
  header('Last-Modified: ' . gmdate("D, d M Y H:i:s",$time) . " GMT");  
  readfile("$file.css");  
}  
