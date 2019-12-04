<?php 

    //VARS
    $canon_options = get_option('canon_options');
    $canon_options_post = get_option('canon_options_post'); 
    $category_slug = "";

    // GET AND HANDLE POTENTIALLY EMPTY VARS
    $cmb_pages_blog_layout = get_post_meta($post->ID, 'cmb_pages_blog_layout', true);
    if (empty($cmb_pages_blog_layout)) { $cmb_pages_blog_layout = "default"; }
    $cmb_pages_template_attachment = get_post_meta($post->ID, 'cmb_pages_template_attachment', true);
    if (empty($cmb_pages_template_attachment)) { $cmb_pages_template_attachment = "none"; }

    // STORE ORIGINAL $POST->ID FOR USE AFTER THE_LOOP
    $original_post_id = $post->ID;

    //DETERMINE PAGE TYPE (home, page or category)
    $page_type = mb_get_page_type();

    //DETERMINE ARCHIVE STYLE
    if ($page_type == 'home' || $page_type == 'page') {                     // blog
        //$wp_query->query = array();                                        // blog page comes with a query for page, needs to be reset.
        $layout = ($cmb_pages_blog_layout == "default") ? $canon_options_post['blog_layout'] : $cmb_pages_blog_layout;
    } elseif ($page_type == 'category') {                                   // category
        $layout = $canon_options_post['cat_layout'];
        $cat_obj = get_category_by_slug(get_query_var('category_name'));
        $category_slug = $cat_obj->slug;
    } else {
        $layout = $canon_options_post['archive_layout'];                    // all other archives - redundant code as archive pages are routed through archive.php. But let's keep in case we change system.
    }

    //BUILD EXCLUDE ARRAY
    $results_exclude_posts = get_posts(array(
        'numberposts'       => -1,
        'meta_key'          => 'cmb_hide_from_archive',
        'meta_value'        => 'checked',
        'orderby'           => 'post_date',
        'order'             => 'DESC',
        'post_type'         => 'any',
        'suppress_filters'  => false,
    ));
    if (count($results_exclude_posts) > 0) {
        for ($i = 0; $i < count($results_exclude_posts); $i++) {  
            $exclude_array[$i] = $results_exclude_posts[$i]->ID;
        }   
    } else {
        $exclude_array = array();   
    }

    //to make pagination work on page if used as static homepage
    if (get_query_var('paged')) {
        $paged = get_query_var('paged'); 
    } elseif (get_query_var('page')) {
        $paged = get_query_var('page'); 
    } else {
        $paged = 1; 
    }

    $args = array(
        'post_status'       => 'publish',
        'orderby'           => 'date',
        'order'             => 'DESC',
        'paged'             => $paged,
        'post__not_in'      => $exclude_array,
        'category_name'     => $category_slug,
    );

    $temp = $wp_query;
    if (!class_exists('Tribe__Events__Main')) { $wp_query = null; }
    $wp_query = new WP_Query($args); 

    // SET MAIN CONTENT CLASS
    $main_content_class = "main-content";
    if ($layout == "sidebar") { 
        $main_content_class .= " three-fourths"; 
        if ($canon_options['sidebars_alignment'] == 'left') { $main_content_class .= " left-main-content"; }
    }

?>


        <!-- Start Outter Wrapper -->   
        <div class="outter-wrapper feature <?php if ($cmb_pages_template_attachment == "prepend") { echo "pb_hr"; }  ?>">
            <hr/>
        </div>  
        <!-- End Outter Wrapper --> 

        <!-- PAGEBUILDER PREPEND -->
        <?php if ($cmb_pages_template_attachment == "prepend") { get_template_part('inc/templates/pagebuilder_output'); } ?>
            
        <!-- start Outter Wrapper -->  
        <div class="outter-wrapper canon_blog">    

            <!-- start main-container -->
            <div class="main-container">

                <!-- start main wrapper -->
                <div class="main wrapper clearfix">

                    <!-- start main-content -->
                    <div class="<?php echo $main_content_class; ?>">

                     
                        <?php 

                            if ( ($page_type == "category") && (($canon_options_post['show_cat_title'] == "checked") || ($canon_options_post['show_cat_description'] == "checked")) ) {
                                
                                echo '<div class="category_header">';

                                // CAT TITLE
                                if ($canon_options_post['show_cat_title'] == "checked") {

                                    echo "<h1>";
                                    echo esc_attr($cat_obj->name);
                                    echo "</h1>";
                                } 

                                // CAT DESCRIPTION
                                if ($canon_options_post['show_cat_description'] == "checked") {

                                    echo "<span class='lead'>";
                                    echo category_description();
                                    echo "</span>";
                                } 
                                
                                echo '<hr/></div>';
                            }

                        ?>


                        <?php get_template_part('inc/templates/template_archive_loop'); ?>
        
                
                    </div>
                    <!-- end main-content -->

                    <!-- SIDEBAR -->
                    <?php if ($layout == 'sidebar') { get_sidebar("archive"); } ?>


                </div> 
                <!-- end main wrapper -->
            </div>
            <!-- end main-container -->
        </div>
        <!-- end outter-wrapper -->



        <!-- PAGEBUILDER APPEND -->

        <?php 
            //first revert to original $post->ID (was changed during the_loop)
            $post->ID = $original_post_id;
            if ($cmb_pages_template_attachment == "append") { get_template_part('inc/templates/pagebuilder_output'); } 

        ?>

                                                                                                   
