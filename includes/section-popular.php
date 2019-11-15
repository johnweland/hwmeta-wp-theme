<!-- Get top 3 popular categoies regardless if POST exsist in loops above (currently has no output) -->
<?php
    $cat_args = [
        'hide_empty' => true,
        'taxonomy' => 'category',
        'fields'   => 'all',
        'order' => 'RAND'
    ];
    ?>

<?php $cats = get_terms($cat_args); ?>
<?php
$count = count($cats);
$popular_cats = [];
if ( $count > 0 ) {
    foreach ( $cats as $term ) {
        if ($term->count >= 3) {
            array_push($popular_cats, $term);   
        }
    }
}

?>
<?php for($i = 0; $i < 3; $i++) : ?>
    <?php
        $the_query = new WP_Query(
            [
                'ignore_sticky_posts' => true,
                'post_type'      => 'post',
                'cat'            => $popular_cats[$i]->term_id,
                'posts_per_page' => 3
            ]
        );
    ?>
        <!-- If they exist -->
        <?php if ($the_query->have_posts()) : ?>
        <section>
        <h3 class="cards__category"><?php echo ucfirst($popular_cats[$i]->slug); ?></h3>
        <div class="cards grid-container--x3">
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <!-- Post in Category Loop is finished -->
            <div class="card dark">
                <?php if (has_post_thumbnail()) : ?>
                <img class="card__image" src="<?php echo get_the_post_thumbnail_url(); ?>">
                <?php else : ?>
                    <div class="card__image"></div>
                <?php endif; ?>
                <div class="card__meta">
                    <span class="card__date"><?php echo get_the_date(); ?></span>
                    <h2 class="card__title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                    <p><?php echo get_the_excerpt(); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        </section>
        <!-- Reset the post data -->
            
        <!-- If no posts do else -->
        <?php else: ?>
        <!-- end if statement -->
        <?php endif; ?>
    <!-- Category Loop is finished -->
<?php endfor; ?>
<!-- Reset the post data -->
<?php wp_reset_postdata(); ?>