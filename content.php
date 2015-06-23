<article id="post-<?php the_ID(); ?>" <?=post_class()?>>

  <header>
  
    <?php if('post' == get_post_type() && mos_has('show-posted-on')) : ?>
    <span class="published"><span><?=mos_posted_on()?></span></span>
    <?php endif; ?>
    
    <?php if(('post' == get_post_type()) && mos_has('show-comment-count')) : ?>
    <span class='comment-count'><a class='a-comments' href="<?php the_permalink(); ?>#comments" title="<?=__( 'View comments for this post', 'mos' ); ?>"><?=get_comments_number()?></a></span>
    <?php endif; ?>

    <?php if('page' == get_post_type() && mos_has('show-title-on-pages')): ?>
    <h1><?=the_title()?></h1>
  
    <?php elseif('post' == get_post_type() && mos_has('show-title-on-posts') && mos_has('link-blog-title') == false): ?>
    <h1 class='wp-post-title'><?=the_title()?></h1>
  
    <?php elseif('post' == get_post_type() && mos_has('show-title-on-posts')): ?>
    <h1 class='wp-post-title'><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'mos' ), the_title_attribute( 'echo=0' ) ); ?>"><?=the_title()?></a></h1>
  
    <?php endif; ?>
  
  </header>

  <?php if ( is_search() ) : ?>
    <?php if( 'post' == get_post_type() ) : // Only display Excerpts for posts in Search ?>
      <?php the_excerpt(); ?>
    <?php endif; ?>
  <?php else : ?>
    <?php the_content( __( '&raquo; Read more', 'mos' ) ); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'mos' ) . '</span>', 'after' => '</div>' ) ); ?>
  <?php endif; ?>


  <footer class="footer">

    <?php if('post' == get_post_type() && mos_has('show-posted-on-footer')) : ?>
    <span class="published"><span><?=mos_posted_on()?></span></span>
    <?php endif; ?>

    <?php $show_sep = false; ?>
    <?php if( mos_has('display-category') && 'post' == get_post_type()) : // Hide category and tag text for pages on Search ?>

      <?php
      $categories_list = get_the_category_list( __( ', ', 'mos' ) );
      if ( $categories_list ):
      ?>
      <span class="cat-links">
        <?php printf( mos_get('display-category-prepend') . __( '%2$s', 'mos' ), '', $categories_list );
        $show_sep = true; ?>
      </span>
    <?php endif; // End if categories ?>


    <?php
      $tags_list = get_the_tag_list( '', __( ', ', 'mos' ) );
      if ( mos_has('display-tagged-as') && $tags_list ):
        if ( $show_sep ) : ?>
        <span class="sep"> | </span>
        <?php endif; ?>
        <span class="tag-links">
          <?php printf( __( '<span class="%1$s">Tagged as</span> %2$s', 'mos' ), '', $tags_list );
          $show_sep = true; ?>
        </span>
      <?php endif; ?>
    <?php endif; ?>


    <?php if ( mos_has('comments-enabled') && mos_has('leave-reply-link-enabled') && comments_open() ) : ?>
      <?php if ( $show_sep ) : ?>
        <span class="sep"> | </span>
      <?php endif; ?>
      <span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'mos' ) . '</span>', __( '<b>1</b> kommentar', 'mos' ), __( '<b>%</b> kommentarer', 'mos' ) ); ?></span>
    <?php endif; ?>


    <?php if ( mos_has('edit-link-enabled') ) : ?>
      <?php if('post' == get_post_type()): ?><span class="sep"> | </span><?php endif; ?>
      <?=edit_post_link( __( 'Edit', 'mos' ), '<span class="edit-link">', '</span>' ); ?>
    <?php endif; ?>

    <?php if ( 'post' == get_post_type() && mos_has('share-link-enabled') ) : 
      $text = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
      $permalink = get_permalink();
      $twitter  = "http://twitter.com/share?text=$text&amp;url=$permalink";
      $twitterImg = mos_get('share-link-img-twitter');
      $facebook = "http://www.facebook.com/sharer.php?u=$permalink";
      $facebookImg = mos_get('share-link-img-facebook');
    ?>
      <span class='share-link'>
        <?php if($facebookImg) : ?><a href='<?=$facebook?>' title='<?=__('Share on Facebook', 'mos')?>'><img src='<?=$facebookImg?>'/></a><?php endif; ?>
        <?php if($twitterImg) : ?><a href='<?=$twitter?>' title='<?=__('Share on Twitter', 'mos')?>'><img src='<?=$twitterImg?>'/></a><?php endif; ?>
      </span>
    <?php endif; ?>

    <?php if (false && is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
      <?php get_template_part( 'author-bio' ); ?>
    <?php endif; ?>

  </footer>

</article>


<?php if ( mos_has('comments-enabled') && is_single() && (comments_open() || get_comments_number() ) ) : ?>
  <div id='comments'><?=comments_template()?></div>
<?php endif; ?>


<?php if (is_single() && mos_has('blog-back-link')) : ?>
  <div class='blog-back'><h2><a href='/blogg'>&lt;&lt; Tillbaka till bloggen</a></h2></div>
<?php endif; ?>

<?php if (is_single() && mos_has('blog-single-previous-next')) {
    // Previous/next post navigation.
    the_post_navigation([
        'screen_reader_text' => __('There is more to read', 'mos'),
        'next_text' => '<span class="meta-nav">'
            . '<i class="fa fa-arrow-right"></i> '
            . __('Next', 'mos')
            . '</span> '
            . '<span class="post-title">%title</span>',
        'prev_text' => '<span class="meta-nav">'
            . '<i class="fa fa-arrow-left"></i> '
            . __('Previous', 'mos')
            . '</span> '
            . '<span class="post-title">%title</span>',
    ]);
}
?>
