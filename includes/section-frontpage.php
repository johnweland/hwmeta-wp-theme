<?php
/**
 * Content Template for Front Page
 * php version 7.3
 * 
 * @category Components
 * @package  WordPress
 * @author   John Weland <john.weland@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://websiteurl.tld
 */
?>

<?php get_template_part('includes/section', 'latest'); ?>

<div class="grid-container--x2">
<div>
<?php get_template_part('includes/section', 'popular'); ?>
</div>
<?php if (is_active_sidebar('post-sidebar')) : ?>
<aside class="widgetarea">
    <?php dynamic_sidebar('post-sidebar');?>
</aside>
<?php endif; ?>
</div>

