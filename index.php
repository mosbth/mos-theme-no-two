<?=get_header()?>
<?php if(mos_has_content('flash')): ?>
<div id='outer-wrap-flash'>
	<div id='inner-wrap-flash'>
		<div id='flash'><?=mos_get_content('flash')?></div>
	</div>
</div>
<?php endif; ?>

<?php if(mos_has_content('featured-first', 'featured-middle', 'featured-last')): ?>
<div id='outer-wrap-featured'>
	<div id='inner-wrap-featured'>
		<div id='featured-first'><?=mos_get_content('featured-first')?></div>
		<div id='featured-middle'><?=mos_get_content('featured-middle')?></div>
		<div id='featured-last'><?=mos_get_content('featured-last')?></div>
	</div>
</div>
<?php endif; ?>

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
          <?php if(have_posts()): ?>
          <article class='blog'>
          	<?php while(have_posts()): the_post()?>
              <?=get_template_part('content', get_post_format())?>
            <?php endwhile?>
          </article>
          <?php else:?>
            <article id='post-0' class='post no-results not-found'>
              <header class='entry-header'>
                <h1 class='entry-title'><?=__('Nothing Found', 'mos')?></h1>
              </header>
              <div class='entry-content'>
                <p><?=__( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'mos' ); ?></p>
                <?=get_search_form(); ?>
              </div>
            </article>
          <?php endif?>
        </div>
      </div>
      <?php if(mos_has_content('sidebar-right-enabled')): ?>
      <div id='sidebar-right'>
        <?=get_sidebar('right')?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?=get_footer()?>
