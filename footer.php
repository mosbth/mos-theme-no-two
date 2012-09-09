<?php if(mos_has_content('triptych-first', 'triptych-middle', 'triptych-last')): ?>
<div id='outer-wrap-triptych'>
  <div id='inner-wrap-triptych'>
    <footer id='triptych'>
      <div id='triptych-first' class='triptych'><?=mos_get_content('triptych-first')?></div>
      <div id='triptych-middle' class='triptych'><?=mos_get_content('triptych-middle')?></div>
      <div id='triptych-last' class='triptych'><?=mos_get_content('triptych-last')?></div>
    </footer>
  </div>
</div>
<?php endif; ?>

<div id='outer-wrap-footer'>
	<div id='inner-wrap-footer-column'>
		<?php if(mos_has_content('footer-first-col', 'footer-first-second', 'footer-first-third', 'footer-first-fourth')): ?>
		<div id='footer-column-wrapper-one' class='footer-column-wrapper'>
      <div id='footer-column-one' class='footer-column'><?=mos_get_content('footer-first-col')?></div>
      <div id='footer-column-two' class='footer-column'><?=mos_get_content('footer-second-col')?></div>
      <div id='footer-column-three' class='footer-column'><?=mos_get_content('footer-third-col')?></div>
      <div id='footer-column-four' class='footer-column'><?=mos_get_content('footer-fourth-col')?></div>
    </div>
    <?php endif; ?>
    <?php if(mos_has_content('footer-fifth-col', 'footer-sixth-second', 'footer-seventh-third', 'footer-eight-fourth')): ?>
		<div id='footer-column-wrapper-two' class='footer-column-wrapper'>
      <div id='footer-column-five' class='footer-column'><?=mos_get_content('footer-fifth-col')?></div>
      <div id='footer-column-six' class='footer-column'><?=mos_get_content('footer-sixth-col')?></div>
      <div id='footer-column-seven' class='footer-column'><?=mos_get_content('footer-seventh-col')?></div>
      <div id='footer-column-eight' class='footer-column'><?=mos_get_content('footer-eight-col')?></div>
    </div>
    <?php endif; ?>
    <?php if(mos_has_content('footer-nine-col', 'footer-ten-second', 'footer-eleven-third', 'footer-twelve-fourth')): ?>
		<div id='footer-column-wrapper-three' class='footer-column-wrapper'>
      <div id='footer-column-nine' class='footer-column'><?=mos_get_content('footer-nine-col')?></div>
      <div id='footer-column-ten' class='footer-column'><?=mos_get_content('footer-ten-col')?></div>
      <div id='footer-column-eleven' class='footer-column'><?=mos_get_content('footer-eleven-col')?></div>
      <div id='footer-column-twelve' class='footer-column'><?=mos_get_content('footer-twelve-col')?></div>
    </div>
    <?php endif; ?>
  </div>
  <div id='inner-wrap-footer'>
  	<?php if(mos_has_content('footer')): ?>
    <div id='footer'><p><?=mos_get_content('footer')?></p></div>
    <?php endif; ?>
  </div>
</div>

<?=wp_footer()?>

<?php if(mos_has_content('google-analytics')): ?>
<script>
  var _gaq=[['_setAccount','<?=mos_get_content('google-analytics')?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; ?>

</body>
</html>