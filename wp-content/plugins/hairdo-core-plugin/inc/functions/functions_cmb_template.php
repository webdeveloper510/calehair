<?php

/**************************************
CUSTOM META FIELD

CHANGE
start by erasing unused sections
templateslug (usually: namespace_templatelowercase e.g. cpt_project)
project

***************************************/

	//metaboxes
	add_action('add_meta_boxes', 'register_cmb_cpt_project_settings');
	add_action ('save_post', 'update_cmb_cpt_project_settings');

	function register_cmb_cpt_project_settings () {
		add_meta_box('cmb_cpt_project_settings','Timedrop project settings', 'display_cmb_cpt_project_settings','templateslug','normal','high');
	}

	function display_cmb_cpt_project_settings ($post) {

	/**************************************
	GET VALUES
	***************************************/

	// OPTIONS
		$default_somevariable = 90;

	// DETAILS
		$cmb_project_client = get_post_meta($post->ID, 'cmb_project_client', true);
		$cmb_project_date = get_post_meta($post->ID, 'cmb_project_date', true);
		$cmb_project_url = get_post_meta($post->ID, 'cmb_project_url', true);


	// SLIDER
		$cmb_slider_feature = get_post_meta($post->ID, 'cmb_slider_feature', true);
		$cmb_slider_use_cap_header = get_post_meta($post->ID, 'cmb_slider_use_cap_header', true);
		$cmb_slider_cap_header = get_post_meta($post->ID, 'cmb_slider_cap_header', true);
		$cmb_slider_use_cap_text = get_post_meta($post->ID, 'cmb_slider_use_cap_text', true);
		$cmb_slider_cap_text = get_post_meta($post->ID, 'cmb_slider_cap_text', true);
		$cmb_slider_use_media = get_post_meta($post->ID, 'cmb_slider_use_media', true);
		$cmb_slider_media = get_post_meta($post->ID, 'cmb_slider_media', true);

		$cmb_exist = get_post_meta($post->ID, 'cmb_exist', true);

		//defaults
		if (empty($cmb_exist)) {
			$cmb_comp_feat_img = "checked";
			$cmb_comp_title = "checked";
			$cmb_comp_excerpt = "checked";
			$cmb_comp_meta = "checked";

			$cmb_slider_use_cap_header = "checked";
			$cmb_slider_cap_header = $post->post_title;
			$cmb_slider_use_cap_text = "checked";
			$cmb_slider_cap_text = mb_make_excerpt($post->post_content, $default_cap_text_len, true);
		}

	/**************************************
	DISPLAY CONTENT
	***************************************/

		?>

	<!-- DETAILS -->

		<div class="option_heading">
			<span>Details</span>
		</div>

		<div class="option_item">
			<label for='cmb_project_client'><?php _e("Client", "loc_hairdo_core_plugin"); ?></label><br>
			<input type='text' id='cmb_project_client' name='cmb_project_client' class='widefat' value='<?php if (!empty($cmb_project_client)) echo htmlspecialchars($cmb_project_client); ?>'>
		</div>

		<div class="option_item">
			<label for='cmb_project_date'>Project date</label><br>
			<input type='text' id='cmb_project_date' name='cmb_project_date' class='widefat' value='<?php if (!empty($cmb_project_date)) echo $cmb_project_date; ?>'>
		</div>

		<div class="option_item">
			<label for='cmb_project_url'>Project URL</label><br>
			<input type='text' id='cmb_project_url' name='cmb_project_url' class='widefat' value='<?php if (!empty($cmb_project_url)) echo $cmb_project_url; ?>'>
		</div>

		<div class="option_item">
			<label for='cmb_project_excerpt'>Excerpt</label><br>
			<textarea id='cmb_project_excerpt' name='cmb_project_excerpt' class='widefat'><?php if (!empty($cmb_project_excerpt)) echo $cmb_project_excerpt; ?></textarea>
			<button type="button" name="button_generate_excerpt" id='button_generate_excerpt' class="button-secondary auto_generate" value="<?php echo mb_make_excerpt($post->post_content, $default_excerpt_len, true); ?>">Auto-generate</button>
		</div>

	<!-- SLIDER -->

		<div class="option_heading">
			<span>Slider</span>
		</div>

		<div class="option_item">
			<input type='checkbox' id='cmb_slider_feature' name='cmb_slider_feature' value='checked' <?php checked(!empty($cmb_slider_feature)); ?>>
			<label for='cmb_slider_feature'>Feature this post in slider</label>
		</div>

		<div id="popup_cmb_slider_options">

			<div class="option_item">
				<input type='checkbox' id='cmb_slider_use_cap_header' name='cmb_slider_use_cap_header' value='checked' <?php checked(!empty($cmb_slider_use_cap_header)); ?>>
				<label for='cmb_slider_use_cap_header'>Use caption header</label>
				<input type='text' id='cmb_slider_cap_header' name='cmb_slider_cap_header' class='widefat' value='<?php if (!empty($cmb_slider_cap_header)) echo $cmb_slider_cap_header; ?>'>
				<button type="button" name="button_generate_header" id='button_generate_header' class="button-secondary auto_generate" value="<?php echo $post->post_title; ?>">Auto-generate</button>
			</div>

			<div class="option_item">
				<input type='checkbox' id='cmb_slider_use_cap_text' name='cmb_slider_use_cap_text' value='checked' <?php checked(!empty($cmb_slider_use_cap_text)); ?>>
				<label for='cmb_slider_use_cap_text'>Use caption text</label>
				<textarea id='cmb_slider_cap_text' name='cmb_slider_cap_text' class='widefat'><?php if (!empty($cmb_slider_cap_text)) echo $cmb_slider_cap_text; ?></textarea>
				<button type="button" name="button_generate_text" id='button_generate_text' class="button-secondary auto_generate" value="<?php echo mb_make_excerpt($post->post_content, $default_cap_text_len, true); ?>">Auto-generate</button>
			</div>

			<div class="option_item">
				<input type='checkbox' id='cmb_slider_use_media' name='cmb_slider_use_media' value='checked' <?php checked(!empty($cmb_slider_use_media)); ?>>
				<label for='cmb_slider_use_media'>Use media in slider</label>
				<input type='text' id='cmb_slider_media' name='cmb_slider_media' class='widefat' value='<?php if (!empty($cmb_slider_media)) echo $cmb_slider_media; ?>'>
				<span class="item_hint">(Use media instead of featured image in slider. Remember to adjust sizes. Works best with width: 100% and height: 420px. NB: increases load times.</span>
			</div>

		</div>

		<!-- add nonce -->
		<input type="hidden" name="cmb_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>" />
		<input type="hidden" name="cmb_exist" value="true" />
		<?php	
	}



/**************************************
UPDATE
***************************************/

	function update_cmb_cpt_project_settings ($post_id) {
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
			update_post_meta($post_id, 'cmb_project_client', $_POST['cmb_project_client']);
			update_post_meta($post_id, 'cmb_project_date', $_POST['cmb_project_date']);
			update_post_meta($post_id, 'cmb_project_url', $_POST['cmb_project_url']);

		//SLIDER
			update_post_meta($post_id, 'cmb_slider_feature', $_POST['cmb_slider_feature']);
			update_post_meta($post_id, 'cmb_slider_use_cap_header', $_POST['cmb_slider_use_cap_header']);
			update_post_meta($post_id, 'cmb_slider_cap_header', $_POST['cmb_slider_cap_header']);
			update_post_meta($post_id, 'cmb_slider_use_cap_text', $_POST['cmb_slider_use_cap_text']);
			update_post_meta($post_id, 'cmb_slider_cap_text', $_POST['cmb_slider_cap_text']);
			update_post_meta($post_id, 'cmb_slider_use_media', $_POST['cmb_slider_use_media']);
			update_post_meta($post_id, 'cmb_slider_media', $_POST['cmb_slider_media']);

			update_post_meta($post_id, 'cmb_exist', $_POST['cmb_exist']);
				
		}
	}


