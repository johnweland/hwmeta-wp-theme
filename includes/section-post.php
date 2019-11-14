<?php
/**
 * Template for Post Content
 * php version 7.3
 * 
 * @category Components
 * @package  WordPress
 * @author   John Weland <john.weland@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://websiteurl.tld
 */
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="grid-container">
        <img class="page__featured-image" src="<?php the_post_thumbnail_url();?>">
        <div class="author-block">
            <?php $user_email = get_the_author_meta('user_email'); ?>
            <img class="author-block__image" src="<?php echo get_avatar_url($user_email);?>">
            <div class="author-block__meta">
                <p><a href="#"><?php the_author();?></a> | <?php the_date(); ?></p>
                <p>
                    <?php 
                        $user_id = get_the_author_meta('ID');
                        $user_meta=get_userdata($user_id);
                        $user_roles=$user_meta->roles; 
                echo $user_roles[0] == 'administrator' ? ucfirst('author') : ucfirst($user_roles[0]); ?></p>
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