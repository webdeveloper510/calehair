<?php
/**
 * Template Name: contact Page Template
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
	<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" type="text/css" rel="stylesheet"  />

	<style>
		
	</style>

	<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact</h2>
                </div>
            </div>
            <div class="row">
				<div class="col-lg-6 address">
					<?php 
						$my_postid = 19;//This is page id or post id
						$content_post = get_post($my_postid);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
						echo $content;
					?>
				</div>
                
				<div class="col-lg-6">
                    <div name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
							<!-- <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                         
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            <div class="clearfix"></div>
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div> -->
							
							
							
							
							
							<?php echo do_shortcode( '[contact-form-7 id="71" title="Contact Form"]' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	 
<?php get_footer(); ?>