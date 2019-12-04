<?php
	function block_supporters_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		if (!isset($params['type'])) {
			$params['type']						= 'supporters';
			$params['title'] 					= "Over 200 members and growing, <span>We love our team.</span>";
			$params['img']						= array();
			$params['repeat']					= "checked";
			$params['btn_1_text']				= "Join Us Today";
			$params['btn_2_text']				= "Make Donations";
		}

		// APPEARANCE TAB
		if (!isset($params['use_parallax'])) { $params['use_parallax'] = "checked"; }
		if (!isset($params['parallax_ratio'])) { $params['parallax_ratio'] = 0.2; }
		if (!isset($params['bg_boxed'])) { $params['bg_boxed'] = 'unchecked'; }
		if (!isset($params['bg_color'])) { $params['bg_color'] = ''; }
		if (!isset($params['font_color'])) { $params['font_color'] = ''; }

		// ADVANCED TAB
		if (!isset($params['tab'])) { $params['tab'] = 'block_tab_general'; }
		if (!isset($params['custom_classes'])) { $params['custom_classes'] = ''; }
		if (!isset($params['custom_css'])) { $params['custom_css'] = ''; }

		//remove template and do array_values
		unset($params['img']['image_index']);
		$params['img'] = array_values($params['img']);

		?>

			<li class="building_block block_supporters block_group_functionality<?php if(!$exist) { echo ' save_reload'; } ?>">

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
						
						
					<!-- SPECIAL INPUT -->
						<div class="option supporters">
							<ul class="supporter_template">

								<li>
									<input class='block_option input_img_url' type="hidden" name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][img][image_index][img_url]' value=''>
									
									<div class="supporter-img">
										<img src="">
									</div>
									
									<div class="supporter-details">
										<span class="img-details"><?php _e("Optional link:", "loc_hairdo_core_plugin"); ?></span>
										<input class='block_option input_link_url' type='text' name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][img][image_index][link_url]' value=''>
									</div>
								</li>

							</ul>
							<ul class="supporter_images">

								<?php 

									for ($i = 0; $i < count($params['img']); $i++) {  
										if (isset($params['img'][$i])) {
											?>
												<li>
													<input class='block_option input_img_url' type="hidden" name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][img][<?php echo $i; ?>][img_url]' value='<?php echo $params['img'][$i]['img_url']; ?>'>
													
													<div class="supporter-img">
														<img src="<?php echo $params['img'][$i]['img_url']; ?>">
													</div>

													<div class="supporter-details">
														<span class="img-details"><?php _e("Optional link:", "loc_hairdo_core_plugin"); ?></span>
														<input class='block_option input_link_url' type='text' name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][img][<?php echo $i; ?>][link_url]' value="<?php if (isset($params['img'][$i]['link_url'])) echo htmlspecialchars($params['img'][$i]['link_url']); ?>">
													</div>
												</li>
												
											<?php
										}
									}
											
								?>

							</ul>

							<div class="supporter_controls">
								<input type="button" class="button button_upload_supporter_image" value="<?php _e("Upload supporter image", "loc_hairdo_core_plugin"); ?>" />
								<input type="button" class="button button_remove_supporter_image" value="<?php _e("Remove supporter image", "loc_hairdo_core_plugin"); ?>" />
							</div>
						</div>


					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][repeat]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][repeat]" class="checkbox" value="checked" <?php if (isset($params['repeat'])) { checked($params['repeat'] == "checked"); } ?>/> 
							<?php _e("Repeat images to fill screen", "loc_hairdo_core_plugin"); ?>
						</div>

					<!-- TEXT INPUT -->
						<div class="option">
							<label><?php _e("Button 1 text", "loc_hairdo_core_plugin"); ?></label>
							<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][btn_1_text]' value="<?php if (isset($params['btn_1_text'])) echo htmlspecialchars($params['btn_1_text']); ?>">
						</div>
						
					<!-- TEXT INPUT -->
						<div class="option">
							<label><?php _e("Button 1 link", "loc_hairdo_core_plugin"); ?></label>
							<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][btn_1_link]' value="<?php if (isset($params['btn_1_link'])) echo htmlspecialchars($params['btn_1_link']); ?>">
						</div>
						
					<!-- TEXT INPUT -->
						<div class="option">
							<label><?php _e("Button 2 text", "loc_hairdo_core_plugin"); ?></label>
							<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][btn_2_text]' value="<?php if (isset($params['btn_2_text'])) echo htmlspecialchars($params['btn_2_text']); ?>">
						</div>
						
					<!-- TEXT INPUT -->
						<div class="option">
							<label><?php _e("Button 2 link", "loc_hairdo_core_plugin"); ?></label>
							<input class='block_option' type='text' name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][btn_2_link]' value="<?php if (isset($params['btn_2_link'])) echo htmlspecialchars($params['btn_2_link']); ?>">
						</div>
						
					<!-- TEXTAREA -->
						<div class="option">
							<label><?php _e("HTML", "loc_hairdo_core_plugin"); ?></label>
							<textarea 
								class='block_option' 
								rows = '10'
								name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][html]'
							><?php if (isset($params['html'])) echo $params['html']; ?></textarea>
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
