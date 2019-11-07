<?php
/**
 * Front Page Template
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
<main class="container wide">
    <?php get_template_part('includes/section', 'frontpage'); ?>
</main>
<?php get_footer(); ?>