<?=get_header()?>
<div id='outer-wrap-main'>
  <div id='inner-wrap-main'>
    <div id='main'>
      <?php if(mos_has_content('sidebar-left-enabled')): ?>
      <div id='sidebar-left'>
        <?=get_sidebar('left')?>
      </div>
      <?php endif; ?>
      <div id='primary'>
        <div id='content'>
        
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php comments_template( '', true ); ?>
				<?php endwhile; ?>
				
        </div>
      </div>
      <?php if(mos_has_content('sidebar-right')): ?>
      <div id='sidebar-right' class='widget-area' role='complementary'>
        <?=get_sidebar('right')?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?=get_footer()?>
