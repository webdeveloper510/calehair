<?php
	function block_content_input ($passed_vars) {

		$index = isset($passed_vars[0]) ? $passed_vars[0] : "block_index";
		$params = isset($passed_vars[1]) ? $passed_vars[1] : null;
		$exist = isset($passed_vars[1]) ? true : false;

		//DEFAULTS
		if (!$exist) {
			$params['type']							= 'content';
			
			// APPEARANCE TAB
			$params['tab'] 							= 'block_tab_general';
			$params['use_parallax'] 				= "checked";
			$params['parallax_ratio'] 				= 0.2;
			$params['bg_boxed'] 					= 'unchecked';
			$params['bg_color'] 					= '';
			$params['font_color'] 					= '';

			// ADVANCED TAB
			$params['custom_classes'] 				= '';
			$params['custom_css'] 					= '';

		}


		?>

			<li class="building_block block_content block_group_native">

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

						<div class="option">
							<span class="detail"><?php _e("Displays the content of your page. Make sure the page using this pagebuilder template has content.", "loc_hairdo_core_plugin"); ?></span>
						</div>

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
