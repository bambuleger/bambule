<?php
    /*
        Gallery Post Template
        
        @package bambuletheme
    */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'bambule-format-gallery' ); ?>>
    <header class="entry-header text-center">
       
        <?php if(bambule_get_attachment()): 
            $attachments = bambule_get_attachment(7);
            //var_dump($attachments);
        ?>
        
            <div id="post-gallery-<?php the_ID(); ?>" class="carousel slide bambule-carousel-thumb" data-ride="carousel">
                
                <div class="carousel-inner" role="listbox">
                    
                    <?php                        
                    
                        $count = count($attachments)-1;
                        for ( $i = 0; $i <= $count; $i++ ): 
                        $active = ( $i == 0 ? ' active ' : '' );                      
                    
                        $n = ( $i == $count ? 0 : $i+1 );
                        $nextImg = wp_get_attachment_thumb_url( $attachments[$n]->ID );
                        $p = ( $i == 0 ? $count : $i-1 );
                        $prevImg = wp_get_attachment_thumb_url( $attachments[$p]->ID );
                    
                    ?>
                    
                    <div class="item <?php echo $active; ?> background-image standard-featured" style="background-image: url( <?php echo wp_get_attachment_url( $attachments[$i]->ID ); ?> );">
                    
                        <div class="hide next-image-preview" data-image="<?php echo $nextImg; ?>"></div>
                        <div class="hide prev-image-preview" data-image="<?php echo $prevImg; ?>"></div>
                    
                    </div>
                    
                    <?php endfor; ?>
                    
                </div>
                
                <a class="left carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
                   <div class="table">
                        <div class="table-cell">
                           
                            <div class="preview-container">
                                <span class="thumbnail-container background-image"></span>
                                <span class="bambule-icon bambule-chevron-left" area-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </div>
                            
                        </div>
                    </div>
                </a>
                <a class="right carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
                    <div class="table">
                        <div class="table-cell">
                           
                            <div class="preview-container">
                                <span class="thumbnail-container background-image"></span>
                                <span class="bambule-icon bambule-chevron-right" area-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </div>
                            
                        </div>
                    </div>
                </a>
                
            </div>
        
        <?php endif; ?>
       
        <?php the_title('<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>') ?>
        <div class="entry-meta">
            <?php echo bambule_posted_meta(); ?>
        <!-- .entry-meta -->
        </div>
    </header>
    <div class="entry-content">
        
        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        <!-- .entry-excerpt -->   
        </div>        
        <div class="button-container text-center">
            <a href="<?php the_permalink(); ?>" class="btn btn-default btn-bambule"><?php _e('Read More') ?></a>
        <!-- button-container -->    
        </div>
    <!-- .entry-content -->
    </div>
    <footer class="entry-footer">
        <?php echo bambule_posted_footer(); ?>
    </footer>
</article>


