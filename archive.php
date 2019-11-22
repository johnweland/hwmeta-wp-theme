<?php
/**
 * Archive Template
 * php version 7.3
 * 
 * @category Components
 * @package  WordPress
 * @author   John Weland <john.weland@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://websiteurl.tld
 */
?>
<?php get_header(); ?>
<main class="container">
    <div class="grid-container">
        <h1 class="page__heading">
        <?php single_cat_title(); ?>
        </h1>
    </div>
    <div class="grid-container--x2">
        <div>
            <?php get_template_part('includes/section', 'archive'); ?>
            <?php
            global $wp_query;
            $big = 9999999999;
            echo paginate_links(
                [
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages
                ]
            );
            ?>
        </div>
        <?php if(is_active_sidebar('main-sidebar')) : ?>
        <aside class="widgetarea">
            <?php dynamic_sidebar('main-sidebar');?>
        </aside>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>