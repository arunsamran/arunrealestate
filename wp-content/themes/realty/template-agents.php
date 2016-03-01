<?php get_header();
/*  for PRO users! - 
Template Name: Agents
*/
$hide_sidebar = get_post_meta( get_the_ID(), 'estate_page_hide_sidebar', true );
$hide_footer_widgets = get_post_meta( $post->ID, 'estate_page_hide_footer_widgets', true );
global $realty_theme_option;
?>
<div class="row">
	
	<?php 
	// Check for Agent Sidebar
	if ( ! $hide_sidebar && is_active_sidebar( 'sidebar_agent' ) ) {
		echo '<div class="col-sm-8 col-md-9">';
	} else {
		echo '<div class="col-sm-12">';
	}
	
	$args_users = array(
		'role'         => 'agent',
		'orderby'      => 'registered',
		'order'        => 'ASC',	
	);
	
	$user_query_results = get_users( $args_users );
	
	// Display author info only, if user has published properties
	if ( $user_query_results ) {
		
		foreach($user_query_results as $agent_user) {
		$agent = $agent_user->ID;
		$company_name = get_user_meta( $agent, 'company_name', true );
		$first_name = get_user_meta( $agent, 'first_name', true );
		$last_name = get_user_meta( $agent, 'last_name', true );
		$email = get_userdata( $agent );
		$email = $email->user_email;
		$office = get_user_meta( $agent, 'office_phone_number', true );
		$mobile = get_user_meta( $agent, 'mobile_phone_number', true );
		$fax = get_user_meta( $agent, 'fax_number', true );
		$website = get_userdata( $agent );
		$website = $website->user_url;
		$website_clean = str_replace( array( 'http://', 'https://' ), '', $website );
		$bio = get_user_meta( $agent, 'description', true );
		$profile_image = get_user_meta( $agent, 'user_image', true );
		$author_profile_url = get_author_posts_url( $agent );
		$facebook = get_user_meta( $agent, 'custom_facebook', true );
		$twitter = get_user_meta( $agent, 'custom_twitter', true );
		$google = get_user_meta( $agent, 'custom_google', true );
		$linkedin = get_user_meta( $agent, 'custom_linkedin', true );
		?>
		<div id="agent" class="content-box">
			
		<section class="row">
			<?php
			if ( $profile_image ) {
				$profile_image_id = tt_get_image_id( $profile_image );
				$profile_image_array = wp_get_attachment_image_src( $profile_image_id, 'square-400' );
				echo '<div class="col-sm-4">';
				echo '<img src="' . $profile_image_array[0] . '" />';
				if ( $realty_theme_option['show-agent-social-networks'] ) {
				echo '<div class="social-transparent">';
				if ( $facebook ) { echo '<a href="' . $facebook . '" target="_blank"><i class="fa fa-facebook"></i></a>'; }
				if ( $twitter ) { echo '<a href="' . $twitter . '" target="_blank"><i class="fa fa-twitter"></i></a>'; }
				if ( $google ) { echo '<a href="' . $google . '" target="_blank"><i class="fa fa-google-plus"></i></a>'; }
				if ( $linkedin ) { echo '<a href="' . $linkedin . '" target="_blank"><i class="fa fa-linkedin"></i></a>'; }
				echo '</div>';
				}
				echo '</div>';					
				echo '<div class="col-sm-8">';
			}	else {
				echo '<div class="col-sm-12">';
			}
			
			if ( $first_name && $last_name ) {
				echo '<h2 class="title">' . $first_name . ' ' . $last_name . '</h2>';
				if ( $company_name ) {
				  echo '<p class="company-name">' . $company_name . '</p>';
				}
			} else if ( $company_name ) {
				echo '<h2 class="title">' . $company_name . '</h2>';
			}
			?>
			
			<?php 
			if ( $email && $realty_theme_option['show-agent-email']) { ?><div class="contact"><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo antispambot( $email ); ?>"><?php echo antispambot( $email ); ?></a></div><?php }
			if ( $office && $realty_theme_option['show-agent-office'] ) { ?><div class="contact"><i class="fa fa-phone"></i><?php echo $office; ?></div><?php }
			if ( $mobile && $realty_theme_option['show-agent-mobile']) { ?><div class="contact"><i class="fa fa-mobile"></i><?php echo $mobile; ?></div><?php }
			if ( $fax && $realty_theme_option['show-agent-fax'] ) { ?><div class="contact"><i class="fa fa-fax"></i><?php echo $fax; ?></div><?php }
			if ( $website && $realty_theme_option['show-agent-website'] ) { ?><div class="contact"><i class="fa fa-globe"></i><a href="<?php echo $website; ?>" target="_blank"><?php echo $website_clean; ?></a></div><?php }
			if ( $bio ) { ?><div class="description"> <?php $trim = wp_trim_words( $bio, 40, '..' ); echo '<p>' . $bio . '</p>';	?></div><?php }
			
			echo '<div class="agent-more-link" style="margin-top: 12px;"><a href="'. $author_profile_url .'" class="btn btn-primary">' . __( 'Profile', 'tt' ) . '</a></div>';	
			?>		
			</div><!-- .col-sm-xx -->
		
		</section>
		
		</div><!-- #agent -->
	
	<?php } ?> 
	  
	<div id="pagination">
	<?php
	// Built Property Pagination
	global $wp_query;
	$big = 999999999; // need an unlikely integer
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	
	echo paginate_links( array(
	'base' 				=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' 			=> '?page=%#%',
	'total' 			=> $wp_query->max_num_pages,
	//'show_all'		=> true,
	'end_size'           => 4,
	'mid_size'           => 2,
	'type'				=> 'list',
	'current'     => $paged,
	'prev_text' 	=> __( '<i class="btn btn-default fa fa-angle-left"></i>', 'tt' ),
	'next_text' 	=> __( '<i class="btn btn-default fa fa-angle-right"></i>', 'tt' ),
	) );
	?>
	</div>
	<?php
	} // END if user has published properties
	
	else {
		echo '<p>' . __( 'Publish at least one property to enable your public user profile.', 'tt' ) . '</p>';
		echo '</div><!-- #agent -->';
	}
	?>
	
	</div><!-- .col-sm-8 -->
	
	<?php 
	// Check for Agent Sidebar
	if ( ! $hide_sidebar && is_active_sidebar( 'sidebar_agent' ) ) : 
	?>
	<div class="col-sm-4 col-md-3">
	<ul id="sidebar">
	<?php dynamic_sidebar( 'sidebar_agent' ); ?>
	</ul>
	</div>
	<?php endif; ?>

</div><!-- .row -->
<?php get_footer(); ?>