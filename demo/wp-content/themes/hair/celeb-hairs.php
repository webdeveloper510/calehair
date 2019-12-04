<?php
/**
 * Template Name: Celeb Hairs Template
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

 get_header(); 
?>

<style>
	.entry-content {
	  padding: 10px 0;
	}
	.entry-content p {
	  font-size: 15px;
	  line-height: 30px;
	}
</style>

<article class="post-31 page type-page status-publish hentry" id="post-31">
	
	<header class="entry-header">
		<h1 class="entry-title"><?php echo get_the_title(31); ?></h1>	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			$my_postid = 31;//This is page id or post id
			$content_post = get_post($my_postid);
			$content = $content_post->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);
			echo $content;
		 ?>
	</div><!-- .entry-content -->

</article>

<?php 
 get_footer();
?>