<?php
	function block_text_section_input ($passed_vars) {


		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		if (!isset($params['type'])) { $params['type'] = 'text_section'; }
		if (!isset($params['title'])) { $params['title'] = "Frequent Questions"; }
		if (!isset($params['text'])) { $params['text'] = '<div class="half">
		<h6>Can I donate more than once?</h6>
		Nulla vitae elit libero, a pharetra augue. Vestibulum id ligula porta felis euismod sit amet ferment umper.
		<h6>What is the payment method?</h6>
		Donec sed odio duiulla vitae elit libero, a pharetra augue. Vestibulum id ligula porta felis euismod semper.
		
		</div>
		<div class="half last">
		<h6>Can I donate as a gift for someone?</h6>
		Cras mattis consectetur purus sit amet fermentum a pharetra augue. Vestibulum id ligula porta felis euismod semper.
		<h6>How can I see status updates?</h6>
		Sed posuere consectetur est at lobortis. Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Vestibulum id ligula portafel.
		
		</div>
		<p>&nbsp;</p>
					
					
';	}
		if (!isset($params['hide_title'])) { $params['hide_title'] = "unchecked"; }
		
		// TAB
		if (!isset($params['tab'])) { $params['tab'] = 'block_tab_general'; }

		// APPEARANCE BLOCK OPTIONS
		if (!isset($params['use_parallax'])) { $params['use_parallax'] = "checked"; }
		if (!isset($params['parallax_ratio'])) { $params['parallax_ratio'] = 0.2; }
		if (!isset($params['bg_boxed'])) { $params['bg_boxed'] = 'unchecked'; }
		if (!isset($params['bg_color'])) { $params['bg_color'] = ''; }
		if (!isset($params['font_color'])) { $params['font_color'] = ''; }
		
		// ADVANCED BLOCK OPTIONS
		if (!isset($params['custom_classes'])) { $params['custom_classes'] = ''; }
		if (!isset($params['custom_css'])) { $params['custom_css'] = ''; }


		?>

			<li class="building_block block_text_section block_group_functionality<?php if(!$exist) { echo ' save_reload'; } ?>">

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

	 				<!-- TEXT -->
						<div class="option">
							<label><?php _e("Title", "loc_hairdo_core_plugin"); ?></label>
							<input class='block_option' type='text' id='block_title' name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][title]' value="<?php if (isset($params['title'])) echo htmlspecialchars($params['title']); ?>">
						</div>
						
	 				<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][hide_title]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][hide_title]" class="checkbox" value="checked" <?php if (isset($params['hide_title'])) { checked($params['hide_title'] == "checked"); } ?>/> 
							<?php _e("Hide title and divider", "loc_hairdo_core_plugin"); ?>
						</div>

						<!-- WP EDITOR -->
	 					<?php 

	 						if ($exist) {
	 						?>
								<div class="option">
									<label>Editor</label>

									<?php 

										wp_editor($params['text'], 'block_text_'.$index, array(
										    'textarea_name' => 'canon_options_pagebuilder[blocks]['.$index.'][text]',
										    'teeny' => false,
										    'media_buttons' => true,
										    'editor_class' => 'block_option',
							    			'tinymce' => true,
										));

									?>

								</div>

	 						<?php	
	 						} else {
	 						?>

	 							<div class="option">
									<label>Editor</label>
									<img class="editor_load" src="<?php echo plugins_url('', __FILE__ ) . "/../../img/ajax-loader.gif"; ?>">
	 							</div>
	 						
	 						<?php		
	 						}

	 					?>
						<!-- END WP EDITOR -->

					</div>
				<!-- END BLOCK TAB: GENERAL -->

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
