<?php
    /*
        Standard Post Template
        
        @package bambuletheme
    */
?>


<div class="standard-post-title text-center">
    <?php echo get_post_format();?>
        <br>
        <?php the_title( sprintf('~ <a href="%s">', esc_url( get_permalink() ) ), '</a> ~' ); ?>
</div>
<!-- .standard-post-title  -->
<div class="standard-post-date-category">
    <small>Posted <?php human_time(get_the_time('U')); ?> / <b><?php the_category(','); ?></b></small>
</div>
<!-- .standard-post-title  -->
<div class="standard-post-thumbnail">
    <?php the_post_thumbnail( 'full' ); ?>
</div>
<!-- .standard-post-thumbnail  -->
<div class="standard-post-excerpt">
    <?php
        global $more;
        $more = 0;
        the_content('<div class="readmorebtn"><div class="btn">Read More</div></div>');
    ?>
</div>
<!-- .standard-post-excerpt  -->
<div class="col-xs-6 text-left standard-post-tags"><i class="fa fa-tags"></i>&nbsp;&nbsp;&nbsp;
    <?php $tags = get_tags(); ?>
        <?php foreach ( $tags as $tag ) { ?>
            <a href="<?php echo get_tag_link( $tag->term_id ); ?> " rel="tag"><?php echo $tag->name; ?></a>&nbsp;&nbsp;&nbsp;
            <?php } ?>
</div>
<!-- .col-xs-6 text-left standard-post-tags -->
<div class="col-xs-6 text-right standard-post-comments">
    7 Comments &nbsp;&nbsp;&nbsp;<i class="fa fa-comments"></i>
</div>
<!-- .col-xs-6 text-right -->
<div class="col-xs-12 text-center">
    <hr class="frontpage">
</div>