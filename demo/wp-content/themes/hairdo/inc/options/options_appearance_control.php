<?php

/****************************************************
DESCRIPTION: 	GENERAL OPTIONS
OPTION HANDLE: 	canon_options_appearance
****************************************************/


	/****************************************************
	REGISTER MENU
	****************************************************/

	add_action('admin_menu', 'register_canon_options_appearance');

	function register_canon_options_appearance () {
		global $screen_handle_canon_options_appearance;	  	//this is the SCREEN handle used to identify the new admin menu page (notice: different than the add_menu_page handle)

		// Use this instad if submenu
		$screen_handle_canon_options_appearance = add_submenu_page(
			'handle_canon_options',							//the handle of the parent options page. 
			'Appearance Settings',							//the submenu title that will appear in browser title area.
			'Appearance',									//the on screen name of the submenu
			'manage_options',								//privileges check
			'handle_canon_options_appearance',				//the handle of this submenu
			'display_canon_options_appearance'					//the callback function to display the actual submenu page content.
		);

	}

	/****************************************************
	INITIALIZE MENU
	****************************************************/

	add_action('admin_init', 'init_canon_options_appearance');	
	
	function init_canon_options_appearance () {
		register_setting(
			'group_canon_options_appearance',				//group name. The group for the fields custom_options_group
			'canon_options_appearance',						//the options variabel. THIS IS WEHERE YOUR OPTIONS ARE STORED.
			'validate_canon_options_appearance'				//optional 3rd param. Callback /function to sanitize and validate
		);
	}

	/****************************************************
	SET DEFAULTS
	****************************************************/

	add_action('after_setup_theme', 'default_canon_options_appearance');	

	function default_canon_options_appearance () {

		//if this is first runthrough set default values
		if (get_option('canon_options_appearance') == FALSE) {		//trying to get options 'canon_options_appearance' which doesn't yet exist results in FALSE
		 	$options = array (

			 		'body_skin_class'					=> 'tc-hairdo-3',
					
					'color_body'						=> '#efefef',
					'color_plate'						=> '#ffffff',
					'color_general_text'				=> '#17181b',
					'color_links'						=> '#17181b',
					'color_links_hover'					=> '#d2165d',
					'color_headings'					=> '#d2165d',
					'color_text_2'						=> '#17181b',
					'color_text_3'						=> '#f65486',
					'color_text_logo'					=> '#ffffff',
					'color_feat_text_1'					=> '#f65486',
					'color_feat_text_2'					=> '#ffa9cb9',
					'color_white_text'					=> '#ffffff',
					'color_preheader_bg'				=> '#25262a',
					'color_preheader'					=> '#ffffff',
					'color_preheader_hover'				=> '#f65486',
					'color_header_bg'					=> '#17181b',
					'color_header'						=> '#ffffff',
					'color_header_hover'				=> '#f65486',
					'color_postheader_bg'				=> '#25262a',
					'color_postheader'					=> '#ffffff',
					'color_postheader_hover'			=> '#f65486',
					'color_third_prenav'				=> '#17181b',
					'color_third_nav'					=> '#25262a',
					'color_third_postnav'				=> '#17181b',
					'color_sidr_bg'						=> '#25262a',
					'color_sidr'						=> '#ffffff',
					'color_sidr_hover'					=> '#f65486',
					'color_sidr_line'					=> '#4b4c52',
					
					'color_btn_1_bg'					=> '#ea3d7e',
					'color_btn_1_hover_bg'				=> '#aa2154',
					'color_btn_1'						=> '#ffffff',
					'color_btn_2_bg'					=> '#ffbbe0',
					'color_btn_2_hover_bg'				=> '#aa2154',
					'color_btn_2'						=> '#ffffff',
					'color_btn_3_bg'					=> '#484b57',
					'color_btn_3_hover_bg'				=> '#aa2154',
					'color_btn_3'						=> '#ffffff',
					'color_feat_block_1'				=> '#efefef',
					'color_feat_block_2'				=> '#efefef',
					'color_lite_block'					=> '#f2f2f2',
					'color_form_fields_bg'				=> '#f6f6f6',
					'color_form_fields_text'			=> '#666666',
					'color_lines'						=> '#e3e3e3',
					'color_footer_block'				=> '#1e1e22',
					'color_footer_headings'				=> '#ffffff',
					'color_footer_text'					=> '#cacdcf',
					'color_footer_text_hover'			=> '#f65486',
					'color_footlines'					=> '#38393d',
					'color_footer_button'				=> '#ff8db0',
					'color_footer_form_fields_bg'		=> '#25262a',
					'color_footer_form_fields_text'		=> '#cacdcf',
					'color_footer_alt_block'			=> '#393a41',
					'color_footer_base'					=> '#25262a',
					'color_footer_base_text'			=> '#ffffff',
					'color_footer_base_text_hover'		=> '#f587a9',
					

					'bg_img_url'						=> '',
					'bg_link'							=> '',
					'bg_repeat'							=> 'repeat',
					'bg_attachment'						=> 'fixed',

					'lightbox_overlay_color'			=> '#000000',
					'lightbox_overlay_opacity'			=> '0.7',

				 	'font_main'        					=> array('canon_default','',''),				 	
				 	'font_quote'        				=> array('canon_default','',''),
				 	'font_lead'        				=> array('canon_default','',''),
				 	'font_logotext'	        			=> array('canon_default','',''),
				 	'font_bold'        					=> array('canon_default','',''),
				 	'font_button'      					=> array('canon_default','',''),
				 	'font_italic'        				=> array('canon_default','',''),
				 	'font_heading'        				=> array('canon_default','',''),
				 	'font_heading2'        				=> array('canon_default','',''),
				 	'font_nav'        					=> array('canon_default','',''),
				 	'font_widget_footer'				=> array('canon_default','',''),

					'anim_img_slider_slideshow'			=> 'unchecked',
					'anim_img_slider_delay'				=> '5000',
					'anim_img_slider_anim_duration'		=> '800',
					'anim_quote_slider_slideshow'		=> 'unchecked',
					'anim_quote_slider_delay'			=> '5000',
					'anim_quote_slider_anim_duration'	=> '800',
					'anim_menu_slider_slideshow'		=> 'unchecked',
					'anim_menu_slider_delay'			=> '5000',
					'anim_menu_slider_anim_duration'	=> '800',

					'lazy_load_on_pagebuilder_blocks'	=> 'checked',
					'lazy_load_on_blog'					=> 'checked',
					'lazy_load_on_widgets'				=> 'checked',
					'lazy_load_after'					=> 0.3,
					'lazy_load_enter'					=> 'bottom',
					'lazy_load_move'					=> 24,
					'lazy_load_over'					=> 0.56,
					'lazy_load_viewport_factor'			=> 0.2,

					'anim_menus'						=> '.nav',
					'anim_menus_enter'					=> 'left',
					'anim_menus_move'					=> 40,
					'anim_menus_duration'				=> 600,
					'anim_menus_delay'					=> 150,

				);

			update_option('canon_options_appearance', $options);
		}
	}


	/****************************************************
	VALIDATE INPUT AND DISPLAY MENU
	****************************************************/

	//remember this will strip all html php tags, strip slashes and convert quotation marks. This is not always what you want (maybe you want a field for HTML?) why you might want to modify this part.	
	function validate_canon_options_appearance ($new_instance) {				
		return $new_instance;
	}

	//display the menus
	function display_canon_options_appearance () {
		require "options_appearance.php";
	}