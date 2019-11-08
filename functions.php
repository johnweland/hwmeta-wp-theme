<?php
/**
 * Functions for theme setup
 * php version 7.3
 * 
 * @category Components
 * @package  WordPress
 * @author   John Weland <john.weland@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://websiteurl.tld
 */


/**
 * Register, then load stylesheets and dependandies
 * 
 * @return void
 */
function loadStylesheets(): void
{
    wp_register_style('stylesheet', get_template_directory_uri() . '/css/application.css', [], false, 'all');
    wp_enqueue_style('stylesheet');
}

add_action('wp_enqueue_scripts', 'loadStylesheets');

/**
 * Register, then load scripts and dependandies
 * 
 * @return void
 */
function loadScripts(): void
{
    wp_register_script('applicationjs', get_template_directory_uri() . '/js/application.js', [], false, true);
    wp_enqueue_script('applicationjs');
}
add_action('wp_enqueue_scripts', 'loadScripts');

// Enable Theme Support
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

// Register Menus
register_nav_menus(
    [
        'main' => __('Main Menu', 'theme'),
        'widget' => __('Widget Menu', 'theme'),
    ]
);

/**
 * Register Sidebar Locations
 * 
 * @return void
 */
function sidebars(): void
{
    register_sidebar(
        [
            'name' => 'Main Sidebar',
            'id' => 'main-sidebar',
            'before_title' => '<h3 class="widget_title">',
            'after_title' => '</h3>',
        ]
    );

    register_sidebar(
        [
            'name' => 'Post Sidebar',
            'id' => 'post-sidebar',
            'before_title' => '<h3 class="widget_title">',
            'after_title' => '</h3>',
        ]
    );
}
add_action('widgets_init', 'sidebars');