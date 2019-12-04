<?php

/**************************************
CUSTOM META FIELD
***************************************/

	//metaboxes
	add_action('add_meta_boxes', 'register_cmb_cpt_item');
	add_action ('save_post', 'update_cmb_cpt_item');

	function register_cmb_cpt_item () {
		add_meta_box('cmb_cpt_item','Item settings', 'display_cmb_cpt_item','cpt_item','normal','high');
	}

	function display_cmb_cpt_item ($post) {

	/**************************************
	GET VALUES
	***************************************/

	// TO BE OR NOT TO BE
		$cmb_exist = get_post_meta($post->ID, 'cmb_exist', true);

	// DEFAULTS
		if (empty($cmb_exist)) {
			update_post_meta($post->ID, 'cmb_item_index', 100);
		}

	// GET VARS
		$cmb_item_price = get_post_meta($post->ID, 'cmb_item_price', true);
		$cmb_item_index = get_post_meta($post->ID, 'cmb_item_index', true);




	/**************************************
	DISPLAY CONTENT
	***************************************/

		?>

	<!-- DETAILS -->

		<div class="option_heading">
			<span><?php _e("Item details", "loc_cph"); ?></span>
		</div>


		<div class="option_item">

			<?php
				
				fw_cmb_option(array(
					'type'					=> 'text',
					'title' 				=> __('Price <i>(digits only)</i>', 'loc_hairdo_core_plugin'),
					'slug' 					=> 'cmb_item_price',
					'post_id'				=> $post->ID,
				)); 

				fw_cmb_option(array(
					'type'					=> 'number',
					'title' 				=> __('Order of appearance index <i>(optional)</i>', 'loc_hairdo_core_plugin'),
					'slug' 					=> 'cmb_item_index',
					'min'					=> '1',										// optional
					'max'					=> '100000',								// optional
					'step'					=> '1',										// optional
					'width_px'				=> '60',									// optional
					'post_id'				=> $post->ID,
				)); 

			?>

		</div>

		<!-- add nonce -->
		<input type="hidden" name="cmb_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>" />
		<input type="hidden" name="cmb_exist" value="true" />
		<?php	
	}



/**************************************
UPDATE
***************************************/

	function update_cmb_cpt_item ($post_id) {
		// avoid activation on irrelevant admin pages
		if (!isset($_POST['cmb_nonce'])) {
			return false;		
		}

		// verify nonce.    
		if (!wp_verify_nonce($_POST['cmb_nonce'], basename(__FILE__)) || !isset($_POST['cmb_nonce'])) {
			return false;
		}

		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		} else {

		//DETAILS
			update_post_meta($post_id, 'cmb_item_price', $_POST['cmb_item_price']);
			update_post_meta($post_id, 'cmb_item_index', $_POST['cmb_item_index']);

			update_post_meta($post_id, 'cmb_exist', $_POST['cmb_exist']);
		}
	}


