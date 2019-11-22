<?php
/**
 * Template for Post Content
 * php version 7.3
 * 
 * @category Components
 * @package  WordPress
 * @author   John Weland <john.weland@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://hwmeta.com
 */
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="grid-container">
        <img class="page__featured-image" src="<?php the_post_thumbnail_url();?>">
        <div class="author-block">
            <?php $user_email = get_the_author_meta('user_email'); ?>
            <div class="author-block__image">
                <img src="<?php echo get_avatar_url($user_email);?>">
            </div>
            <div class="author-block__meta">
                <p><a href="#"><?php the_author();?></a> | <?php the_date(); ?></p>
                <p>
                    <?php 
                        $user_id = get_the_author_meta('ID');
                        $user_meta = get_userdata($user_id);
                        $user_role= str_replace("_", " ", $user_meta->roles[0]);
                echo $user_role == 'administrator' ? ucwords('author') : ucwords($user_role); ?></p>
                <p>
                <?php if (get_the_author_meta('twitter')) : ?>
                <a href="https://twitter.com/<?php the_author_meta('twitter');?>">
                @<?php the_author_meta('twitter');?>
                </a>
                <?php endif;?>
                </p>
            </div>
        </div>
        <?php if ( function_exists( 'sharing_display' ) ) : ?>
    		<?php sharing_display( '', true ); ?>
		<?php endif; ?>
    </div>
    <div class="grid-container--x2">
        <div class="post">
            <h1 class="post__title">
                <?php the_title(); ?>
            </h1>
            <div class="post__content">
                <?php the_content();?>
            </div>
            <?php comments_template();?>
        </div>
        <?php if (is_active_sidebar('post-sidebar')) : ?>
        <aside class="widgetarea">
            <?php dynamic_sidebar('post-sidebar');?>
        </aside>
        <?php endif; ?>
    </div>

<?php endwhile; else: ?> 
<?php endif; ?>