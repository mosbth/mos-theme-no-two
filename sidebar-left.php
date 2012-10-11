<?php global $post; 
$home = is_home() ? 'home' : null;
$single = is_single() ? 'single' : null;
$archive = is_archive() ? 'archive' : null;
?>

<div class='sb-left page-<?=$post->ID?> <?=$home?> <?=$single?>'>
  <div class='sb-content'>

<?=mos_get_content('sidebar-left-content-before', false)?>
<?=mos_get_content('sidebar-left-content-' . $post->ID, false)?>


<?php 
if(mos_has_content('sidebar-left-content-page-' . $post->ID)) {
  $page = get_page(mos_get_content('sidebar-left-content-page-' . $post->ID));
  echo apply_filters('the_content', $page->post_content); 
} 

elseif($home && mos_has_content('sidebar-left-content-page-home')) {
  $page = get_page(mos_get_content('sidebar-left-content-page-home'));
  echo apply_filters('the_content', $page->post_content); 
}

elseif($single && mos_has_content('sidebar-left-content-page-single')) {
  $page = get_page(mos_get_content('sidebar-left-content-page-single'));
  echo apply_filters('the_content', $page->post_content); 
}

elseif($archive && mos_has_content('sidebar-left-content-page-archive')) {
  $page = get_page(mos_get_content('sidebar-left-content-page-archive'));
  echo apply_filters('the_content', $page->post_content); 
}
?>


<?php if(mos_has_content('sidebar-left-home-display-categories')): ?>
<div id='categories' class='widget'>
  <h4><?=__( 'Kategorier', 'mos' )?></h4>
  <ul><?=wp_list_categories(array('title_li'=>false))?></ul>
</div>
<?php endif; ?>

<?php if(mos_has_content('sidebar-left-home-display-tags')): ?>
<div id="tags" class="widget">
  <h4><?=__( 'Taggar', 'mos' )?></h4>
  <?=wp_tag_cloud(mos_get_content('sidebar-left-home-tags-options'))?>
</div>
<?php endif; ?>


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