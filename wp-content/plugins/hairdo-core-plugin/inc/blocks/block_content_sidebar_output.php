<?php

	function block_content_sidebar_output ($params) {

		extract($params);

		// FAILSAFE DEFAULTS
		if (!isset($sidebar_id)) { $sidebar_id = "canon_page_sidebar_widget_area"; }

		// BLOCK CLASSES
		$block_classes = "outter-wrapper";
		if (!empty($custom_classes)) { $block_classes .= " " . $custom_classes; }

		?>

	        <!-- start outter-wrapper -->   
	        <div <?php pb_block_id_class($block_classes, $params); ?>>

	            <!-- block styles -->
	            <style type="text/css" scoped>
					<?php include 'includes/inc_block_output_style.php'; ?>
	            </style>
	            
	            <!-- start main-container -->
	            <div class="main-container">
	                <!-- start main wrapper -->
	                <div class="main wrapper clearfix">
	                    <!-- start main-content -->
	                    <div class="main-content three-fourths">

	    	
		                	<div class="clearfix">

	                            <!-- THE TITLE -->  
	                            <h1><?php the_title(); ?></h1>
		                        
	                             <!-- THE CONTENT -->
	                            <?php the_content(); ?>
	                            
	                            <!-- WP_LINK_PAGES -->
	                            <?php wp_link_pages(array('before' => '<p>' . __('Pages:','loc_hairdo_core_plugin'))); ?>
		                                                                                               
		                	</div>  

	                    </div>
	                    <!-- end main-content -->
	    					
	                    <!-- SIDEBAR -->
						<aside class="right-aside fourth last">

							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar_id)) : ?>  
								
		                        <h4><?php _e("No Widgets added.", "loc_hairdo_core_plugin"); ?></h4>
		                        <p><i><?php _e("Please login and add some widgets to this widget area.", "loc_hairdo_core_plugin"); ?></i></p> 
							
					        <?php endif; ?>  

						</aside>
						 <!-- END SIDEBAR -->	


	                </div>
	                <!-- end main wrapper -->
	            </div>
	             <!-- end main-container -->
	        </div>
	        <!-- end outter-wrapper -->
		
		<?php

		return true;		
	}
