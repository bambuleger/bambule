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
echo '<b>'.$timeago.'</b> ago';
}