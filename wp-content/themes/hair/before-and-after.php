<?php
/**
 * Template Name: before after Page Template
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
        
		<h2 class="Intro">Before & After foto's</h2>
        
		<!-- InstanceEndEditable --><!-- Middenstuk -->
    	
		<div id="leftcon" class="b_after">
                	<?php echo get_sidebar( 'shop' ); ?>
                    
<!-- Bewerkbaar gebied foto -->                    
                	<!-- InstanceBeginEditable name="foto" -->
                    <div id="leftconbottom"> <img src="<?php echo get_template_directory_uri(); ?>/images/verzorging-hairextensions.jpg" alt="" /> </div>
                    <!-- InstanceEndEditable --></div>
                    
 <!-- Bewerkbaar gebied tekst -->
                    
		
		<div id="rightcon">

<!-- InstanceBeginEditable name="tekst" -->
        
		  <div id="content">
          
			<?php
				$args = array( 'posts_per_page' => -1, 'offset'=> 1, 'category' => 21 );
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); 
			?>
			
					<?php the_post_thumbnail('large'); ?>
					<p>
						<b><?php the_title(); ?></b> 
						<br>
						<?php the_content(); ?>
					</p>
			<?php 
				endforeach; 
			?>
          </div>
  
  <!-- InstanceEndEditable --><!-- Einde float -->
  
	    </div>
        

  <div style="clear:both"></div>
	 
<?php get_footer(); ?>