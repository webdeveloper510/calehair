<?php get_header(); ?>
	
<?php 

	$canon_options = get_option('canon_options');
	$canon_options_post = get_option('canon_options_post'); 
	$layout = $canon_options_post['404_layout'];

	// SET MAIN CONTENT CLASS
	if ($layout == "full") {
		$main_content_class = "main-content";
	} else {
		$main_content_class = "main-content three-fourths";
		if ($canon_options['sidebars_alignment'] == 'left') { $main_content_class .= " left-main-content"; }
	}

?>
	
		<!-- Start Outter Wrapper -->	
		<div class="outter-wrapper feature">
			<hr/>
		</div>	
		<!-- End Outter Wrapper -->	    	

		
		<!-- start Outter Wrapper -->  
		<div class="outter-wrapper">    
			<!-- start main-container -->
			<div class="main-container">
				<!-- start main wrapper -->
				<div class="main wrapper clearfix">
					<!-- start main-content -->

		
						<div class="<?php echo $main_content_class; ?>">
							<h1 class="super"><span>404</span></h1>
							<h1><?php echo esc_attr($canon_options_post['404_title']); ?></h1>
							<p class="lead"><?php echo esc_attr($canon_options_post['404_msg']); ?></p>                       
							
							<?php get_search_form(); ?>

						</div>
						<!-- Finish Main Content -->
						
						<!-- SIDEBAR -->
						<?php if ($layout == "sidebar") { get_sidebar('404'); } ?>
						
						<!-- Vertical Spacer -->
						<div class="vertical-spacer"></div>

				</div>
				<!-- end main wrapper -->
			</div>
			 <!-- end main-container --> 
		</div>
		<!-- end outter-wrapper -->
		
		
<?php get_footer(); ?>