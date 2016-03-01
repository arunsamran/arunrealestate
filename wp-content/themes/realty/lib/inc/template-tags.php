<?php
if ( ! function_exists( 'tt_property_listing_sorting_and_view' ) ) {
	function tt_property_listing_sorting_and_view() {

		global $realty_theme_option;
		$listing_view = $realty_theme_option['property-listing-default-view'];
		
		if( ! empty( $_GET[ 'order-by' ] ) ) {
			$orderby = $_GET[ 'order-by' ];
		}
		else {
			$orderby = "date-new";
		}
		?>
		<div class="search-results-header clearfix">
			
			<div class="search-results-view primary-tooltips">
				<i class="fa fa-repeat <?php if ( ! $orderby || $orderby != 'random' ) { echo 'hide'; } ?>" data-toggle="tooltip" title="<?php _e( 'Reload', 'tt' ); ?>"></i>
				<i class="fa fa-th-large <?php if ( isset( $listing_view ) && $listing_view == "grid-view" ) { echo "active"; } ?>" data-view="grid-view" data-toggle="tooltip" title="<?php _e( 'Grid View', 'tt' ); ?>"></i>
				<i class="fa fa-th-list <?php if ( isset( $listing_view ) && $listing_view == "list-view" ) { echo "active"; } ?>" data-view="list-view" data-toggle="tooltip" title="<?php _e( 'List View', 'tt' ); ?>"></i>
			</div>
			
			<div class="search-results-order clearfix">
				<div class="form-group select">
					<select name="order-by" id="orderby" class="form-control">
						<option value="date-new" <?php selected( 'date-new', $orderby ); ?>><?php _e( 'Sort by Date (Newest First)', 'tt' ); ?></option>
						<option value="date-old" <?php selected( 'date-old', $orderby ); ?>><?php _e( 'Sort by Date (Oldest First)', 'tt' ); ?></option>
						<option value="price-high" <?php selected( 'price-high', $orderby ); ?>><?php _e( 'Sort by Price (Highest First)', 'tt' ); ?></option>
						<option value="price-low" <?php selected( 'price-low', $orderby ); ?>><?php _e( 'Sort by Price (Lowest First)', 'tt' ); ?></option>
		         <option value="name-asc" <?php selected( 'name-asc', $orderby ); ?>><?php _e( 'Sort by Name (ascending)', 'tt' ); ?></option>
		         <option value="name-desc" <?php selected( 'name-desc', $orderby ); ?>><?php _e( 'Sort by Name (descending)', 'tt' ); ?></option>
						<option value="random" <?php selected( 'random', $orderby ); ?>><?php _e( 'Random', 'tt' ); ?></option>
					</select>
				</div>
			</div>
		
		</div>
		<?php
			
	}
}
