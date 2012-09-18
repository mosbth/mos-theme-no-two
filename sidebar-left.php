<?php if(mos_has_content('sidebar-left-content')): ?>

<?=mos_get_content('sidebar-left-content')?>

<?php else: ?>

<div id='categories' class='widget box'>
  <h4><?=__( 'Kategorier', 'mos' )?></h4>
  <ul><?=wp_list_categories(array('title_li'=>false))?></ul>
</div>

<div id="tags" class="widget box">
  <h4><?=__( 'Taggar', 'mos' )?></h4>
  <?=wp_tag_cloud()?>
</div>

<?php endif; ?>