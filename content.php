<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if(('post' == get_post_type()) && mos_has_content('show-posted-on')) : ?><span class="published"><?=mos_posted_on()?></span><?php endif; ?>
  <?php if(('post' == get_post_type()) || (('page' == get_post_type()) && mos_has_content('show-title-on-pages'))): ?>
  <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Länk till %s', 'mos' ), the_title_attribute( 'echo=0' ) ); ?>"><?=the_title()?></a></h2>
  <?php endif; ?>

  <?php if ( is_search() ) : ?>
    <?php if( 'post' == get_post_type() ) : // Only display Excerpts for posts in Search ?>
      <?php the_excerpt(); ?>
    <?php endif; ?>
  <?php else : ?>
  <?php the_content( __( '&raquo; läs mer', 'mos' ) ); ?>
  <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Sidor:', 'mos' ) . '</span>', 'after' => '</div>' ) ); ?>
  <?php endif; ?>

  <footer class="footer">
    <?php $show_sep = false; ?>
    <?php if('post' == get_post_type()) : // Hide category and tag text for pages on Search ?>
      <?php
      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list( __( ', ', 'mos' ) );
      if ( $categories_list ):
      ?>
      <span class="cat-links">
        <?php printf( __( '<span class="%1$s">Postad i</span> %2$s', 'mos' ), '', $categories_list );
        $show_sep = true; ?>
      </span>
    <?php endif; // End if categories ?>


    <?php
      /* translators: used between list items, there is a space after the comma */
      $tags_list = get_the_tag_list( '', __( ', ', 'mos' ) );
      if ( $tags_list ):
        if ( $show_sep ) : ?>
        <span class="sep"> | </span>
        <?php endif; // End if $show_sep ?>
        <span class="tag-links">
          <?php printf( __( '<span class="%1$s">Taggad som</span> %2$s', 'mos' ), '', $tags_list );
          $show_sep = true; ?>
        </span>
      <?php endif; // End if $tags_list ?>
    <?php endif; // End if 'post' == get_post_type() ?>


    <?php if ( mos_has_content('comments-enabled') && comments_open() ) : ?>
      <?php if ( $show_sep ) : ?>
        <span class="sep"> | </span>
      <?php endif; // End if $show_sep ?>
      <span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Lämna en kommentar', 'mos' ) . '</span>', __( '<b>1</b> kommentar', 'twentyeleven' ), __( '<b>%</b> kommentarer', 'twentyeleven' ) ); ?></span>
    <?php endif; // End if comments_open() ?>

    <?php if ( mos_has_content('edit-link-enabled') ) : ?>
      <?=edit_post_link( __( 'Redigera', 'mos' ), '<span class="edit-link">', '</span>' ); ?>
    <?php endif; ?>
  </footer><!-- #entry-meta -->
</section><!-- #post-<?php the_ID(); ?> -->
