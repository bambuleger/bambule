<?php
    /*   
        Sourcecode Cleanup
        
        @package bambuletheme
    */
?>

<?php

/*
============================================================
Remove Generator Version Number
============================================================
*/

/* Remove Version String from js and css */
function bambule_remove_wp_version_strings($src) {
    global $wp_version;
    parse_str(parse_url($src, PHP_URL_QUERY), $query);
    if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
        $src = remove_query_arg('ver',$src);
    }
    return $src;
}

add_filter('script_loader_src', 'bambule_remove_wp_version_strings');
add_filter('style_loader_src', 'bambule_remove_wp_version_strings');

/* Remove Metatag Generator from Header */
function bambule_remove_meta_version() {
    return '';
}

add_filter('the_generator', 'bambule_remove_meta_version');