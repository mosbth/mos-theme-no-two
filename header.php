<!doctype html>
<html class="no-js <?= mos_get("html-class") ?>" <?= mos_get("lang") ?>>
<head>
<meta charset="<?= get_bloginfo("charset") ?>" />
<title><?= mos_get_title() ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if (mos_has("meta-description")) : ?>
    <meta name="description" content="<?= mos_get("meta-description") ?>" />
<?php endif;?>
<?php if (mos_has("meta-keywords")) : ?>
    <meta name="keywords" content="<?=mos_has("meta-keywords")?>" />
<?php endif;?>
<link rel="stylesheet" type="text/css" media="all" href="<?= mos_get("stylesheet") ?>" />
<?php if (mos_has("stylesheets")) :
    foreach (mos_get("stylesheets") as $val) : ?>
    <link rel="stylesheet" href="<?= $val ?>" />
<?php
    endforeach;
endif; ?>
<link rel="shortcut icon" href="<?= mos_get("favicon") ?>" />
<link rel="pingback" href="<?= get_bloginfo("pingback_url") ?>" />

<?= wp_head() ?>

<script src="<?= mos_get("modernizer") ?>"></script>
</head>



<body <?= body_class(mos_page_type() . " lang-" . mos_get("lang")) ?>>  



<!-- wrapper around all items on page -->
<div class="wrap-all">



<!-- siteheader -->
<div class="outer-wrap outer-wrap-header">
    <div class="inner-wrap inner-wrap-header">
        <div class="row">
            <header class="site-header" role="banner">



                <?php if (mos_has('logo-1')) : ?>
                    <img class="logo-1" src="<?= mos_get('logo-1') ?>" alt="Logo">
                <?php endif; ?>



                <?php if (mos_has('site-title')) : ?>
                    <span class="site-logo-text" >
                        <a href='<?= esc_url(get_home_url()) ?>' title='<?= esc_attr(get_bloginfo('name', 'display')) ?>'>
                            <span class="site-logo-text-icon" >
                                <img src="<?= mos_get('logo') ?>" alt="Logo">
                            </span>
                            <?= get_bloginfo('name') ?>
                        </a>
                    </span>
                <?php endif; ?>



                <?php if (mos_has('site-extra')) : ?>
                    <span id='site-extra'>
                        <?= mos_get('site-extra') ?>
                    </span>
                <?php endif; ?>



                <?php if (has_nav_menu('navbar-' . mos_get("lang"))) : ?>

                    <!-- menu wrapper -->
                    <div class="rm-navbar1 rm-navbar">
                        
                        <?php wp_nav_menu([
                            //"menu" => "navbar1",
                            'theme_location' => 'navbar-' . mos_get("lang"),
                            'menu_class' => 'rm-default rm-desktop',
                            'container' => null
                        ]); ?>
                    </div>

                <?php endif; ?>

                <?php if (has_nav_menu('mobile-' . mos_get("lang"))) : ?>

                    <!-- menu wrapper -->
                    <div class="rm-navbar2 rm-navbar rm-max rm-swipe-right">

                        <!-- memu click button -->
                        <div class="rm-small-wrapper">
                            <ul class="rm-small">
                                <li><a id="rm-menu-button" class="rm-button" href="#">
                                    <i class="fa fa-bars rm-button-face-1"></i>
                                    <i class="fa fa-times rm-button-face-2"></i>
                                </a></li>
                            </ul>
                        </div>

                        <!-- main menu -->
                        <?php wp_nav_menu([
                            //"menu" => "mobile",
                            'theme_location' => 'mobile-' . mos_get("lang"),
                            'menu_id' => 'rm-menu',
                            'menu_class' => 'rm-default rm-mobile',
                            'container' => null
                        ]); ?>

                    </div>

                <?php endif; ?>

            </header>
        </div>
    </div>
</div>



<!-- breadcrumb -->
<?php if (mos_get('breadcrumb-enable')) : ?>
<div class="outer-wrap outer-wrap-breadcrumb">
    <div class="inner-wrap inner-wrap-breadcrumb">
        <div class="row">
            <div class="breadcrumb-wrap">
                <nav class="breadcrumb-list" role="navigation">
                    <?= mos_get_breadcrumb() ?>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
