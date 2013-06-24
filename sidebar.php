<?php 
global $post; 

// Should we display categories widget for this page?
$display_categories = false;
if(in_array(mos_page_type(), mos_get('sidebar-display-categories'))) {
  $display_categories = true;
}

// Should we display tags widget for this page?
$display_tags = false;
if(in_array(mos_page_type(), mos_get('sidebar-display-tags'))) {
  $display_tags = true;  
}

?>

<div class='sidebar'>

 
<?php 
$pageType = mos_page_type();

if(mos_has('sidebar-page-' . $post->ID, false)) {
  $current = get_page(mos_get('sidebar-page-' . $post->ID));
  echo apply_filters('the_content', $current->post_content); 
}
else if(mos_has('sidebar-page-' . $pageType, false)) {
  $current = get_page(mos_get('sidebar-page-' . $pageType));
  echo apply_filters('the_content', $current->post_content); 
}
?>


<?php if($display_categories): ?>
<div id='categories' class='widget box'>
  <?php $title = mos_has('category-widget-title') ? mos_get('category-widget-title') : __( 'Categories', 'mos' ); ?>
  <h4><?=$title?></h4>
  <ul><?=wp_list_categories(array('title_li'=>false, 'show_count'=>1))?></ul>
</div>
<?php endif; ?>


<?php if($display_tags): ?>
<div id="tags" class="widget box">
  <?php $title = mos_has('tag-widget-title') ? mos_get('tag-widget-title') : __( 'Tags', 'mos' ); ?>
  <h4><?=$title?></h4>
  <?=wp_tag_cloud(mos_get('widget-tag-options'))?>
</div>
<?php endif; ?>


</div>
