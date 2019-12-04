<?php get_header(); ?>

<?php 

    //SETTTINGS
    $cmb_gallery_style = get_post_meta($post->ID, 'cmb_gallery_style', true);
    $cmb_gallery_num_columns = get_post_meta($post->ID, 'cmb_gallery_num_columns', true);
    $cmb_gallery_source = get_post_meta($post->ID, 'cmb_gallery_source', true);

    // DEFAULTS
    if (empty($cmb_gallery_style)) { $cmb_gallery_style = "isotope"; };

    // HANDLE WP GALLERY SOURCE
    $consolidated_gallery_array = array();
    $cmb_gallery_source = get_post_meta( $post->ID, 'cmb_gallery_source', true);
    $gallery_array = mb_strip_wp_galleries_to_array($cmb_gallery_source);
    $consolidated_gallery_array = mb_convert_wp_galleries_array_to_consolidated_wp_gallery_array($gallery_array);

    // GET CLASSES
    $size_class = mb_get_size_class_from_num($cmb_gallery_num_columns, "third");

    // var_dump($size_class);

?>

    <!-- Start Outter Wrapper -->   
    <div class="outter-wrapper feature">
        <hr/>
    </div>  
    <!-- End Outter Wrapper -->     
        
        
    <!-- start outter-wrapper -->   
    <div class="outter-wrapper">
        <!-- start main-container -->
        <div class="main-container">
            <!-- start main wrapper -->
            <div class="main wrapper clearfix">
                <!-- start main-content -->
                <div class="main-content">
        
        
                    <!-- start gallery style 2--> 
                    <div class="clearfix">

                        <!-- Start Meta -->
                        <aside class="left-aside left fifth">
                            <ul class="meta option-set filters" id="filter" data-option-key="filter">
                                <li><strong><?php echo $post->post_title; ?></strong></li>

                                <?php mb_list_categories_of_consolidated_wp_gallery($consolidated_gallery_array); ?>

                            </ul>

                            <?php echo do_shortcode($post->post_content); ?>

                        </aside>

                        <!-- Start Isotope -->
                        <div class="four-fifths right last thumb-gallery super-list variable-sizes page_isotope_gallery" data-num_columns="<?php echo $cmb_gallery_num_columns; ?>">

                            <?php

                                        
                                for ($i = 0; $i < count($consolidated_gallery_array); $i++) { 

                                    $last_class = (($i+1)%$cmb_gallery_num_columns) ? "" : " last";
                                    $cat_class = "";
                                    foreach ($consolidated_gallery_array[$i]['categories'] as $key => $value) { $cat_class .= " " . $key; }
                                    $final_class = $size_class . $cat_class . $last_class;

                                    $post_thumbnail_src = wp_get_attachment_image_src($consolidated_gallery_array[$i]['id'],'full');
                                    $post_thumbnail_src_fit = wp_get_attachment_image_src($consolidated_gallery_array[$i]['id'],'gallery_isotope_x2');
                                    $img_alt = get_post_meta($consolidated_gallery_array[$i]['id'], '_wp_attachment_image_alt', true);
                                    $img_post = get_post($consolidated_gallery_array[$i]['id']);
                                            
                                    printf('<div class="gallery_item mosaic-block fade element %s">', esc_attr($final_class));
                                    printf('<a href="%s" class="mosaic-overlay fancybox" title="%s"></a>', esc_url($post_thumbnail_src[0]), esc_attr($img_post->post_excerpt));
                                    printf('<div class="mosaic-backdrop"><img src="%s" alt="%s" /></div>', esc_url($post_thumbnail_src_fit[0]), esc_attr($img_alt));
                                    echo '</div>';

                                }

                            ?>


                        </div>

                    </div>                              
                    <!-- end gallery style 2--> 
                        
                     
                </div>
                <!-- end main-content -->
            </div>
            <!-- end main wrapper -->
        </div>
         <!-- end main-container --> 
    </div>
     <!-- end outter-wrapper -->
 
        
        


		
<?php get_footer(); ?>