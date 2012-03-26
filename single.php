<?=get_header()?>
<div id='outer-wrap-main'>
  <div id='inner-wrap-main'>
    <div id='main'>
      <div id='primary'>
        <div id='content'>

        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'content', 'single' ); ?>
          <?php comments_template( '', true ); ?>
        <?php endwhile; // end of the loop. ?>

        </div>
      </div>
    </div>
  </div>
</div>
<?=get_footer()?>

