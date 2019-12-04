	<div class="wrap">

		<div id="icon-themes" class="icon32"></div>

		<h2><?php printf( "%s Settings - %s", wp_get_theme()->Name, esc_attr(__("Appearance", "loc_canon")) ); ?></h2>

		<?php 
			//delete_option('canon_options_appearance');
			$canon_options_appearance = get_option('canon_options_appearance'); 

			// var_dump($canon_options_appearance);

		?>

		<br>
		
		<div class="options_wrapper canon-options">
		
			<div class="table_container">

				<form method="post" action="options.php" enctype="multipart/form-data">
					<?php settings_fields('group_canon_options_appearance'); ?>				<!-- very important to add these two functions as they mediate what wordpress generates automatically from the functions.php -->
					<?php do_settings_sections('handle_canon_options_appearance'); ?>		


					<?php submit_button(); ?>
					

					<!-- 
					--------------------------------------------------------------------------
						SKINS
				    -------------------------------------------------------------------------- 
					-->

						<h3><?php _e("Skins", "loc_canon"); ?> <img src="<?php echo get_template_directory_uri() . '/img/help.png' ?>"></h3>

						<div class='help'>

							<?php
								
								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Skins', 'loc_canon'),
									'content' 				=> array(
										__('Click a skin-button to change the colour-scheme of the whole theme.', 'loc_canon'),
									),
								)); 

							?>			

						</div>

						<table class='form-table' id="skins">

							<?php
								
								fw_option(array(
									'type'					=> 'hidden',
									'slug' 					=> 'body_skin_class',
									'options_name'			=> 'canon_options_appearance',
								)); 
							
							?>

							<tr valign='top'>
								<td>
									<img src="<?php echo get_template_directory_uri() ?>/img/skin_btn_1.png" alt="" 

										data-body_skin_class					="tc-hairdo-1"
										
										data-color_body							="#000000"
										data-color_plate						="#17181b"
										data-color_general_text					="#cacdcf"
										data-color_links						="#ffffff"
										data-color_links_hover					="#f65486"
										data-color_headings						="#ffffff"
										data-color_text_2						="#ffffff"
										data-color_text_3						="#ffbbd0"
										data-color_text_logo					="#ffffff"
										data-color_feat_text_1					="#f65486"
										data-color_feat_text_2					="#ffbbd0"
										data-color_white_text					="#ffffff"
										data-color_preheader_bg					="#25262a"
										data-color_preheader					="#ffffff"
										data-color_preheader_hover				="#f65486"
										data-color_header_bg					="#17181b"
										data-color_header						="#ffffff"
										data-color_header_hover					="#f65486"
										data-color_postheader_bg				="#25262a"
										data-color_postheader					="#ffffff"
										data-color_postheader_hover				="#f65486"
										data-color_third_prenav					="#17181b"
										data-color_third_nav					="#25262a"
										data-color_third_postnav				="#17181b"
										data-color_sidr_bg						="#25262a"
										data-color_sidr							="#ffffff"
										data-color_sidr_hover					="#f65486"
										data-color_sidr_line					="#4b4c52"
										
										data-color_btn_1_bg						="#ea3d7e"
										data-color_btn_1_hover_bg				="#aa2154"
										data-color_btn_1						="#ffffff"
										data-color_btn_2_bg						="#ffbbe0"
										data-color_btn_2_hover_bg				="#aa2154"
										data-color_btn_2						="#ffffff"
										data-color_btn_3_bg						="#484b57"
										data-color_btn_3_hover_bg				="#aa2154"
										data-color_btn_3						="#ffffff"
										data-color_feat_block_1					="#25262a"
										data-color_feat_block_2					="#25262a"
										data-color_lite_block					="#25262a"
										data-color_form_fields_bg				="#1e1e22"
										data-color_form_fields_text				="#cacdcf"
										data-color_lines						="#38393d"
										data-color_footer_block					="#1e1e22"
										data-color_footer_headings				="#ffffff"
										data-color_footer_text					="#cacdcf"
										data-color_footer_text_hover			="#f65486"
										data-color_footlines					="#38393d"
										data-color_footer_button				="#ff8db0"
										data-color_footer_form_fields_bg		="#25262a"
										data-color_footer_form_fields_text		="#cacdcf"
										data-color_footer_alt_block				="#393a41"
										data-color_footer_base					="#25262a"
										data-color_footer_base_text				="#ffffff"
										data-color_footer_base_text_hover		="#f587a9"

									/>
									
									
									
									<img src="<?php echo get_template_directory_uri() ?>/img/skin_btn_2.png" alt="" 
									
										data-body_skin_class					="tc-hairdo-2"
										
										data-color_body							="#dfdbd5"
										data-color_plate						="#f9f7f2"
										data-color_general_text					="#322f2a"
										data-color_links						="#322f2a"
										data-color_links_hover					="#e04015"
										data-color_headings						="#211d19"
										data-color_text_2						="#322f2a"
										data-color_text_3						="#fc9143"
										data-color_text_logo					="#ffffff"
										data-color_feat_text_1					="#e04015"
										data-color_feat_text_2					="#fc9143"
										data-color_white_text					="#ffffff"
										data-color_preheader_bg					="#312c26"
										data-color_preheader					="#ffffff"
										data-color_preheader_hover				="#fb9042"
										data-color_header_bg					="#211d19"
										data-color_header						="#ffffff"
										data-color_header_hover					="#fb9042"
										data-color_postheader_bg				="#27231e"
										data-color_postheader					="#ffffff"
										data-color_postheader_hover				="#fb9042"
										data-color_third_prenav					="#211d19"
										data-color_third_nav					="#312c26"
										data-color_third_postnav				="#312c26"
										data-color_sidr_bg						="#211d19"
										data-color_sidr							="#ffffff"
										data-color_sidr_hover					="#f65486"
										data-color_sidr_line					="#3e3d3b"
										
										data-color_btn_1_bg						="#e04015"
										data-color_btn_1_hover_bg				="#fc9143"
										data-color_btn_1						="#ffffff"
										data-color_btn_2_bg						="#fc9143"
										data-color_btn_2_hover_bg				="#e04015"
										data-color_btn_2						="#ffffff"
										data-color_btn_3_bg						="#584d41"
										data-color_btn_3_hover_bg				="#e04015"
										data-color_btn_3						="#ffffff"
										data-color_feat_block_1					="#e8e2d9"
										data-color_feat_block_2					="#e8e2d9"
										data-color_lite_block					="#efeae4"
										data-color_form_fields_bg				="#efeae4"
										data-color_form_fields_text				="#4f473d"
										data-color_lines						="#e4e2dc"
										data-color_footer_block					="#312c26"
										data-color_footer_headings				="#ffffff"
										data-color_footer_text					="#cfceca"
										data-color_footer_text_hover			="#fc9143"
										data-color_footlines					="#454039"
										data-color_footer_button				="#fc9143"
										data-color_footer_form_fields_bg		="#27231e"
										data-color_footer_form_fields_text		="#cfceca"
										data-color_footer_alt_block				="#27231e"
										data-color_footer_base					="#211d19"
										data-color_footer_base_text				="#ffffff"
										data-color_footer_base_text_hover		="#fc9143"

									/>
									
									
									
									
									<img src="<?php echo get_template_directory_uri() ?>/img/skin_btn_3.png" alt="" 
									
										data-body_skin_class					="tc-hairdo-3"
										
										data-color_body							="#efefef"
										data-color_plate						="#ffffff"
										data-color_general_text					="#17181b"
										data-color_links						="#17181b"
										data-color_links_hover					="#d2165d"
										data-color_headings						="#d2165d"
										data-color_text_2						="#17181b"
										data-color_text_3						="#f65486"
										data-color_text_logo					="#ffffff"
										data-color_feat_text_1					="#f65486"
										data-color_feat_text_2					="#fa9cb9"
										data-color_white_text					="#ffffff"
										data-color_preheader_bg					="#25262a"
										data-color_preheader					="#ffffff"
										data-color_preheader_hover				="#f65486"
										data-color_header_bg					="#17181b"
										data-color_header						="#ffffff"
										data-color_header_hover					="#f65486"
										data-color_postheader_bg				="#25262a"
										data-color_postheader					="#ffffff"
										data-color_postheader_hover				="#f65486"
										data-color_third_prenav					="#17181b"
										data-color_third_nav					="#25262a"
										data-color_third_postnav				="#17181b"
										data-color_sidr_bg						="#25262a"
										data-color_sidr							="#ffffff"
										data-color_sidr_hover					="#f65486"
										data-color_sidr_line					="#4b4c52"
										
										data-color_btn_1_bg						="#ea3d7e"
										data-color_btn_1_hover_bg				="#aa2154"
										data-color_btn_1						="#ffffff"
										data-color_btn_2_bg						="#ffbbe0"
										data-color_btn_2_hover_bg				="#aa2154"
										data-color_btn_2						="#ffffff"
										data-color_btn_3_bg						="#484b57"
										data-color_btn_3_hover_bg				="#aa2154"
										data-color_btn_3						="#ffffff"
										data-color_feat_block_1					="#efefef"
										data-color_feat_block_2					="#efefef"
										data-color_lite_block					="#f2f2f2"
										data-color_form_fields_bg				="#f6f6f6"
										data-color_form_fields_text				="#666666"
										data-color_lines						="#e3e3e3"
										data-color_footer_block					="#1e1e22"
										data-color_footer_headings				="#ffffff"
										data-color_footer_text					="#cacdcf"
										data-color_footer_text_hover			="#f65486"
										data-color_footlines					="#38393d"
										data-color_footer_button				="#ff8db0"
										data-color_footer_form_fields_bg		="#25262a"
										data-color_footer_form_fields_text		="#cacdcf"
										data-color_footer_alt_block				="#393a41"
										data-color_footer_base					="#25262a"
										data-color_footer_base_text				="#ffffff"
										data-color_footer_base_text_hover		="#f587a9"

									/>									


									
									
								</td>
							</tr>

						</table>

					<!-- 
					--------------------------------------------------------------------------
						COLOR SETTINGS
				    -------------------------------------------------------------------------- 
					-->

						<h3><?php _e("Color settings", "loc_canon"); ?> <img src="<?php echo get_template_directory_uri() . '/img/help.png' ?>"></h3>

						<div class='help'>

							<?php
								
								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Colors', 'loc_canon'),
									'content' 				=> array(
										__('Change the colours of the theme. Remember to save your changes.', 'loc_canon'),
									),
								)); 

							?>			

						</div>

						<table class='form-table'>

							<?php
								
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Body Background', 'loc_canon'),
									'slug' 					=> 'color_body',
									'options_name'			=> 'canon_options_appearance',
								)); 
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Main Plate Background', 'loc_canon'),
									'slug' 					=> 'color_plate',
									'options_name'			=> 'canon_options_appearance',
								)); 
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('General Text', 'loc_canon'),
									'slug' 					=> 'color_general_text',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Link Text', 'loc_canon'),
									'slug' 					=> 'color_links',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Link Text Hover', 'loc_canon'),
									'slug' 					=> 'color_links_hover',
									'options_name'			=> 'canon_options_appearance',
								));  
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Primary Headings', 'loc_canon'),
									'slug' 					=> 'color_headings',
									'options_name'			=> 'canon_options_appearance',
								)); 
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Secondary Body Text', 'loc_canon'),
									'slug' 					=> 'color_text_2',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Tertiary Body Text', 'loc_canon'),
									'slug' 					=> 'color_text_3',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Logo As Text', 'loc_canon'),
									'slug' 					=> 'color_text_logo',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Primary Feature Text', 'loc_canon'),
									'slug' 					=> 'color_feat_text_1',
									'options_name'			=> 'canon_options_appearance',
								));    
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Secondary Feature Text', 'loc_canon'),
									'slug' 					=> 'color_feat_text_2',
									'options_name'			=> 'canon_options_appearance',
								)); 
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('White Text', 'loc_canon'),
									'slug' 					=> 'color_white_text',
									'options_name'			=> 'canon_options_appearance',
								)); 
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Pre Header Background', 'loc_canon'),
									'slug' 					=> 'color_preheader_bg',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Pre Header Text', 'loc_canon'),
									'slug' 					=> 'color_preheader',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Pre Header Text Hover', 'loc_canon'),
									'slug' 					=> 'color_preheader_hover',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Header Background', 'loc_canon'),
									'slug' 					=> 'color_header_bg',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Header Text', 'loc_canon'),
									'slug' 					=> 'color_header',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Header Text hover', 'loc_canon'),
									'slug' 					=> 'color_header_hover',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Post Header Background', 'loc_canon'),
									'slug' 					=> 'color_postheader_bg',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Post Header Text', 'loc_canon'),
									'slug' 					=> 'color_postheader',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Post Header Text Hover', 'loc_canon'),
									'slug' 					=> 'color_postheader_hover',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Pre Header Tertiary Menu Background', 'loc_canon'),
									'slug' 					=> 'color_third_prenav',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Header Tertiary Menu Background', 'loc_canon'),
									'slug' 					=> 'color_third_nav',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Post Header Tertiary Menu Background', 'loc_canon'),
									'slug' 					=> 'color_third_postnav',
									'options_name'			=> 'canon_options_appearance',
								)); 
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Responsive Menu Background', 'loc_canon'),
									'slug' 					=> 'color_sidr_bg',
									'options_name'			=> 'canon_options_appearance',
								)); 
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Responsive Menu Text', 'loc_canon'),
									'slug' 					=> 'color_sidr',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Responsive Menu Text Hover', 'loc_canon'),
									'slug' 					=> 'color_sidr_hover',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Responsive Menu Borders', 'loc_canon'),
									'slug' 					=> 'color_sidr_line',
									'options_name'			=> 'canon_options_appearance',
								));    
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Button 1 Background', 'loc_canon'),
									'slug' 					=> 'color_btn_1_bg',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Button 1 Hover Background', 'loc_canon'),
									'slug' 					=> 'color_btn_1_hover_bg',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Button 1 Text', 'loc_canon'),
									'slug' 					=> 'color_btn_1',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Button 2 Background', 'loc_canon'),
									'slug' 					=> 'color_btn_2_bg',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Button 2 Hover Background', 'loc_canon'),
									'slug' 					=> 'color_btn_2_hover_bg',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Button 2 Text', 'loc_canon'),
									'slug' 					=> 'color_btn_2',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Button 3 Background', 'loc_canon'),
									'slug' 					=> 'color_btn_3_bg',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Button 3 Hover Background', 'loc_canon'),
									'slug' 					=> 'color_btn_3_hover_bg',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Button 3 Text', 'loc_canon'),
									'slug' 					=> 'color_btn_3',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Feature Block 1', 'loc_canon'),
									'slug' 					=> 'color_feat_block_1',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Feature Block 2', 'loc_canon'),
									'slug' 					=> 'color_feat_block_2',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Light Block Elements', 'loc_canon'),
									'slug' 					=> 'color_lite_block',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Form Fields Background', 'loc_canon'),
									'slug' 					=> 'color_form_fields_bg',
									'options_name'			=> 'canon_options_appearance',
								)); 
							
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Form Fields Text', 'loc_canon'),
									'slug' 					=> 'color_form_fields_text',
									'options_name'			=> 'canon_options_appearance',
								)); 
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Border/Rulers Color', 'loc_canon'),
									'slug' 					=> 'color_lines',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Footer Block', 'loc_canon'),
									'slug' 					=> 'color_footer_block',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Footer Headings', 'loc_canon'),
									'slug' 					=> 'color_footer_headings',
									'options_name'			=> 'canon_options_appearance',
								)); 
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Footer Text', 'loc_canon'),
									'slug' 					=> 'color_footer_text',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Footer Text Hover', 'loc_canon'),
									'slug' 					=> 'color_footer_text_hover',
									'options_name'			=> 'canon_options_appearance',
								)); 
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Footer Border/Rulers Color', 'loc_canon'),
									'slug' 					=> 'color_footlines',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Footer Buttons', 'loc_canon'),
									'slug' 					=> 'color_footer_button',
									'options_name'			=> 'canon_options_appearance',
								)); 
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Footer Form Fields Background', 'loc_canon'),
									'slug' 					=> 'color_footer_form_fields_bg',
									'options_name'			=> 'canon_options_appearance',
								)); 
							
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Footer Form Fields Text', 'loc_canon'),
									'slug' 					=> 'color_footer_form_fields_text',
									'options_name'			=> 'canon_options_appearance',
								)); 
							
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Footer Alternate Block Color', 'loc_canon'),
									'slug' 					=> 'color_footer_alt_block',
									'options_name'			=> 'canon_options_appearance',
								)); 
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Footer Base', 'loc_canon'),
									'slug' 					=> 'color_footer_base',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Footer Base Text', 'loc_canon'),
									'slug' 					=> 'color_footer_base_text',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Footer Base Text Hover', 'loc_canon'),
									'slug' 					=> 'color_footer_base_text_hover',
									'options_name'			=> 'canon_options_appearance',
								));


							?>			


						</table>


					<!-- 
					--------------------------------------------------------------------------
						BACKGROUND
				    -------------------------------------------------------------------------- 
					-->

						<h3><?php _e("Background", "loc_canon"); ?> <img src="<?php echo get_template_directory_uri() . '/img/help.png' ?>"></h3>

						<div class='help'>
							<?php

								fw_option_help(array(
									'type'					=> 'ul',
									'title' 				=> __('Background image URL', 'loc_canon'),
									'content' 				=> array(
										__('Enter a complete URL to the image you want to use or', 'loc_canon'),
										__('Click the "Upload" button, upload an image and make sure you click the "Use this image" button or', 'loc_canon'),
										__('Click the "Upload" button and choose an image from the media library tab. Make sure you click the "Use this image" button.', 'loc_canon'),
										__('Remember to save your changes.', 'loc_canon'),
										__('NB: the background image will be positioned top-center.', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Background link (optional)', 'loc_canon'),
									'content' 				=> array(
										__('If you insert a link here you background will automatically be made clickable. Clicking the background will open up your link in a new window. Great for take-over style ad-campaigns.', 'loc_canon'),
										__('NB: Only works with boxed design.', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Repeat', 'loc_canon'),
									'content' 				=> array(
										__('If set to repeat the background image will repeat vertically.', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Attachment', 'loc_canon'),
									'content' 				=> array(
										__('If set to fixed the background image will not scroll.', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Background pattern', 'loc_canon'),
									'content' 				=> array(
										__('Click one of buttons to use that background pattern. Notice that the url of pattern image file will be automatically inserted into the Backgroun image URL input. Also notice that Repeat and attachment selects will be updated to recommended selections for use with pattern backgrounds (repeat fixed). Remember to save your changes.', 'loc_canon'),
									),
								));

							?> 

						</div>

						<table class='form-table' id="background_table">

							<?php

								fw_option(array(
									'type'					=> 'upload',
									'title' 				=> __('Background image URL', 'loc_canon'),
									'slug' 					=> 'bg_img_url',
									'btn_text'				=> __('Upload background image', 'loc_canon'),
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'text',
									'title' 				=> __('Background link (optional)', 'loc_canon'),
									'slug' 					=> 'bg_link',
									'class'					=> 'widefat',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'select',
									'title' 				=> __('Repeat', 'loc_canon'),
									'slug' 					=> 'bg_repeat',
									'select_options'		=> array(
										'repeat'			=> __('Repeat', 'loc_canon'),
										'no-repeat'			=> __('No repeat', 'loc_canon')
									),
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'select',
									'title' 				=> __('Attachment', 'loc_canon'),
									'slug' 					=> 'bg_attachment',
									'select_options'		=> array(
										'fixed'				=> __('Fixed', 'loc_canon'),
										'scroll'			=> __('Scroll', 'loc_canon')
									),
									'options_name'			=> 'canon_options_appearance',
								)); 

							 ?>		

							<tr valign='top'>
								<th scope='row'><?php _e("Background pattern", "loc_canon"); ?></th>
								<td class="bg_pattern_picker">
									<img src="<?php echo get_template_directory_uri(); ?>/img/patterns/tile_btn.png" data-img_file="tile.png"> 
									<img src="<?php echo get_template_directory_uri(); ?>/img/patterns/tile2_btn.png" data-img_file="tile2.png"> 
									<img src="<?php echo get_template_directory_uri(); ?>/img/patterns/tile3_btn.png" data-img_file="tile3.png">
									<img src="<?php echo get_template_directory_uri(); ?>/img/patterns/tile4_btn.png" data-img_file="tile4.png"> 
									<img src="<?php echo get_template_directory_uri(); ?>/img/patterns/tile5_btn.png" data-img_file="tile5.png"> 
									<img src="<?php echo get_template_directory_uri(); ?>/img/patterns/tile6_btn.png" data-img_file="tile6.png">
									<img src="<?php echo get_template_directory_uri(); ?>/img/patterns/tile7_btn.png" data-img_file="tile7.png"> 
									<img src="<?php echo get_template_directory_uri(); ?>/img/patterns/tile8_btn.png" data-img_file="tile8.png"> 
									<img src="<?php echo get_template_directory_uri(); ?>/img/patterns/tile9_btn.png" data-img_file="tile9.png"> 
									<img src="<?php echo get_template_directory_uri(); ?>/img/patterns/tile10_btn.png" data-img_file="tile10.png">  
								</td>
							</tr>


						</table>


					<!-- 
					--------------------------------------------------------------------------
						GOOGLE WEBFONTS
				    -------------------------------------------------------------------------- 
					-->

						<h3><?php _e("Google Webfonts", "loc_canon"); ?> <img src="<?php echo get_template_directory_uri() . '/img/help.png' ?>"></h3>

						<div class='help'>
							<?php

								fw_option_help(array(
									'type'					=> 'ul',
									'title' 				=> __('Change fonts', 'loc_canon'),
									'content' 				=> array(
										__('<i>first select:</i> Font name.', 'loc_canon'),
										__('<i>middle select:</i> Font variants (will change automatically if available for the chosen font).', 'loc_canon'),
										__('<i>last select:</i> Font subset (will change automatically if available for the chosen font).', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'paragraphs',
									'title' 				=> __('More info', 'loc_canon'),
									'content' 				=> array(
										__('Notice: You can only control the general fonts to be used. However, parameters like font size, styling, letter-spacing etc. are controlled by the theme itself.', 'loc_canon'),
										__('Go to <a href="http://www.google.com/webfonts" target="_blank">Google Webfonts</a> homepage to preview fonts.', 'loc_canon'),
									),
								));

							?> 

						</div>

						<table class='form-table'>

							<?php 

								fw_option(array(
									'type'					=> 'font',
									'title' 				=> __('Body text', 'loc_canon'),
									'slug' 					=> 'font_main',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'font',
									'title' 				=> __('Feature text', 'loc_canon'),
									'slug' 					=> 'font_quote',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'font',
									'title' 				=> __('Lead in text', 'loc_canon'),
									'slug' 					=> 'font_lead',
									'options_name'			=> 'canon_options_appearance',
								)); 
								
								fw_option(array(
									'type'					=> 'font',
									'title' 				=> __('Logo text', 'loc_canon'),
									'slug' 					=> 'font_logotext',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'font',
									'title' 				=> __('Bold text', 'loc_canon'),
									'slug' 					=> 'font_bold',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'font',
									'title' 				=> __('Button text', 'loc_canon'),
									'slug' 					=> 'font_button',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'font',
									'title' 				=> __('Italic text', 'loc_canon'),
									'slug' 					=> 'font_italic',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'font',
									'title' 				=> __('Main headings text', 'loc_canon'),
									'slug' 					=> 'font_heading',
									'options_name'			=> 'canon_options_appearance',
								));
								
								fw_option(array(
									'type'					=> 'font',
									'title' 				=> __('Second headings text', 'loc_canon'),
									'slug' 					=> 'font_heading2',
									'options_name'			=> 'canon_options_appearance',
								));  

								fw_option(array(
									'type'					=> 'font',
									'title' 				=> __('Nav style text', 'loc_canon'),
									'slug' 					=> 'font_nav',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'font',
									'title' 				=> __('Widget footer text', 'loc_canon'),
									'slug' 					=> 'font_widget_footer',
									'options_name'			=> 'canon_options_appearance',
								)); 

							?>

						</table>


					<!-- 
					--------------------------------------------------------------------------
						LIGHTBOX SETTINGS
				    -------------------------------------------------------------------------- 
					-->


						<h3><?php _e("Lightbox settings", "loc_canon"); ?> <img src="<?php echo get_template_directory_uri() . '/img/help.png' ?>"></h3>

						<div class='help'>
							<?php

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Lightbox overlay color', 'loc_canon'),
									'content' 				=> array(
										__('Select the color of the lightbox overlay.', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'ul',
									'title' 				=> __('Lightbox overlay opacity', 'loc_canon'),
									'content' 				=> array(
										__('Select the opacity of the lightbox overlay.', 'loc_canon'),
										__('Choose a value between 0 and 1.', 'loc_canon'),
										__('0 is completely transparent.', 'loc_canon'),
										__('1 is compeltely solid.', 'loc_canon'),
									),
								));

							?> 

						</div>

						<table class='form-table'>

							<?php

								fw_option(array(
									'type'					=> 'color',
									'title' 				=> __('Lightbox overlay color', 'loc_canon'),
									'slug' 					=> 'lightbox_overlay_color',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'number',
									'title' 				=> __('Lightbox overlay opacity', 'loc_canon'),
									'slug' 					=> 'lightbox_overlay_opacity',
									'min'					=> '0',
									'max'					=> '1',
									'step'					=> '0.1',
									'width_px'				=> '60',
									'colspan'				=> '2',
									'options_name'			=> 'canon_options_appearance',
								)); 

							?>

						</table>


					<!-- 
					--------------------------------------------------------------------------
						ANIMATION: IMG SLIDERS
				    -------------------------------------------------------------------------- 
					-->

						<h3><?php _e("Animation: Image Sliders", "loc_canon"); ?> <img src="<?php echo get_template_directory_uri() . '/img/help.png' ?>"></h3>

						<div class='help'>

							This controls general behavior of image flexsliders used in theme.

							<br>

							<?php

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Slideshow', 'loc_canon'),
									'content' 				=> array(
										__('If checked slides will change automatically.', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Slide delay', 'loc_canon'),
									'content' 				=> array(
										__('Delay between each slide (in milliseconds).', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Animation duration', 'loc_canon'),
									'content' 				=> array(
										__('Duration of transition animation (in milliseconds).', 'loc_canon'),
									),
								));

							?> 

						</div>

						<table class='form-table'>

							<?php 

								fw_option(array(
									'type'					=> 'checkbox',
									'title' 				=> __('Slideshow', 'loc_canon'),
									'slug' 					=> 'anim_img_slider_slideshow',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'number',
									'title' 				=> __('Slide delay', 'loc_canon'),
									'slug' 					=> 'anim_img_slider_delay',
									'min'					=> '0',
									'max'					=> '100000',
									'step'					=> '10',
									'postfix'				=> '<i> (milliseconds)</i>',
									'width_px'				=> '60',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'number',
									'title' 				=> __('Animation duration', 'loc_canon'),
									'slug' 					=> 'anim_img_slider_anim_duration',
									'min'					=> '0',
									'max'					=> '100000',
									'step'					=> '10',
									'postfix'				=> '<i> (milliseconds)</i>',
									'width_px'				=> '60',
									'options_name'			=> 'canon_options_appearance',
								)); 

							?>

						</table>


					<!-- 
					--------------------------------------------------------------------------
						ANIMATION: QUOTE SLIDERS
				    -------------------------------------------------------------------------- 
					-->

						<h3><?php _e("Animation: Quote Sliders", "loc_canon"); ?> <img src="<?php echo get_template_directory_uri() . '/img/help.png' ?>"></h3>

						<div class='help'>

							This controls general behavior of quote flexsliders used in theme.

							<br><br>

							<?php

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Slideshow', 'loc_canon'),
									'content' 				=> array(
										__('If checked slides will change automatically.', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Slide delay', 'loc_canon'),
									'content' 				=> array(
										__('Delay between each slide (in milliseconds).', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Animation duration', 'loc_canon'),
									'content' 				=> array(
										__('Duration of transition animation (in milliseconds).', 'loc_canon'),
									),
								));

							?> 

						</div>

						<table class='form-table'>

							<?php 

								fw_option(array(
									'type'					=> 'checkbox',
									'title' 				=> __('Slideshow', 'loc_canon'),
									'slug' 					=> 'anim_quote_slider_slideshow',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'number',
									'title' 				=> __('Slide delay', 'loc_canon'),
									'slug' 					=> 'anim_quote_slider_delay',
									'min'					=> '0',
									'max'					=> '100000',
									'step'					=> '10',
									'postfix'				=> '<i> (milliseconds)</i>',
									'width_px'				=> '60',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'number',
									'title' 				=> __('Animation duration', 'loc_canon'),
									'slug' 					=> 'anim_quote_slider_anim_duration',
									'min'					=> '0',
									'max'					=> '100000',
									'step'					=> '10',
									'postfix'				=> '<i> (milliseconds)</i>',
									'width_px'				=> '60',
									'options_name'			=> 'canon_options_appearance',
								)); 

							?>

						</table>

					<!-- 
					--------------------------------------------------------------------------
						ANIMATION: REVIEW SLIDERS
				    -------------------------------------------------------------------------- 
					-->

						<h3><?php _e("Animation: Review Sliders", "loc_canon"); ?> <img src="<?php echo get_template_directory_uri() . '/img/help.png' ?>"></h3>

						<div class='help'>

							<?php _e("This controls general behavior of review flexsliders used in theme.", "loc_cph"); ?>

							<br><br>

							<?php

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Slideshow', 'loc_canon'),
									'content' 				=> array(
										__('If checked slides will change automatically.', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Slide delay', 'loc_canon'),
									'content' 				=> array(
										__('Delay between each slide (in milliseconds).', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Animation duration', 'loc_canon'),
									'content' 				=> array(
										__('Duration of transition animation (in milliseconds).', 'loc_canon'),
									),
								));

							?> 

						</div>

						<table class='form-table'>

							<?php 

								fw_option(array(
									'type'					=> 'checkbox',
									'title' 				=> __('Slideshow', 'loc_canon'),
									'slug' 					=> 'anim_menu_slider_slideshow',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'number',
									'title' 				=> __('Slide delay', 'loc_canon'),
									'slug' 					=> 'anim_menu_slider_delay',
									'min'					=> '0',
									'max'					=> '100000',
									'step'					=> '10',
									'postfix'				=> '<i> (milliseconds)</i>',
									'width_px'				=> '60',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'number',
									'title' 				=> __('Animation duration', 'loc_canon'),
									'slug' 					=> 'anim_menu_slider_anim_duration',
									'min'					=> '0',
									'max'					=> '100000',
									'step'					=> '10',
									'postfix'				=> '<i> (milliseconds)</i>',
									'width_px'				=> '60',
									'options_name'			=> 'canon_options_appearance',
								)); 

							?>

						</table>

					<!-- 
					--------------------------------------------------------------------------
						ANIMATION: LAZY LOAD EFFECT
				    -------------------------------------------------------------------------- 
					-->

						<h3><?php _e("Animation: Lazy Load Effect", "loc_canon"); ?> <img src="<?php echo get_template_directory_uri() . '/img/help.png' ?>"></h3>

						<div class='help'>

							<?php

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Lazy Load Effect', 'loc_canon'),
									'content' 				=> array(
										__('When scrolling down elements fade in as they enter the viewport simulating lazy load.', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Start animation after', 'loc_canon'),
									'content' 				=> array(
										__('Delay before animation starts (in seconds).', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Enter from', 'loc_canon'),
									'content' 				=> array(
										__('Element moves in from this angle.', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Move', 'loc_canon'),
									'content' 				=> array(
										__('How much the element will move (in pixels). Can be 0 if you do not want the element to move at all.', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Animation duration', 'loc_canon'),
									'content' 				=> array(
										__('How long the fade-in animation lasts (in seconds).', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Viewport factor', 'loc_canon'),
									'content' 				=> array(
										__('How big a part of the element that must enter the viewport for the fade-in animation to trigger. 0 will trigger fade-in animation right when element enters viewport. 1 will require the whole element to enter viewport before triggering fade-in.', 'loc_canon'),
									),
								));

							?> 

						</div>

						<table class='form-table'>

							<?php 

								fw_option(array(
									'type'					=> 'checkbox',
									'title' 				=> __('Use on pagebuilder blocks', 'loc_canon'),
									'slug' 					=> 'lazy_load_on_pagebuilder_blocks',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'checkbox',
									'title' 				=> __('Use on blog/archive posts', 'loc_canon'),
									'slug' 					=> 'lazy_load_on_blog',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'checkbox',
									'title' 				=> __('Use on widgets', 'loc_canon'),
									'slug' 					=> 'lazy_load_on_widgets',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'number',
									'title' 				=> __('Start animation after', 'loc_canon'),
									'slug' 					=> 'lazy_load_after',
									'min'					=> '0',
									'max'					=> '100',
									'step'					=> '0.01',
									'postfix'				=> '<i> (seconds)</i>',
									'width_px'				=> '60',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'select',
									'title' 				=> __('Enter from', 'loc_canon'),
									'slug' 					=> 'lazy_load_enter',
									'select_options'		=> array(
										'top'				=> __('Top', 'loc_canon'),
										'right'				=> __('Right', 'loc_canon'),
										'bottom'			=> __('Bottom', 'loc_canon'),
										'left'				=> __('Left', 'loc_canon'),
									),
									'options_name'			=> 'canon_options_appearance',
								)); 


								fw_option(array(
									'type'					=> 'number',
									'title' 				=> __('Move', 'loc_canon'),
									'slug' 					=> 'lazy_load_move',
									'min'					=> '0',
									'max'					=> '1000',
									'step'					=> '1',
									'postfix'				=> '<i> (pixels)</i>',
									'width_px'				=> '60',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'number',
									'title' 				=> __('Animation duration', 'loc_canon'),
									'slug' 					=> 'lazy_load_over',
									'min'					=> '0',
									'max'					=> '100',
									'step'					=> '0.01',
									'postfix'				=> '<i> (seconds)</i>',
									'width_px'				=> '60',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'number',
									'title' 				=> __('Viewport factor', 'loc_canon'),
									'slug' 					=> 'lazy_load_viewport_factor',
									'min'					=> '0',
									'max'					=> '1',
									'step'					=> '0.01',
									'postfix'				=> '<i> (ratio)</i>',
									'width_px'				=> '60',
									'options_name'			=> 'canon_options_appearance',
								)); 

							?>

						</table>


					<!-- 
					--------------------------------------------------------------------------
						ANIMATION: MENUS
				    -------------------------------------------------------------------------- 
					-->

						<h3><?php _e("Animation: Menus", "loc_canon"); ?> <img src="<?php echo get_template_directory_uri() . '/img/help.png' ?>"></h3>

						<div class='help'>

							<?php

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Animate menus', 'loc_canon'),
									'content' 				=> array(
										__('Select which menus to animate - or turn off menu animation altogether.', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Enter from', 'loc_canon'),
									'content' 				=> array(
										__('Element moves in from this angle.', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Move distance', 'loc_canon'),
									'content' 				=> array(
										__('How much the element will move (in pixels). Can be 0 if you do not want the element to move at all.', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Animation duration', 'loc_canon'),
									'content' 				=> array(
										__('Duration of the menu animation.', 'loc_canon'),
									),
								));

								fw_option_help(array(
									'type'					=> 'standard',
									'title' 				=> __('Delay between elements', 'loc_canon'),
									'content' 				=> array(
										__('Delay in milliseconds between each menu item starts to appear.', 'loc_canon'),
									),
								));

							?> 

						</div>

						<table class='form-table'>

							<?php 

								fw_option(array(
									'type'					=> 'select',
									'title' 				=> __('Animate menus', 'loc_canon'),
									'slug' 					=> 'anim_menus',
									'select_options'		=> array(
										'anim_menus_off'		=> __('Off', 'loc_canon'),
										'.primary_menu'			=> __('Primary menu', 'loc_canon'),
										'.secondary_menu'		=> __('Secondary menu', 'loc_canon'),
										'.nav'					=> __('Primary + Secondary menu', 'loc_canon'),
									),
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'select',
									'title' 				=> __('Enter from', 'loc_canon'),
									'slug' 					=> 'anim_menus_enter',
									'select_options'		=> array(
										'bottom'			=> __('Top', 'loc_canon'),
										'left'				=> __('Right', 'loc_canon'),
										'top'				=> __('Bottom', 'loc_canon'),
										'right'				=> __('Left', 'loc_canon'),
									),
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'number',
									'title' 				=> __('Move distance', 'loc_canon'),
									'slug' 					=> 'anim_menus_move',
									'min'					=> '0',
									'max'					=> '10000',
									'step'					=> '1',
									'postfix'				=> '<i> (pixels)</i>',
									'width_px'				=> '60',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'number',
									'title' 				=> __('Animation duration', 'loc_canon'),
									'slug' 					=> 'anim_menus_duration',
									'min'					=> '0',
									'max'					=> '10000',
									'step'					=> '10',
									'postfix'				=> '<i> (milliseconds)</i>',
									'width_px'				=> '60',
									'options_name'			=> 'canon_options_appearance',
								)); 

								fw_option(array(
									'type'					=> 'number',
									'title' 				=> __('Delay between elements', 'loc_canon'),
									'slug' 					=> 'anim_menus_delay',
									'min'					=> '0',
									'max'					=> '10000',
									'step'					=> '10',
									'postfix'				=> '<i> (milliseconds)</i>',
									'width_px'				=> '60',
									'options_name'			=> 'canon_options_appearance',
								)); 

							?>

						</table>







					<?php submit_button(); ?>
				</form>
			</div> <!-- end table container -->	

	
		</div>

	</div>