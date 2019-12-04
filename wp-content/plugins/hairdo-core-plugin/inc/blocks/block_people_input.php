<?php
	function block_people_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		if (!$exist) {
			$params['type']							= 'people';
			$params['title'] 						= "Team Members";
			$params['num_columns'] 					= 4;
			$params['num_people'] 					= 4;
			$params['orderby'] 						= "random";
			$params['link_through'] 				= "checked";
			$params['even_height'] 					= "checked";
			$params['hide_excerpt'] 				= "unchecked";
		}

		// ADVANCED TAB
		if (!isset($params['tab'])) { $params['tab'] = 'block_tab_general'; }
		if (!isset($params['custom_classes'])) { $params['custom_classes'] = ''; }
		if (!isset($params['custom_css'])) { $params['custom_css'] = ''; }


		?>

			<li class="building_block block_people block_group_functionality">

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
								rows='3'
								name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][text]'
							><?php if (isset($params['text'])) echo $params['text']; ?></textarea>
							<span class="detail">Enter your text / HTML</span>
						</div>
						

					<!-- NUMBER -->
						<div class="option">
							<input 
								type='number' 
								class='block_option'
								name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][num_people]' 
								min='1'
								max='100'
								step='1'
								style='width: 45px;'
								value='<?php if (isset($params['num_people'])) echo esc_attr($params['num_people']); ?>'
							><?php _e("Number of people to display", "loc_hairdo_core_plugin"); ?>
						</div>


					<!-- NUMBER -->
						<div class="option">
							<input 
								type='number' 
								class='block_option'
								name='canon_options_pagebuilder[blocks][<?php echo $index; ?>][num_columns]' 
								min='1'
								max='5'
								step='1'
								style='width: 45px;'
								value='<?php if (isset($params['num_columns'])) echo esc_attr($params['num_columns']); ?>'
							><?php _e("Number of columns", "loc_hairdo_core_plugin"); ?>
						</div>


					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][link_through]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][link_through]" class="checkbox" value="checked" <?php if (isset($params['link_through'])) { checked($params['link_through'] == "checked"); } ?>/> 
							<?php _e("Link through to single person post", "loc_hairdo_core_plugin"); ?>
						</div>

					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][even_height]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][even_height]" class="checkbox" value="checked" <?php if (isset($params['even_height'])) { checked($params['even_height'] == "checked"); } ?>/> 
							<?php _e("Even height", "loc_hairdo_core_plugin"); ?>
						</div>

					<!-- CHECKBOX -->
						<div class="option">
							<input class='block_option' type="hidden" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][hide_excerpt]" value="unchecked" />
							<input class='block_option' type="checkbox" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][hide_excerpt]" class="checkbox" value="checked" <?php if (isset($params['hide_excerpt'])) { checked($params['hide_excerpt'] == "checked"); } ?>/> 
							<?php _e("Hide excerpt", "loc_hairdo_core_plugin"); ?>
						</div>


					<!-- SELECT -->
						<div class="option">
							<label><?php _e("Order of appearance", "loc_hairdo_core_plugin"); ?></label>
							<select class='block_option' name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][orderby]"> 
				     			<option value="random" <?php if (isset($params['orderby'])) {if ($params['orderby'] == "random") echo "selected='selected'";} ?>>Random</option> 
				     			<option value="random"></option> 
				     			
				     			<option value="alphabetical_asc" <?php if (isset($params['orderby'])) {if ($params['orderby'] == "alphabetical_asc") echo "selected='selected'";} ?>>Alphabetical ascending</option> 
				     			<option value="alphabetical_desc" <?php if (isset($params['orderby'])) {if ($params['orderby'] == "alphabetical_desc") echo "selected='selected'";} ?>>Alphabetical descending</option> 
				     			<option value="random"></option> 
				     			
				     			<option value="date_asc" <?php if (isset($params['orderby'])) {if ($params['orderby'] == "date_asc") echo "selected='selected'";} ?>>Date added ascending</option> 
				     			<option value="date_desc" <?php if (isset($params['orderby'])) {if ($params['orderby'] == "date_desc") echo "selected='selected'";} ?>>Date added descending</option> 
				     			<option value="random"></option> 
				     			
				     			<option value="index_asc" <?php if (isset($params['orderby'])) {if ($params['orderby'] == "index_asc") echo "selected='selected'";} ?>>By index ascending</option> 
				     			<option value="index_desc" <?php if (isset($params['orderby'])) {if ($params['orderby'] == "index_desc") echo "selected='selected'";} ?>>By index descending</option> 
							</select> 
						</div>
						

					<!-- DYNAMIC CHECKBOXES -->
						<?php 

							$cat_list = get_categories(array(
								'hide_empty' 	=> 0,
								'taxonomy' 		=> 'people_category',
							));
							$cat_list = array_values($cat_list);

						 ?>

						<div class="option">
							<label><?php _e("People category to display", "loc_hairdo_core_plugin"); ?></label>
							<select class='block_option' id="show" name="canon_options_pagebuilder[blocks][<?php echo $index; ?>][show]"> 

							<?php 
								for ($i = 0; $i < count($cat_list); $i++) { 
								?>
				     				<option value="<?php echo $cat_list[$i]->slug; ?>" <?php if (isset($params['show'])) {if ($params['show'] == $cat_list[$i]->slug) echo "selected='selected'";} ?>><?php echo $cat_list[$i]->name; ?></option> 
								<?php
								}
							?>
							</select> 
						</div>


					</div>

				<!-- BLOCK TAB: ADVANCED -->
					<div class="block_tab block_tab_advanced">
						<?php include 'includes/inc_block_advanced_tab.php'; ?>
					</div>


				</div>
				
			</li>

		<?php	
	}
