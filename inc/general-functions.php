<?php
    /*
        General Functions
        
        @package bambuletheme
    */
?>

<?php

// human time - xx hours / days / .. ago
function human_time($time){
    $timeago = human_time_diff($time,current_time('timestamp'));
echo ''.$timeago.'';
}

//bambule_posted_meta

function bambule_posted_meta() {
    $posted_on = human_time_diff(get_the_time('U'),current_time('timestamp'));
    $categories = get_the_category();
    $separator = ', ';
    $output = '';
    $i = 1;
    if (!empty($categories)):
        foreach($categories as $category):
            if ($i>1): $output .= $separator; endif;
            $output .= '<a href="'. esc_url(get_category_link($category->term_id)). '" alt="'.esc_attr('View all posts in%s',$category->name).'">'.esc_html($category->name).'</a>';
        $i++;
        endforeach;
    endif;
    return '<span class="posted-on">Posted <a href="'.esc_url(get_permalink()).'">' . $posted_on . '</a> ago</span> /  <span class="posted-in">' . $output . '</span>';
}

//bambule_posted_footer
function bambule_posted_footer() {
    return 'tags list and comment link';
}