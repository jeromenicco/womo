<?php /* Template Name: News Template Page  */ ?>

<?php get_header(); ?>





<section class="section-news white">

    <div class="content center">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="grid-3 content">
        <?php
        $args = array(
            'post_type' => 'news',
            'posts_per_page' => -1
        );
        ?>
        <?php $news_query = new WP_Query($args) ?>
        <?php if ($news_query->have_posts()) : while ($news_query->have_posts()) : $news_query->the_post(); ?>
                <div class="post-card">
                    <?php the_post_thumbnail(); ?>
                    <h5>
                        <?php echo get_the_date(); ?>
                    </h5>
                    <h3><?php the_title(); ?></h3>
                    <a href="<?php the_permalink(); ?>">
                        <h6><?php pll_e('Lees meer'); ?></h6>
                    </a>
                </div>
        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
    </div>
</section>

<section class="contact pale-pink">
    <?php $contact_query = new WP_Query('post_type=page&page_id=1614'); ?>
    <?php if (have_posts()) : while ($contact_query->have_posts()) : $contact_query->the_post(); ?>
            <div class="content center">
                <?php the_last_group_block(); ?>
            </div>
    <?php endwhile;
    endif;
    wp_reset_postdata(); ?>
</section>




<?php get_footer(); ?>