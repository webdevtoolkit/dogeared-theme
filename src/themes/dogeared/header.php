<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php bloginfo('name'); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="container-fluid header">
    <div class="row">
        <div class="col-md-9">
            <a href="<?php echo get_home_url(); ?>" class="logo"><h1><?php bloginfo('name'); ?></h1></a>

        </div>
        <div class="col-md-3">
            <?php if(is_active_sidebar('custom-header-links')) : ?>
                <?php dynamic_sidebar('custom-header-links'); ?>
            <?php endif; ?>
        </div>
        <div class="col-md-8 caption">
                <?php if(is_active_sidebar('call-to-action')) : ?>
                    <?php dynamic_sidebar('call-to-action'); ?>
                <?php endif; ?>
            </div>
        <div class="col-md-4 search">
            <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input name="s" class="form-control" type="text"
                       placeholder="Search...">
            </form>
        </div>
    </div>
</header>


