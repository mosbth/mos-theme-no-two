<?php if(mos_has_content('sidebar-right-tags')): ?>
<div id="tags" class="widget box">
  <h4><?=__( 'Taggar', 'mos' )?></h4>
  <?=wp_tag_cloud(array('smallest'=>12))?>
</div>
<?php endif; ?>

<?php if(mos_has_content('sidebar-right-categories')): ?>
<div id='categories' class='widget box'>
  <h4><?=__( 'Kategorier', 'mos' )?></h4>
  <ul><?=wp_list_categories(array('title_li'=>false))?></ul>
</div>
<?php endif; ?>

