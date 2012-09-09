Wordpress base theme: Mos Theme No Two
======================================

Second try to make a robust WP-theme easy to customize. This version of the theme is running live
at http://dbwebb.se/blogg and the intention is to make it easy to use for other projects as well.


Use of external libraries
-----------------------------------

The following external modules are included in the theme.

### lessphp
lessphp by leaf to compile LESS.
* Website: http://leafo.net/lessphp
* Version: 0.3.8 (2012-08-18)
* License: Dual license, MIT LICENSE and GPL VERSION 3
* Path: `lessphp/*`


### The Semantic Grid System
by Tyler Tate/TwigKit to get grid layout through LESS.
* Website: http://semantic.gs/
* Version: 1.2 (2012-01-11)
* License: Apache License
* Path: included in `style.less`

### Modernizr
by .


### style.less
by Mikael Roos, included in Lydia.

### style.php
by Mikael Roos



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


Functions

`functions.php` theming functions and for fixed content.
`functions_customize.php` instead of subtheming you may customize the theme with settings here.


Images

`img` here all images are stored.


Includes and addons

`lessphp` any include files used to extend theme.
`lessphp/less.inc.php` less PHP compiler.


JavaScript

`js` Here all JavaScript files are stored that are included with the theme.
`js/modernizer.js` Modernizer js-lib.


Languages

`languages` various language files.


Stylesheets

`styles`directory for extra stylesheet files.
`style.less` the site stylesheet in less language.
`style.php` manage creation and caching of stylesheets when in development mode.
`style.css` the latest by `style.php` generated stylesheet.
`style.less.cache` a cached and compiled vaiant of the current stylesheet.
`print.css` the stylesheet for print.


Other

`README.md` this file.
`screenshot.jpg` an image of this theme.
`license.txt` license text for the theme.


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
Modernizer for HTML5 on ie.

  
History
--------------------------------------

v0.1.x (latest)

* Updated to latest version v0.3.8 of lessphp. Added file LICENSE and README.md for lessphp.
* Latest version of style.php.
* Changed name of `style.top.css` to `style_meta.css`.

v0.1.1 (2012-03-26)

* Added `style.top.css` to have the information about the theme, added to `style.css`at each compilation.


v0.1.0 (2012-03-26)

* Tried to create a base which can be used for customed themes without need of subtheming.
* Adaptions for customer project.
* First submitted to github


