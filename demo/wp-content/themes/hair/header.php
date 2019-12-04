<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>Microring hairextensions Den Haag</title>
<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<link href="<?php echo get_template_directory_uri(); ?>/css/media.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
  jQuery(document).ready(function(){
	  jQuery( "#clickme" ).click(function() {
		jQuery( ".menu-main-menu-container" ).slideToggle({ direction: "up" }, 300); 
	});
	  
  });
	
</script>

<?php  wp_head(); ?>

<link href="<?php echo get_template_directory_uri(); ?>/css/stylesheet.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo get_template_directory_uri(); ?>/css/media.css" rel="stylesheet" type="text/css"/>
</head>


<body <?php body_class(); ?>>
<!-- Wrapper -->

<div id="wrapper" class="page-<?php echo get_the_ID(); ?>">
    
<!-- Head -->

	<div id="header">

	<!-- navigation menu -->

	<script>
		$(document).ready(function() {
			$("[href]").each(function() {
				if (this.href == window.location.href) {
					$(this).addClass("active");
				}
			});
		});
	</script>

	<style>
		.active, .current-menu-item.page_item a{ color: #cf7393 !important; }
	</style>
	
	<div class="upper-menu">
		<div><img src="<?php echo get_template_directory_uri(); ?>/images/shopping-cart-xxl.png" height="50" /><a href="<?php echo get_permalink(40); ?>">Cart</a></div>
		<div><img src="<?php echo get_template_directory_uri(); ?>/images/user-icon.png" height="50" /><a href="<?php echo get_permalink(42); ?>">User Account</a></div>
	</div>
	
	<div id="header-top-img">
		<img id="head-logo" src="<?php echo get_template_directory_uri().'/images/celeb-hair-extensions-logo.jpg';?>"/>
	</div>
	<div id="nav">
		<div id="clickme">Menu</div>
    	<!--<ul>
    		<li><a href="home.html">Home</a></li>
        	<li><a href="verzoring-hairextensions.html">Verzorging</a></li>
        	<li><a href="before-and-after.html">Before & After</a></li>
        	<li><a href="">Webshop</a></li>
        	<li><a href="prijzen.html">Prijzen</a></li>
        	<li><a href="">Contact</a> </li> 
         </ul>-->
		<?php wp_nav_menu( array('menu' => 'Main Menu' )); ?>		 
     </div>
    
  </div>

	

  