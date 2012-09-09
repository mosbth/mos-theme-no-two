<!doctype html>
<html class='no-js' <?=language_attributes()?>>
<head>
  <meta charset='<?=get_bloginfo('charset')?>' />
  <meta name='viewport' content='width=device-width' />
  <meta name='description' content=''>
  <title><?=mos_get_title()?></title>
  <link rel='stylesheet' type='text/css' media='all' href='<?=mos_get_content('stylesheet_all')?>' />  
  <link rel='shortcut icon' href='<?=mos_get_content('favicon')?>' />
  <link rel='pingback' href='<?=get_bloginfo('pingback_url')?>' />
  <script src='<?=mos_get_content('modernizer')?>'></script>
	<?=wp_head()?>
</head>
<body <?=body_class()?>>  

<div id='outer-wrap-header'>
	<div id='inner-wrap-header'>
		<div id='header'>
			<div id='banner'>
        <a href='<?=esc_url(get_home_url())?>'><img id='site-logo' <?=mos_get_content('site-logo')?> alt='logo' /></a>
        <span id='site-title'><a href='<?=esc_url(get_home_url())?>' title='<?=esc_attr(get_bloginfo('name', 'display'))?>'><?=get_bloginfo('name')?></a></span>
        <span id='site-slogan'><?=get_bloginfo('description')?></span>
			</div>
			<div id='navbar'><?=wp_nav_menu(array('theme_location'=>'primary'))?></div>
		</div>
	</div>
</div>

<div id='outer-wrap-header-below'>
	<div id='inner-wrap-header-below'>
		<div id='header-below'>
			<div id='breadcrumb'><?=mos_breadcrumb()?></div>
		</div>
	</div>
</div>

