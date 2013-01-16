<?php global $post; 
$home = is_home() ? 'home' : null;
$single = is_single() ? 'single' : null;
$archive = is_archive() ? 'archive' : null;
?>

<div class='sidebar sidebar-right sb-right page-<?=$post->ID?> <?=$home?> <?=$single?>  <?=$archive?>'>
  <div class='sb-content'>

<?=mos_get_content('sidebar-right-content-' . $post->ID, false)?>

<?php 
if(mos_has_content('sidebar-right-content-page-' . $post->ID)) {
  $page = get_page(mos_get_content('sidebar-right-content-page-' . $post->ID));
  echo apply_filters('the_content', $page->post_content); 
} 
?>

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

  </div>
</div>
