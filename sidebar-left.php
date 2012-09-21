<?php global $post; ?>

<div class='sb-left page-<?=$post->ID?>'>
  <div class='sb-content'>

<?=mos_get_content('sidebar-left-content-before', false)?>
<?=mos_get_content('sidebar-left-content-' . $post->ID, false)?>


<?php 
if(mos_has_content('sidebar-left-content-page-' . $post->ID)) {
  $page = get_page(mos_get_content('sidebar-left-content-page-' . $post->ID));
  echo apply_filters('the_content', $page->post_content); 
}?>


<?=mos_get_content('sidebar-left-content-after', false)?>


<?php if(mos_has_content('sidebar-left-content-default')): ?>

<div id='categories' class='widget box'>
  <h4><?=__( 'Kategorier', 'mos' )?></h4>
  <ul><?=wp_list_categories(array('title_li'=>false))?></ul>
</div>

<div id="tags" class="widget box">
  <h4><?=__( 'Taggar', 'mos' )?></h4>
  <?=wp_tag_cloud()?>
</div>

<?php endif; ?>

  </div> <!-- sb-content -->
</div> <!-- sb-left -->