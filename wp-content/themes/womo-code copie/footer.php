<?php
$parent_page = get_page_by_path('solutions/');
$args = array(
	'post_type'      => 'page',
	'post_parent'    => $parent_page->ID,
);
$children_solutions_query = new WP_Query($args);
?>

<?php $contact_query = new WP_Query('post_type=page&page_id=1614'); ?>


<footer>


	<section class="footer dark-blue">
		<div class="content">




			<div class="footer-grid">
				<div class="logo-container">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/logo/womo-logo.svg" alt="logo" />
				</div>
				<div class="footer-grid-item">
					<h4 class="bold"><?php pll_e('Oplossingen'); ?></h4>
					<?php wp_nav_menu(array('menu' => 'secondary')); ?>
				</div>

				<div class="footer-grid-item">
					<h4 class="bold"><?php pll_e('Snelle links'); ?></h4>
					<?php wp_nav_menu(array('menu' => 'primary')); ?>
				</div>

				<div class="footer-grid-item contact">
					<h4 class="bold"><?php pll_e('Neem contact op'); ?></h4>
					<?php if (have_posts()) : while ($contact_query->have_posts()) : $contact_query->the_post(); ?>
							<ul>
								<li><?php any_group_block(1); ?></li>
							</ul>
					<?php endwhile;
					endif;
					wp_reset_postdata(); ?>
				</div>

				<div class="footer-grid-item language">
					<div class="dropdown footer">
						<h6 class="dropbtn"><?php pll_e('NL'); ?></h6>
						<div class="dropdown-content">
							<?php wp_nav_menu(array('menu' => 'language-switch')); ?>
						</div>
					</div>
				</div>

				<div class="footer-grid-item copyright">
					<h4>
						© <?php echo date('Y'); ?> Woonmodule
					</h4>
				</div>

				<div class="footer-grid-item privacy">
					<h5>
						Privacy policy
					</h5>
				</div>

			</div>


		</div>
	</section>
</footer>

<?php wp_footer(); ?>
</body>

</html>