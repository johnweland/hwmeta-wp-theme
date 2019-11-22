<?php
/**
 * Content Template for Page
 * php version 7.3
 * 
 * @category Components
 * @package  WordPress
 * @author   John Weland <john.weland@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://hwmeta.com
 */
?>
<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
        <?php the_content(); ?>
<?php endwhile; else: ?> 
<?php endif; ?>