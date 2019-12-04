<?php
/**
 * Template Name: Home Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<!-- Grijze balk -->  
         	
	<h2 class="Intro">Hairextensions Den Haag</h2>
      
<!-- slideshow -->

	<div id="slideshow">
    	<img src="<?php echo get_template_directory_uri(); ?>/images/hairextensions-den-haag-haarvolume-en-lengte.jpg" alt="" />
    </div>

<!-- Content -->

	<div class="zwartbalk">
    </div>
    
     <h1><a class="black-anchor" href="<?php echo get_permalink(31); ?>"><?php echo get_the_title(31); ?></a></h1>
     
	 <?php
		$my_postid = 31;//This is page id or post id
		$content_post = get_post($my_postid);
		$content = $content_post->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		echo $content;
	 ?>
     
       
<!-- Webshop gedeelte met 5 categorieen -->

	<h1>Hairextensions Groothandel Categorieen</h1>

		<div id="webshop">

			<?php $wcatTerms = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'ASC',  'parent' =>0)); //, 'exclude' => '17,77'
				foreach($wcatTerms as $wcatTerm) : 
					$wthumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
					$wimage = wp_get_attachment_url( $wthumbnail_id );
				?>
				  	<div class="leftcol">
				
			<?php if($wimage!=""):?><img src="<?php echo $wimage?>"><?php endif;?>
						<h2 class="submenu"><a href="<?php echo get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ); ?>"><?php echo $wcatTerm->name; ?></a></h2>
						
						
						
						<?php
						$wsubargs = array(
						   'hierarchical' => 1,
						   'show_option_none' => '',
						   'hide_empty' => 0,
						   'parent' => $wcatTerm->term_id,
						   'taxonomy' => 'product_cat'
						);
						$wsubcats = get_categories($wsubargs);
						foreach ($wsubcats as $wsc):
						?>
							<a href="<?php echo get_term_link( $wsc->slug, $wsc->taxonomy );?>"><?php echo $wsc->name;?>
						<?php
						endforeach;
						?>  
					</div>	
			<?php 
				endforeach; 
			?>

<!-- Eerste rij producten groothandel -->        

        	
           
<!-- STOP TWEEDE RIJ FLOATING -->

 	   <div style="clear:both"></div>           
            
    	</div>
    
<!-- Onderkant -->

		<div class="kop">Celeb Hairextensions: Wear and Style it as you like!</div>
        	<img class="selfies" src="<?php echo get_template_directory_uri(); ?>/images/hairextensions.jpg" alt="" />
			<?php //echo do_shortcode('[print_thumbnail_slider]'); ?>
            
        <div class="kop">Dare to look fabolous ladies ;)</div>

<?php get_footer(); ?>