<?php

/* Theme support */
add_action('after_setup_theme', 'theme_setup');
function theme_setup()
{
	add_theme_support('post-thumbnails');
	add_theme_support('menus');
	add_theme_support('title-tag');

	register_nav_menus([
		'primary-menu' => 'primary menu',
		'secondary-menu' => 'secondary menu'
	]);
}

/* Disable WordPress Admin Bar for all users */
add_filter('show_admin_bar', '__return_false');

/* Project script with no dependencies, enqueued in the header */
add_action('wp_enqueue_scripts', 'enqueue_scripts');
function enqueue_scripts()
{
	wp_enqueue_script('Project', get_template_directory_uri() . '/script.js');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
}

//Remove Gutenberg Block Library CSS from loading on the frontend
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
} 



function revcon_change_post_label()
{
	global $menu; // Global to get menu array
	global $submenu; // Global to get submenu array
	$menu[5][0] = 'Projects'; // Change name of posts to portfolio
	$submenu['edit.php'][5][0] = 'All Project Items'; // Change name of all posts to all portfolio items
	$submenu['edit.php'][10][0] = 'Add New';
	$submenu['edit.php'][16][0] = 'Tags';
}
function revcon_change_post_object()
{
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Projects';
	$labels->singular_name = 'Project';
	$labels->add_new = 'Add New';
	$labels->add_new_item = 'Add Project Item';
	$labels->edit_item = 'Edit Project';
	$labels->new_item = 'Project';
	$labels->view_item = 'View Project';
	$labels->search_items = 'Search Projects';
	$labels->not_found = 'No Projects found';
	$labels->not_found_in_trash = 'No Projects found in Trash';
	$labels->all_items = 'All Projects';
	$labels->menu_name = 'Projects';
	$labels->name_admin_bar = 'Project';
}

add_action('admin_menu', 'revcon_change_post_label');
add_action('init', 'revcon_change_post_object');


function News_post_type()
{
	$labels = [
		'name' => _x('News', 'Post Type General Name', 'text_domain'),
		'singular_name' => _x('News', 'Post Type Singular Name', 'text_domain'),
		'menu_name' => __('News', 'text_domain'),
		'name_admin_bar' => __('News', 'text_domain'),
		'archives' => __('Item Archives', 'text_domain'),
		'attributes' => __('Item Attributes', 'text_domain'),
		'parent_item_colon' => __('Parent Item:', 'text_domain'),
		'all_items' => __('All Items', 'text_domain'),
		'add_new_item' => __('Add New Item', 'text_domain'),
		'add_new' => __('Add New', 'text_domain'),
		'new_item' => __('New Item', 'text_domain'),
		'edit_item' => __('Edit Item', 'text_domain'),
		'update_item' => __('Update Item', 'text_domain'),
		'view_item' => __('View Item', 'text_domain'),
		'view_items' => __('View Items', 'text_domain'),
		'search_items' => __('Search Item', 'text_domain'),
		'not_found' => __('Not found', 'text_domain'),
		'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
		'featured_image' => __('Featured Image', 'text_domain'),
		'set_featured_image' => __('Set featured image', 'text_domain'),
		'remove_featured_image' => __('Remove featured image', 'text_domain'),
		'use_featured_image' => __('Use as featured image', 'text_domain'),
		'insert_into_item' => __('Insert into item', 'text_domain'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
		'items_list' => __('Items list', 'text_domain'),
		'items_list_navigation' => __('Items list navigation', 'text_domain'),
		'filter_items_list' => __('Filter items list', 'text_domain'),
	];

	$args = [
		'label' => __('News', 'text_domain'),
		'description' => __('News information page.', 'text_domain'),
		'labels' => $labels,
		'show_in_rest'   => true,
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'custom-fields'),
		'taxonomies' => ['topics', 'category', 'taxonomies'],
		'hierarchical' => false,
		'rewrite' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-admin-page',
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	];
	register_post_type('News', $args);
}

add_action('init', 'News_post_type', 0);

function Team_post_type()
{
	$labels = [
		'name' => _x('Team', 'Post Type General Name', 'text_domain'),
		'singular_name' => _x('Team', 'Post Type Singular Name', 'text_domain'),
		'menu_name' => __('Team', 'text_domain'),
		'name_admin_bar' => __('Team', 'text_domain'),
		'archives' => __('Item Archives', 'text_domain'),
		'attributes' => __('Item Attributes', 'text_domain'),
		'parent_item_colon' => __('Parent Item:', 'text_domain'),
		'all_items' => __('All Items', 'text_domain'),
		'add_new_item' => __('Add New Item', 'text_domain'),
		'add_new' => __('Add New', 'text_domain'),
		'new_item' => __('New Item', 'text_domain'),
		'edit_item' => __('Edit Item', 'text_domain'),
		'update_item' => __('Update Item', 'text_domain'),
		'view_item' => __('View Item', 'text_domain'),
		'view_items' => __('View Items', 'text_domain'),
		'search_items' => __('Search Item', 'text_domain'),
		'not_found' => __('Not found', 'text_domain'),
		'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
		'featured_image' => __('Featured Image', 'text_domain'),
		'set_featured_image' => __('Set featured image', 'text_domain'),
		'remove_featured_image' => __('Remove featured image', 'text_domain'),
		'use_featured_image' => __('Use as featured image', 'text_domain'),
		'insert_into_item' => __('Insert into item', 'text_domain'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
		'items_list' => __('Items list', 'text_domain'),
		'items_list_navigation' => __('Items list navigation', 'text_domain'),
		'filter_items_list' => __('Filter items list', 'text_domain'),
	];

	$args = [
		'label' => __('Team', 'text_domain'),
		'description' => __('Team information page.', 'text_domain'),
		'labels' => $labels,
		'show_in_rest'   => true,
		'supports' => ['title', 'editor', 'author', 'thumbnail', 'revisions'],
		// 'taxonomies' => ['topics', 'category', 'taxonomies'],
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-admin-page',
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	];
	register_post_type('Team', $args);
}

add_action('init', 'Team_post_type', 0);

function Testimonials_post_type()
{
	$labels = [
		'name' => _x('Testimonials', 'Post Type General Name', 'text_domain'),
		'singular_name' => _x('Testimonial', 'Post Type Singular Name', 'text_domain'),
		'menu_name' => __('Testimonials', 'text_domain'),
		'name_admin_bar' => __('Testimonials', 'text_domain'),
		'archives' => __('Item Archives', 'text_domain'),
		'attributes' => __('Item Attributes', 'text_domain'),
		'parent_item_colon' => __('Parent Item:', 'text_domain'),
		'all_items' => __('All Items', 'text_domain'),
		'add_new_item' => __('Add New Item', 'text_domain'),
		'add_new' => __('Add New', 'text_domain'),
		'new_item' => __('New Item', 'text_domain'),
		'edit_item' => __('Edit Item', 'text_domain'),
		'update_item' => __('Update Item', 'text_domain'),
		'view_item' => __('View Item', 'text_domain'),
		'view_items' => __('View Items', 'text_domain'),
		'search_items' => __('Search Item', 'text_domain'),
		'not_found' => __('Not found', 'text_domain'),
		'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
		'featured_image' => __('Featured Image', 'text_domain'),
		'set_featured_image' => __('Set featured image', 'text_domain'),
		'remove_featured_image' => __('Remove featured image', 'text_domain'),
		'use_featured_image' => __('Use as featured image', 'text_domain'),
		'insert_into_item' => __('Insert into item', 'text_domain'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
		'items_list' => __('Items list', 'text_domain'),
		'items_list_navigation' => __('Items list navigation', 'text_domain'),
		'filter_items_list' => __('Filter items list', 'text_domain'),
	];

	$args = [
		'label' => __('Testimonials', 'text_domain'),
		'description' => __('Testimonials information page.', 'text_domain'),
		'labels' => $labels,
		'show_in_rest'   => true,
		'supports' => ['title', 'editor', 'author', 'thumbnail', 'revisions'],
		// 'taxonomies' => ['topics', 'category', 'taxonomies'],
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-admin-page',
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	];
	register_post_type('Testimonials', $args);
}

add_action('init', 'Testimonials_post_type', 0);



// Redirect to ('url')
// add_action('template_redirect', 'redirect_to_other_page');
// function redirect_to_other_page()
// {
// 	if (is_page("solutions")) {
// 		wp_redirect('"' . home_url() . '/solutions/woningconfigurator/"');
// 		exit;
// 	}
// 	if (is_page("oplossingen")) {
// 		wp_redirect('"' . home_url() . '/oplossingen/woningconfigurator/"');
// 		exit;
// 	}
// }

// Get image blocks  
function the_image_block() 
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	foreach ($blocks as $block) {
		if ($block['blockName'] == 'core/image') {
			echo render_block($block);
		} 
	}
}

// Get video blocks  
function the_video_block()
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	foreach ($blocks as $block) {
		if ($block['blockName'] == 'core/video') {
			echo render_block($block);
		} 
	}
}

// Video + image blocks
function the_media_block()
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	foreach ($blocks as $block) {
		if ($block['blockName'] == 'core/image' || $block['blockName'] == 'core/video') {
			echo render_block($block);
			break;
		} 
	}
}

// short code blocks
function the_shortcode_block()
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	foreach ($blocks as $block) {
		if ($block['blockName'] == 'core/shortcode') {
			echo render_block($block);
			break;
		} 
	}
}

// Get gallery blocks  
function the_gallery_block()
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	foreach ($blocks as $block) {
		if ($block['blockName'] == 'core/gallery') {
			echo render_block($block);
		}
	}
}

// Get list block 
function the_list_block()
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	foreach ($blocks as $block) {
		if ($block['blockName'] == 'core/list') {
			echo render_block($block);
			break;
		}
	}
}

// Get paragraph blocks  
function the_paragraph_block()
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	foreach ($blocks as $block) {
		if ($block['blockName'] == 'core/paragraph') {
			echo render_block($block);
		}
	}
}

// Get heading block  
function the_heading_block()
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	foreach ($blocks as $block) {
		if ($block['blockName'] == 'core/heading') {
			echo render_block($block);
			break;
		}
	}
}

// Get all heading blocks
function all_heading_blocks()
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	foreach ($blocks as $block) {
		if ($block['blockName'] == 'core/heading') {
			echo render_block($block);
		}
	}
}

// Get last heading block  
function the_last_heading_block()
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	$reverseBlocks = array_reverse($blocks);

	foreach ($reverseBlocks as $block) {
		if ($block['blockName'] == 'core/heading') {
	
			echo render_block($block);
			break;
			
		}
	}
}



// Get all group block 
function the_groups_block()
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	foreach ($blocks as $block) {
		if ($block['blockName'] == 'core/group') {
			echo render_block($block);
		}
	}
}

// Get first group block  
function the_first_group_block()
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	foreach ($blocks as $block) {
		if ($block['blockName'] == 'core/group') {
			echo apply_filters( 'the_content', render_block( $block ) );
			break;
		}
	}
}

// Get second group block  
function the_second_group_block()
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	$counter = 0;

	foreach ($blocks as $block) {
		if ($block['blockName'] == 'core/group') {
			if ($counter++ < 1) continue;
			echo render_block($block);
			break;
		}
	}
}

// Get second group block  
function the_third_group_block()
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	$counter = 0;

	foreach ($blocks as $block) {
		if ($block['blockName'] == 'core/group') {
			if ($counter++ < 2) continue;
			echo render_block($block);
			break;
		}
	}
}

// Get any group block  
function any_group_block($group_num)
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	$counter = 0;

	foreach ($blocks as $block) {
		if ($block['blockName'] == 'core/group') {
			if ($counter++ < ($group_num - 1)) continue;
			echo render_block($block);
			break;
		}
	}
}

// Get any group block  
function the_block($core)
{
	global $post;
	$blocks = parse_blocks($post->post_content);

	foreach ($blocks as $block) {
		if ($block['blockName'] == "core/ ' . $core . ' ") {
			echo render_block($block);
			break;
		}
	}
}


// Get last group block  
function the_last_group_block()
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	$reverseBlocks = array_reverse($blocks);

	foreach ($reverseBlocks as $block) {
		if ($block['blockName'] == 'core/group') {
	
			echo render_block($block);
			break;
			
		}
	}
}

// Get all columns block 
function the_columns_block()
{
	global $post;
	$blocks = parse_blocks($post->post_content);
	foreach ($blocks as $block) {
		if ($block['blockName'] == 'core/columns') {
			echo render_block($block);
		}
	}
}

function get_sub_cat()
{
	$term = get_queried_object();
	$current_category = $term->term_id;
	$children = get_terms($term->taxonomy, array(
		'parent'    => $term->term_id,
		'hide_empty' => false
	));
	$neighbors = get_terms([
		'taxonomy'   => $term->taxonomy,
		'parent'     => $term->parent,
		'hide_empty' => false
	]);
	if ($children) {
		echo '<li class="current__cat"><a href="' . esc_url(get_term_link($term)) . '">Alle</a></li>';
		foreach ($children as $subcat) {
?>
			<li>
				<a href="<?php echo (esc_url(get_term_link($subcat, $subcat->taxonomy))); ?>"><?php echo ($subcat->name); ?></a>
			</li>
		<?php }
	} elseif ($neighbors) {
		echo '<li><a href="' . esc_url(get_term_link($term->parent)) . '">Alle</a></li>';
		foreach ($neighbors as $subcat) {
			$selected_class = '';
			if ($subcat->term_id == $current_category) {
				$selected_class = "current__cat";
			}
		?>
			<li class="<?php echo $selected_class; ?>">
				<a href="<?php echo (esc_url(get_term_link($subcat, $subcat->taxonomy))); ?>"><?php echo ($subcat->name); ?></a>
			</li>
<?php }
	}
}

// Checks children pages for given parent page ID
function is_tree($pid)
{      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if (is_page() && ($post->post_parent == $pid || is_page($pid)))
		return true;   // we're at the page or at a sub page
	else
		return false;  // we're elsewhere
};

function print_external_link()
{
	global $post;
	$thePostID = $post->ID;
	$post_id = get_post($thePostID);
	$title = $post_id->post_title;
	$perm = get_permalink($post_id);
	$post_keys = array();
	$post_val = array();
	$post_keys = get_post_custom_keys($thePostID);

	if (!empty($post_keys)) {
		foreach ($post_keys as $pkey) {
			if ($pkey == 'Link') {
				$post_val = get_post_custom_values($pkey);
			}
		}
		if (empty($post_val)) {
		} else {
			$link = $post_val[0];
			echo $link;
		}
	}
}



function output_all_postmeta()
{
	$postmetas = get_post_meta(get_the_ID());

	foreach ($postmetas as $meta_key => $meta_value) {
		if (substr($meta_key, 0, 1) !== '_') :
			echo '<h5>' . $meta_key . ' </h5>';
			echo '<h5 class="meta__value">' . $meta_value[0] . '</h5>';
		endif;
	}
}


function sgr_show_current_cat_on_single($output)
{
	global $post;
	if (is_single()) {
		$categories = wp_get_post_categories($post->ID);
		foreach ($categories as $catid) {
			$cat = get_category($catid);
			if (preg_match('#cat-item-' . $cat->cat_ID . '#', $output)) {
				$output = str_replace('cat-item-' . $cat->cat_ID, 'cat-item-' . $cat->cat_ID . ' current-cat', $output);
			}
		}
	}

	return $output;
}

add_filter('wp_list_categories', 'sgr_show_current_cat_on_single');


function translate_after_setup_theme() {

	// register our translatable strings - again first check if function exists.
 
	 if ( function_exists( 'pll_register_string' ) ) {
		 pll_register_string( 'Lees meer', 'Lees meer', 'Wordpress', false );
		 pll_register_string( 'Meer nieuws', 'Meer nieuws', 'Wordpress', false );
		 pll_register_string( 'Neem contact op', 'Neem contact op', 'Wordpress', false );
		 pll_register_string( 'Oplossingen', 'Oplossingen', 'Wordpress', false );
		 pll_register_string( 'Snelle links', 'Snelle links', 'Wordpress', false );
		 pll_register_string( 'Opdrachtgever', 'Opdrachtgever', 'Wordpress', false );
		 pll_register_string( 'Terug naar nieuwsoverzicht', 'Terug naar nieuwsoverzicht', 'Wordpress', false );
		 pll_register_string( 'Terug naar all cases', 'Terug naar all cases', 'Wordpress', false );
		 pll_register_string( 'Nieuw bij Woonmodule', 'Nieuw bij Woonmodule', 'Wordpress', false );
		 pll_register_string( 'Ontdek onze configurators', 'Ontdek onze configurators', 'Wordpress', false );
		 pll_register_string( 'Bekijk onze andere cases', 'Bekijk onze andere cases', 'Wordpress', false );
		 pll_register_string( 'Alle', 'Alle', 'Wordpress', false );
		 
		 pll_register_string( 'NL', 'NL', 'Wordpress', false );
		 
		 
 
	 }
 }
  add_action( 'after_setup_theme', 'translate_after_setup_theme' );


 