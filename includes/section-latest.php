<?php
/**
 * Content Template for Latest Posts
 * php version 7.3
 * 
 * @category Components
 * @package  WordPress
 * @author   John Weland <john.weland@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://hwmeta.com
 */
?>
<section>
<!-- Get the latests 2 posts -->
<?php
$the_query_args = [
    'ignore_sticky_posts' => true,
    'post_type'      => 'post',
    'posts_per_page' => 2
];
$POST_IDS = [];
?>
<?php $the_query = new WP_Query($the_query_args); ?>


<!-- If they exist -->
<?php if ($the_query->have_posts()) : ?>
<div class="cards grid-container--x2">
<!-- Loop them and output -->
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
<!-- track post ID -->
        <?php array_push($POST_IDS, get_the_ID()); ?>
        <div class="card--right dark">
            <img class="card__image" src="<?php echo get_the_post_thumbnail_url();?>">
            <div class="card__meta">
                <span class="card__date"><?php echo get_the_date(); ?></span>
                <h2 class="card__title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                <p><?php echo get_the_excerpt(); ?></p>
            </div>
        </div>
<!-- Loop is finished -->
    <?php endwhile; ?>
</div>
<!-- Reset the post data -->
<!-- If no posts do else -->
<?php else: ?>
<!-- end if statement -->
<?php endif; wp_reset_postdata(); ?>

<?php
$second_query_args = [
    'ignore_sticky_posts' => true,
    'post_type'      => 'post',
    'post__not_in'   => $POST_IDS,
    'posts_per_page' => 3
];
?>
<?php $the_query = new WP_Query($second_query_args); ?>

<!-- If they exist -->
<?php if ($the_query->have_posts()) : ?>
<div class="cards grid-container--x3">
<!-- Loop them and output -->
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
    <!-- track post ID -->
    <div class="card dark">
        <img class="card__image" src="<?php echo get_the_post_thumbnail_url(); ?>">
        <div class="card__meta">
            <span class="card__date"><?php echo get_the_date(); ?></span>
            <h2 class="card__title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
            <p><?php echo get_the_excerpt(); ?></p>
        </div>
    </div>
    <!-- Loop is finished -->
    <?php endwhile; ?>
</div>
<!-- Reset the post data -->
<!-- If no posts do else -->
<?php else: ?>
<!-- end if statement -->
<?php endif; wp_reset_postdata(); ?>
</section>