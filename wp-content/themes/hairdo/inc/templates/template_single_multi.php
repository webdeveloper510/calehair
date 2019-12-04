<?php 

    //GET OPTIONS
    $canon_options_post = get_option('canon_options_post'); 

    //GET CMB DATA
    $cmb_single_style = "multi";
    $cmb_feature = get_post_meta( $post->ID, 'cmb_feature', true);
    $cmb_media_link = get_post_meta( $post->ID, 'cmb_media_link', true);
    $cmb_multi_intro = get_post_meta( $post->ID, 'cmb_multi_intro', true);

    // DEFAULTS
    if (!isset($canon_options_post['show_meta_author'])) { $canon_options_post['show_meta_author'] = "checked"; }
    if (!isset($canon_options_post['show_meta_date'])) { $canon_options_post['show_meta_date'] = "checked"; }
    if (!isset($canon_options_post['show_meta_comments'])) { $canon_options_post['show_meta_comments'] = "checked"; }
    if (!isset($canon_options_post['show_meta_categories'])) { $canon_options_post['show_meta_categories'] = "checked"; }
    $has_meta = ($canon_options_post['show_meta_author'] == "checked" || $canon_options_post['show_meta_date'] == "checked" || $canon_options_post['show_meta_comments'] == "checked" || $canon_options_post['show_meta_categories'] == "checked") ? true : false;
    if (!isset($canon_options_post['show_tags'])) { $canon_options_post['show_tags'] = "checked"; }

?>

    <!-- BEGIN LOOP -->
    <?php while ( have_posts() ) : the_post(); ?>


        <!-- start outter-wrapper -->   
        <div class="outter-wrapper">
            <!-- start main-container -->
            <div class="main-container">
                <!-- start main wrapper -->
                <div class="main wrapper clearfix">
                    <!-- start main-content -->
                    <div class="main-content">



                        <!-- Start Post --> 
                        <div id="post-<?php the_ID(); ?>" <?php post_class("clearfix"); ?>>

                            <!-- TITLE -->
                            <h1><?php the_title(); ?></h1>

                            
                            <!-- META -->
                            <?php 

                                if ($has_meta) { 

                                    // CATEGORIES
                                    $cat_string = mb_get_cat_string(get_the_ID(), " | ");

                                    // DATE
                                    $archive_year  = get_the_time('Y'); 
                                    $archive_month = get_the_time('m'); 
                                    $archive_day   = get_the_time('d');                             

                                    echo '<ul class="meta blogPost">';

                                    if ($canon_options_post['show_meta_author'] == "checked") { ?> <li class="meta_author"><?php the_author_posts_link(); ?></li> <?php }
                                    if ($canon_options_post['show_meta_date'] == "checked") { printf('<li class="meta_date"><a href="%s">%s</a></li>',  get_day_link( $archive_year, $archive_month, $archive_day), esc_attr(mb_localize_datetime(get_the_time(get_option('date_format'))))); }
                                    if ($canon_options_post['show_meta_comments'] == "checked") { ?> <li class="meta_comments"><a href="#comments" class="comment"><?php comments_number(__("No comments", "loc_canon"), __("1 comment", "loc_canon"), "% " . __("comments", "loc_canon")); ?></a></li> <?php }
                                    if ($canon_options_post['show_meta_categories'] == "checked") { printf('<li class="meta_categories">%s</li>', $cat_string); }
                            
                                    echo '</ul>'; 
                                } 

                            ?>

                            <!-- INTRO -->
                            <?php 
                                if (!empty($cmb_multi_intro)) { 
                                    echo "<p class='last lead'>";
                                    echo $cmb_multi_intro; 
                                    echo "</p>";
                                }

                            ?>

                            <div>



                                <!-- THE CONTENT -->
                                <div id="content_container">

                                    <div class="multi_nav_control">
                                        <?php

                                            global $page, $pages;

                                            wp_link_pages(array(
                                                'before'            => '<div class="link-multipages">', 
                                                'after'             => '', 
                                                'previouspagelink'  => '<i class="fa fa-chevron-left  multipost_nav_back"></i>', 
                                                'nextpagelink'      => '', 
                                                'next_or_number'    => 'next', 
                                            )); 

                                            echo "<span class='multi_pagenumber'>";
                                            echo( $page.' of '.count($pages) );
                                            echo "</span>";

                                            wp_link_pages(array( 
                                                'before'            => '', 
                                                'after'             => '</div>', 
                                                'previouspagelink'  => '', 
                                                'nextpagelink'      => '<i class="fa  fa-chevron-right  multipost_nav_forward"></i>', 
                                                'next_or_number'    => 'next', 
                                            )); 

                                        ?> 

                                        <span class="multi_navigation_hint">(<?php _e("or use arrow keys to", "loc_canon"); ?> <i class="icon-arrow-left"></i> <?php _e("navigate", "loc_canon"); ?> <i class="icon-arrow-right"></i>)</span>
                                    </div>

                                    <div class="multi_content">

                                        <?php the_content(); ?>
                                        
                                    </div>


                                </div>

                                <!-- TAGS -->
                                <?php if ($canon_options_post['show_tags'] == "checked") { ?> <?php the_tags("<div class='post-tag-cloud'>"," ", "</div>"); ?> <?php } ?>
                                
                                <hr/>

                                <!-- COMMENTS --> 
                                <?php if ($canon_options_post['show_comments'] == "checked") comments_template( '', true ); ?>
                                
                            </div>

                        </div>                  


                    </div>
                    <!-- end main-content -->
                </div>
                <!-- end main wrapper -->
            </div>
             <!-- end main-container -->
        </div>
        <!-- end outter-wrapper -->
    	
    <?php endwhile; ?>
    <!-- END LOOP -->
