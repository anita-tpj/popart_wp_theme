<?php

function pop_setup_theme(){
  register_nav_menu('top', __('Header Navigation Menu', 'popart'));

  add_image_size('slider-image', 1860, 750, true);
  add_image_size('section-3col-image', 370, 310, true);
  add_image_size('section-4col-image', 270, 310, true);
  add_image_size('gallery-image', 450, 380, true);
}

/*Customize Excerpt Length*/
function pop_excerpt_length(){
  return 20;
}


function pop_excerpt_more( $more ) {
  if(is_front_page()){
    return '<a class="post-excerpt-link" href="'. get_permalink( get_the_ID() ) . '">' . __('...', 'popart') . '</a><div><span><a class="post-excerpt-btn post-excerpt-page-btn" href="'. get_permalink( get_the_ID() ) . '">' . __('- - -', 'popart') . '</a></span></div>';
  }else{
    return '<div><span><a class="post-excerpt-btn" href="'. get_permalink( get_the_ID() ) . '">' . __('Continue', 'popart') . '</a></span></div>';
  }
}


//Custom Post type
add_action( 'init', 'custom_bootstrap_slider' );
/**
 * Register a Custom post type for.
 */
function custom_bootstrap_slider() {
	$labels = array(
		'name'               => _x( 'Slider', 'post type general name'),
		'singular_name'      => _x( 'Slide', 'post type singular name'),
		'menu_name'          => _x( 'Bootstrap Slider', 'admin menu'),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar'),
		'add_new'            => _x( 'Add New', 'Slide'),
		'add_new_item'       => __( 'Name'),
		'new_item'           => __( 'New Slide'),
		'edit_item'          => __( 'Edit Slide'),
		'view_item'          => __( 'View Slide'),
		'all_items'          => __( 'All Slide'),
		'featured_image'     => __( 'Featured Image', 'text_domain' ),
		'search_items'       => __( 'Search Slide'),
		'parent_item_colon'  => __( 'Parent Slide:'),
		'not_found'          => __( 'No Slide found.'),
		'not_found_in_trash' => __( 'No Slide found in Trash.'),
	);

	$args = array(
		'labels'             => $labels,
		'menu_icon'	     => 'dashicons-star-half',
    	        'description'        => __( 'Description.'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array('title','editor','thumbnail')
	);

	register_post_type( 'slider', $args );
}
