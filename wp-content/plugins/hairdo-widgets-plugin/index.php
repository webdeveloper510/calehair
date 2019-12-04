<?php

/*
Plugin Name: Hairdo Widgets Plugin
Plugin URI: http://www.themecanon.com
Description: Custom widgets for Hairdo theme by Theme Canon.
Version: 1.3
Author: Theme Canon
Auhtor URI: http://www.themecanon.com
*/


/**************************************
NOTES

Plugins in this widget:
- Hairdo: More Posts.
- Hairdo: Twitter.
- Hairdo: Search.

- Hairdo: More Posts.
This widget taps into the post meta: "post_views" to determine most popular posts by view. (NB: data not supplied by plugin).
This widget uses a custom field (post): "cmb_hide_from_popular". (NB: data not supplied by plugin).

***************************************/

/**************************************
INDEX

PLUGIN LOCALIZATION INIT
PHP INCLUDES
WP ENQUEUE
IMAGE SIZES
FACEBOOK LIKE BOX MECHANICS

***************************************/

/**************************************
PLUGIN LOCALIZATION INIT
***************************************/

	add_action('after_setup_theme', 'hairdo_widgets_plugin_localization_setup');
	function hairdo_widgets_plugin_localization_setup() {
	    load_plugin_textdomain('loc_hairdo_widgets_plugin', false,  dirname( plugin_basename( __FILE__ ) ) . '/lang/');
	}


/**************************************
PHP INCLUDES
***************************************/

	// include widgets
	include 'inc/widgets/widget_hairdo_more_posts.php';
	include 'inc/widgets/widget_hairdo_twitter.php';
	include 'inc/widgets/widget_hairdo_search.php';
	include 'inc/widgets/widget_hairdo_contact_list.php';
	include 'inc/widgets/widget_hairdo_quicklinks.php';
	include 'inc/widgets/widget_hairdo_fact.php';
	include 'inc/widgets/widget_hairdo_statistics.php';
	include 'inc/widgets/widget_hairdo_single_post.php';
	include 'inc/widgets/widget_hairdo_quote.php';
	include 'inc/widgets/widget_hairdo_accordion.php';
	include 'inc/widgets/widget_hairdo_tabs.php';
	include 'inc/widgets/widget_hairdo_toggle.php';
	include 'inc/widgets/widget_hairdo_facebook.php';
	include 'inc/widgets/widget_hairdo_animated_number.php';
	include 'inc/widgets/widget_hairdo_donut_chart.php';
	include 'inc/widgets/widget_hairdo_reviews.php';
	include 'inc/widgets/widget_hairdo_paired_list.php';

	// conditional widgets. Notice the after_setup_theme action - this to prevent the class_exists check before all plugins have been loaded. If not in place the class_exists would just be executed when this plugin loads which could be before another plugin.
	add_action('after_setup_theme', 'load_conditional_widgets');
	function load_conditional_widgets() {
		if (class_exists('Tribe__Events__Main')) { include 'inc/widgets/widget_hairdo_single_event.php'; }
	}




/**************************************
WP ENQUEUE
***************************************/

	//front end includes
	add_action('wp_enqueue_scripts','hairdo_widgets_plugin_load_to_front');
	function hairdo_widgets_plugin_load_to_front() {

		//front end scripts (js)
		wp_enqueue_script('hairdo_widgets_plugin_scripts', plugins_url('', __FILE__ ) . '/js/scripts.js', array(), false, true);
		wp_enqueue_script('hairdo_widgets_plugin_cleantabs', plugins_url('', __FILE__ ) . '/js/cleantabs.jquery.js', array(), false, true);
		wp_enqueue_script('hairdo_widgets_plugin_animatenumbers', plugins_url('', __FILE__ ) . '/js/jquery.animateNumbers.js', array(), false, true);
		wp_enqueue_script('hairdo_widgets_plugin_raphael', plugins_url('', __FILE__ ) . '/js/raphael-2.1.0.min.js', array(), false, true);
		wp_enqueue_script('hairdo_widgets_plugin_morris', plugins_url('', __FILE__ ) . '/js/morris.js', array(), false, true);

		//style (css)	
		wp_enqueue_style('hairdo_widgets_plugin_style', plugins_url('', __FILE__ ) . '/css/style.css');
		wp_enqueue_style('hairdo_widgets_plugin_morris_style', plugins_url('', __FILE__ ) . '/css/morris.css');


	}

	//back end includes
	add_action('admin_enqueue_scripts', 'hairdo_widgets_plugin_load_to_back');  //this was changed to admin_enqueue_scripts from action hook admin_footer. Let's see if it makes a difference
	function hairdo_widgets_plugin_load_to_back() {

		//back end scripts (js)
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui', false, array(), false, false);
		wp_enqueue_script('jquery-ui-sortable', false, array(), false, true);
		wp_enqueue_script('hairdo_widgets_plugin_backend_scripts', plugins_url('', __FILE__ ) . '/js/backend_scripts.js', array(), false, true);
		wp_enqueue_script('hairdo_widgets_plugin_colorpicker', plugins_url('', __FILE__ ) . '/js/colorpicker.js', array(), false, true);


		//style (css)	
		wp_enqueue_style('hairdo_widgets_plugin_backend_style', plugins_url('', __FILE__ ) . '/css/backend.css');
		wp_enqueue_style('hairdo_widgets_plugin_colorpicker_style', plugins_url('', __FILE__ ) . '/css/colorpicker.css');

	}

/**************************************
IMAGE SIZES
***************************************/

	add_image_size( 'widget_more_posts_thumb', 1400, 933, true);


/**************************************
FACEBOOK LIKE BOX MECHANICS
***************************************/

	add_action('wp_footer', 'add_facebook_js');  
	function add_facebook_js () {
	?>
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>	
	<?php
	}