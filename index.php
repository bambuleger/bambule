<?php
    /*        
        @package bambuletheme
    */
?>
  <?php get_header(); ?>
   
    <div class="container test">
        <div class="row">
            <div class="col-xs-12">
                <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
                <?php get_template_part('/template-parts/content', get_post_format()); ?>                    
                <?php endwhile; endif; ?>
            </div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <!-- .col-xs-12  -->
        </div>
        <!-- .row  -->
    </div>
    <!-- .container  -->
    <?php get_footer(); ?>