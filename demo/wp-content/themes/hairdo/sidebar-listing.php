<?php
	
	$canon_options = get_option('canon_options');
	$canon_options_post = get_option('canon_options_post'); 
	
	$cmb_listing_sidebar = get_post_meta($post->ID, 'cmb_listing_sidebar', true);
	$cmb_listing_sidebar_id = get_post_meta($post->ID, 'cmb_listing_sidebar_id', true);
	$sidebar_alignment = ($cmb_listing_sidebar == 'default') ? $canon_options['sidebars_alignment'] : $cmb_listing_sidebar;
	$aside_class = ($sidebar_alignment == 'left') ? 'left-aside fourth' : 'right-aside fourth last';

    // FAILSAFE DEFAULT
    if (empty($cmb_listing_sidebar_id)) { $cmb_listing_sidebar_id = "canon_archive_sidebar_widget_area"; }

?>

				<aside class="<?php echo $aside_class; ?>">

					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($cmb_listing_sidebar_id)) : ?>  
						
						<h4><?php _e("No Widgets added.", "loc_canon"); ?></h4>
						<p><i><?php _e("Please login and add some widgets to this widget area.", "loc_canon"); ?></i></p> 
					
					<?php endif; ?>  

				</aside>