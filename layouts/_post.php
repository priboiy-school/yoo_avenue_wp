<article id="item-<?php the_ID(); ?>" class="uk-article tm-article" data-permalink="<?php the_permalink(); ?>">

    <?php if (has_post_thumbnail()) : ?>
        <div class="tm-article-featured-image">
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('full'); ?></a>
        </div>
    <?php endif; ?>

    <div class="tm-article-content tm-article-date-true">

        <div class="tm-article-date">
            <?php $date = printf('<span class="tm-article-date-day">'.get_the_date('d M').'</span>'.'<span class="tm-article-date-year">'.get_the_date('Y').'</span>'); ?>
        </div>

        <h1 class="uk-article-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

        <p class="uk-article-meta">
            <?php //printf(__('Written by %s. Posted in %s', 'warp'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a>', get_the_category_list(', ')); ?>
        </p>

        <?php the_content(''); ?>
		<p class="text-right"><strong><?= get_the_author();?></strong></p>
        <!--ul class="uk-subnav uk-subnav-line">
            <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php _e('Continue Reading', 'warp'); ?></a></li>
            <?php if(comments_open() || get_comments_number()) : ?>
                <li><?php comments_popup_link(__('No Comments', 'warp'), __('1 Comment', 'warp'), __('% Comments', 'warp'), "", ""); ?></li>
            <?php endif; ?>
        </ul-->

        <?php //edit_post_link(__('Edit this post.', 'warp'), '<p><i class="uk-icon-pencil"></i> ','</p>'); ?>

    </div>

</article>
