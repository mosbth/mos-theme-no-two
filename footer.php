<?php if(mos_has('triptych-first', 'triptych-middle', 'triptych-last')): ?>
<div id='outer-wrap-triptych' role='complementary'>
  <div id='inner-wrap-triptych'>
    <footer id='triptych'>
      <div id='triptych-first' class='triptych'><?=mos_get('triptych-first')?></div>
      <div id='triptych-middle' class='triptych'><?=mos_get('triptych-middle')?></div>
      <div id='triptych-last' class='triptych'><?=mos_get('triptych-last')?></div>
    </footer>
  </div>
</div>
<?php endif; ?>

<div id='outer-wrap-footer' class='footer' role='contentinfo'>

<?php if(mos_has('footer-before')): ?>
<div id='outer-wrap-footer-before'>
  <div id='outer-wrap-footer-before-left'></div>
  <div id='inner-wrap-footer-before'>
    <div id='footer-before'><?=mos_get('footer-before')?></div>
  </div>
  <div id='outer-wrap-footer-before-right'></div>
</div>
<?php endif; ?>

  <div id='outer-wrap-footer-left'></div>
  <div id='inner-wrap-footer-column'>
    <?php if(mos_has('footer-extra')): ?><span id='footer-extra'><?=mos_get('footer-extra')?></span><?php endif; ?>
    <?php if(mos_has('footer-column-one', 'footer-column-two', 'footer-column-three', 'footer-column-four')): ?>
    <div id='footer-column-wrapper-one' class='footer-column-wrapper'>
      <div id='footer-column-one' class='footer-column footer-column-one'><?=mos_get('footer-column-one')?></div>
      <div id='footer-column-two' class='footer-column footer-column-two'><?=mos_get('footer-column-two')?></div>
      <div id='footer-column-three' class='footer-column footer-column-three'><?=mos_get('footer-column-three')?></div>
      <div id='footer-column-four' class='footer-column footer-column-four'><?=mos_get('footer-column-four')?></div>
    </div>
    <?php endif; ?>
  </div>
  <div id='inner-wrap-footer'>
    <?php if(mos_has('footer-custom')): ?><div id='footer-custom'><?=mos_get('footer-custom')?></div><?php endif; ?>
    <?php if(mos_has('footer')): ?><div id='footer'><p><?=mos_get('footer')?></p></div><?php endif; ?>
  </div>
  <div id='outer-wrap-footer-right'></div>
</div>

    </div> <!-- wrap-all -->
  </div> <!-- inner-wrap-all -->
</div> <!-- outer-wrap-all -->

<?=wp_footer()?>

<?php if(mos_has('jquery')):?><script src='<?=mos_get('jquery')?>'></script><?php endif; ?>
<?php if(mos_has('javascript-include')): foreach(mos_get('javascript-include') as $val): ?><script src='<?=$val?>'></script><?php endforeach; endif; ?>
<?php if(mos_has('javascript-inline')):?><script><?=mos_get('javascript-inline')?></script><?php endif; ?>
<?php if(mos_has('google-analytics')): ?>
<script>
  var _gaq=[['_setAccount','<?=mos_get('google-analytics')?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; ?>

</body>
</html>