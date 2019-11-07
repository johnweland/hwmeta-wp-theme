<!-- Get top 3 popular categoies regardless if POST exsist in loops above (currently has no output) -->
<?php
  $popular_cat_args = [
        'taxonomy' => 'category',
        'meta_key' => 'category_views_count',
        'orderby'  => 'meta_value_num',
        'order'    => 'DESC',
        'fields'   => 'ids',
        'number'   => 3,
    ];
    ?>

<?php $popular_cats = get_terms($popular_cat_args); ?>
<?php var_dump($popular_cats); ?>
<?php foreach ($popular_cats as $popular_cat) : ?>
    <?php
        $the_query = new WP_Query(
            [
                'post_type'      => 'post',
                'cat'            => $popular_cat,
                'posts_per_page' => 3
            ]
        );
    ?>
    <section>
        <h3><?php echo $popular_cat . 'Hey there!'; ?></h3>
        <!-- If they exist -->
        <?php if ($the_query->have_posts()) : ?>
        <div class="cards grid-container--x3">
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <!-- Post in Category Loop is finished -->
            <div class="card dark">
                <img class="card__image" src="<?php echo get_the_post_thumbnail_url(); ?>">
                <div class="card__meta">
                    <span class="card__date"><?php echo get_the_date(); ?></span>
                    <h2 class="card__title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                    <p><?php echo get_the_excerpt(); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <!-- Reset the post data -->
            
        <!-- If no posts do else -->
        <?php else: ?>
        <!-- end if statement -->
        <?php endif; ?>
    <!-- Category Loop is finished -->
    </section>
<?php endforeach; ?>
<!-- Reset the post data -->
<?php wp_reset_postdata(); ?>