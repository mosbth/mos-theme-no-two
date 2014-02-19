Wordpress base theme: Mos Theme No Two
======================================

Second try to make a robust WP-theme easy to customize. 



License
-----------------------------------

Dual license, MIT LICENSE and GPL VERSION 3.



Use of external libraries
-----------------------------------

The following external modules are included in the theme.

### lessphp
lessphp by leaf to compile LESS.
* Website: http://leafo.net/lessphp
* Version included: 0.4.0 (2013-08-09)
* License: Dual license, MIT LICENSE and GPL VERSION 3
* Path: `style/lessphp`


### The Semantic Grid System
by Tyler Tate/TwigKit to get grid layout through LESS.
* Website: http://semantic.gs/
* Version: 1.2 (2012-01-11)
* License: Apache License
* Path: included in `style.less`


### Modernizr
* Website: http://modernizr.com/


###Normalize.css
* Website: http://necolas.github.com/normalize.css/
* Version: 2.0.1
* License: MIT License
* Path: `style/normalize.css/*`


###jPlayer
* Website: http://jplayer.org/
* Version: 2.4.0
* License: MIT License
* Path: `src/jplayer`


###jPlayer original skins blue.monday and pink.flag
* Website: http://jplayer.org/
* Version: 2.4.0
* License: MIT License
* Path: `src/jplayer-skins/blue.monday`, `src/jplayer-skins/pink.flag`


###jPlayer skins midnight.black and morning.light
* Website: http://theinfection.github.com/Morning-Light/, http://theinfection.github.com/Midnight-Black/
* Version: v2.6.1
* License: Dual license MIT License and GPL
* Path: `src/jplayer-skins/midnight.black`, `src/jplayer-skins/morning.light`



How to get going
--------------------------------------

These are the steps to get going.

Clone it:
`git clone git://github.com/mosbth/mos-theme-no-two.git`

`style/style.php` need to be able to write the file `style.css` and `style.less.cache`, so the directory `style` must be writable.
`chmod 777 mos-theme-no-two/style`

Review and edit the file `style/custom.less` to create your own style.

Review and edit the config-file in the directory `config`.



Files and directories
--------------------------------------

Template files

`index.php` main template file.
`header.php` displays header area.
`content.php` displays main content.
`page.php` displays main content if its a page.
`single.php` displays main content if its a single item.
`comments.php` displays all comments.
`footer.php` displays footer area.

`category.php` displays all posts in a category.

`sidebar.php` displays a general sidebar.
`sidebar-category.php` displays sidebar when a category is displayed.


Functions & settings

`functions.php` theming functions and for fixed content.
`config.php` instead of subtheming you may customize the theme with settings by creating this file.
`config_default.php` if you do not create a `config.php` then this will be loaded as default.
`config_plain.php` use this as base to get minimum content and style.
`config_default.php` use this as base to get a view of full theme support.


Images

`img` here all images are stored that comes with the theme.


Includes and addons

`lessphp` any include files used to extend theme.
`lessphp/less.inc.php` less PHP compiler.


JavaScript

`js` Here all JavaScript files are stored that are included with the theme.
`js/modernizer.js` Modernizer js-lib.


Languages

`languages` various language files.


Stylesheets

`style.less` the site stylesheet, make your own modifications here.
`style_lydia.less` style from lydia.
`style_wordpress.less` style specific for wordpress.
`style_theme.less` style specific for each `config_file.php`.
`style_meta.css` contain informatino on the theme, displayed by wordpress admin, obsolete?
`style.php` manage creation and caching of stylesheets when in development mode.
`style.css` the latest by `style.php` generated stylesheet.
`style.less.cache` a cached and compiled vaiant of the current stylesheet.
`print.css` the stylesheet for print.


Other

`README.md` this file.
`screenshot.jpg` an image of this theme.
`LICENSE.txt` license text for the theme.



To Do
--------------------------------------
Microformats.
<link rel="profile" href="http://gmpg.org/xfn/11" />

Threaded comments through js.
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

Role, removed all.

Support screen readers and textbrowsers.
<h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>

Configurable footer through GUI
  /* A sidebar in the footer? Yep. You can can customize
   * your footer with three columns of widgets.
   */
  if ( ! is_404() )
    get_sidebar( 'footer' );
  ?>
  
Stylesheet for print.
Language


  
History
--------------------------------------

v0.4.3 (2014-02-19)

* Updated to lessphp 0.4.0 and style.php with release date 2013-10-28.
* Added correct base for translation in `language`
* For anna.
* Lots updates for montage.


v0.4.2 (2013-09-16)

* Final for hanna.


v0.4.1 (2013-06-28)

* Removing unneeded files in config. 
* Template files `404` and `search` moved into `index.php`.
* Rremoved template `searchform`.
* Included jPlayer as shortcode [jplayer].
* Added skins for jPlayer, blue.monday, pink.flag, midnight.black and morning.light.
* Moving functions from `functions.php` to `CMos`.


v0.4.0 (2013-06-24)

* Cleaning up code. 
* Introducing class `CMos` to separate mos theme from standard WordPress and to ease usage of config-file.


v0.3.2 (2013-04-08)
v0.3.1 (2013-04-08)

* Taking snapshot  for perc-site.


v0.3.0 (2013-01-16)

* A bunch of changes while doing customer sites...
* Tagging to prepare working for new customer sites.


v0.2.0 (2012-10-03)

* Added `config_plain.php`, `config_default.php` and `config_all.php`. All customisations
should be done in `config.php` which is no longer part of the distro.
* Updated to latest version v0.3.8 of lessphp. Added file LICENSE and README.md for lessphp.
* Latest version of style.php.
* Changed name of `style.top.css` to `style_meta.css`.
* Added modernizr javascript library.
* Added functionality and rearranged files. Major rework.


v0.1.1 (2012-03-26)

* Added `style.top.css` to have the information about the theme, added to `style.css`at each compilation.


v0.1.0 (2012-03-26)

* Tried to create a base which can be used for customed themes without need of subtheming.
* Adaptions for customer project.
* First submitted to github


