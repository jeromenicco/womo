<?php /* Template Name: Contact Template Page  */ ?>

<?php get_header(); ?>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class="section-contact white">
            <div class="content center">
                <?php the_content(); ?>
            </div>
        </section>


<?php endwhile;
endif;
wp_reset_postdata(); ?>



<script defer>

</script>

<?php get_footer(); ?>