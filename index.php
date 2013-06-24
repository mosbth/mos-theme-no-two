<?php
/*
Template Name: Default (index.php)
*/
global $post, $userID;

$pageClass = $mos['page-class-' . $post->ID] ? " class='" . $mos['page-class-' . $post->ID] . "'" : null;

get_header();
?>

<?php if(mos_has('flash')): ?>
<div id='outer-wrap-flash' role='complementary'>
	<div id='inner-wrap-flash'>
		<div id='flash'><?=mos_get('flash')?></div>
	</div>
</div>
<?php endif; ?>

<?php if(mos_has('featured-first', 'featured-middle', 'featured-last')): ?>
<div id='outer-wrap-featured' role='complementary'>
	<div id='inner-wrap-featured'>
		<div id='featured-first'><?=mos_get('featured-first')?></div>
		<div id='featured-middle'><?=mos_get('featured-middle')?></div>
		<div id='featured-last'><?=mos_get('featured-last')?></div>
	</div>
</div>
<?php endif; ?>

<div id='outer-wrap-main'>
  <div id='inner-wrap-main'>
    <div id='main'>

      <?php if(mos_has('sidebar-left-enabled')): ?><div id='sidebar-left' role='complementary'><?=get_sidebar(mos_get('sidebar-left-template'))?></div><?php endif; ?>
      
      <div id='primary'<?=$pageClass?> role='main'>
        <div id='content'>


          <?php if ( is_category() ) : ?>
          <header class="page-header">
            <h1 class="page-title"><?=__('Category: ', 'mos' )?><span><?=single_cat_title('', false)?></span></h1>
            <?php
            $category_description = category_description();
            if ( ! empty( $category_description ) )
              echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
            ?>
          </header>


          <?php elseif( is_tag() ) : ?>
          <header class="page-header">
            <h1 class="page-title"><?=__('Tag: ', 'mos' )?><span><?=single_tag_title('', false)?></span></h1>
            <?php
            $tag_description = tag_description();
            if ( ! empty( $tag_description ) )
              echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
             ?>
          </header>


          <?php elseif( is_author() ) : 
            $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
          ?>
          <header class="page-header">
            <h1 class="page-title"><?=__('Author: ', 'mos' )?><span><?=$curauth->nickname?></span></h1>
            <p><?=$curauth->description?></p>
          </header>
          <?php endif; ?>
          

          <?php if(have_posts()): ?>
          <article class='wp'>
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
        
        
          <?php if(is_front_page() && mos_has('display-blog-on-frontpage')) : ?><hr><?=mos_get_blog_post()?><?php endif; ?>

        </div>
      </div>
      
      <?php if(mos_has('sidebar-right-enabled')): ?><div id='sidebar-right' role='complementary'><?=get_sidebar(mos_get('sidebar-right-template'))?></div><?php endif; ?>
    
    </div>
  </div>
</div>


<?=get_footer()?>
