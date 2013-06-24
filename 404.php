<?=get_header()?>
<div id='outer-wrap-main'>
  <div id='inner-wrap-main'>
    <div id='main'>
      <div id='primary-fullwidth'>
        <div id='content'>
 
		      <section id="post-0" class="post error404 not-found">
		        <header class='entry-header'>
		          <h1 class='entry-title'><?=__('404. The page can not be found.', 'mos')?></h1>
		        </header>
            <?php if(mos_has('404-search')): ?>
		        <div class='entry-content'>
		          <p><?=__( 'Do you wanna try searching the site instead?', 'mos' ); ?></p>
		          <?=get_search_form(); ?>
		        </div>
            <?php endif; ?>
		      </section>

        </div>
      </div>
    </div>
  </div>
</div>

<?php if(mos_has('404-triptych')): ?>
<div id='outer-wrap-triptych'>
  <div id='inner-wrap-triptych'>
    <footer id='triptych'>
      <div id='triptych-first' class='triptych'>
      	<div id="tags" class="widget">
				  <h2 class='widget-title'><?=__( 'Tags', 'mos' )?></h2>
				  <?=wp_tag_cloud(mos_get('widget-tag-options'))?>
				</div>
      </div>
      <div id='triptych-middle' class='triptych'>
   	  	<?php the_widget( 'WP_Widget_Categories', array( 'title' => 'Blog categories', 'count' => true )); ?>
      </div>
      <div id='triptych-last' class='triptych'>
      	<?php the_widget( 'WP_Widget_Recent_Posts', array( 'title' => 'Latest from the blog', 'number' => 10 ), array( 'widget_id' => '404' ) ); ?>
      </div>
    </footer>
  </div>
</div>
<?php endif; ?>

<?=get_footer()?>




					



					

