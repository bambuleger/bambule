<?php
    /*
        Link Post Template
        
        @package bambuletheme
    */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'bambule-format-link' ); ?>>

    <header class="entry-header text-center">
        <?php
            $link = bambule_grab_url();
            the_title('<h1 class="entry-title"><a href="' . $link . '" target="_blank">', '<div class="link-icon"><span class="bambule-icon bambule-link"></span></div></a></h1>'); 
        ?>
        
    </header>


</article>


