<?php
//if(mos_has('triptych-first', 'triptych-middle', 'triptych-last')) :
//if(mos_has('footer-before')) :    
//if(mos_has('footer-extra')):
//if(mos_has('footer-column-one', 'footer-column-two', 'footer-column-three', 'footer-column-four')):
//mos_add_content_for("footer-custom-")
//mos_get('footer-custom')
//mos_has('footer'))
?>



<!-- sitefooter -->
<?php if (mos_has("footer")) : ?>
<div class="outer-wrap outer-wrap-footer" role="contentinfo">
    <div class="inner-wrap inner-wrap-footer">
        <div class="row">
            <div class="footer site-footer">
                <?= mos_get('footer') ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>



</div> <!-- end of wrapper -->



<?= wp_footer() ?>



<?php if (mos_has('jquery')) : ?>
    <script src='<?=mos_get('jquery')?>'></script>
<?php endif; ?>

<?php if (mos_has('javascript-include')) :
    foreach (mos_get('javascript-include') as $val) : ?>
    <script src='<?=$val?>'></script>
<?php
    endforeach;
endif;
?>

<?php if (mos_has('javascript-inline')) : ?>
    <script><?= mos_get('javascript-inline') ?></script>
<?php endif; ?>

<?= mos_add_content_for("javascript-custom-") ?>

<?php if (mos_has('google-analytics')) : ?>
    <script>
      var _gaq=[['_setAccount','<?=mos_get('google-analytics')?>'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
<?php endif; ?>



</body>
</html>
