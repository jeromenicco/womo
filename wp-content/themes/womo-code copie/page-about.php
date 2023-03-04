<?php /* Template Name: About Template Page  */ ?>

<?php get_header(); ?>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class="section-about white">
            <div class="content center">
                <?php any_group_block(1); ?>
            </div>
        </section>

        <section class="numbers blue">
            <div class="content center">
                <?php any_group_block(2); ?>
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




<script defer>
    const numbers = [...document.querySelectorAll('.numbers .content p')]

    function addAnimatedClass() {
        numbers.forEach((number, index) => {
            number.classList.add('animated-number')
        })
    }
    addAnimatedClass()

    const animationDuration = 2000
    const frameDuration = 1000 / 60
    const totalFrames = Math.round(animationDuration / frameDuration)

    const easeOutQuad = t => t * (2 - t)

    const animateCountUp = el => {
        let frame = 0
        const countTo = parseInt(el.innerHTML, 10)
        const counter = setInterval(() => {
            frame++
            const progress = easeOutQuad(frame / totalFrames)
            const currentCount = Math.round(countTo * progress)

            if (parseInt(el.innerHTML, 10) !== currentCount) {
                el.innerHTML = currentCount;
            }
            if (frame === totalFrames) {
                clearInterval(counter)
            }
        }, frameDuration)
    }

    const runAnimations = () => {
        numbers.forEach(animateCountUp);
    };


    const section = document.querySelector('section.numbers')


    const observeOptions = {
        root: null,
        margin: '0px',
        rootMargin: '50px',
        threshold: 0
    }

    const onObserve = function(entries, observer) {
        entries.forEach(entry => {
            console.log(entry)
            if (entry.isIntersecting) {
                runAnimations()
            }
            // observe.unobserve(entry.target)
        })
    }

    const observe = new IntersectionObserver(onObserve, observeOptions)

    observe.observe(section)
</script>

<?php get_footer(); ?>