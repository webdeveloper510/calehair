<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	<!-- Footer -->
<style>
	
.n_bgc {background-color: white; }
</style>
	  
<!-- Footer -->

	<div id="footer">
    	
        <ul>
			<li>@ Copyright 2015</li>
			<?php 
			$wcatTerms = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'ASC',  'parent' =>0)); 
			foreach($wcatTerms as $wcatTerm) :  ?>
				<li><a href="<?php echo get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ); ?>"><?php echo $wcatTerm->name; ?></a></li>
			<?php endforeach; ?>
            <li>Sitemap</li>
        </ul>

    </div>

<!-- Eind wrapper -->

</div>
<?php wp_footer(); ?>
</body>
</html>
