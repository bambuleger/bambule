<?php
    /*        
        @package bambuletheme

        Media Category Page Template
    */
$url = site_url();
?>
<?php get_header(); ?>
    
    <div id="primary" class="content-area"  >
        <main id="main" class="site-main" role="main">

        <?php if ( is_paged() ):  ?>

            <div class="container text-center container-load-previous" style="padding-bottom: 20px;">
                <a class="btn-bambule-load bambule-load-more" data-prev="1" data-page="<?php echo bambule_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                    <span class="bambule-icon bambule-loading"></span>
                    <span class="text">Load Previous</span>
                </a>
            </div><!-- .container -->

        <?php endif; ?>




            <div class="container bambule-posts-container">
                <?php
                    if( have_posts() ):

                        echo '<div class="page-limit" data-page="'. $url .'/'.bambule_check_paged().'">';

                        while( have_posts() ): the_post(); 
                            //echo 'POST FORMAT: '.get_post_format();
                            get_template_part('/template-parts/content', get_post_format());
                        endwhile;

                        echo '</div>';

                    endif;
                ?>            
            </div><!-- .container -->

            <div class="container text-center" style="padding-bottom: 20px;">
                <a class="btn-bambule-load bambule-load-more" data-page="<?php echo bambule_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                    <span class="bambule-icon bambule-loading"></span>
                    <span class="text">Load More</span>
                </a>
            </div><!-- .container -->

        </main>    
    </div><!-- #primary -->
   

    <?php get_footer(); ?>