<?php 
global $post; 
$home     = is_home() ? 'home' : null;
$single   = is_single() ? 'single' : null;
$archive  = is_archive() ? 'archive' : null;
$page     = is_page() ? 'page' : null;
$tag      = is_tag() ? 'tag' : null;
$category = is_category() ? 'category' : null;

$id = $home . $single .  $page . $archive;
$sidebar = 'sidebar-' . $id;

//echo '<p>' . "$sidebar " . $home . $single . $archive . $page . $tag . $category . " $post->ID" . '</p>';
?>

<div class='sidebar'>


<?php 
if(mos_has_content('sidebar-page-' . $post->ID)) {
  $page = get_page(mos_get_content('sidebar-page-' . $post->ID));
  echo apply_filters('the_content', $page->post_content); 
}
else if(mos_has_content("$sidebar-content")) {
  $page = get_page(mos_get_content("$sidebar-content"));
  echo apply_filters('the_content', $page->post_content); 
}
?>


<?php if(mos_has_content("$sidebar-categories")): ?>
<div id='categories' class='widget box'>
  <h4><?=__( 'Kategorier', 'mos' )?></h4>
  <ul><?=wp_list_categories(array('title_li'=>false))?></ul>
</div>
<?php endif; ?>


<?php if(mos_has_content("$sidebar-tags")): ?>
<div id="tags" class="widget box">
  <h4><?=__( 'Taggar', 'mos' )?></h4>
  <?=wp_tag_cloud(array('smallest'=>12))?>
</div>
<?php endif; ?>



</div>
