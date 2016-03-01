<?php
// ACF: Plugin active?
function tt_acf_active() {
	if ( class_exists( 'acf' ) ) {
		return true;
	}
}
add_action( 'plugins_loaded', 'tt_acf_active' );
// Get field groups by post type location

/*  for PRO users! - function get_acf_field_groups_for_property_type() {
  // need to create cache or transient for this data?
$result = array();
  $acf_field_groups = acf_get_field_groups();
  if($acf_field_groups){
	  foreach($acf_field_groups as $acf_field_group) {
		foreach($acf_field_group['location'] as $group_locations) {
		  foreach($group_locations as $rule) {
	
			  if($rule['param'] == 'post_type' && $rule['operator'] == '==' && $rule['value'] == 'property') {
			  
				$result[] = acf_get_fields( $acf_field_group );
							
			  }
	
		  }
		  
		}
		  
	  }
  }
  
  return $result;
}*/
// ACF: Group IDs for post type "property"
if ( ! function_exists('tt_acf_group_id_property') ) {
	function tt_acf_group_id_property() {
	    $group_id=array();
		$the_query = new WP_Query( array( 'post_type' => array('acf','acf-field'), 'posts_per_page' => -1,'post_status'=>'publish', 'location'=>array(array('param'=>'post_type', 'operator'=>'==','value'=>'property')) ) );
		if ( $the_query->have_posts() ) : 
			while ( $the_query->have_posts() ) : $the_query->the_post();
				 $group_id[]=get_the_ID();
			endwhile;
			/*  for PRO users! - echo "<pre>";
			print_r($acf_field_groups);
			echo "</pre>";*/
			wp_reset_query();

		endif;
	    return $group_id;
	}
}

// ACF: Property Fields Name
if ( ! function_exists('tt_acf_fields_name') ) {
	function tt_acf_fields_name( array $group_ids, $single=false ) {
		$acf_field_name = array();
	    if($group_ids){
			foreach($group_ids as $group_id){
				$acf_field_keys = get_post_custom_keys( $group_id );
				if ( isset( $acf_field_keys ) && !empty( $acf_field_keys ) ) {
					foreach ( $acf_field_keys as $key => $value ) {
					if ( stristr( $value, 'field_' ) ) {
					  $acf_field = get_field_object( $value, $group_id ); 
						if( stristr( $acf_field['name'], 'additional_' ) ) {
					  		$acf_field_name[] = $acf_field['name'];
					  	}
					}
					}
				}else{
					 $field_post=get_post( $group_id );
					 $acf_field = get_field_object( $field_post->post_name, $group_id ); 
					 if( stristr( $acf_field['name'], 'additional_' ) ) {
					  	$acf_field_name[] = $acf_field['name'];
					 }
				}
			}
		}
		return $acf_field_name;
	  
	}
}
// ACF: Additional Property Fields

/*  for PRO users! - if ( ! function_exists('tt_acf_fields_additional') ) {
	function tt_acf_fields_additional( array $group_ids ) {
		$acf_field_name = array();
		if($group_ids){
			foreach($group_ids as $group_id){
				$acf_field_keys = get_post_custom_keys( $group_id );
				
				
				if ( isset( $acf_field_keys ) && !empty( $acf_field_keys ) ) {
					foreach ( $acf_field_keys as $key => $value ) {
					if ( stristr( $value, 'field_' ) ) {
					  $acf_field = get_field_object( $value, $group_id ); 
					   if ( stristr( $acf_field['name'], 'additional_' ) ) {
							$acf_field_name[] = $acf_field['name'];
							
						
					   }
					}
					}
				}else{
					 $field_post=get_post( $group_id );
					  $acf_field = get_field_object( $field_post->post_name, $group_id ); 
					  if( stristr( $acf_field['name'], 'additional_' ) ) {
					  	$acf_field_name[] = $acf_field['name'];
					  }
				}
			}
		}
		return $acf_field_name;
	  
	}
}*/

// ACF: Property Fields Label
if ( ! function_exists('tt_acf_fields_label') ) {
	function tt_acf_fields_label( array $group_ids,$single=false) {
		$acf_field_label = array();
		if($group_ids){
			foreach($group_ids as $group_id){		
				$acf_field_keys = get_post_custom_keys( $group_id );
				if ( isset( $acf_field_keys ) && !empty( $acf_field_keys ) ) {
					foreach ( $acf_field_keys as $key => $value ) {
						if ( stristr( $value, 'field_' ) ) {
							$acf_field = get_field_object( $value, $group_id ); 
							if ( stristr( $acf_field['name'], 'additional_' ) ) {
								$acf_field_label[] = $acf_field['label'];
							}
						}
					}   
				}
				else{
					$field_name=get_the_title( $group_id );
					$field_post=get_post( $group_id );
					$acf_field = get_field_object( $field_post->post_name, $group_id ); 
					if ( stristr( $acf_field['name'], 'additional_' ) ) {
						$acf_field_label[] = $field_name;
					}
				}
			}
		}
		return $acf_field_label;
	    
	}
}

// ACF: Property Fields Type
if ( ! function_exists('tt_acf_fields_type') ) {
	function tt_acf_fields_type(array $group_ids, $single=false ) {
		$acf_field_types = array();
		if($group_ids){
			foreach($group_ids as $group_id){	
				$acf_field_keys = get_post_custom_keys( $group_id );
				if ( isset( $acf_field_keys ) && !empty( $acf_field_keys ) ) {
					foreach ( $acf_field_keys as $key => $value ) {
						if ( stristr( $value, 'field_' ) ) {
						  $acf_field = get_field_object( $value, $group_id );
						  if( stristr( $acf_field['name'], 'additional_' ) ) { 
								$acf_field_types[] = $acf_field['type'];
						  }
						}
					}
				} else {
					$field_post=get_post( $group_id );
					 $acf_field = get_field_object( $field_post->post_name, $group_id ); 
					 if( stristr( $acf_field['name'], 'additional_' ) ) {
					  	$acf_field_types[] = $acf_field['type'];
					 }
				}
			}
		}
		return $acf_field_types;
	    
	}
}

// ACF: Property Fields "Required"
if ( ! function_exists('tt_acf_fields_required') ) {
	function tt_acf_fields_required( $group_id ) {
		
		$acf_field_keys = get_post_custom_keys( $group_id );
		$acf_field_label = array();
		if ( isset( $acf_field_keys ) && !empty( $acf_field_keys ) ) {
			foreach ( $acf_field_keys as $key => $value ) {
			if ( stristr( $value, 'field_' ) ) {
			  $acf_field = get_field_object( $value, $group_id ); 
					$acf_field_label[] = $acf_field['required'];
			}
			}
		}
		return $acf_field_label;
	    
	}
}
function tt_is_array_empty($arr_acf){
	
	if(is_array($arr_acf)){
		foreach($arr_acf as $elm)
		if(!empty($elm)) { 
		   return false;
		} 
	}
	return true;
}
?>