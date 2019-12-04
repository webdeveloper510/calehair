<?php

	function block_carousel_output ($params) {

		extract($params);

		// FAILSAFE DEFAULTS
		if (!isset($excerpt_length)) { $excerpt_length = 155; }

		// BLOCK CLASSES
		$block_classes = "outter-wrapper";
		if (!empty($custom_classes)) { $block_classes .= " " . $custom_classes; }
		if ($layout == 'boxed') { $block_classes .= " pb_block_layout_boxed"; } else { $block_classes .= " pb_block_layout_full"; }

		// IF FULL WIDTH CONTENT THEN FORCE BG FULL WIDTH
		if ($layout == "full") { $bg_boxed = "unchecked"; }

		//build exclude string
		$exclude_string = "";
		$results_exclude_posts = get_posts(array(
			'numberposts'		=> -1,
    		'meta_key'          => 'cmb_hide_from_popular',
			'meta_value'		=> 'checked',
			'orderby'			=> 'post_date',
			'order'				=> 'DESC',
			'post_type'			=> 'any',
		));
		if (count($results_exclude_posts) > 0) {
			$exclude_string = "";
			for ($i = 0; $i < count($results_exclude_posts); $i++) {  
				$exclude_string .= $results_exclude_posts[$i]->ID . ",";
			}	
			$exclude_string = substr($exclude_string, 0, strlen($exclude_string)-1);
		} 

		//basic args
		$query_args = array();
		$query_args = array_merge($query_args, array(
			'post_type'    		=> 'post',
			'numberposts' 		=> $num_posts,
			'post_status'     	=> 'publish',
			'offset' 			=> 0,
			'suppress_filters' 	=> false
		));

		if ($show == "latest_posts") {
			$query_args = array_merge($query_args, array(
				'category'			=> '',
				'orderby'			=> 'post_date',
				'order'				=> 'DESC',
			));
		} elseif ($show == "random_posts") {
			$query_args = array_merge($query_args, array(
				'category'			=> '',
				'orderby'			=> 'rand',
			));
		} elseif ($show == "popular_views") {
			$query_args = array_merge($query_args, array(
				'category'			=> '',
				'meta_key'			=> 'post_views',
        		'orderby'   		=> 'meta_value_num', //or 'meta_value_num'
				'order'				=> 'DESC',
				'exclude'			=> $exclude_string,
			));
		} elseif ($show == "popular_comments") {
			$query_args = array_merge($query_args, array(
				'category'			=> '',
				'orderby'			=> 'comment_count',
				'order'				=> 'DESC',
				'exclude'			=> $exclude_string,
			));
		} elseif (strpos($show, "postcat_") !== false) {
			$show = str_replace("postcat_", "", $show);
			$query_args = array_merge($query_args, array(
				'category_name'		=> $show,
				'orderby'			=> 'post_date',
				'order'				=> 'DESC',
			));
		}

		//final query
		$results_query = get_posts($query_args);

		// var_dump($query_args);
		// var_dump($results_query);

		//if less posts in query set num_posts to num query posts
		if (count($results_query) < $num_posts) $num_posts = count($results_query);

		?>

		<!-- BLOCK: LATEST POSTS-->

	        <!-- start outter-wrapper -->   
	        <div <?php pb_block_id_class($block_classes, $params); ?> <?php if ($bg_boxed != 'checked') { printf("data-stellar-background-ratio='$parallax_ratio'"); } ?>>
	        	
	            <!-- block styles -->
	            <style type="text/css" scoped>
					<?php include 'includes/inc_block_output_style.php'; ?>
	            </style>

	            <?php
	            	if ($layout == "boxed") {
	            	?>
	            		
	            <!-- start main-container -->
	            <div class="main-container">
	                <!-- start main wrapper -->
	                <div class="main wrapper clearfix" <?php if ($bg_boxed == 'checked') { printf("data-stellar-background-ratio='$parallax_ratio'"); } ?>>
	                    <!-- start main-content -->
	                    <div class="main-content">

	            	<?php
	            	}
	            ?>

	            
	                    	<!-- Start Post --> 
	                    	<div class="clearfix">

    	          				<?php 

    	          					if ($show_section_header == "checked") {
    	          					?>

									<!-- Start Carousel -->
									<div class="text-seperator">
										<h5><?php echo esc_attr($params['title']); ?></h5>
										
										<div class="owlCustomNavigation right">
									        <a class="btn prev2"></a>
									        <a class="btn next2"></a>
									    </div>
									</div>  

    	          					<?php		
    	          					}

    	          				 ?>


								<div class="owl-carousel post-carousel"
									data-display_num_posts		= "<?php echo esc_attr($display_num_posts); ?>"
									data-slide_speed			= "<?php echo esc_attr($slide_speed); ?>"
									data-autoplay_speed			= "<?php echo esc_attr($autoplay_speed); ?>"	
									data-stop_on_hover			= "<?php echo esc_attr($stop_on_hover); ?>"
									data-pagination 			= "<?php echo esc_attr($pagination); ?>"
								>

								<?php

									for ($i = 0; $i < count($results_query); $i++) { 


										$current_post = $results_query[$i];

			                            $cmb_feature = get_post_meta($current_post->ID, 'cmb_feature', true);
			                            $cmb_media_link = get_post_meta($current_post->ID, 'cmb_media_link', true);
			                            $current_post_publish_date = mb_localize_datetime(get_the_time("j M", $current_post->ID));
                                        $the_excerpt = mb_get_excerpt($current_post->ID, $excerpt_length);

			                            echo ' <div class="item">';

	                                    // featured image. For future reference this section has most in common with page-galleries.php gallery style 3
	                                    if ($show_featured_image == "checked") {
	                                        if ( ($cmb_feature == "media") && (!empty($cmb_media_link)) ) {
	                                            echo $cmb_media_link;        
	                                        } elseif ( ($cmb_feature == "media_in_lightbox") && (!empty($cmb_media_link)) && get_post(get_post_thumbnail_id($current_post->ID)) ) {
	                                            echo '<div class="mosaic-block fade">';
	                                            $post_thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($current_post->ID),'full');
	                                            $post_thumbnail_src_fit = wp_get_attachment_image_src(get_post_thumbnail_id($current_post->ID),'featured_posts_thumb_x2');
	                                            $img_alt = get_post_meta(get_post_thumbnail_id($current_post->ID), '_wp_attachment_image_alt', true);
	                                            $img_post = get_post(get_post_thumbnail_id($current_post->ID));
	                                            if ($link_to == "post") {
	                                                printf('<a href="%s" class="mosaic-overlay link fancybox" title="%s"></a>', get_permalink($current_post->ID), esc_attr($img_post->post_title));
	                                            } else {
	                                                printf('<a href="%s" class="mosaic-overlay fancybox-media fancybox.iframe play" rel="gallery"></a>', esc_attr($cmb_media_link));
	                                            }
	                                            if ($show_date == "checked") {
		                                            printf('<div class="mosaic-backdrop"><div class="corner-date">%s</div><img src="%s" alt="%s" /></div>', esc_attr($current_post_publish_date), esc_url($post_thumbnail_src_fit[0]), esc_attr($img_alt));
	                                            } else {
		                                            printf('<div class="mosaic-backdrop"><img src="%s" alt="%s" /></div>', esc_url($post_thumbnail_src_fit[0]), esc_attr($img_alt));
	                                            }
	                                            echo '</div>';
	                                        } elseif ( has_post_thumbnail($current_post->ID) && get_post(get_post_thumbnail_id($current_post->ID)) ) { 
	                                            echo '<div class="mosaic-block fade">';
	                                            $post_thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($current_post->ID),'full');
	                                            $post_thumbnail_src_fit = wp_get_attachment_image_src(get_post_thumbnail_id($current_post->ID),'featured_posts_thumb_x2');
	                                            $img_alt = get_post_meta(get_post_thumbnail_id($current_post->ID), '_wp_attachment_image_alt', true);
	                                            $img_post = get_post(get_post_thumbnail_id($current_post->ID));
	                                            if ($link_to == "post") {
	                                                printf('<a href="%s" class="mosaic-overlay link fancybox" title="%s"></a>', get_permalink($current_post->ID), esc_attr($img_post->post_title));
	                                            } else {
	                                                printf('<a href="%s" class="mosaic-overlay fancybox" title="%s"></a>', esc_url($post_thumbnail_src[0]), esc_attr($img_post->post_title));
	                                            }
	                                            if ($show_date == "checked") {
	                                            	printf('<div class="mosaic-backdrop"><div class="corner-date">%s</div><img src="%s" alt="%s" /></div>', esc_attr($current_post_publish_date), esc_url($post_thumbnail_src_fit[0]), esc_attr($img_alt));
	                                            } else {
	                                            	printf('<div class="mosaic-backdrop"><img src="%s" alt="%s" /></div>', esc_url($post_thumbnail_src_fit[0]), esc_attr($img_alt));
	                                            }
	                                            echo '</div>';
	                                        }
	                                    }

			                        ?>
			                        	
				                        <!-- title -->
				                        <?php if ($show_title == "checked") { printf('<h3><a href="%s">%s</a></h3>', esc_url(get_permalink($current_post->ID)), esc_attr( $current_post->post_title)); } ?>

                                        <!-- excerpt -->
                                        <?php if ($show_excerpt == "checked") { echo $the_excerpt; } ?>

			                        	<!-- more link -->
			                        	<?php if ($show_more_link == "checked") { printf('<a class="more" href="%s">%s</a>', esc_url(get_permalink($current_post->ID)), __("more", "loc_hairdo_core_plugin")); } ?>

			                        <?php

			                        	echo '</div>';
			                        }

			                    ?>


								    

								</div>
								<!-- end owl-carousel -->



	                        </div>
	                        <!-- end clarfix -->

	            <?php
	            	if ($layout == "boxed") {
	            	?>
	            		
	                    </div>
	                    <!-- end main-content -->
	                </div>
	                <!-- end main wrapper -->
	            </div>
	             <!-- end main-container -->

	            	<?php
	            	}
	            ?>

	        </div>
	        <!-- end outter-wrapper -->
	        
		<!-- END BLOCK -->
		
		<?php

		return true;		
	}


