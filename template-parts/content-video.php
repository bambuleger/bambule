<?php
    /*
        Video Post Format
        
        @package bambuletheme
    */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'bambule-format-video' ); ?>>
   
    
   
    <header class="entry-header text-center">
        <div class="embed-responsive embed-responsive-16by9">
           <?php echo bambule_get_embedded_media( array('video','iframe') ); ?>
        </div>
       
        <?php the_title('<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>') ?>
        <div class="entry-meta">
            <?php echo bambule_posted_meta(); ?>
        <!-- .entry-meta -->
        </div>
    </header>
    <div class="entry-content">
        <?php if(bambule_get_attachment()): ?>
           <a class="standard-featured-link" href="<?php the_permalink(); ?>">
                <div class="standard-featured background-image" style="background-image: url(<?php echo bambule_get_attachment(); ?>)"></div>
            </a>
        <?php endif; ?>
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