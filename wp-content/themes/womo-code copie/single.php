<?php get_header(); ?>


<section class="section single-case white">
    <div class="content">
        <!-- <a href="<?php echo get_home_url(); ?>/cases"></a> -->
        <a href="javascript:history.go(-1)">
            <h6 class="cta-goback"><?php pll_e('Terug naar all cases'); ?></h6>
        </a>


        <div class="single-content-wrapper">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="single-intro-block">
                        <h1><?php the_title(); ?></h1>
                        <?php any_group_block(1); ?>
                    </div>
            <?php endwhile;
            endif;
            wp_reset_postdata(); ?>


            <div class="single-info white">
                <div class="content project-btn">
                    <?php any_group_block(2); ?>
                </div>
                <div class="features">
                    <div class="content">
                        <h4 class="bold"><?php pll_e('Oplossingen'); ?></h4>
                        <?php the_category(); ?>
                    </div>

                    <div class="content">
                        <!-- <h4 class="bold"><?php pll_e('Opdrachtgever'); ?></h4> -->
                        <ul>
                            <li><?php any_group_block(3); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="media-frame">
        <?php if (has_block('core/html')) : ?>
            <?php any_group_block(4); ?>
        <?php else : ?>
            <?php the_post_thumbnail(); ?>
        <?php endif; ?>
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


<section class="other-posts white">
    <div class="content center">
        <h2><?php pll_e('Bekijk onze andere cases'); ?></h2>
    </div>

    <div class="grid-3 content">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'post__not_in' => [get_the_ID()]

            // 'category_name' => array('energietool', 'interieur configurator', 'woningzoeker')
        );
        ?>
        <?php $cases_query = new WP_Query($args) ?>
        <?php if (have_posts()) : while ($cases_query->have_posts()) : $cases_query->the_post(); ?>
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



<?php get_footer(); ?>

<script defer>
    const childWindow = document.querySelector(".media-frame iframe").contentWindow

    // console.log(childWindow)
    // var parentWindow = window.parent;

    window.addEventListener("load", () => {
        childWindow.postMessage(`content HEIGHT ${childWindow.clientHeight}`, "*")
    })

    window.addEventListener("message", (e) => {
        const data = e.data; // hare are data sent by other window postMessage method
        console.log('RECEIVED DATA', data)
        document.querySelector('.media-frame iframe').style.height = `${data}px`
    })
</script>
