<?php 
global $post; 

// Should we display recent posts for this page?
$recent_posts = false;
if(in_array(mos_page_type(), mos_get('sidebar-display-recent-posts'))) {
  $recent_posts = true;  
}

// Should we display searchform for this page?
$searchform = false;
if(in_array(mos_page_type(), mos_get('sidebar-display-searchform'))) {
  $searchform = true;  
}

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
  $key = 'sidebar-page-' . $post->ID;
  $current = get_page(mos_get($key));
  echo "<div class='sidebar-page {$key}'>" . apply_filters('the_content', $current->post_content) . "</div>"; 
}
else if(mos_has('sidebar-page-' . $pageType, false)) {
  $key = 'sidebar-page-' . $pageType;
  $current = get_page(mos_get($key));
  echo "<div class='sidebar-page {$key}'>" . apply_filters('the_content', $current->post_content) . "</div>"; 
}
?>


<?php if($recent_posts): ?>
<div class="widget box">
  <?php get_search_form(); ?>
</div>
<?php endif; ?>



<?php if($recent_posts): ?>
<div id='recent-posts' class='box'>
  <h4><?=__('Recent Posts')?></h4>
  <ul>
  <?php
    $recent_posts = wp_get_recent_posts( mos_get('recent-posts-args') );
    foreach( $recent_posts as $recent ){
      echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
    }
  ?>
  </ul>
</div>
<?php endif; ?>


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
