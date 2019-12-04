<?php
/**
 * Template Name: prijzen Page Template
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

<!-- Grijze balk --><!-- InstanceBeginEditable name="Titel pagina" -->
        
		<h2 class="Intro">Prijzen</h2>
        
		<!-- InstanceEndEditable --><!-- Middenstuk -->
    	
		<div id="leftcon" class="prijzen">
                	<?php echo get_sidebar( 'shop' ); ?>
                    
<!-- Bewerkbaar gebied foto -->                    
                	<!-- InstanceBeginEditable name="foto" -->
                    <div id="leftconbottom"> <img src="<?php echo get_template_directory_uri(); ?>/images/verzorging-hairextensions.jpg" alt="" /> </div>
                    <!-- InstanceEndEditable --></div>
                    
 <!-- Bewerkbaar gebied tekst -->
                    
		
		<div id="rightcon">

<!-- InstanceBeginEditable name="tekst" -->
        
		 <div id="headfoto">
         	<?php 
				$post_id = 11;
				echo get_the_post_thumbnail( $post_id, 'large' ); 
			?>
            
            <h2><?php echo  get_the_title($post_id); ?></h2>
            
<h3>Hoeveel extensions heb je precies nodig?</h3>


			<?php
				$my_postid = $post_id;//This is page id or post id
				$content_post = get_post($my_postid);
				$content = $content_post->post_content;
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);
				echo $content;
			 ?>

            
         </div>
  
  <!-- InstanceEndEditable --><!-- Einde float -->
  
	    </div>
        

  <div style="clear:both"></div>
  
	 
<?php get_footer(); ?>