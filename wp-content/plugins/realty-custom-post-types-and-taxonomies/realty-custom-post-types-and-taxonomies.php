<?php
/*
 * Plugin Name: Realty - Custom Post Types And Taxonomies
 * Plugin URI: http://themetrail.com/docs/realty/#properties-and-types
 * Description: Activate Plugin, activate another theme than Realty, then switch back to Realty. This plugin registers custom post type "Property" and "Testimonials" and taxonomies "Property Location", "Property Type" , "Property Status" and "Property Features".
 * Author: ThemeTrail
 * Author URI: http://themetrail.com
/* 
============================== */
if ( !function_exists('tt_register_custom_post_type_property') ) {
function tt_register_custom_post_type_property() {

  $labels = array(
    'name' 									=> __( 'Properties','tt' ),
    'singular_name' 				=> __( 'Property','tt' ),
    'add_new' 							=> __( 'Add New','tt' ),
    'add_new_item' 					=> __( 'Add New Property','tt' ),
    'edit_item' 						=> __( 'Edit Property','tt' ),
    'new_item' 							=> __( 'New Property','tt' ),
    'view_item' 						=> __( 'View Property','tt' ),
    'search_items' 					=> __( 'Search Property','tt' ),
    'not_found' 						=> __( 'No Property found.','tt' ),
    'not_found_in_trash' 		=> __( 'No Property found in Trash.','tt' )
  );

  $args = array(
	  'labels' 								=> $labels,
	  'public' 								=> true,
	  'show_ui' 							=> true,
	  'show_in_admin_bar' 		=> true,
	  'menu_position' 				=> 20,
	  'menu_icon' 						=> 'dashicons-admin-home',
	  'publicly_queryable' 		=> true,
	  'query_var' 						=> true,
	  'rewrite' 							=> true,
	  'hierarchical' 					=> true,
	  'supports' 							=> array( 'title', 'editor', 'thumbnail', 'author', 'page-attributes', 'comments' ),
	  'rewrite' 							=> array( 'slug' => __( 'property', 'tt' ) )
  );

  register_post_type( 'property', $args );

}
}
add_action( 'init', 'tt_register_custom_post_type_property' );


/* REGISTER PROPERTY TAXONOMIES
============================== */
function tt_register_taxonomy_property_location() {
	register_taxonomy( 'property-location', 'property', array(  
	    'meta_box_cb'                => false,
	    'labels' 						=> array(
	    	'name' 												=> __( 'Property Location', 'tt' ),
	    	'singular_name' 							=> __( 'Property Location', 'tt' ),
	    	'search_items' 								=> __( 'Search Property Location', 'tt' ),
	    	'popular_items' 							=> __( 'Popular Property Location', 'tt' ),
	    	'all_items' 									=> __( 'All Property Location', 'tt' ),
	    	'edit_item' 									=> __( 'Edit Property Location', 'tt' ),
	    	'update_item' 								=> __( 'Update Property Location', 'tt' ),
	    	'add_new_item' 								=> __( 'Add New Property Location', 'tt' ),
	    	'new_item_name' 							=> __( 'New Property Location Name', 'tt' ),
	    	'separate_items_with_commas' 	=> __( 'Separate Property Location With Commas', 'tt' ),
	    	'add_or_remove_items' 				=> __( 'Add or Remove Property Location', 'tt' ),
	    	'choose_from_most_used' 			=> __( 'Choose From Most Used Property Location', 'tt' ),  
	    	'parent' 											=> __( 'Parent Property Location', 'tt' )      	
	    	),
	    'hierarchical'			=> true,
	    'query_var' 				=> true,  
	    'rewrite' 					=> array( 'slug' => __( 'property-location', 'tt' ) ),
	    'show_ui'           => true, // Whether to generate a default UI for managing this taxonomy
			'show_admin_column' => true, // Whether to allow automatic creation of taxonomy columns on associated post-Locations table
		)  
	);
}
add_action( 'init', 'tt_register_taxonomy_property_location', 0 );

function tt_register_taxonomy_property_status() {
	register_taxonomy( 'property-status', 'property', array(  
	    'meta_box_cb'                => false,
	    'labels' 						=> array(
	    	'name' 												=> __( 'Property Status', 'tt' ),
	    	'singular_name' 							=> __( 'Property Status', 'tt' ),
	    	'search_items' 								=> __( 'Search Property Status', 'tt' ),
	    	'popular_items' 							=> __( 'Popular Property Status', 'tt' ),
	    	'all_items' 									=> __( 'All Property Status', 'tt' ),
	    	'edit_item' 									=> __( 'Edit Property Status', 'tt' ),
	    	'update_item' 								=> __( 'Update Property Status', 'tt' ),
	    	'add_new_item' 								=> __( 'Add New Property Status', 'tt' ),
	    	'new_item_name' 							=> __( 'New Property Status Name', 'tt' ),
	    	'separate_items_with_commas' 	=> __( 'Separate Property Status With Commas', 'tt' ),
	    	'add_or_remove_items' 				=> __( 'Add or Remove Property Status', 'tt' ),
	    	'choose_from_most_used' 			=> __( 'Choose From Most Used Property Status', 'tt' ),  
	    	'parent' 											=> __( 'Parent Property Status', 'tt' )      	
	    	),
	    'hierarchical'			=> true,
	    'query_var' 				=> true,  
	    'rewrite' 					=> array( 'slug' => __( 'property-status', 'tt' ) ),
	    'show_ui'           => true, // Whether to generate a default UI for managing this taxonomy
			'show_admin_column' => true, // Whether to allow automatic creation of taxonomy columns on associated post-Statuss table
		)  
	);
}
add_action( 'init', 'tt_register_taxonomy_property_status', 0 );

function tt_register_taxonomy_property_type() {
	register_taxonomy( 'property-type', 'property', array(  
	    'meta_box_cb'                => false,
		'labels' 						=> array(
	    	'name' 												=> __( 'Property Type', 'tt' ),
	    	'singular_name' 							=> __( 'Property Type', 'tt' ),
	    	'search_items' 								=> __( 'Search Property Type', 'tt' ),
	    	'popular_items' 							=> __( 'Popular Property Type', 'tt' ),
	    	'all_items' 									=> __( 'All Property Type', 'tt' ),
	    	'edit_item' 									=> __( 'Edit Property Type', 'tt' ),
	    	'update_item' 								=> __( 'Update Property Type', 'tt' ),
	    	'add_new_item' 								=> __( 'Add New Property Type', 'tt' ),
	    	'new_item_name' 							=> __( 'New Property Type Name', 'tt' ),
	    	'separate_items_with_commas' 	=> __( 'Separate Property Type With Commas', 'tt' ),
	    	'add_or_remove_items' 				=> __( 'Add or Remove Property Type', 'tt' ),
	    	'choose_from_most_used' 			=> __( 'Choose From Most Used Property Type', 'tt' ),  
	    	'parent' 											=> __( 'Parent Property Type', 'tt' )      	
	    	),
	    'hierarchical'			=> true,
	    'query_var' 				=> true,  
	    'rewrite' 					=> array( 'slug' => __( 'property-type', 'tt' ) ),
	    'show_ui'           => true, // Whether to generate a default UI for managing this taxonomy
			'show_admin_column' => true, // Whether to allow automatic creation of taxonomy columns on associated post-types table
		)  
	);
}
add_action( 'init', 'tt_register_taxonomy_property_type', 0 );

function tt_register_taxonomy_property_features() {
	register_taxonomy( 'property-features', 'property', array(  
		'meta_box_cb'                => false,
	    'labels' 						=> array(
	    	'name' 												=> __( 'Property Features', 'tt' ),
	    	'singular_name' 							=> __( 'Property Features', 'tt' ),
	    	'search_items' 								=> __( 'Search Property Features', 'tt' ),
	    	'popular_items' 							=> __( 'Popular Property Features', 'tt' ),
	    	'all_items' 									=> __( 'All Property Features', 'tt' ),
	    	'edit_item' 									=> __( 'Edit Property Features', 'tt' ),
	    	'update_item' 								=> __( 'Update Property Features', 'tt' ),
	    	'add_new_item' 								=> __( 'Add New Property Features', 'tt' ),
	    	'new_item_name' 							=> __( 'New Property Features Name', 'tt' ),
	    	'separate_items_with_commas' 	=> __( 'Separate Property Features With Commas', 'tt' ),
	    	'add_or_remove_items' 				=> __( 'Add or Remove Property Features', 'tt' ),
	    	'choose_from_most_used' 			=> __( 'Choose From Most Used Property Features', 'tt' ),  
	    	'parent' 											=> __( 'Parent Property Features', 'tt' )      	
	    	),
	    'hierarchical'			=> true,
	    'query_var' 				=> true,  
	    'rewrite' 					=> array( 'slug' => __( 'property-feature', 'tt' ) ),
	    'show_ui'           => true, // Whether to generate a default UI for managing this taxonomy
			'show_admin_column' => true, // Whether to allow automatic creation of taxonomy columns on associated post-types table
		)  
	);
}
add_action( 'init', 'tt_register_taxonomy_property_features', 0 );


/* CUSTOM PROPERTY COLUMNS
============================== */

function tt_property_columns( $property_columns ) {
  $property_columns = array(
      'cb' 				=> '<input type=\'checkbox\' />',
      'thumbnail'	=> __( 'Thumbnail','tt' ),
      'title' 		=> __( 'Property Name','tt' ),
      'featured' 	=> __( 'Featured','tt' ),
      'address' 	=> __( 'Address','tt' ),
      'location' 	=> __( 'Location','tt' ),
      'status' 		=> __( 'Status','tt' ),
      'type' 			=> __( 'Type','tt' ),
      'features' 	=> __( 'Features','tt' ),
      'price' 		=> __( 'Price','tt' ),      
      'author' 		=> __( 'Owner','tt' ),      
      'date' 			=> __( 'Published','tt' )
  );
  return $property_columns;
}
add_filter('manage_edit-property_columns', 'tt_property_columns');

function tt_property_custom_columns( $property_column ) {
  
  global $post;
  
  switch ( $property_column ) {
    case 'thumbnail' :
      if( has_post_thumbnail( $post->ID ) ) {
      	the_post_thumbnail( 'thumbnail' );
      }
      else{
      	_e( '-', 'tt' );
      }
      break;
    case 'featured' :
      if( get_post_meta( $post->ID, 'estate_property_featured', true ) ) {
      	_e( 'Yes', 'tt' );
      }
      else{
      	_e( 'No', 'tt' );
      }
      break;
    case 'address' :
      $google_maps = get_post_meta( $post->ID, 'estate_property_google_maps', true );
	  $address=null;
	  if ( !empty( $google_maps ) ) {
		$address = $google_maps['address'];
	  }
	  if($address){
		  echo $address;
	  }
	  else{
      	_e( 'No Address Provided', 'tt' );
      }
      break;
    case 'location' :
      echo get_the_term_list( $post->ID, 'property-location', '', ', ', '' );
      break;
    case 'status' :
      echo get_the_term_list( $post->ID, 'property-status', '', ', ', '' );
      break;      
    case 'type' :
      echo get_the_term_list( $post->ID, 'property-type', '', ', ', '' );
      break;
    case 'features' :
      echo get_the_term_list( $post->ID, 'property-features', '', ', ', '' );
      break;
		case 'price' :
			$properts_price = tt_property_price();
      if ( empty( $properts_price ) ) {
	      _e( '-', 'tt' );
      }
      else {
	      echo $properts_price;
      }
      break;      
  }
  
}
add_action('manage_property_posts_custom_column', 'tt_property_custom_columns');
/* CUSTOM POST TYPE: TESTIMONIALS
============================== */
function tt_register_custom_post_type_testimonial() {

	$labels = array(
    'name' 									=> __( 'Testimonials','tt' ),
    'singular_name' 				=> __( 'Testimonial','tt' ),
    'add_new' 							=> __( 'Add New','tt' ),
    'add_new_item' 					=> __( 'Add New Testimonial','tt' ),
    'edit_item' 						=> __( 'Edit Testimonial','tt' ),
    'new_item' 							=> __( 'New Testimonial','tt' ),
    'view_item' 						=> __( 'View Testimonial','tt' ),
    'search_items' 					=> __( 'Search Testimonial','tt' ),
    'not_found' 						=> __( 'No Testimonial found.','tt' ),
    'not_found_in_trash' 		=> __( 'No Testimonial found in Trash.','tt' )
  );

  $args = array(
	  'labels' 								=> $labels,
	  'public' 								=> true,
	  'show_ui' 							=> true,
	  'show_in_admin_bar' 		=> true,
	  'menu_position' 				=> 20,
	  'menu_icon' 						=> 'dashicons-format-chat',
	  'exclude_from_search' 	=> true,
	  'publicly_queryable' 		=> true,
	  'query_var' 						=> true,
	  'rewrite' 							=> true,
	  'hierarchical' 					=> true,
	  'supports' 							=> array( 'title', 'thumbnail' ),
	  'rewrite' 							=> array( 'slug' => __( 'testimonial', 'tt' ) )
  );
	
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'tt_register_custom_post_type_testimonial' );

// Custom Property Columns
function tt_testimonial_columns( $property_columns ) {
  $property_columns = array(
      'cb' 							=> '<input type=\'checkbox\' />',
      'thumbnail'				=> __( 'Thumbnail','tt' ),
      'title'						=> __( 'From','tt' ),
      'testimonial' 		=> __( 'Testimonial','tt' ),
      'date' 						=> __( 'Date','tt' )
  );
  return $property_columns;
}
add_filter('manage_edit-testimonial_columns', 'tt_testimonial_columns');

function tt_testimonial_custom_columns( $property_column ) {
  
  global $post;
  
  switch ( $property_column ) {
    case 'thumbnail' :
      if( has_post_thumbnail( $post->ID ) ) {
      	the_post_thumbnail( 'thumbnail' );
      }
      else{
      	_e( '-', 'tt' );
      }
      break;
    case 'testimonial' :
      echo get_post_meta( $post->ID, 'estate_testimonial_text', true ); 
      break;
  }
  
}
add_action('manage_testimonial_posts_custom_column', 'tt_testimonial_custom_columns');

/* Custom Email to New users */
if ( !function_exists('wp_new_user_notification') ) {

	function wp_new_user_notification( $user_id, $plaintext_pass = '' ) {

		$user = new WP_User( $user_id );

		$user_login = stripslashes( $user->user_login );
		$user_email = stripslashes( $user->user_email );

		$message  = sprintf( __('New user registration on %s:'), get_option('blogname') ) . "\r\n\r\n";
		$message .= sprintf( __('Username: %s'), $user_login ) . "\r\n\r\n";
		$message .= sprintf( __('E-mail: %s'), $user_email ) . "\r\n";

		@wp_mail(
			get_option('admin_email'),
			sprintf(__('[%s] New User Registration'), get_option('blogname') ),
			$message
		);

		if ( empty( $plaintext_pass ) )
			return;

		$message  = __('Hi There,') . "\r\n\r\n";
		$message .= sprintf( __("Welcome to %s! Here's how to log in:"), get_option('blogname')) . "\r\n\r\n";
		$message .= site_url() . "?login\r\n";
		$message .= sprintf( __('Username: %s'), $user_login ) . "\r\n";
		$message .= sprintf( __('Password: %s'), $plaintext_pass ) . "\r\n\r\n";
		$message .= sprintf( __('If you have any problems, please contact me at %s.'), get_option('admin_email') ) . "\r\n\r\n";
		$message .= __('Thank you!');

		wp_mail(
			$user_email,
			sprintf( __('[%s] Welcome'), get_option('blogname') ),
			$message
		);
	}
}
?>