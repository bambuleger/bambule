<?php
    /*
        Quote Post Template
        
        @package bambuletheme
    */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'bambule-format-quote' ); ?>>
    <header class="entry-header text-center">
       
       <div class="row">
            <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                <h1 class="quote-content"><?php echo get_the_content(); ?></h1>

                <?php the_title('<h2 class="quote-author">', '</h2>'); ?>
            </div>
        </div><!-- .row -->
    </header>


</article>


