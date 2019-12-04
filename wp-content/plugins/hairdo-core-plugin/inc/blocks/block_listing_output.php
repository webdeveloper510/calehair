<?php

	function block_listing_output ($params) {

		extract($params);

		// BLOCK CLASSES
		$block_classes = "outter-wrapper";
		if (!empty($custom_classes)) { $block_classes .= " " . $custom_classes; }

		// var_dump($params);

		// OPTIONS
		 $canon_options_post = get_option('canon_options_post');

		//SETTTINGS
		// $cmb_listing_cat = get_post_meta($post->ID, 'cmb_listing_cat', true);
		// $cmb_listing_layout = get_post_meta($post->ID, 'cmb_listing_layout', true);
		// $cmb_listing_orderby = get_post_meta($post->ID, 'cmb_listing_orderby', true);
		// $cmb_listing_order = get_post_meta($post->ID, 'cmb_listing_order', true);
		// $cmb_listing_hide_page_title = get_post_meta($post->ID, 'cmb_listing_hide_page_title', true);
		// $cmb_listing_hide_page_description = get_post_meta($post->ID, 'cmb_listing_hide_page_description', true);
		// $cmb_listing_hide_item_image = get_post_meta($post->ID, 'cmb_listing_hide_item_image', true);
		// $cmb_listing_hide_item_price = get_post_meta($post->ID, 'cmb_listing_hide_item_price', true);
		// $cmb_listing_hide_item_description = get_post_meta($post->ID, 'cmb_listing_hide_item_description', true);
		// $cmb_listing_sidebar = get_post_meta($post->ID, 'cmb_listing_sidebar', true);

		// VARS
		$cat_id = get_term_by('slug', $cmb_listing_cat, 'item_category')->term_id;
		$base_class = "clearfix ";
		$size_class = mb_get_size_class_from_num($cmb_listing_layout, "third");

		switch ($cmb_listing_layout) {
			case '1':
				$img_class = "fifth";
				break;
			case '2':
				$img_class = "two-fifths";
				break;
			default:
				$img_class = "";
		}

		//BASE ARGS
		$query_args = array(
			'posts_per_page'    => $num_posts,
			'post_type'         => 'cpt_item',
			'post_status'       => 'publish',
			'suppress_filters'  => false,
			'tax_query' => array(
				array(
					'taxonomy'      => 'item_category',
					'field'         => 'term_id',
					'terms'         => $cat_id,
				),
			),     
		);

		// ORDER
		if ($cmb_listing_orderby == "cmb_item_price" || $cmb_listing_orderby == "cmb_item_index") {
			$query_args = array_merge($query_args, array(
				'meta_key'			=> $cmb_listing_orderby,
				'orderby'   		=> 'meta_value_num', //or 'meta_value'
				'order'				=> $cmb_listing_order,
			));
		} elseif ($cmb_listing_orderby == "title" || $cmb_listing_orderby == "date") {
			$query_args = array_merge($query_args, array(
				'orderby'           => $cmb_listing_orderby,
				'order'             => $cmb_listing_order,
			));
		} else {
			 $query_args = array_merge($query_args, array(
				'orderby'           => 'title',
				'order'             => 'ASC',
			));
		}


		//FINAL QUERY
		$results_query = get_posts($query_args);

		// var_dump($results_query);

		?>

		<!-- BLOCK: LISTING-->

	        <!-- start outter-wrapper -->   
	        <div <?php pb_block_id_class($block_classes, $params); ?> <?php if ($bg_boxed != 'checked') { printf("data-stellar-background-ratio='$parallax_ratio'"); } ?>>
	            
	            <!-- block styles -->
	            <style type="text/css" scoped>
					<?php include 'includes/inc_block_output_style.php'; ?>
	            </style>
	            
				<!-- start main-container -->
				<div class="main-container">
					<!-- start main wrapper -->
					<div class="main wrapper clearfix">
						<!-- start main-content -->
						<div class="main-content full">

							<?php if($cmb_listing_hide_page_title != "checked") printf('<h1>%s</h1>', esc_attr($title)); ?>
							<?php if($cmb_listing_hide_page_description != "checked") printf('<p class="lead">%s</p>', do_shortcode($text)); ?>
							
							<!-- BEGIN LOOP -->
							<?php 

								for ($i = 0; $i < count($results_query); $i++) {

									$this_post = $results_query[$i];
							
									$cmb_item_price = get_post_meta($this_post->ID, 'cmb_item_price', true);
									if ($canon_options_post['currency_symbol_pos'] == "prepend") {$cmb_item_price = $canon_options_post['currency_symbol'] . $cmb_item_price; }
									if ($canon_options_post['currency_symbol_pos'] == "append") {$cmb_item_price = $cmb_item_price . $canon_options_post['currency_symbol']; }
									if ($cmb_listing_hide_item_price == 'checked') { $cmb_item_price = ""; }

									$last_class = ( ($i+1)%$cmb_listing_layout ) ? "" : " last";
									$final_class = $base_class . $size_class . $last_class;

									if ( ($i === 0) || ($i%$cmb_listing_layout === 0) ) { echo '<div class="clearfix listingList">'; }

									?>


											<div class="<?php echo $final_class ?>">

												<!-- TITLE -->
												<?php if ($cmb_listing_layout != '3') { printf('<h6>%s <span>%s</span></h6>', $this_post->post_title, esc_attr($cmb_item_price)); } ?>

												<!-- FEATURED IMAGE -->
												<?php 

													if ( has_post_thumbnail($this_post->ID) && get_post(get_post_thumbnail_id($this_post->ID)) && $cmb_listing_hide_item_image != "checked" ) { 									
														$post_thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($this_post->ID),'full');
														$post_thumbnail_src_fit = wp_get_attachment_image_src(get_post_thumbnail_id($this_post->ID),'listing_item_thumb_x2');
														$img_alt = get_post_meta(get_post_thumbnail_id($this_post->ID), '_wp_attachment_image_alt', true);
														$img_post = get_post(get_post_thumbnail_id($this_post->ID));

														printf('<div class="gallery_item mosaic-block fade %s">', esc_attr($img_class));
														printf('<a href="%s" class="mosaic-overlay fancybox" title="%s"></a>', esc_url($post_thumbnail_src[0]), esc_attr($img_post->post_title));
														printf('<div class="mosaic-backdrop"><img src="%s" alt="%s" /></div>', esc_url($post_thumbnail_src_fit[0]), esc_attr($img_alt));
														echo '</div>';
													 }

												?>

												<!-- TITLE -->
												<?php if ($cmb_listing_layout == '3') { printf('<h6>%s <span>%s</span></h6>', $this_post->post_title, esc_attr($cmb_item_price)); } ?>
												
												<!-- DESCRIPTION -->
												<?php if ($cmb_listing_hide_item_description != "checked") { echo do_shortcode(wpautop($this_post->post_content)); } ?>
											
											</div>

									<?php

									if ( (($i+1)%$cmb_listing_layout === 0)  || (($i+1) === count($results_query)) ) { echo '</div>'; }

								} 

							?>
							<!-- END LOOP -->

						</div>
						<!-- end main-content -->
						
					</div>
					<!-- end main wrapper -->
				</div>
				<!-- end main-container -->
	        </div>
	        <!-- end outter-wrapper -->
	        
		<!-- END BLOCK -->
		
		<?php

		return true;		
	}
