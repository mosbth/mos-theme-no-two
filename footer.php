<div id='outer-wrap-triptych'>
  <div id='inner-wrap-triptych'>
    <footer id='triptych'>
      <div id='triptych-first'><?=mos_get_content('triptych-first')?></div>
      <div id='triptych-middle'><?=mos_get_content('triptych-middle')?></div>
      <div id='triptych-last'><?=mos_get_content('triptych-last')?></div>
    </footer>
  </div>
</div>
<div id='outer-wrap-footer'>
  <div id='inner-wrap-footer'>
    <footer id='footer'>
      <div class='wrap-footer-col'>
        <div id='footer-first-col'><?=mos_get_content('footer-first-col')?></div>
        <div id='footer-second-col'><?=mos_get_content('footer-second-col')?></div>
        <div id='footer-third-col'><?=mos_get_content('footer-third-col')?></div>
        <div id='footer-fourth-col'><?=mos_get_content('footer-fourth-col')?></div>
      </div>
      <div class='wrap-footer-col'>
        <div id='footer-fifth-col'><?=mos_get_content('footer-fifth-col')?></div>
        <div id='footer-sixth-col'><?=mos_get_content('footer-sixth-col')?></div>
        <div id='footer-seventh-col'><?=mos_get_content('footer-seventh-col')?></div>
        <div id='footer-eight-col'><?=mos_get_content('footer-eight-col')?></div>
      </div>
      <div class='wrap-footer-col'>
        <div id='footer-nine-col'><?=mos_get_content('footer-nine-col')?></div>
        <div id='footer-ten-col'><?=mos_get_content('footer-ten-col')?></div>
        <div id='footer-eleven-col'><?=mos_get_content('footer-eleven-col')?></div>
        <div id='footer-twelve-col'><?=mos_get_content('footer-twelve-col')?></div>
      </div>
      <div id='site-copyright'><p><?=mos_get_content('site-copyright')?></p></div>
    </footer>
  </div>
</div>
<?=wp_footer()?>
<!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID.
     mathiasbynens.be/notes/async-analytics-snippet -->
<script>
  var _gaq=[['_setAccount','<?=mos_get_content('google-analytics')?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>