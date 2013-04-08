<div id='secondary' class='widget-area' role='complementary'>
  <aside id='categories' class='widget'>
    <p class="widget-title"><?=__('I denna kategori kan du läsa följande artiklar.', 'mos' )?></p>
    <ul>
      <?php
      //global $post;
      $args = array( 'category' => get_query_var('cat'), 'numberposts' => 99 );
      $myposts = get_posts( $args );
      foreach( $myposts as $post ) :	setup_postdata($post); ?>
        <li><a href="<?php the_permalink(); ?>"><?=the_title()?></a></li>
      <?php endforeach; ?>
    </ul>
  </aside>


  <aside id='categories' class='widget'>
    <h3 class="widget-title"><?=__('Kategorier', 'mos' )?></h3>
    <ul><?=wp_list_categories(array('title_li'=>false))?></ul>
  </aside>

  <aside id="tags" class="widget">
    <h3 class="widget-title"><?=__('Taggar', 'mos' )?></h3>
    <?=wp_tag_cloud()?>
  </aside>
</div><!-- #secondary .widget-area -->
