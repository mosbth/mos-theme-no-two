<!doctype html>
<html class='no-js <?=mos_get_content('config-class')?>' <?=language_attributes()?>>
<head>
	<meta charset='<?=get_bloginfo('charset')?>' />
	<title><?=mos_get_title()?></title>
	<?php if(mos_has_content('meta-description')):?><meta name='description' content='<?=mos_get_content('meta-description')?>' /><?php endif;?>
	<?php if(mos_has_content('meta-keywords')):?><meta name='keywords' content='<?=mos_get_content('meta-keywords')?>' /><?php endif;?>
	<link rel='stylesheet' type='text/css' media='all' href='<?=mos_get_content('stylesheet-all')?>' />
	<link rel='shortcut icon' href='<?=mos_get_content('favicon')?>' />
	<link rel='pingback' href='<?=get_bloginfo('pingback_url')?>' />
	<script src='<?=mos_get_content('modernizer')?>'></script>
	<?php if(mos_has_content('jquery')):?><script src='<?=mos_get_content('jquery')?>'></script><?php endif; ?>
	<?=wp_head()?>
</head>
<body <?=body_class()?>>  

<div id='outer-wrap-header'>
	<div id='inner-wrap-header'>
		<div id='header'>
			<div id='banner'>
        <?php if(mos_has_content('site-logo')): ?><span id='site-logo'><a href='<?=esc_url(get_home_url())?>'><?=mos_get_content('site-logo')?></a></span><?php endif; ?>
        <?php if(mos_has_content('site-title')): ?><span id='site-title'><a href='<?=esc_url(get_home_url())?>' title='<?=esc_attr(get_bloginfo('name', 'display'))?>'><?=get_bloginfo('name')?></a></span><?php endif; ?>
        <?php if(mos_has_content('site-slogan')): ?><span id='site-slogan'><?=get_bloginfo('description')?></span><?php endif; ?>
        <?php if(mos_has_content('site-extra')): ?><span id='site-extra'><?=mos_get_content('site-extra')?></span><?php endif; ?>
			</div>
   	  <?php if(mos_has_content('navbar1-class')): ?><div id='navbar1' class='<?=mos_get_content('navbar1-class')?>'><?=wp_nav_menu(array('theme_location'=>'navbar1'))?></div><?php endif; ?>
		</div>
	</div>
</div>

<?php if(mos_has_content('navbar2-class')): ?>
<div id='outer-wrap-navbar'>
	<div id='inner-wrap-navbar'>
		<div id='navbar'>
      <div id='navbar2' class='<?=mos_get_content('navbar2-class')?>'><?=wp_nav_menu(array('theme_location'=>'navbar2'))?></div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php if(mos_has_content('breadcrumb-enable')): ?>
<div id='outer-wrap-header-below'>
	<div id='inner-wrap-header-below'>
		<div id='header-below'>
			<div id='breadcrumb'><?=mos_breadcrumb()?></div>
		</div>
	</div>
</div>
<?php endif; ?>
