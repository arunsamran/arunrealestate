<?php
if ( !function_exists('estate_register_meta_boxes') ) {
	function estate_register_meta_boxes( $meta_boxes ) {
	            
		$prefix = 'estate_';
		
		$agents = array( '' => __( 'None', 'tt' ) );
		// Get all users with role "agent"
		$all_agents = get_users( array( 'role' => 'agent', 'fields' => 'ID' ) );
		foreach( $all_agents as $agent ) { 
			$agents[$agent] = get_user_meta($agent, 'first_name', true ) . ' ' . get_user_meta($agent, 'last_name', true );
		}
		/*  for PRO users! -  TESTIMONIAL
		============================== */
		$meta_boxes[] = array(		
			'id' 						=> 'testimonial_settings',
			'title' 				=> __( 'Testimonial', 'tt' ),
			'pages' 				=> array( 'testimonial' ),
			'context' 			=> 'normal',
			'priority' 			=> 'high',
			'autosave' 			=> true,
			'fields' 				=> array(
				array(
					'name' 					=> __( 'Testimonial Text', 'tt' ),
					'id'   					=> "{$prefix}testimonial_text",
					'type' 					=> 'textarea',
					'std'  					=> __( '', 'tt' ),
				),
			)
		);
		
		
		/*  for PRO users! -  POST TYPE "GALLERY"
		============================== */
		$meta_boxes[] = array(		
			'id' 						=> 'post_type_gallery',
			'title' 				=> __( 'Gallery Settings', 'tt' ),
			'pages' 				=> array( 'post' ),
			'context' 			=> 'normal',
			'priority' 			=> 'high',
			'autosave' 			=> true,
			'fields' 				=> array(
				array(
					'name'             => __( 'Gallery Images', 'tt' ),
					'id'               => "{$prefix}post_gallery",
					'type'             => 'image_advanced',
					'max_file_uploads' => 100,
				),
			)
		);
		
		
		/*  for PRO users! -  POST TYPE "VIDEO"
		============================== */
		$meta_boxes[] = array(		
			'id' 						=> 'post_type_video',
			'title' 				=> __( 'Video Settings', 'tt' ),
			'pages' 				=> array( 'post' ),
			'context' 			=> 'normal',
			'priority' 			=> 'high',
			'autosave' 			=> true,
			'fields' 				=> array(
				array(
				'name'	=> 'Full Video URL',
				'id'	=> "{$prefix}post_video_url",
				'desc'	=> 'Insert Full Video URL (i.e. <strong>http://vimeo.com/99370876</strong>)',
				'type' 	=> 'text',
				'std' 	=> ''
			)
			)
		);
		
		
		/*  for PRO users! -  PAGE SETTINGS
		============================== */
		$meta_boxes[] = array(		
			'id' 						=> 'pages_settings',
			'title' 				=> __( 'Page Settings', 'tt' ),
			'pages' 				=> array( 'post', 'page', 'property', 'agent' ),
			'context' 			=> 'normal',
			'priority' 			=> 'high',
			'autosave' 			=> true,
			'fields' 				=> array(
				array(
					'name' 					=> __( 'Hide Sidebar', 'tt' ),
					'id'   					=> "{$prefix}page_hide_sidebar",
					'type' 					=> 'checkbox',
					'std'  					=> 0,
				),
				array(
					'name' 					=> __( 'Hide Footer Widgets', 'tt' ),
					'id'   					=> "{$prefix}page_hide_footer_widgets",
					'type' 					=> 'checkbox',
					'std'  					=> 0,
				),
				// Intro Page Only
				array(
					'name'             => __( 'Intro Fullscreen Background Slideshow Images', 'tt' ),
					'id'               => "{$prefix}intro_fullscreen_background_slideshow_images",
					'class'						 => 'intro-only',
					'type'             => 'image_advanced',
					'max_file_uploads' => 100,
				),
				/*  for PRO users! -  XXX
				array(
					'name'             => __( 'Intro Fullscreen Background Video URL', 'tt' ),
					'id'               => "{$prefix}intro_fullscreen_background_video_url",
					'class'						 => 'intro-only',
					'type'             => 'text',
					'desc'						 => 'Insert Full Video URL (i.e. <strong>https://www.youtube.com/watch?v=0q_oXY0thxo</strong>)',
				),
				*/
			)
		);
		
		
		// Page Template "Property - Slideshow"
		$meta_boxes[] = array(		
			'id' 						=> 'slideshow_settings',
			'title' 				=> __( 'Slideshow Settings', 'tt' ),
			'pages' 				=> array( 'page' ),
			'context' 			=> 'normal',
			'priority' 			=> 'high',
			'autosave' 			=> true,
			'fields' 				=> array(
				array(
					'name' 					=> __( 'Type', 'tt' ),
					'id'   					=> "{$prefix}property_slideshow_type",
					'desc'  				=> __( '', 'tt' ),
					'type' 					=> 'select',
					'options'  			=> array(
						'featured' 				=> __( 'Featured Properties', 'tt' ),
						'latest' 					=> __( 'Latest Three Properties', 'tt' ),
						'selected' 				=> __( 'Selected Properties (choose below)', 'tt' ),
					),
					'std'  					=> 'latest',
				),
				array(
					'name'    			=> __( 'Selected Properties', 'tt' ),
					'id'      			=> "{$prefix}property_slideshow_selected_properties",
					'type'    			=> 'post',
					'post_type' 		=> 'property',
					'field_type' 		=> 'select_advanced',
					'multiple'    	=> true,
					// Query arguments (optional). No settings means get all published posts
					'query_args' 		=> array(
						'post_status' 		=> 'publish',
						'posts_per_page' 	=> '-1',
					)
				),
				array(
					'name' 					=> __( 'Property Search', 'tt' ),
					'id'   					=> "{$prefix}property_slideshow_search",
					'desc'  				=> __( 'Setup in Theme Options Panel', 'tt' ),
					'type' 					=> 'radio',
					'options'				=> array(
						'none'						=> __( 'No Search', 'tt' ),
						'custom'					=> __( 'Property Search', 'tt' ),
						'mini'						=> __( 'Property Search Mini', 'tt' ),
					)
				),
			)
		);
		
		
		// Page Template "Property - Map"
		$meta_boxes[] = array(		
			'id' 						=> 'property_map_settings',
			'title' 				=> __( 'Property Map Settings', 'tt' ),
			'pages' 				=> array( 'page' ),
			'context' 			=> 'normal',
			'priority' 			=> 'high',
			'autosave' 			=> true,
			'fields' 				=> array(
				array(
					'name' 					=> __( 'Property Location', 'tt' ),
					'id'   					=> "{$prefix}property_map_location",
					'desc'  				=> __( '', 'tt' ),
					'type'    			=> 'taxonomy_advanced',
					'options' 			=> array(
						'taxonomy' 				=> 'property-location', // Taxonomy name
						'type' 						=> 'select_advanced', // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
						'args' 						=> array() // Additional arguments for get_terms() function. Optional
					),
				),
				array(
					'name' 					=> __( 'Property Status', 'tt' ),
					'id'   					=> "{$prefix}property_map_status",
					'desc'  				=> __( '', 'tt' ),
					'type'    			=> 'taxonomy_advanced',
					'options' 			=> array(
						'taxonomy' 				=> 'property-status',
						'type' 						=> 'checkbox_list',
						'args' 						=> array()
					),
				),
				array(
					'name' 					=> __( 'Property Type', 'tt' ),
					'id'   					=> "{$prefix}property_map_type",
					'desc'  				=> __( '', 'tt' ),
					'type'    			=> 'taxonomy_advanced',
					'options' 			=> array(
						'taxonomy' 				=> 'property-type',
						'type' 						=> 'checkbox_list',
						'args' 						=> array()
					),
				),
				array(
					'name' 					=> __( 'Custom Zoom Level', 'tt' ),
					'id'   					=> "{$prefix}property_map_custom_zoom_level",
					'desc'  				=> __( 'Enter only, if your properties are located very closeby, and you would like to zoom closer. Zoom targets oldest property.', 'tt' ),
					'type' 					=> 'number',
					'step'  				=> 1,
					'min'						=> 0
				),
			)
		);
	
		return $meta_boxes;
	}
}
add_filter( 'rwmb_meta_boxes', 'estate_register_meta_boxes' );