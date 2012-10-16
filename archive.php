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
 
        <?php if(mos_get_content('breadcrumb-enable-archive')): ?>
        <div id='breadcrumb'><?=mos_breadcrumb('archive')?></div>
        <?php endif; ?>
       
        <?php if ( is_category() ) : ?>
          <header class="page-header">
            <h1 class="page-title"><?=__('Kategori: ', 'mos' )?><span><?=single_cat_title('', false)?></span></h1>
            <?php
            $category_description = category_description();
            if ( ! empty( $category_description ) )
              echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
            ?>
          </header>

        <?php elseif( is_tag() ) : ?>
         <header class="page-header">
            <h1 class="page-title"><?=__('Tagg: ', 'mos' )?><span><?=single_tag_title('', false)?></span></h1>
            <?php
            $tag_description = tag_description();
            if ( ! empty( $tag_description ) )
              echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
             ?>
          </header>
        <?php endif; ?>

        <?php if (have_posts() ) : ?>
    			<?php while ( have_posts() ) : the_post(); ?>
    				<?php get_template_part( 'content', 'page' ); ?>
    				<?php comments_template( '', true ); ?>
    			<?php endwhile; ?>
        <?php else:?>
            <section id='post-0' class='post no-results not-found'>
              <header class='entry-header'>
                <h1 class='entry-title'><?=__('Det finns inga inlägg här', 'mos')?></h1>
              </header>
              <div class='entry-content'>
                <p><?=__( 'Det fanns inget innehåll i detta arkivet. Vill du pröva att söka istället?', 'mos' ); ?></p>
                <?=get_search_form(); ?>
              </div>
            </section>
        <?php endif; ?>

        </div>
      </div>
      <?php if(mos_has_content('sidebar-right')): ?>
      <div id='sidebar-right' class='widget-area'>
        <?=get_sidebar('right')?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?=get_footer()?>


