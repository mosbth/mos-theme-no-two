<?=get_header()?>
<div id='outer-wrap-flash'>
  <div id='inner-wrap-flash'>
    <div id='flash'>
      flash
    </div>
  </div>
</div>
<div id='outer-wrap-featured'>
  <div id='inner-wrap-featured'>
    <footer id='featured'>
      <div id='featured-first'><?='featured-first'?></div>
      <div id='featured-middle'><?='featured-middle'?></div>
      <div id='featured-last'><?='featured-last'?></div>
    </footer>
  </div>
</div>
<div id='outer-wrap-main'>
  <div id='inner-wrap-main'>
    <div id='main'>
      <div id='primary'>
        <div id='content'>
          <?php if(have_posts()): while(have_posts()): the_post()?>
              <?=get_template_part('content', get_post_format())?>
            <?php endwhile?>
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
      <?=get_sidebar()?>
    </div>
  </div>
</div>
<?=get_footer()?>
