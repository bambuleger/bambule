<?php
    /*
        Audio Post Format
        
        @package bambuletheme
    */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'bambule-format-audio' ); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>') ?>
        <div class="entry-meta">
            <?php echo bambule_posted_meta(); ?>
        <!-- .entry-meta -->
        </div>
    </header>
    <div class="entry-content">
        
        <?php echo bambule_get_embedded_media( array('audio','iframe') ); ?>
       
    <!-- .entry-content -->
    </div>
    <footer class="entry-footer">
        <?php echo bambule_posted_footer(); ?>
    </footer>
</article>


