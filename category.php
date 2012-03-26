<?=get_header()?>
<div id='outer-wrap-main'>
  <div id='inner-wrap-main'>
    <div id='main'>
      <div id='primary'>
        <div id='content'>
    			<?php if ( have_posts() ) : ?>
    				<header class="page-header">
		  			<h1 class="page-title"><?=__('Kategori: ', 'mos' )?><span><?=single_cat_title('', false)?></span></h1>
					  <?php
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					  ?>
				    </header>
    				<?php while ( have_posts() ) : the_post(); ?>
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
      <?=get_sidebar('category')?>
    </div>
  </div>
</div>
<?=get_footer()?>
