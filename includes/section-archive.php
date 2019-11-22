<?php
/**
 * Content Template for Archive
 * php version 7.3
 * 
 * @category Components
 * @package  WordPress
 * @author   John Weland <john.weland@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://hwmeta.com
 */
?>
<?php if (have_posts()) : while(have_posts()): the_post(); ?>
<div class="post">
    <h2 class="post__title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title();?></a></h2>
    <span class="post__meta">
        by <a href="<?php echo get_the_author_meta();?>"><?php echo get_the_author(); ?></a> | 
        <?php echo get_the_date(); ?> | 
        <a href="<?php echo get_the_permalink(); ?>"><?php comments_number();?> <span class="fas fa-comment"></span></a>
    </span>
    <img class="post__image" src="<?php echo get_the_post_thumbnail_url();?>">
    <div class="post__excerpt">
        <?php the_excerpt(); ?>
    </div>
    <a class="post__cta" href="<?php echo get_the_permalink(); ?>">Read More</a>
</div>
<?php endwhile; else: ?>
<?php endif; ?>