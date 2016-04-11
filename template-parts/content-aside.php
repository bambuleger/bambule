<?php
    /*
        Aside Post Template
        
        @package bambuletheme
    */


        
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'bambule-format-aside' ); ?>>

    <div class="aside-container">
      
        <div class="row">
        
            <div class="col-xs-12 col-sm-3 col-md-2 text-center">
                
                <?php if(bambule_get_attachment()): ?>
                    
                        <div class="aside-featured background-image" style="background-image: url(<?php echo bambule_get_attachment(); ?>)"></div>
                        
                <?php endif; ?>
            </div><!-- .col-xs-12 col-sm-4 col-md-3 text-center -->
            
            <div class="col-xs-12 col-sm-9 col-md-10">
                <header class="entry-header">

                    <div class="entry-meta">
                        <?php echo bambule_posted_meta(); ?>
                    </div><!-- .entry-meta -->
                    
                </header>
                
                <div class="entry-content">

                    <div class="entry-excerpt">
                        <?php the_content(); ?>
                    </div><!-- .entry-excerpt -->           

                </div><!-- .entry-content -->    
            </div><!-- .col-xs-12 col-sm-8 col-md-9 -->
        
        </div><!-- .row -->        
            
        <footer class="entry-footer">

            <div class="row">
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
                    <?php echo bambule_posted_footer(); ?>
                </div><!-- .col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 -->
            </div><!-- .row --> 
        </footer>
    </div><!-- .aside-container -->
</article>


