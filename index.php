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

<?php 
// main-custom-
global $post; 
$key = 'main-custom-' . $post->ID;
if(mos_has($key, false)) {
  echo mos_get($key);
}

// main-custom-
$key = 'main-custom-' . mos_page_type();
if(mos_has($key, false)) {
    echo mos_get($key);
}

// main-custom-
$key = 'main-custom-' . $post->post_name;
if(mos_has($key, false)) {
    echo mos_get($key);
}
?>

      <?php if(mos_has('sidebar-left-enabled')): ?><div id='sidebar-left' role='complementary'><div class='sidebar sidebar-left'><?=get_sidebar(mos_get('sidebar-left-template'))?></div></div><?php endif; ?>
      
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
          

          <?php elseif( is_search() ) : ?> 
          <header class="page-header">
            <h1 class="page-title"><?php printf( __( 'Searchresults for: %s', 'mos' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
            <?php get_search_form(); ?>
          </header>
          <?php endif; ?>


          <?php if(have_posts()): ?>
          <section <?=post_class('wp')?>>
          	<?php while(have_posts()): the_post()?>
              <?=get_template_part('content', get_post_format())?>
            <?php endwhile?>
          </section>
          <nav>
            <div class='wp-meta-more-posts'><?=previous_posts_link(__('« Newer posts', 'mos'))?> <?=next_posts_link(__('Older posts »', 'mos'))?></div>
          </nav>


          <?php elseif (is_404()) :?>
          <article class='wp'>
            <header class='page-header'>
              <h1 class='page-title'><?=__('404, page not found', 'mos')?></h1>
            </header>
            <section <?=post_class()?>>
              <p><?=__( 'This is an error. The page you are trying to reach does not exists.', 'mos' ); ?></p>
            </section>
          </article>


          <?php elseif (is_search()) :?>
          <article class='wp'>
            <section <?=post_class()?>>
              <p><?=__( 'No results were found.', 'mos' ); ?></p>
            </section>
          </article>


          <?php else :?>
          <article class='wp'>
            <header class='page-header'>
              <h1 class='page-title'><?=__('Nothing Found', 'mos')?></h1>
            </header>
            <section <?=post_class()?>>
              <p><?=__( 'No results were found.', 'mos' ); ?></p>
            </section>
          </article>
          <?php endif?>
        

          <?php if(is_front_page() && mos_has('display-blog-on-frontpage')) : ?><hr><?=mos_get_blog_post()?><?php endif; ?>

        </div>
      </div>
      
      <?php if(mos_has('sidebar-right-enabled')): ?><div id='sidebar-right' role='complementary'><div class='sidebar sidebar-right'><?=get_sidebar(mos_get('sidebar-right-template'))?></div></div><?php endif; ?>
    
    </div>
  </div>
</div>


<?=get_footer()?>
