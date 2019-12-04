<?php
/**
 * Template Name: verzoring Page Template
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
         	
	<h2 class="Intro">Verzorging van de hairextensions</h2>
    
    <!-- Middenstuk -->
    	
		<div id="leftcon" class="verzor">
                	<?php echo get_sidebar( 'shop' ); ?>
          <div id="leftconbottom">
            <img src="<?php echo get_template_directory_uri(); ?>/images/verzorging-hairextensions.jpg" alt="" />
          </div>    
               
                
                </div>
                

            
     <div id="rightcon">
        
          <h1><?php echo get_post_meta( get_the_ID(), 'sub_title', true ); ?></h1>

		  <?php
			$my_postid = get_the_ID();//This is page id or post id
			$content_post = get_post($my_postid);
			$content = $content_post->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);
			$content = str_replace('<p>', '', $content);
			$content = str_replace('</p>', '<br/><br/>', $content);
			echo $content;
		 ?>
		  
		  </p></div>

<!-- Einde float -->

  <div style="clear:both"></div>
	 
<?php get_footer(); ?>