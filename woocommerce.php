<?php
    /*        
        @package bambuletheme
    */
?>
<?php get_header(); ?>
    
    <div id="primary" class="content-area"  >
        <main id="main" class="site-main" role="main">
            <div class="container">
                <div class="shop-content">
                    <?php woocommerce_content(); ?>
                </div>
            <!-- .container -->
            </div>
        </main>
    <!-- #primary -->
    </div>
   

    <?php get_footer(); ?>