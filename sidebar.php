<div id='secondary' class='widget-area' role='complementary'>
  <aside id='categories' class='widget'>
    <h3 class="widget-title"><?php _e( 'Kategorier', 'mos' ); ?></h3>
    <ul><?=wp_list_categories(array('title_li'=>false))?></ul>
  </aside>

  <aside id="tags" class="widget">
    <h3 class="widget-title"><?php _e( 'Taggar', 'mos' ); ?></h3>
    <?=wp_tag_cloud()?>
  </aside>
</div><!-- #secondary .widget-area -->
