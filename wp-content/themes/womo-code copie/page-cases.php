<?php /* Template Name: Cases Template Page  */ ?>

<?php get_header(); ?>



<?php
$term_args = array(
    'post_type' => 'post',
    'taxonomy' => 'category',
    'posts_per_page' => -1
); ?>


<section class="section-cases white">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="content center">
                <h1><?php the_title(); ?></h1>
            </div>
    <?php endwhile;
    endif;
    wp_reset_postdata(); ?>



    <div class="category-cloud content">
        <ul class="cat-list">
            <li class="all">
                <h6 class="active"><?php pll_e('Alle'); ?></h6>
            </li>
            <?php
            $terms = get_terms($term_args);
            foreach ($terms as $term) {
            ?>
                <li>
                    <h6><?php echo $term->name; ?></h6>
                </li>
            <?php } ?>

        </ul>
    </div>


    <div class="grid-3 content">
        <?php
        global $post;
        $cases_query = new WP_Query($term_args);

        ?>

        <?php if (have_posts()) : while ($cases_query->have_posts()) : $cases_query->the_post(); ?>
                <?php
                $category_detail = get_the_category($post->ID);
                $categories_array = array();
                foreach ($category_detail as $cd) {
                    $categories_array[] = strtolower($cd->slug);
                }
                $categories_string = implode(" ", $categories_array)
                ?>
                <div class="post-card show <?php echo $categories_string ?>">
                    <?php the_post_thumbnail(); ?>
                    <?php the_category(); ?>
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

<script defer>
    const allBtn = document.querySelector('li.all')
    const filterButtons = [...document.querySelectorAll('.cat-list li h6')]
    const gridElements = [...document.querySelectorAll('.post-card')]

    
    filterButtons.forEach((btn, index) => {
        btn.addEventListener('click', (e) => {
            const catName = e.currentTarget.innerHTML.toLowerCase().split(' ').join('-')
            console.log(`🔷 : ${catName}`)
            gridElements.forEach((element, index) => {
                element.classList.contains(catName) ?
                    element.classList.add('show') :
                    element.classList.remove('show')
            })

            const clicked = document.querySelector('.cat-list li h6.active')
            if (clicked != null) {
                clicked.classList.remove('active')
            }
            e.currentTarget.classList.add('active')
        })
    })


    allBtn.addEventListener('click', () => {
        gridElements.forEach((element, index) => element.classList.add("show"))
    })
</script>