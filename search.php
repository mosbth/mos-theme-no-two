<?=get_header()?>
<div id='outer-wrap-main'>
  <div id='inner-wrap-main'>
    <div id='main'>
      <div id='primary-fullwidth'>
        <div id='content'>
 			    <section id="post-list" class="search-results">
					<?php if ( have_posts() ) : ?>
						<header class="page-header">
							<h1 class="page-title"><?php printf( __( 'Searchresults for: %s', 'mos' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header>
		        <div class="entry-content">
							<?php get_search_form(); ?>
						</div>

						<?php while ( have_posts() ) : the_post(); ?>
							<?php	get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>
		     	</section>

					<?php else : ?>

			      <section id="post-0" class="post no-results not-found">
			        <header class='entry-header'>
			          <h1 class='entry-title'><?=__('Did not find anything.', 'mos')?></h1>
			        </header>
			        <div class="entry-content">
								<p><?php _e( 'There was nothing that matched youre search string, try again.', 'mos' ); ?></p>
								<?php get_search_form(); ?>
							</div>
			      </section>

					<?php endif; ?>

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
<?=get_footer()?>
