<?=get_header()?>
<div id='outer-wrap-main'>
  <div id='inner-wrap-main'>
    <div id='main'>
      <div id='primary-fullwidth'>
        <div id='content'>
 
		      <section id="post-0" class="post error404 not-found">
		        <header class='entry-header'>
		          <h1 class='entry-title'><?=__('Sidan kan inte hittas.', 'mos')?></h1>
		        </header>
		        <div class='entry-content'>
		          <p><?=__( 'Vill du pröva att söka istället?', 'mos' ); ?></p>
		          <?=get_search_form(); ?>
		        </div>
		      </section>

        </div>
      </div>
    </div>
  </div>
</div>

<div id='outer-wrap-triptych'>
  <div id='inner-wrap-triptych'>
    <footer id='triptych'>
      <div id='triptych-first' class='triptych'>
      	<div id="tags" class="widget">
				  <h2 class='widget-title'><?=__( 'Taggar', 'mos' )?></h2>
				  <?=wp_tag_cloud(mos_get_content('sidebar-left-home-tags-options'))?>
				</div>
      </div>
      <div id='triptych-middle' class='triptych'>
   	  	<?php the_widget( 'WP_Widget_Categories', array( 'title' => 'Kategorier för bloggen', 'count' => true )); ?>
      </div>
      <div id='triptych-last' class='triptych'>
      	<?php the_widget( 'WP_Widget_Recent_Posts', array( 'title' => 'Senaste blogg-inläggen', 'number' => 10 ), array( 'widget_id' => '404' ) ); ?>
      </div>
    </footer>
  </div>
</div>
<?=get_footer()?>




					



					

