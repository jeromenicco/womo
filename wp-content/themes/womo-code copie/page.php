<?php get_header(); ?>

<?php if (is_front_page()) : ?>

    <?php $contact_query = new WP_Query('post_type=page&page_id=1614'); ?>
    <?php $news_articles_query = new WP_Query('post_type=page&page_id=1546'); ?>
    <?php $testimonials_cpt_query = new WP_Query('post_type=testimonials'); ?>
    <?php $news_page_query = new WP_Query('post_type=page&page_id=1630'); ?>


    <?php
    $parent_page = get_page_by_path('oplossingen/');
    $args = array(
        'post_type'      => 'page',
        'post_parent'    => $parent_page->ID,
    );
    $children_solutions_query = new WP_Query($args);
    ?>

    <?php $news_posts_limit = new WP_Query(array(
        'post_type'            => 'news',
        'posts_per_page' => 3,
        'order' => 'DESC'
    )); ?>


    <section class="introduction white">
        <div class="shapes-layer">
            <!-- <img class="rhomboid" src="<?php echo get_template_directory_uri(); ?>/assets/shapes/Rhomboid.svg" alt="" />
            <img class="square" src="<?php echo get_template_directory_uri(); ?>/assets/shapes/Square.svg" alt="" />
            <img class="triangle-s" src="<?php echo get_template_directory_uri(); ?>/assets/shapes/Triangle-small.svg" alt="" />
            <img class="triangle-m" src="<?php echo get_template_directory_uri(); ?>/assets/shapes/Triangle-medium.svg" alt="" />
            <img class="triangle-l" src="<?php echo get_template_directory_uri(); ?>/assets/shapes/Triangle-large.svg" alt="" /> -->
            <svg class="rhomboid parallax" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 226.84 183.59" style="enable-background:new 0 0 226.84 183.59;" xml:space="preserve">
                <style type="text/css">
                    .st0 {
                        fill: #99CCFF;
                    }
                </style>
                <polygon class="st0" points="226.84,183.59 99.39,155.52 0,0 127.45,28.07 " />
            </svg>

            <svg class="square parallax" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 180.24 180.24" style="enable-background:new 0 0 180.24 180.24;" xml:space="preserve">
                <style type="text/css">
                    .st0 {
                        fill: #99CCFF;
                    }
                </style>
                <rect x="24.87" y="24.87" transform="matrix(0.5385 0.8426 -0.8426 0.5385 117.531 -34.3479)" class="st0" width="130.51" height="130.51" />
            </svg>

            <svg class="triangle-l parallax" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 345.52 234.95" style="enable-background:new 0 0 345.52 234.95;" xml:space="preserve">
                <style type="text/css">
                    .st0 {
                        fill: #99CCFF;
                    }
                </style>
                <polygon class="st0" points="345.52,0 234.95,234.95 0,124.39 " />
            </svg>

            <svg class="triangle-m parallax" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 227.86 177.58" style="enable-background:new 0 0 227.86 177.58;" xml:space="preserve">
                <style type="text/css">
                    .st0 {
                        fill: #99CCFF;
                    }
                </style>
                <polygon class="st0" points="0,177.58 50.27,0 227.86,50.27 " />
            </svg>

            <svg class="triangle-s parallax" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 151.46 128.46" style="enable-background:new 0 0 151.46 128.46;" xml:space="preserve">
                <style type="text/css">
                    .st0 {
                        fill: #99CCFF;
                    }
                </style>
                <polygon class="st0" points="0,23 128.46,0 151.46,128.46 " />
            </svg>
        </div>



        <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
                <div class="content center">
                    <?php any_group_block(1); ?>
                </div>
        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
    </section>

    <section class="selling-points pale-blue">
        <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
                <div class="content">
                    <?php any_group_block(2); ?>
                </div>
        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
    </section>

    <section class="testimonial white full-width">
        <div class="content">
            <div class="swiper swiper-testimonial">
                <div class="swiper-wrapper">
                    <?php if (have_posts()) :  while ($testimonials_cpt_query->have_posts()) : $testimonials_cpt_query->the_post(); ?>
                            <div class="testimonial-card swiper-slide">
                                <div class="block-text">
                                    <?php the_paragraph_block(); ?>
                                </div>
                                <div class="frame-wrapper">
                                    <div class="image-frame">
                                        <?php the_media_block(); ?>
                                    </div>
                                </div>
                                <div class="author">
                                    <div class="author-wrapper">
                                        <h5><?php the_title(); ?></h5>
                                        <?php the_heading_block(); ?>
                                    </div>
                                </div>
                            </div>
                    <?php endwhile;
                    endif;
                    wp_reset_postdata(); ?>
                </div>
                <!-- <div class="swiper-nav">
                    <div class="prev-el">‹</div>
                    <div class="next-el">›</div>
                </div> -->
            </div>
        </div>
    </section>

    <section class="numbers blue">
        <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
                <div class="content center">
                    <?php any_group_block(3); ?>
                </div>
        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
    </section>

    <section class="getting-started white">
        <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
                <div class="content">
                    <?php any_group_block(4); ?>
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

    <section class="contact pale-pink">
        <?php if (have_posts()) : while ($contact_query->have_posts()) : $contact_query->the_post(); ?>
                <div class="content center">
                    <?php the_last_group_block(); ?>
                </div>
        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
    </section>



    <?php
    $currentlang = get_bloginfo('language');
    if ($currentlang == "nl") :
    ?>
        <section class="other-posts white">
            <?php if (have_posts()) :  while ($news_page_query->have_posts()) : $news_page_query->the_post(); ?>
                    <div class="content">
                        <div class="center">
                            <h2><?php pll_e('Nieuw bij Woonmodule'); ?></h2>
                        </div>
                <?php endwhile;
            endif;
            wp_reset_postdata(); ?>

                <div class="grid-3 content">
                    <?php if (have_posts()) :  while ($news_posts_limit->have_posts()) : $news_posts_limit->the_post(); ?>
                            <div class="post-card">
                                <div class="card-row">
                                    <?php the_post_thumbnail(); ?>
                                    <h5><?php echo get_the_date(); ?></h5>
                                    <h3><?php the_title(); ?></h3>
                                </div>
                                <a href="<?php the_permalink(); ?>">
                                    <h6><?php pll_e('Lees meer'); ?></h6>
                                </a>
                            </div>
                    <?php endwhile;
                    endif; ?>
                </div>

        </section>


    <?php endif; ?>






<?php endif; ?>


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
            1145: {
                slidesPerView: 3,
                // slidesPerGroup: 3
            }
        }
    })

    const testimonialSlides = document.querySelectorAll('.testimonial-card')
    console.log(testimonialSlides.length)

    if (testimonialSlides.length > 1) {
        const swiperTestimonial = new Swiper('.swiper-testimonial', {
            slidesPerView: 1,
            speed: 400,
            spaceBetween: 20,
            observer: true,

            // navigation: {
            //     nextEl: '.next-el',
            //     prevEl: '.prev-el',
            // },
            autoplay: {
                delay: 5000,
            },

            breakpoints: {
                700: {
                    spaceBetween: 40
                }
            }
        })
    }



    function wrapVideo() {
        const el = document.querySelector('.wp-block-video')
        const wrapper = document.createElement('div')

        wrapper.classList.add('media-frame')
        el.parentNode.insertBefore(wrapper, el)
        wrapper.appendChild(el)
    }

    wrapVideo()

    const numbers = [...document.querySelectorAll('.numbers .content p')]
    const sellingPoints = [...document.querySelectorAll('.wp-block-columns')]

    function addClass() {
        numbers.forEach((number, index) => {
            number.classList.add('animated-number')
        })
        sellingPoints.forEach((block, index) => {
            index % 2 === 0 ? block.classList.add('inverse') : block.classList.remove('inverse')
        })
    }
    addClass()

    // const animationDuration = 2000
    // const frameDuration = 1000 / 60
    // const totalFrames = Math.round(animationDuration / frameDuration)

    // const easeOutQuad = t => t * (2 - t)

    // // const storedNumbers = [...numbers]

    // const animateCountUp = el => {
    //     console.log(el)
    //     let frame = 0
    //     const countTo = parseInt(el.innerHTML, 10)
    //     const counter = setInterval(() => {
    //         frame++
    //         const progress = easeOutQuad(frame / totalFrames)
    //         const currentCount = Math.round(countTo * progress)


    //         if (parseInt(el.innerHTML, 10) !== currentCount) {
    //             const currentCountCopy = currentCount
    //             const formated = currentCountCopy.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    //             el.innerHTML = formated

    //             // return () => el.innerHTML = currentCountCopy
    //         }
    //         if (frame === totalFrames) {
    //             clearInterval(counter)
    //             // el.innerHTML = currentCount // ---------------
    //         }
    //     }, frameDuration)
    // }


    // const runAnimations = () => {
    //     // numbers.forEach(number => number.innerHTML)
    //     // number.innerHTML.replace(/\./g, " ")
    //     // console.log(numbers)

    //     const storedNumbers = [...numbers]
    //     storedNumbers.forEach(storedNumber => {
    //         animateCountUp(storedNumber)
    //     })
    // }


    const runAnimations = () => {

        function animateValue(obj, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);

                obj.innerHTML = Math.floor(progress * (end - start) + start).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        numbers.map((number, index) => {
            // const formated = number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            // const parsed = parseInt(formated.replace(/\./g, ''))

            console.log(number)
            animateValue(number, 0, number.innerHTML, 2000);
        })
    }



    const sectionNumbers = document.querySelector('section.numbers')

    const observeOptions = {
        root: null,
        margin: '0px',
        rootMargin: '50px',
        threshold: 0
    }

    const onObserve = function(entries, observer) {
        entries.forEach(entry => {
            // runAnimations()
            // if(entry.isIntersecting) observe.unobserve(entry.target)
            if (entry.isIntersecting) {
                runAnimations()
            }
        })
    }
    const observe = new IntersectionObserver(onObserve, observeOptions)
    observe.observe(sectionNumbers)


    const slides = document.querySelectorAll('.swiper-slide')
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            entry.target.classList.toggle('in-wiewport', entry.isIntersecting)
        })
    }, {
        threshold: [0.2]
    })
    slides.forEach(slide => observer.observe(slide))
</script>

<?php get_footer(); ?>