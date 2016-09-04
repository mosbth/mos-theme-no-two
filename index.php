<?php
/*
Template Name: Default (index.php)
*/
global $post, $userID;

//error_reporting(-1);
//ini_set('display_errors', 1);


if (!isset($post->ID)) {
	$post = new stdClass();
	$post->ID = null;
}


$pageClass = isset($mos['page-class-' . $post->ID]) ? " class='" . $mos['page-class-' . $post->ID] . "'" : null;

get_header();
?>



<!-- flash -->
<?php if (mos_has('flash')) : ?>
<div class="outer-wrap outer-wrap-flash">
    <div class="inner-wrap inner-wrap-flash">
        <div class="row">
            <div class="flash-wrap">
                <?= mos_get('flash') ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php
/*if ( has_post_thumbnail() ) {
	echo "<div class=\"featured-image\">";
	the_post_thumbnail("featuredImageCropped");
	echo "</div>";
} 
the_content(); 
*/
?>


<?php
// if(mos_has('featured-first', 'featured-middle', 'featured-last')):
//mos_get('featured-first')
//mos_get('featured-middle')
//mos_get('featured-last')
?>



<?php
//mos_add_content_for("inner-wrap-main-custom-")
//mos_add_content_for("main-custom-")
?>
<!-- main -->
<div class="outer-wrap outer-wrap-main">
    <div class="inner-wrap inner-wrap-main">
        <div class="row">

<?php
$sidebarLeft  = mos_has('sidebar-left-enabled');
$sidebarRight = mos_has('sidebar-right-enabled');
$class = "";
$class .= $sidebarLeft  ? "has-sidebar-left "  : "";
$class .= $sidebarRight ? "has-sidebar-right " : "";
$class .= empty($class) ? "" : "has-sidebar";
?>


            <?php if ($sidebarLeft) : ?>
                <div class="sidebar sidebar-left <?= $class ?>" role="complementary">
                    <?= get_sidebar(mos_get('sidebar-left-template')) ?>
                </div>
            <?php endif; ?>

            <main class="main <?= $pageClass ?>" role="main">



                <?php if (is_category()) : ?>
                    <header class="page-header">
                          <h1 class="page-title">
                            <?= __('Category: ', 'mos' ) ?><span><?= single_cat_title('', false) ?></span>
                        </h1>

                        <?php
                        $category_description = category_description();
                        if (! empty($category_description))
                            echo apply_filters('category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>');
                        ?>
                    </header>



                <?php elseif (is_tag()) : ?>
                    <header class="page-header">
                          <h1 class="page-title">
                            <?= __('Tag: ', 'mos' ) ?><span><?= single_tag_title('', false) ?></span>
                        </h1>
                          <?php
                          $tag_description = tag_description();
                          if ( ! empty( $tag_description ) )
                            echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
                           ?>
                    </header>



                <?php elseif( is_author() ) : 
                      $curauth = (isset($_GET['author_name']))
                        ? get_user_by('slug', $author_name)
                        : get_userdata(intval($author));
                ?>
                    <header class="page-header">
                          <h1 class="page-title">
                            <?= __('Author: ', 'mos' ) ?><span><?= $curauth->nickname ?></span>
                        </h1>
                          <p>
                            <?=$curauth->description?>
                        </p>
                    </header>



                <?php elseif( is_search() ) : ?> 
                    <header class="page-header">
                      <h1 class="page-title">
                        <?php printf( __( 'Searchresults for: %s', 'mos' ), '<span>' . get_search_query() . '</span>' ); ?>
                    </h1>
                      <?php get_search_form(); ?>
                    </header>
                <?php endif; ?>



                <?php if (have_posts()) : ?>
                    <section <?=post_class('wp')?>>
                        <?php while(have_posts()) : the_post() ?>
                            <?= get_template_part('content', get_post_format()) ?>
                          <?php endwhile ?>
                    </section>
              
              <!--
                <nav>
                  <div class='wp-meta-more-posts'><i class="fa fa-arrow-left"></i> <?=previous_posts_link(__('Newer posts', 'mos'))?> <?=next_posts_link(__('Older posts', 'mos'))?> <i class="fa fa-arrow-right"></i></div>
                </nav>
              -->



                <?php elseif (is_404()) : ?>
                    <article class='wp'>
                          <header class='page-header'>
                            <h1 class='page-title'>
                                <?=__('404, page not found', 'mos')?>
                            </h1>
                          </header>

                          <section <?= post_class() ?>>
                            <p>
                                <?= __( 'This is an error. The page you are trying to reach does not exists.', 'mos' ); ?>
                            </p>
                          </section>
                    </article>


                <?php elseif (is_search()) : ?>
                    <article class='wp'>
                          <section <?= post_class() ?>>
                            <p>
                                <?=__( 'No results were found.', 'mos' ); ?>
                            </p>
                          </section>
                    </article>



                <?php else : ?>
                    <article class='wp'>
                          <header class='page-header'>
                            <h1 class='page-title'>
                                <?= __('Nothing Found', 'mos') ?>
                            </h1>
                          </header>

                          <section <?= post_class() ?>>
                            <p>
                                <?= __( 'No results were found.', 'mos' ); ?>
                            </p>
                          </section>
                    </article>
                <?php endif?>
              

                <?php if (is_front_page() && mos_has('display-blog-on-frontpage')) : ?>
					<hr><?= mos_get_blog_post() ?>
                <?php endif; ?>



            </main>

            <?php if ($sidebarRight) : ?>
                <div class="sidebar sidebar-right <?= $class ?>" role="complementary">
                    <?= get_sidebar(mos_get('sidebar-right-template')) ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>



<?= get_footer() ?>
