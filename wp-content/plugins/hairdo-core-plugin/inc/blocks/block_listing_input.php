<?php
	function block_listing_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		if (!$exist) {
			$params['type']								= 'listing';
			$params['title'] 							= "Our Listing";
			$params['text'] 							= "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id neque urna. Morbi fringilla risus non risus ornare elementum. In vitae sollicitudin arcu. ";
			$params['cmb_listing_orderby'] 				= 'title';
			$params['cmb_listing_order'] 					= 'ASC';
			$params['cmb_listing_layout'] 					= '4';
			$params['num_posts'] 						= '4';
			$params['cmb_listing_hide_page_title'] 		= "unchecked";
			$params['cmb_listing_hide_page_description'] 	= "unchecked";
			$params['cmb_listing_hide_item_image']		 	= "unchecked";
			$params['cmb_listing_hide_item_price'] 		= "unchecked";
			$params['cmb_listing_hide_page_description']	= "unchecked";
		}

		// APPEARANCE TAB
		if (!isset($params['tab'])) { $params['tab'] = 'block_tab_general'; }
		if (!isset($params['use_parallax'])) { $params['use_parallax'] = "checked"; }
		if (!isset($params['parallax_ratio'])) { $params['parallax_ratio'] = 0.2; }
		if (!isset($params['bg_boxed'])) { $params['bg_boxed'] = 'unchecked'; }
		if (!isset($params['bg_color'])) { $params['bg_color'] = ''; }
		if (!isset($params['font_color'])) { $params['font_color'] = ''; }
		
		// ADVANCED TAB
		if (!isset($params['custom_classes'])) { $params['custom_classes'] = ''; }
		if (!isset($params['custom_css'])) { $params['custom_css'] = ''; }

		?>

			<li class="building_block block_listing block_group_functionality">

			<!--  BLOCK HEADER -->
					<?php include 'includes/inc_block_header.php'; ?>

			<!--  BLOCK CONTENT -->
				<div class="block_options">

					<input class='block_option' type="hidden" id='block_uniqueid' name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][uniqueid]' value='<?php if (isset($params['uniqueid'])) {echo $params['uniqueid'];} else { echo uniqid(); } ?>'>
					<input class='block_option' type="hidden" id='block_type' name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][type]' value='<?php echo $params['type']; ?>'>
					<input class='block_option' type="hidden" id='block_status' name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][status]' value='<?php if (isset($params['status'])) {echo $params['status'];} else {echo "open";} ?>'>
					<input class='block_option' type="hidden" id='block_tab' name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][tab]' value='<?php if (isset($params['tab'])) { echo $params['tab']; } else { echo "block_tab_general"; } ?>'>
					
				<!--  BLOCK MENU -->
					<?php 
						pb_block_menu(array(
							'block_tab_controls' 		=> array(
								'block_tab_general'			=> __("General", "loc_hairdo_core_plugin"),
								'block_tab_appearance'		=> __("Appearance", "loc_hairdo_core_plugin"),
								'block_tab_advanced'		=> __("Advanced", "loc_hairdo_core_plugin"),
							),
							'block_copy'				=> $exist,
						)); 
					?>

					
				<!-- BLOCK TAB: GENERAL -->
					<div class="block_tab block_tab_general">



					<!-- TEXT INPUT -->
						<div class="option">
							<label><?php _e("Title", "loc_hairdo_core_plugin"); ?></label>
							<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][title]' value="<?php if (isset($params['title'])) echo htmlspecialchars($params['title']); ?>">
						</div>
						

					<!-- TEXTAREA -->
						<div class="option">
							<label><?php _e("Text", "loc_hairdo_core_plugin"); ?></label>
							<textarea 
								class='block_option' 
								rows = '4'
								name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][text]'
							><?php if (isset($params['text'])) echo $params['text']; ?></textarea>
							<span class="detail">Enter text / HTML</span>
						</div>
						
					

					<!-- DYNAMIC SELECT -->
						<?php 

		     				$cat_list = get_categories(array(
		     					'orderby'		=> 'name',
		     					'order' 		=> 'ASC',
		     					'taxonomy'		=> 'item_category',
		     				));
							$cat_list = array_values($cat_list);

						 ?>
						<div class="option">
							<label><?php _e("Listing Displays", "loc_hairdo_core_plugin"); ?></label>
							<select class='block_option' name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][cmb_listing_cat]"> 

							<?php 
								for ($i = 0; $i < count($cat_list); $i++) { 
								?>
				     				<option value="<?php echo esc_attr($cat_list[$i]->slug); ?>" <?php if (isset($params['cmb_listing_cat'])) {if ($params['cmb_listing_cat'] == $cat_list[$i]->slug) echo "selected='selected'";} ?>><?php echo esc_attr($cat_list[$i]->name); ?></option> 
								<?php
								}
							?>
							</select> 
						</div>
						
					<!-- SELECT -->
						<div class="option">
							<label><?php _e("Layout", "loc_hairdo_core_plugin"); ?></label>
							<select class='block_option' name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][cmb_listing_layout]"> 
				     			<option value="4" <?php if (isset($params['cmb_listing_layout'])) {if ($params['cmb_listing_layout'] == "4") echo "selected='selected'";} ?>><?php _e("4 column", "loc_hairdo_core_plugin"); ?></option> 
				     			<option value="3" <?php if (isset($params['cmb_listing_layout'])) {if ($params['cmb_listing_layout'] == "3") echo "selected='selected'";} ?>><?php _e("3 column", "loc_hairdo_core_plugin"); ?></option> 
				     			<option value="2" <?php if (isset($params['cmb_listing_layout'])) {if ($params['cmb_listing_layout'] == "2") echo "selected='selected'";} ?>><?php _e("2 column", "loc_hairdo_core_plugin"); ?></option> 
				     			<option value="1" <?php if (isset($params['cmb_listing_layout'])) {if ($params['cmb_listing_layout'] == "1") echo "selected='selected'";} ?>><?php _e("1 column", "loc_hairdo_core_plugin"); ?></option> 
							</select> 
						</div>

					<!-- SELECT -->
						<div class="option">
							<label><?php _e("Orderby", "loc_hairdo_core_plugin"); ?></label>
							<select class='block_option' name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][cmb_listing_orderby]"> 
				     			<option value="title" <?php if (isset($params['cmb_listing_orderby'])) {if ($params['cmb_listing_orderby'] == "title") echo "selected='selected'";} ?>><?php _e("Title", "loc_hairdo_core_plugin"); ?></option> 
				     			<option value="date" <?php if (isset($params['cmb_listing_orderby'])) {if ($params['cmb_listing_orderby'] == "date") echo "selected='selected'";} ?>><?php _e("Date", "loc_hairdo_core_plugin"); ?></option> 
				     			<option value="cmb_item_price" <?php if (isset($params['cmb_listing_orderby'])) {if ($params['cmb_listing_orderby'] == "cmb_item_price") echo "selected='selected'";} ?>><?php _e("Price", "loc_hairdo_core_plugin"); ?></option> 
				     			<option value="cmb_item_index" <?php if (isset($params['cmb_listing_orderby'])) {if ($params['cmb_listing_orderby'] == "cmb_item_index") echo "selected='selected'";} ?>><?php _e("Index", "loc_hairdo_core_plugin"); ?></option> 
							</select> 
						</div>

					<!-- SELECT -->
						<div class="option">
							<label><?php _e("Order", "loc_hairdo_core_plugin"); ?></label>
							<select class='block_option' name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][cmb_listing_order]"> 
				     			<option value="ASC" <?php if (isset($params['cmb_listing_order'])) {if ($params['cmb_listing_order'] == "ASC") echo "selected='selected'";} ?>><?php _e("Ascending", "loc_hairdo_core_plugin"); ?></option> 
				     			<option value="DESC" <?php if (isset($params['cmb_listing_order'])) {if ($params['cmb_listing_order'] == "DESC") echo "selected='selected'";} ?>><?php _e("Descending", "loc_hairdo_core_plugin"); ?></option> 
							</select> 
						</div>

					<!-- NUMBER -->
						<div class="option">
							<input 
								type='number' 
								class='block_option'
								id='num_posts' 
								name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][num_posts]' 
								min='1'
								max='1000'
								step='1'
								style='width: 45px;'
								value='<?php if (isset($params['num_posts'])) echo esc_attr($params['num_posts']); ?>'
							><?php _e("number of posts", "loc_hairdo_core_plugin"); ?>
						</div>

					

					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][cmb_listing_hide_page_title]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][cmb_listing_hide_page_title]" class="checkbox" value="checked" <?php if (isset($params['cmb_listing_hide_page_title'])) { checked($params['cmb_listing_hide_page_title'] == "checked"); } ?>/> 
							<?php _e("Hide block title", "loc_hairdo_core_plugin"); ?><br>
							
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][cmb_listing_hide_page_description]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][cmb_listing_hide_page_description]" class="checkbox" value="checked" <?php if (isset($params['cmb_listing_hide_page_description'])) { checked($params['cmb_listing_hide_page_description'] == "checked"); } ?>/> 
							<?php _e("Hide block description", "loc_hairdo_core_plugin"); ?><br>
							
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][cmb_listing_hide_item_image]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][cmb_listing_hide_item_image]" class="checkbox" value="checked" <?php if (isset($params['cmb_listing_hide_item_image'])) { checked($params['cmb_listing_hide_item_image'] == "checked"); } ?>/> 
							<?php _e("Hide item image", "loc_hairdo_core_plugin"); ?><br>
							
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][cmb_listing_hide_item_price]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][cmb_listing_hide_item_price]" class="checkbox" value="checked" <?php if (isset($params['cmb_listing_hide_item_price'])) { checked($params['cmb_listing_hide_item_price'] == "checked"); } ?>/> 
							<?php _e("Hide item price", "loc_hairdo_core_plugin"); ?><br>
							
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][cmb_listing_hide_item_description]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][cmb_listing_hide_item_description]" class="checkbox" value="checked" <?php if (isset($params['cmb_listing_hide_item_description'])) { checked($params['cmb_listing_hide_item_description'] == "checked"); } ?>/> 
							<?php _e("Hide item description", "loc_hairdo_core_plugin"); ?>
							<br>
						</div>

					

					</div>

				<!-- BLOCK TAB: APPEARANCE -->
					<div class="block_tab block_tab_appearance">
						<?php include 'includes/inc_block_appearance_tab.php'; ?>
					</div>


				<!-- BLOCK TAB: ADVANCED -->
					<div class="block_tab block_tab_advanced">
						<?php include 'includes/inc_block_advanced_tab.php'; ?>
					</div>


				</div>
				
			</li>

		<?php	
	}
