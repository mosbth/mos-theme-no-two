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
		<?php if(mos_has_content('footer-column-one', 'footer-column-two', 'footer-column-three', 'footer-column-four')): ?>
		<div id='footer-column-wrapper-one' class='footer-column-wrapper'>
      <div id='footer-column-one' class='footer-column footer-column-one'><?=mos_get_content('footer-column-one')?></div>
      <div id='footer-column-two' class='footer-column footer-column-two'><?=mos_get_content('footer-column-two')?></div>
      <div id='footer-column-three' class='footer-column footer-column-three'><?=mos_get_content('footer-column-three')?></div>
      <div id='footer-column-four' class='footer-column footer-column-four'><?=mos_get_content('footer-column-four')?></div>
    </div>
    <?php endif; ?>
    <?php if(mos_has_content('footer-column-five', 'footer-column-six', 'footer-column-seven', 'footer-column-eight')): ?>
		<div id='footer-column-wrapper-two' class='footer-column-wrapper'>
      <div id='footer-column-five' class='footer-column footer-column-five'><?=mos_get_content('footer-column-five')?></div>
      <div id='footer-column-six' class='footer-column footer-column-six'><?=mos_get_content('footer-column-six')?></div>
      <div id='footer-column-seven' class='footer-column footer-column-seven'><?=mos_get_content('footer-column-seven')?></div>
      <div id='footer-column-eight' class='footer-column footer-column-eight'><?=mos_get_content('footer-column-eight')?></div>
    </div>
    <?php endif; ?>
    <?php if(mos_has_content('footer-column-nine', 'footer-column-ten', 'footer-column-eleven', 'footer-column-twelve')): ?>
		<div id='footer-column-wrapper-three' class='footer-column-wrapper'>
      <div id='footer-column-nine' class='footer-column footer-column-nine'><?=mos_get_content('footer-column-nine')?></div>
      <div id='footer-column-ten' class='footer-column footer-column-ten'><?=mos_get_content('footer-column-ten')?></div>
      <div id='footer-column-eleven' class='footer-column footer-column-eleven'><?=mos_get_content('footer-column-eleven')?></div>
      <div id='footer-column-twelve' class='footer-column footer-column-twelve'><?=mos_get_content('footer-column-twelve')?></div>
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

<?php if(mos_has_content('development')): ?><?=mos_get_content('development')?><?php endif; ?>

<?php if(mos_has_content('jquery')):?><script src='<?=mos_get_content('jquery')?>'></script><?php endif; ?>
<?php if(mos_has_content('javascript-include')): foreach(mos_get_content('javascript-include') as $val): ?><script src='<?=$val?>'></script><?php endforeach; endif; ?>
<?php if(mos_has_content('javascript-inline')):?><script src='<?=mos_get_content('javascript-inline')?>'></script><?php endif; ?>
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