<!doctype html>
<html class='no-js <?=mos_get_content('config-class')?>' <?=language_attributes()?>>
<head>
	<meta charset='<?=get_bloginfo('charset')?>' />
	<title><?=mos_get_title()?></title>
	<?php if(mos_has_content('meta-description')):?><meta name='description' content='<?=mos_get_content('meta-description')?>' /><?php endif;?>
	<?php if(mos_has_content('meta-keywords')):?><meta name='keywords' content='<?=mos_get_content('meta-keywords')?>' /><?php endif;?>
	<link rel='stylesheet' type='text/css' media='all' href='<?=mos_get_content('stylesheet-all')?>' />
	<?php if(mos_has_content('stylesheets')): foreach(mos_get_content('stylesheets') as $val): ?><link rel='stylesheet' href='<?=$val?>' /><?php endforeach; endif; ?>
	<link rel='shortcut icon' href='<?=mos_get_content('favicon')?>' />
	<link rel='pingback' href='<?=get_bloginfo('pingback_url')?>' />
	<script src='<?=mos_get_content('modernizer')?>'></script>
	<?=wp_head()?>
</head>
<body <?=body_class()?>>  

<!--  <div class='background-center1'></div> -->

<!--
<div id='background' role='banner'>
  <div class='background-left-top'></div>
  <div class='background-right-top'></div>
  <div class='background-left-bottom'></div>
  <div class='background-right-bottom'></div>
  <div class='background-center'></div>
</div>
-->

<div id='outer-wrap-header' role='banner'>
  <div id='outer-wrap-header-left'></div>
	<div id='inner-wrap-header'>
		<div id='header'>
      <?php if(mos_has_content('site-header')): ?><div class='site-header'><?=mos_get_content('site-header')?></div><?php endif; ?>
			<?php if(mos_has_content('site-logo', 'site-title', 'site-slogan', 'site-extra')): ?>
			<div id='banner'>
        <?php if(mos_has_content('site-logo')): ?><span id='site-logo'><a href='<?=esc_url(get_home_url())?>'><?=mos_get_content('site-logo')?></a></span><?php endif; ?>
        <?php if(mos_has_content('site-title')): ?><span id='site-title'><a href='<?=esc_url(get_home_url())?>' title='<?=esc_attr(get_bloginfo('name', 'display'))?>'><?=get_bloginfo('name')?></a></span><?php endif; ?>
        <?php if(mos_has_content('site-slogan')): ?><span id='site-slogan'><?=get_bloginfo('description')?></span><?php endif; ?>
        <?php if(mos_has_content('site-extra')): ?><span id='site-extra'><?=mos_get_content('site-extra')?></span><?php endif; ?>
			</div>
			<?php endif; ?>
   	  <?php if(mos_has_content('navbar1-class')): ?><div id='navbar1' role='navigation'><?=wp_nav_menu(array('theme_location'=>'navbar1', 'menu_class' => mos_get_content('navbar1-class'), 'container' => false))?></div><?php endif; ?>
		</div>
	</div>
  <div id='outer-wrap-header-right'></div>
</div>

<?php if(mos_has_content('navbar2-class')): ?>
<div id='outer-wrap-navbar' role='navigation'>
	<div id='inner-wrap-navbar'>
		<div id='navbar'>
      <div id='navbar2'><?=wp_nav_menu(array('theme_location'=>'navbar2',  'menu_class' => mos_get_content('navbar2-class'), 'container' => false))?></div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php if(mos_has_content('breadcrumb-enable')): ?>
<div id='outer-wrap-header-below' role='navigation'>
	<div id='inner-wrap-header-below'>
		<div id='header-below'>
			<div id='breadcrumb'><?=mos_breadcrumb()?></div>
		</div>
	</div>
</div>
<?php endif; ?>
