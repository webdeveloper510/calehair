<?php get_header(); ?>
	
	
	<?php 

		$canon_options = get_option('canon_options');
    	$canon_options_post = get_option('canon_options_post'); 

		$page_type = mb_get_page_type();

		//var_dump($wp_query);
		// var_dump(mb_get_page_type());

		switch ($page_type) {
			case 'category':
				$archive_title = __('category', 'loc_canon');
				$archive_subject = single_cat_title('', false);
				break;
			case 'tag':
				$archive_title = __('tag', 'loc_canon');
				$archive_subject = single_tag_title('', false);
				break;
			case 'search':
				global $query_string;
				$archive_title = __('search', 'loc_canon');
				$archive_subject = get_search_query();
				break;
			case 'author':
				$archive_title = __('author', 'loc_canon');
				$archive_subject = get_the_author_meta('display_name',$wp_query->post->post_author);
				break;
			case 'day':
				$archive_title = __('day', 'loc_canon');
				$archive_subject =  get_the_time('d/m/Y');
				break;
			case 'month':
				$archive_title = __('month', 'loc_canon');
				$archive_subject = get_the_time('m/Y');
				break;
			case 'year':
				$archive_title = __('year', 'loc_canon');
				$archive_subject = get_the_time('Y');
				break;
			case 'tax':
				$archive_title = __('group', 'loc_canon');
				$archive_subject = get_query_var('term');
				break;
			case 'custom_post_type_archive':
				$archive_title = __('custom post type', 'loc_canon');
				$post_type = get_post_type();
				$post_type_object = get_post_type_object($post_type);
				$archive_subject = $post_type_object->label;
				break;
			default:
				$archive_title = __('browsing', 'loc_canon');
				$archive_subject = __('Unknown', 'loc_canon');
				break;
		}

	    $layout = $canon_options_post['archive_layout'];
	    $excerpt_length = $canon_options_post['archive_excerpt_length'];
	    
	    // SET MAIN CONTENT CLASS
	    $main_content_class = "main-content";
	    if ($layout == "sidebar") { 
	        $main_content_class .= " three-fourths"; 
	        if ($canon_options['sidebars_alignment'] == 'left') { $main_content_class .= " left-main-content"; }
	    }

	?>


		<!-- Start Outter Wrapper -->	
		<div class="outter-wrapper feature">
			<hr/>
		</div>	
		<!-- End Outter Wrapper -->	
			


		<!-- start outter-wrapper -->   
		<div class="outter-wrapper canon_archive">
			<!-- start main-container -->
			<div class="main-container">
				<!-- start main wrapper -->
				<div class="main wrapper clearfix">
					<!-- start main-content -->
					<div class="<?php echo $main_content_class; ?>">

						<!-- RESULTS SUMMARY -->
						<div class="tc-page-heading"><?php echo $wp_query->found_posts; ?> <?php if (count($wp_query->posts) !== 1) {_e('Results','loc_canon');} else {_e('result','loc_canon');} ?> <?php _e("for", "loc_canon"); ?> <span><?php printf("%s: <span class='highlight'> %s</span>", esc_attr($archive_title), esc_attr($archive_subject)); ?></span></div>

						<!-- MAIN LOOP -->
						<?php while ( have_posts() ) : the_post(); ?>

							<?php 
								$the_excerpt = mb_get_excerpt(get_the_ID(), $excerpt_length);
								$the_excerpt = mb_tag_search_string($the_excerpt, $archive_subject, "<span class='highlight'>","</span>", false);
							?>

							<div id="post-<?php the_ID(); ?>" <?php post_class("clearfix"); ?>>
								
								<!-- THE TITLE -->
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php echo do_shortcode($the_excerpt); ?>
								<!-- read more -->
								<a href="<?php the_permalink(); ?>" class="more"><?php _e('More', 'loc_canon'); ?></a>
								

							 </div>
							 
							 <hr/>
						 
						<?php endwhile; ?>
						<!-- END LOOP -->

						<!-- PAGINATION -->
						<?php get_template_part("inc/templates/template_paginate_links"); ?>
																										   
					</div>
					<!-- end main-content -->

							
                    <!-- SIDEBAR -->
                    <?php if ($layout == 'sidebar') { get_sidebar("archive"); } ?>

							
				</div>
				<!-- end main wrapper -->
			</div>
			 <!-- end main-container -->
		</div>
		<!-- end outter-wrapper -->


<?php get_footer(); ?>