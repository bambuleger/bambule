<?php
    /*        
        @package bambuletheme
    */
?>
<?php get_header(); ?>
    
    <div id="primary" class="content-area"  >
        <main id="main" class="site-main" role="main">
            <div class="container">
                <?php
                    if( have_posts() ):
                        while( have_posts() ): the_post(); 
                            // echo 'POST FORMAT: '.get_post_format(); 
                            get_template_part('/template-parts/content', get_post_format());
                        endwhile;
                    endif;
                ?>
            <!-- .container -->
            </div>
        </main>
    <!-- #primary -->
    </div>
   

    <?php get_footer(); ?>