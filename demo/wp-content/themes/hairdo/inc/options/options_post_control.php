<?php

/****************************************************
DESCRIPTION: 	POST & PAGE OPTIONS
OPTION HANDLE: 	canon_options_post
****************************************************/


	/****************************************************
	REGISTER MENU
	****************************************************/

	add_action('admin_menu', 'register_canon_options_post');

	function register_canon_options_post () {
		global $screen_handle_canon_options_post;	  	//this is the SCREEN handle used to identify the new admin menu page (notice: different than the add_menu_page handle)

		// Use this instad if submenu
		$screen_handle_canon_options_post = add_submenu_page(
			'handle_canon_options',						//the handle of the parent options page. 
			'Posts & Pages Settings',						//the submenu title that will appear in browser title area.
			'Posts & Pages',								//the on screen name of the submenu
			'manage_options',							//privileges check
			'handle_canon_options_post',				//the handle of this submenu
			'display_canon_options_post'						//the callback function to display the actual submenu page content.
		);

		//changing the name of the first submenu which has duplicate name (there are global variables $menu and $submenu which can be used. var_dump them to see content)
		// Put this in the submenu controller. NB: Not in the first add_menu_page controller, but in the first submenu controller with add_submenu_page. It is not defined until then. 
		global $submenu;	
		$submenu['handle_canon_options'][0][0] = "General";

	}

	/****************************************************
	INITIALIZE MENU
	****************************************************/

	add_action('admin_init', 'init_canon_options_post');	
	
	function init_canon_options_post () {
		register_setting(
			'group_canon_options_post',				//group name. The group for the fields custom_options_group
			'canon_options_post',						//the options variabel. THIS IS WEHERE YOUR OPTIONS ARE STORED.
			'validate_canon_options_post'				//optional 3rd param. Callback /function to sanitize and validate
		);
	}

	/****************************************************
	SET DEFAULTS
	****************************************************/

	add_action('after_setup_theme', 'default_canon_options_post');	

	function default_canon_options_post () {

		//if this is first runthrough set default values
		if (get_option('canon_options_post') == FALSE) {		//trying to get options 'canon_options_post' which doesn't yet exist results in FALSE
		 	$options = array (

		 			'show_tags' 				=> 'checked',
		 			'show_post_nav' 			=> 'checked',
		 			'post_nav_same_cat' 		=> 'unchecked',
		 			'show_comments' 			=> 'checked',
		 			
		 			'show_person_position' 		=> 'checked',
		 			'show_person_info' 			=> 'checked',
		 			'show_person_nav' 			=> 'checked',
		 			'person_nav_same_cat' 		=> 'unchecked',
		 			
		 			'show_meta_author' 			=> 'checked',
		 			'show_meta_date' 			=> 'checked',
		 			'show_meta_comments' 		=> 'checked',
		 			'show_meta_categories' 		=> 'checked',


		 			'homepage_blog_style'		=> 'full',
		 			'blog_style'				=> 'full',
		 			'cat_style'					=> 'full',
		 			'archive_excerpt_length'	=>	325,

		 			'blog_layout'					=> 'sidebar',
					'blog_sidebar'					=> 'canon_archive_sidebar_widget_area',
		 			'blog_excerpt_length'			=> 345,

		 			'cat_layout'					=> 'sidebar',
					'cat_sidebar'					=> 'canon_archive_sidebar_widget_area',
		 			'cat_excerpt_length'			=> 345,
		 			'show_cat_title'			=> 'unchecked',
		 			'show_cat_description'		=> 'unchecked',

		 			'archive_layout'				=> 'sidebar',
					'archive_sidebar'				=> 'canon_archive_sidebar_widget_area',
		 			'archive_excerpt_length'		=> 330,

			 		'search_box_text'			=> __('What are you looking for?', "loc_canon"),
			 		'search_posts'				=> 'checked',
			 		'search_pages'				=> 'unchecked',
			 		'search_cpt'				=> 'unchecked',
			 		'search_cpt_source'			=> 'cpt_people, cpt_project',

		 			'404_layout'				=> 'full',
					'404_sidebar'				=> 'canon_page_sidebar_widget_area',
			 		'404_title'					=> __('Page not found', "loc_canon"),
			 		'404_msg'					=> __("Sorry, you're lost my friend, the page you're looking for does not exist anymore. Take your luck at searching for a new one.", "loc_canon"),
					
			 		'currency_symbol'			=> '$',
			 		'currency_symbol_pos'		=> 'prepend',

					'use_woocommerce_sidebar'	=> 'checked',
					'woocommerce_sidebar'		=> 'canon_woocommerce_widget_area',

					'use_buddypress_sidebar'	=> 'checked',
					'buddypress_sidebar'		=> 'canon_buddypress_widget_area',

					'use_bbpress_sidebar'		=> 'checked',
					'bbpress_sidebar'			=> 'canon_bbpress_widget_area',

					'use_events_sidebar'		=> 'checked',
					'events_sidebar'			=> 'canon_events_widget_area',

				);

			update_option('canon_options_post', $options);
		}
	}


	/****************************************************
	VALIDATE INPUT AND DISPLAY MENU
	****************************************************/

	//remember this will strip all html php tags, strip slashes and convert quotation marks. This is not always what you want (maybe you want a field for HTML?) why you might want to modify this part.	
	function validate_canon_options_post ($new_instance) {				
		return $new_instance;
	}

	//display the menus
	function display_canon_options_post () {
		require "options_post.php";
	}