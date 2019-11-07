<?php
$second_query_args = [
    'ignore_sticky_posts' => true,
    'post_type'      => 'post',
    'meta_key'       => 'post_views_count',
    'orderby'        => 'meta_value_num',
    'order'          => 'DESC',
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