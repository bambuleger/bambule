<?php
    /*   
        Custom Post Types
    
        @package bambuletheme
    */
?>

<?php

/*
============================================================
Contact Form
============================================================
*/

$contact = get_option( 'activate_contact' );
if( @$contact == 1 ){
    add_action( 'init', 'bambule_contact_custom_post_type' );
    add_filter('manage_bambule-contact_posts_columns', 'bambule_set_contact_columns');
    add_action('manage_bambule-contact_posts_custom_column', 'bambule_contact_custom_column', 10, 2);   
    add_action( 'add_meta_boxes', 'bambule_contact_add_meta_box');
    add_action( 'save_post', 'bambule_save_contact_email_data' );
}

/* Contact CPT */
function bambule_contact_custom_post_type() {
    $labels = array(
        'name'              => 'Messages',
        'singular_name'     => 'Message',
        'menu_name'         => 'Messages',
        'name_admin_bar'    => 'Message'
    );
    $args = array(
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'capability_type'   => 'post',
        'hierachical'       => false,
        'menu_position'     => 26,
        'menu_icon'         => 'dashicons-email-alt',
        'supports'          => array( 'title', 'editor', 'author' )
    );
    register_post_type( 'bambule-contact', $args );
}

function bambule_set_contact_columns($columns){
    $newColumns = array();
    $newColumns['title']    = 'Full Name';
    $newColumns['message']  = 'Message';
    $newColumns['email']    = 'Email';
    $newColumns['date']     = 'Date';
    return $newColumns;
}

function bambule_contact_custom_column($column, $post_id){
    switch($column){
        case 'message' :
            echo get_the_excerpt();
            break;
        case 'email' :
            $email = get_post_meta( $post_id, '_contact_email_value_key', true );
            echo '<a href="mailto:'.$email.'">'.$email.'</a>';
            break;
    }
}

/* Contact Meta Boxes */
function bambule_contact_add_meta_box(){
    add_meta_box('contact_email','User Email','bambule_contact_email_callback','bambule-contact', 'side', 'default');
}

function bambule_contact_email_callback($post){
    wp_nonce_field( 'bambule_save_contact_email_data', 'bambule_contact_email_meta_box_nonce' );
    $value = get_post_meta( $post->ID, '_contact_email_value_key', true );
    echo '<label for="bambule_contact_email_field" >User Email Adress: </label>';
    echo '<input type="email" id="bambule_contact_email_field" name="bambule_contact_email_field" value="'.esc_attr($value).'" size="25" />';
}

function bambule_save_contact_email_data($post_id){
    if(!isset($_POST['bambule_contact_email_meta_box_nonce'])){
        return;
    }
    if (!wp_verify_nonce($_POST['bambule_contact_email_meta_box_nonce'],'bambule_save_contact_email_data')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id )) {
        return;
    }
    if (!isset($_POST['bambule_contact_email_field'])) {
        return;
    }
    $my_data = sanitize_text_field($_POST['bambule_contact_email_field']);
    update_post_meta( $post_id, '_contact_email_value_key', $my_data );
}