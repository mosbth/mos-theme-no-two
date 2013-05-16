<?php 
global $post, $pageId, $mos_content; 
$home     = is_home() ? 'home' : null;
$single   = is_single() ? 'single' : null;
$archive  = is_archive() ? 'archive' : null;
$page     = is_page() ? 'page' : null;
$tag      = is_tag() ? 'tag' : null;
$category = is_category() ? 'category' : null;

$id = $home . $single .  $page . $archive;
$sidebar = 'sidebar-' . $id;

/*
echo '<p>' . "$sidebar " . $home . $single . $archive . $page . $tag . $category . " $post->ID" . '</p>';
echo "<p>{$pageId}</p>";
echo "<p>page - {$page}</p>";
*/

// Should we display categories widget for this page?
$display_categories = true;
if(in_array($pageId, $mos_content['disable-categories'])) {
  $display_categories = false;  
}

// Should we display tags widget for this page?
$display_tags = true;
if(in_array($pageId, $mos_content['disable-tags'])) {
  $display_tags = false;  
}

?>

<div class='sidebar'>


<?php 
if(mos_has_content('sidebar-page-' . $pageId, false)) {
  $current = get_page(mos_get_content('sidebar-page-' . $pageId));
  echo apply_filters('the_content', $current->post_content); 
}
else if(mos_has_content('sidebar-page-' . $post->ID, false)) {
  $current = get_page(mos_get_content('sidebar-page-' . $post->ID));
  echo apply_filters('the_content', $current->post_content); 
}
else if(mos_has_content("$sidebar-content", false)) {  //? $ ?
  $current = get_page(mos_get_content("$sidebar-content"));
  echo apply_filters('the_content', $current->post_content); 
}
?>


<?php if(!$page && $display_categories): ?>
<div id='categories' class='widget box'>
  <?php $title = empty($mos_content['category-widget-title']) ? __( 'Kategorier', 'mos' ) : $mos_content['category-widget-title']; ?>
  <h4><?=$title?></h4>
  <ul><?=wp_list_categories(array('title_li'=>false, 'show_count'=>1))?></ul>
</div>
<?php endif; ?>


<?php if(!$page && $display_tags): ?>
<div id="tags" class="widget box">
  <h4><?=__( 'Taggar', 'mos' )?></h4>
  <?=wp_tag_cloud(array('smallest'=>12))?>
</div>
<?php endif; ?>



</div>
