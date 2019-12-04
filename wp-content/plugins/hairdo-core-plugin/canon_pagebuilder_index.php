<?php

/**************************************

CANON PAGEBUILDER

PHP INCLUDES
WP ENQUEUE
AJAX PAGEBUILDER COPY BLOCK TO CLIPBOARD
FUNCTION MB_GET_READABLE_NAME_FROM_BLOCK_TYPE
FUNCTION PB_BLOCK_ID_CLASS
FUNCTION PB_BLOCK_CLASS
FUNCTION PB_GET_BLOCK_ID
FUNCTION PB_BLOCK_MENU

This is the main pagebuilder control file. All files related to pagebuilder should be declared here.

***************************************/


/**************************************

REQUIRED FILES

inc/functions/functions_register_cpt_pb_template.php
inc/options/options_pagebuilder_control.php
js/canon_pagebuilder.js
canon_pagebuilder.css
jquery-ui.css

OUTPUT IN THEME

inc/templates/pagebuilder_output.php
page-pagebuilder.php

Add template select to cmb pages

WORKFLOW:
- add input blocks (remember to change option name and index+params vars)
- include in canon_pagebuilder_index.php
- add to options_pagebuilder.php (2 places)
- add to pagebuilder_output.php



***************************************/


/**************************************
PHP INCLUDES
***************************************/

	include 'inc/functions/functions_register_cpt_pb_template.php';
	include 'inc/options/options_pagebuilder_control.php';

	// BLOCKS
	include 'inc/blocks/block_featured_img_input.php';
	include 'inc/blocks/block_featured_img_output.php';

	include 'inc/blocks/block_content_input.php';
	include 'inc/blocks/block_content_output.php';

	include 'inc/blocks/block_content_sidebar_input.php';
	include 'inc/blocks/block_content_sidebar_output.php';

	include 'inc/blocks/block_revslider_input.php';
	include 'inc/blocks/block_revslider_output.php';

	include 'inc/blocks/block_text_section_input.php';
	include 'inc/blocks/block_text_section_output.php';

	include 'inc/blocks/block_widgets_input.php';
	include 'inc/blocks/block_widgets_output.php';

	include 'inc/blocks/block_featured_video_input.php';
	include 'inc/blocks/block_featured_video_output.php';

	include 'inc/blocks/block_featured_posts_input.php';
	include 'inc/blocks/block_featured_posts_output.php';

	include 'inc/blocks/block_supporters_input.php';
	include 'inc/blocks/block_supporters_output.php';

	include 'inc/blocks/block_people_input.php';
	include 'inc/blocks/block_people_output.php';

	include 'inc/blocks/block_qa_input.php';
	include 'inc/blocks/block_qa_output.php';

	include 'inc/blocks/block_cta_input.php';
	include 'inc/blocks/block_cta_output.php';

	include 'inc/blocks/block_html_input.php';
	include 'inc/blocks/block_html_output.php';

	include 'inc/blocks/block_pricing_input.php';
	include 'inc/blocks/block_pricing_output.php';

	include 'inc/blocks/block_pricing_vertical_input.php';
	include 'inc/blocks/block_pricing_vertical_output.php';

	include 'inc/blocks/block_countdown_input.php';
	include 'inc/blocks/block_countdown_output.php';

	include 'inc/blocks/block_sitemap_input.php';
	include 'inc/blocks/block_sitemap_output.php';

	include 'inc/blocks/block_img_input.php';
	include 'inc/blocks/block_img_output.php';

	include 'inc/blocks/block_divider_input.php';
	include 'inc/blocks/block_divider_output.php';

	include 'inc/blocks/block_space_input.php';
	include 'inc/blocks/block_space_output.php';

	include 'inc/blocks/block_download_input.php';
	include 'inc/blocks/block_download_output.php';

	include 'inc/blocks/block_carousel_input.php';
	include 'inc/blocks/block_carousel_output.php';

	include 'inc/blocks/block_featured_icons_input.php';
	include 'inc/blocks/block_featured_icons_output.php';

	include 'inc/blocks/block_media_input.php';
	include 'inc/blocks/block_media_output.php';

	include 'inc/blocks/block_tribe_event_input.php';
	include 'inc/blocks/block_tribe_event_output.php';

	include 'inc/blocks/block_gallery_input.php';
	include 'inc/blocks/block_gallery_output.php';

	include 'inc/blocks/block_gallery_preview_input.php';
	include 'inc/blocks/block_gallery_preview_output.php';

	include 'inc/blocks/block_posts_graph_input.php';
	include 'inc/blocks/block_posts_graph_output.php';

	include 'inc/blocks/block_listing_input.php';
	include 'inc/blocks/block_listing_output.php';

	// END BLOCKS. REMEMBER TO ALSO UPDATE /OPTIONS/OPTIONS_PAGEBUILDER.PHP + THEME/INC/TEMPLATES/PAGEBUILDER_OUTPUT.PHP.

/**************************************
WP ENQUEUE
***************************************/

	//front end includes
	add_action('wp_enqueue_scripts','canon_pagebuilder_load_to_front');
	function canon_pagebuilder_load_to_front() {

		//scripts (js)
		wp_enqueue_script('canon_pagebuilder_scripts', plugins_url('', __FILE__ ) . '/js/canon_pagebuilder_front.js', array(), false, true);

	}

	//back end includes
	add_action('admin_enqueue_scripts', 'canon_pagebuilder_load_to_back');  //this was changed to admin_enqueue_scripts from action hook admin_footer. Let's see if it makes a difference
	function canon_pagebuilder_load_to_back() {

		//get options
		$canon_options = get_option('canon_options');

		//scripts (js)
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui', false, array(), false, false);
		wp_enqueue_script('jquery-ui-sortable', false, array(), false, true);
		wp_enqueue_script('jquery-ui-draggable ', false, array(), false, true);
		wp_enqueue_script('jquery-ui-droppable', false, array(), false, true);
		wp_enqueue_script('jquery-ui-dialog', false, array(), false, true);
		wp_enqueue_script('thickbox', false, array(), false, true);					
		wp_enqueue_script('media-upload', false, array(), false, true);

		wp_enqueue_script('isotope', plugins_url('', __FILE__ ) . '/js/jquery.isotope.js', array(), false, true);
		wp_enqueue_script('canon_pagebuilder_scripts', plugins_url('', __FILE__ ) . '/js/canon_pagebuilder.js', array(), false, true);

		//style (css)	
		wp_enqueue_style('jquery-ui', plugins_url('', __FILE__ ) . '/css/jquery-ui.css');
		wp_enqueue_style('thickbox');
		wp_enqueue_style('isotope_style', plugins_url('', __FILE__ ) . '/css/isotope.css');
		wp_enqueue_style('canon_pagebuilder_style', plugins_url('', __FILE__ ) . '/css/canon_pagebuilder.css');

	}


/**************************************
AJAX PAGEBUILDER COPY BLOCK TO CLIPBOARD
***************************************/

		add_action('wp_ajax_pagebuilder_block_copy', 'pagebuilder_block_copy');
		add_action('wp_ajax_nopriv_pagebuilder_block_copy', 'pagebuilder_block_copy_must_login');

		function pagebuilder_block_copy() {
			if (!wp_verify_nonce($_REQUEST['nonce'], 'pagebuilder_block_copy_nonce')) {
				exit('NONCE INCORRECT!');
			}

			// GET VARS
			$uniqueid = $_REQUEST['uniqueid'];
			$post_content = $_REQUEST['post_content'];

			$result['type'] = 'success';
			$result['msg'] = "";
			$result['btn_text'] = "Paste block";
			// $result['debug'] = $uniqueid;
		
			// COPY
			$post_content = unserialize(base64_decode($post_content));

			$block_index = 0;
			foreach ($post_content['blocks'] as $key => $value) {
				if ($value['uniqueid'] === $uniqueid) { $block_index = $key; }
			}
			$clipboard_block = $post_content['blocks'][$block_index];
			set_transient('clipboard_block', $clipboard_block, 60*60*24);
			$result['type'] = 'success';
			$result['msg'] = "block copied to clipboard";
			$type = $clipboard_block['type'];
			$result['btn_text'] = mb_get_readable_name_from_block_type($type);

			// CHECK IF AJAX CALL THEN RETURN
			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			      $result = json_encode($result);
			      echo $result;
			}

			die();

		}

		function pagebuilder_block_copy_must_login() {
				
		}


/**************************************
FUNCTION MB_GET_READABLE_NAME_FROM_BLOCK_TYPE
***************************************/

	function mb_get_readable_name_from_block_type($type) {
			$name = "Unknown Block";

			if ($type == "featured_img") { $name 			= "Featured Image"; }
			if ($type == "content") { $name 				= "Page Content"; }
			if ($type == "content_sidebar") { $name 		= "Page Content + Sidebar"; }
			if ($type == "revslider") { $name 				= "Revolution Slider"; }
			if ($type == "text_section") { $name 			= "Text Section"; }
			if ($type == "widgets") { $name 				= "Widgets"; }
			if ($type == "featured_video") { $name 			= "Featured Video"; }
			if ($type == "featured_posts") { $name 			= "Featured Posts"; }
			if ($type == "supporters") { $name 				= "Supporters"; }
			if ($type == "people") { $name 					= "People"; }
			if ($type == "qa") { $name 						= "Q & A"; }
			if ($type == "cta") { $name 					= "Call to Action Box"; }
			if ($type == "html") { $name 					= "Custom HTML + CSS"; }
			if ($type == "pricing") { $name 				= "Pricing Tables"; }
			if ($type == "pricing_vertical") { $name 		= "Vertical Pricing Tables"; }
			if ($type == "countdown") { $name 				= "Countdown"; }
			if ($type == "sitemap") { $name 				= "Sitemap"; }
			if ($type == "img") { $name 					= "Image"; }
			if ($type == "divider") { $name 				= "Divider"; }
			if ($type == "space") { $name 					= "Vertical Space"; }
			if ($type == "download") { $name 				= "Download List"; }
			if ($type == "carousel") { $name 				= "Carousel"; }
			if ($type == "featured_icons") { $name 			= "Featured Icons"; }
			if ($type == "media") { $name 					= "Media"; }
			if ($type == "tribe_event") { $name 			= "Single Event"; }
			if ($type == "gallery") { $name 				= "Gallery"; }
			if ($type == "gallery_preview") { $name 		= "Gallery Preview"; }
			if ($type == "posts_graph") { $name 			= "Posts Graph"; }
			if ($type == "listing") { $name 				= "Listing"; }

			return $name;
	}



/****************************************************
FUNCTION PB_BLOCK_ID_CLASS

Use this on first outer-wrapper in a block
****************************************************/

	function pb_block_id_class($default_class, $params) {

		extract($params);

		//id
		$id = "pb_block-" . $block_index;
		echo 'id="'.$id.'"';

		//class
		$generated_class = " pb_block pb_block_main pb_" . $type;
		$final_class = $default_class . $generated_class;

		echo ' class="'. $final_class .'"';

		return;
	}	

/****************************************************
FUNCTION PB_BLOCK_CLASS

Use this on subsequent outer-wrappers in a block (if any)
****************************************************/

	function pb_block_class($default_class, $params) {

		extract($params);

		//class
		$generated_class = " pb_block pb_block_sub pb_" . $type;
		$final_class = $default_class . $generated_class;

		echo 'class="'. $final_class .'"';

		return;
	}	


/****************************************************
FUNCTION PB_GET_BLOCK_ID
****************************************************/

	function pb_get_block_id($params) {

		extract($params);

		//id
		$id = "pb_block-" . $block_index;

		return $id;
	}	



/****************************************************
FUNCTION PB_BLOCK_MENU
****************************************************/

	function pb_block_menu ($params) {

		extract($params);

		?>

					<div class="block_menu clearfix">

						<div class="menu_left">
							<ul class="block_tab_controls">
								<?php 

									foreach ($block_tab_controls as $key => $value) {
										echo "<li data-tab='$key'>$value</li>";
									}

								?>
							</ul>
						</div>

						<div class="menu_right">
							<ul class="block_tools">
								<?php 
									if (isset($block_copy)) {
										if ($block_copy === true)	{
											echo "<li class='copy'>Copy</li>";
										}
									}

								?>
							</ul>
						</div>

					</div>

					<div class="block_status clearfix">
						<span class="status_text"></span>
					</div>

		<?php

		return;
	}	
