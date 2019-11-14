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

/**
 * Remove Default share button locations
 */
function jptweakRemoveShare() {
    remove_filter( 'the_content', 'sharing_display', 19 );
    remove_filter( 'the_excerpt', 'sharing_display', 19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', [Jetpack_Likes::init(), 'post_likes'], 30, 1);
    }
}
add_action( 'loop_start', 'jptweakRemoveShare' );

/**
 * Create Custom Post Statuses
 */
function custom_status_creation(){
	register_post_status( 'editing', [
		'label'                     => _x( 'Editing', 'post' ), // I used only minimum of parameters
		'label_count'               => _n_noop( 'Editing <span class="count">(%s)</span>', 'Editing <span class="count">(%s)</span>'),
		'public'                    => true
    ]);
    
    register_post_status( 'revisions_needed', [
		'label'                     => _x( 'Revisions Needed', 'post' ), // I used only minimum of parameters
		'label_count'               => _n_noop( 'Revisions Needed <span class="count">(%s)</span>', 'Revisions Needed <span class="count">(%s)</span>'),
		'public'                    => true
    ]);
}
add_action( 'init', 'custom_status_creation' );

add_action('admin_footer-edit.php','status_into_inline_edit');
 
function status_into_inline_edit() { // ultra-simple example
	echo "<script>
	jQuery(document).ready( function() {
		jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"editing\">Editing</option>' );
	});
    </script>";
    
    echo "<script>
	jQuery(document).ready( function() {
		jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"revisions_needed\">Revisions Needed</option>' );
	});
	</script>";
}

function display_status_label( $statuses ) {
	global $post;
	if( get_query_var( 'post_status' ) != 'editing' ) {
		if( $post->post_status == 'editing' ){
			return ['Editing']; 
		}
    }
    if( get_query_var( 'post_status' ) != 'revisions_needed' ) {
		if( $post->post_status == 'revisions_needed' ){
			return ['Revisions Needed']; 
		}
	}
	return $statuses;
}
 
add_filter('display_post_states', 'display_status_label');

/**
 * Add a custom user roles
 */
function addRoles(): void
{
    add_role(
        'content_manager', __('Content Manager'),
        [
            'read' => true, // true allows this capability
            'edit_posts' => true, // Allows user to edit their own posts
            'edit_pages' => true, // Allows user to edit pages
            'edit_others_posts' => true, // Allows user to edit others posts not just their own
            'create_posts' => true, // Allows user to create new posts
            'manage_categories' => true, // Allows user to manage post categories
            'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
            'edit_themes' => false, // false denies this capability. User can’t edit your theme
            'install_plugins' => false, // User cant add new plugins
            'update_plugin' => false, // User can’t update any plugins
            'update_core' => false // user cant perform core updates
        ]
    );

    add_role(
        'pr_manager', __('Public Relations Manager'),
        [
            'read' => true, // true allows this capability
            'edit_posts' => true, // Allows user to edit their own posts
            'edit_pages' => true, // Allows user to edit pages
            'edit_others_posts' => true, // Allows user to edit others posts not just their own
            'create_posts' => true, // Allows user to create new posts
            'manage_categories' => true, // Allows user to manage post categories
            'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
            'edit_themes' => false, // false denies this capability. User can’t edit your theme
            'install_plugins' => false, // User cant add new plugins
            'update_plugin' => false, // User can’t update any plugins
            'update_core' => false // user cant perform core updates
        ]
    );
}
add_action('widgets_init', 'addRoles');