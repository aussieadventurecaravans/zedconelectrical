<?php if ($this['config']->get('article') == 'tm-article-blog') : ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

    <article class="uk-article <?php echo $this['config']->get('article', ''); ?>" data-permalink="<?php the_permalink(); ?>">

        <?php
            $image_alignment = $this['config']->get('post_image_align_single', 'top');
            $image = wp_get_attachment_url( get_post_thumbnail_id() );
            $width = get_option('thumbnail_size_w'); //get the width of the thumbnail setting
            $height = get_option('thumbnail_size_h'); //get the height of the thumbnail setting
        ?>

        <?php if (has_post_thumbnail() && $image_alignment != 'top') : ?>
        <div class="uk-grid uk-grid-width-medium-1-2" data-uk-grid-match="{target:'.uk-panel'}">
        <?php endif; ?>

        <?php if (has_post_thumbnail() && $image_alignment == 'left') : ?>
            <div>
                <div class="uk-panel tm-article-image" style="background:url(<?php echo $image; ?>) #FFF 50% 50% no-repeat; background-size: cover;">
                    <?php the_post_thumbnail(array($width, $height), array('class' => 'uk-invisible')); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (has_post_thumbnail() && $image_alignment != 'top') : ?>
        <div class="uk-flex uk-flex-center uk-flex-middle">
            <div class="uk-panel">
        <?php endif; ?>

            <p class="tm-article-meta uk-article-meta uk-text-center">
                <?php
                    $date = '<time datetime="'.get_the_date('Y-m-d').'">'.get_the_date().'</time>';
                    printf(__('Written by %s on %s. Posted in %s', 'warp'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a>', $date, get_the_category_list(', '));
                ?>
            </p>

            <h1 class="tm-article-title uk-article-title uk-text-center"><?php the_title(); ?></h1>

            <?php if (has_post_thumbnail() && $image_alignment == 'top') : ?>
            <div class="tm-article-image tm-article-image-large" style="background:url(<?php echo $image; ?>) #FFF 50% 50% no-repeat; background-size: cover;">
                <?php the_post_thumbnail(array($width, $height), array('class' => 'uk-invisible')); ?>
            </div>
            <?php endif; ?>

            <div class="tm-article-content uk-margin">
                <?php the_content(''); ?>

                <?php wp_link_pages(); ?>

                <div class="uk-margin-large-top">

                    <?php the_tags('<p>'.__('Tags: ', 'warp'), ', ', '</p>'); ?>

                    <?php edit_post_link(__('Edit this post.', 'warp'), '<p><i class="uk-icon-pencil"></i> ','</p>'); ?>

                </div>

                <?php if (pings_open()) : ?>
                <p><?php printf(__('<a href="%s">Trackback</a> from your site.', 'warp'), get_trackback_url()); ?></p>
                <?php endif; ?>

            </div>

            <?php if (has_post_thumbnail() && $image_alignment != 'top') : ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (has_post_thumbnail() && $image_alignment == 'right') : ?>
                <div>
                    <div class="uk-panel tm-article-image" style="background:url(<?php echo $image; ?>) #FFF 50% 50% no-repeat; background-size: cover;">
                        <?php the_post_thumbnail(array($width, $height), array('class' => 'uk-invisible')); ?>
                    </div>
                </div>
            <?php endif; ?>

        <?php if (has_post_thumbnail() && $image_alignment != 'top') : ?>
        </div>
        <?php endif; ?>

        <?php if (get_the_author_meta('description')) : ?>
        <div class="uk-panel uk-panel-box uk-margin-top">

            <div class="uk-align-medium-left">

                <?php echo get_avatar(get_the_author_meta('user_email')); ?>

            </div>

            <h2 class="uk-h3 uk-margin-top-remove"><?php the_author(); ?></h2>

            <div class="uk-margin"><?php the_author_meta('description'); ?></div>

        </div>
        <?php endif; ?>

    </article>

    <?php comments_template(); ?>

<?php endwhile; ?>
<?php endif; ?>

<?php else : ?>

    <?php include(__DIR__.'/../warp/systems/wordpress/layouts/single.php'); ?>

<?php endif; ?>
