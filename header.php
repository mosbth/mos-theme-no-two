<!doctype html>
<html class='no-js' <?=language_attributes()?>>
<head>
  <meta charset='<?=get_bloginfo('charset')?>' />
  <meta name='viewport' content='width=device-width' />
  <meta name='description' content=''>
  <title><?=mos_get_title()?></title>
  <link rel='stylesheet' type='text/css' media='all' href='<?=mos_get_content('stylesheet_all')?>' />  
  <link rel='stylesheet' type='text/css' media='print' href='<?=mos_get_content('stylesheet_print')?>' />
  <link rel='shortcut icon' href='<?=mos_get_content('favicon')?>' />
  <link rel='pingback' href='<?=get_bloginfo('pingback_url')?>' />
  <script src='<?=mos_get_content('modernizer')?>'></script>
	<?=wp_head()?>
</head>
<body <?=body_class()?>>  
<div id='outer-wrap-header'>  
  <div id='inner-wrap-header'>  
    <header id='header'>
      <div id='wrap-site-banner'>
        <header id='site-banner'>
          <div id='site-logo'><a href='<?=esc_url(get_home_url())?>'><img <?=mos_get_content('site-logo')?> alt='logo' /></a></div>
          <div id='site-title'><a href='<?=esc_url(get_home_url())?>' title='<?=esc_attr(get_bloginfo('name', 'display'))?>'><?=get_bloginfo('name')?></a></div>
          <div id='site-slogan'><?=get_bloginfo('description')?></div>
        <header>
      </div>
      <div id='site-navigation1' class='site-navigation'>
        <h6><a href='/blogg'>Blog</a></h6>
        <nav class='navheader'>
          <a href='/blogg/category/artikel/'>Artikel & Guide</a>
          <a href='/blogg/category/nytt-o-noterat/'>Nytt & Noterat</a>
        </nav>
      </div>
      <div id='site-navigation2' class='site-navigation'>
        <h6><a href='/forum'>Forum</a></h6>
        <nav class='navheader'>
          <a href='forum/search.php?search_id=active_topics'>Aktiva trådar</a>
          <a href='forum/search.php?search_id=newposts'>Nya trådar</a>
        </nav>
      </div>
      <div id='site-navigation3' class='site-navigation'>
        <h6>Mer</h6>
        <nav class='navheader'>
          <a href=''>Chat</a>
          <!--<a href=''>Om</a>-->
        </nav>
      </div>
    </header>
  </div>
</div>
<div id='outer-wrap-navbar'>
  <div id='inner-wrap-navbar'>
    <nav id='navbar'><?=wp_nav_menu(array('theme_location'=>'primary'))?></nav>  
  </div>
</div>
<div id='outer-wrap-breadcrumb'>
  <div id='inner-wrap-breadcrumb'>
    <nav id='breadcrumb'><?=dimox_breadcrumbs()?></nav>  
  </div>
</div>
