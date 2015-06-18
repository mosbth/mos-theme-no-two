<?php 
global $post; 

/**
 * Manage settings for sidebar
 */
$recent_posts       = in_array(mos_page_type(), mos_get('sidebar-display-recent-posts'))  ? true : false;  
$searchform         = in_array(mos_page_type(), mos_get('sidebar-display-searchform'))    ? true : false;
$display_categories = in_array(mos_page_type(), mos_get('sidebar-display-categories'))    ? true : false;
$display_tags       = in_array(mos_page_type(), mos_get('sidebar-display-tags'))          ? true : false;
$display_dates      = in_array(mos_page_type(), mos_get('sidebar-display-dates'))         ? true : false;
$display_active_sidebar = in_array(mos_page_type(), mos_get('sidebar-display-active-sidebar')) ? true : false;
?>

<div class='sidebar-content'>

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



<?php if($searchform): ?>
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


<?php if($display_dates): ?>
<div id="dates" class="widget box">
  <?php $title = mos_has('date-widget-title') ? mos_get('date-widget-title') : __( 'Date archive', 'mos' ); ?>
  <h4><?=$title?></h4>
  <?=wp_get_archives(array("type" => "monthly", "show_post_count" => true))?>
</div>
<?php endif; ?>


<?php if($display_active_sidebar): ?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
  <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
  </div><!-- #primary-sidebar -->
<?php endif; ?>
<?php endif; ?>


<?php 
$pageType = mos_page_type();

if(mos_has('sidebar-page-last-' . $post->ID, false)) {
  $key = 'sidebar-page-last-' . $post->ID;
  $current = get_page(mos_get($key));
  echo "<div class='sidebar-page {$key}'>" . apply_filters('the_content', $current->post_content) . "</div>"; 
}
else if(mos_has('sidebar-page-last-' . $pageType, false)) {
  $key = 'sidebar-page-last-' . $pageType;
  $current = get_page(mos_get($key));
  echo "<div class='sidebar-page {$key}'>" . apply_filters('the_content', $current->post_content) . "</div>"; 
}
?>


</div>
