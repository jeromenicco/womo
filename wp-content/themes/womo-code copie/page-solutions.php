<?php /* Template Name: Solutions Template Page  */ ?>

<?php get_header(); ?>

<?php
    
    $parent_page = get_page_by_path('oplossingen/');
    $args = array(
        'post_type'      => 'page',
        'post_parent'    => $parent_page->ID,
        'post_not_in' => $post->ID
    );
    $children_solutions_query = new WP_Query($args);
    ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class="section-solutions intro pale-blue">
            <div class="content description">
                <h5><?php the_title(); ?></h5>
                <?php any_group_block(1); ?>
            </div>
        </section>

        <section class="section-solutions options white">
            <div class="content center">
                <?php any_group_block(2); ?>
            </div>
        </section>

        <section class="section-solutions media white">
            <div class="content center">
                <?php any_group_block(3); ?>
            </div>
        </section>

        <section class="section-solutions selling-points white">
            <div class="content">
                <?php any_group_block(4); ?>
            </div>
        </section>
        
<?php endwhile;
endif;
wp_reset_postdata(); ?>

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

<section class="solutions pale-blue full-width">
        <div class="content">
            <h2 class="center"><?php pll_e('Ontdek onze configurators'); ?></h2>
            <div class="swiper swiper-solutions">
                <div class="swiper-wrapper">
                    <?php if (have_posts()) :  while ($children_solutions_query->have_posts()) : $children_solutions_query->the_post(); ?>
                            <div class="configurator-item swiper-slide">
                                <div class="slide-row">
                                    <h5><?php the_title(); ?></h5>
                                    <?php the_heading_block(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>">
                                    <h6><?php pll_e('Lees meer'); ?></h6>
                                </a>
                            </div>
                    <?php endwhile;
                    endif;
                    wp_reset_postdata(); ?>
                </div>
                <div class="swiper-nav">
                    <div class="prev-el">‹</div>
                    <div class="next-el">›</div>
                </div>
            </div>
        </div>
    </section>





    <script type='module' defer>
  const swiper = new Swiper('.swiper-solutions', {
        slidesPerView: 1.1,
        speed: 200,
        spaceBetween: 20,
        observer: true,

        navigation: {
            nextEl: '.next-el',
            prevEl: '.prev-el',
        },

        breakpoints: {
            700: {
                spaceBetween: 40,
                slidesPerView: 2,
                slidesPerGroup: 2
            },
            1080: {
                slidesPerView: 3,
                // slidesPerGroup: 3
            }
        }
    })
    const slides = document.querySelectorAll('.configurator-item')
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            entry.target.classList.toggle('in-wiewport', entry.isIntersecting)
        })
    }, {
        threshold: [0.2]
    })
    slides.forEach(slide => observer.observe(slide))
</script>




<script defer>
    function wrapVideo() {
        const el = document.querySelector('.wp-block-video', '.wp-block-image')
        const wrapper = document.createElement('div')

        wrapper.classList.add('media-frame')
        el.parentNode.insertBefore(wrapper, el)
        wrapper.appendChild(el)
    }

    wrapVideo()

    const sellingPoints = [...document.querySelectorAll('.wp-block-columns')]

    function addClass() {
        sellingPoints.forEach((block, index) => {
            index % 2 === 0 ? block.classList.add('inverse') : block.classList.remove('inverse')
        })
    }
    addClass()
</script>

<?php get_footer(); ?>