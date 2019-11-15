<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo get_bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="navbar">
    <nav class="nav container wide">
        <a class="brand" href="<?php echo get_site_url(); ?>">
            <img src="<?php echo get_template_directory_uri()?>/img/logo.png" />
        </a>
        <div class="menu-icons">
            <span class="fas fa-bars"></span>
            <span class="fas fa-times"></span>
        </div>
        <?php wp_nav_menu(
            [
                'theme_location' => 'main',
                'container' => 'ul',
                'menu_class' => 'nav-list',
                'depth' => 0
            ]
        );?>
    </nav>
</div>