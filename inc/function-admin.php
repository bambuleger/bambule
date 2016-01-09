<?php
    /*   
        Backend / Admin Functions
        
        @package bambuletheme
    */
?>

<?php

/*
============================================================
Admin Page
============================================================
*/

function bambule_add_admin_page() {    
    //Generate bambule Admin Page
    add_menu_page( 'bambule Theme Options', 'bambule', 'manage_options', 'bambule_admin', 'bambule_theme_create_page', 'dashicons-layout', '110');
    //Generate bambule Admin Subpages
    //Settings
    add_submenu_page( 'bambule_admin', 'Bambule Sidebar Options', 'Sidebar', 'manage_options', 'bambule_admin', 'bambule_theme_create_page' );
    //Theme Support 
    add_submenu_page( 'bambule_admin', 'Bambule Theme Options', 'Theme Options', 'manage_options', 'bambule_admin_theme', 'bambule_admin_theme_support_page' ); 
    //Contact Form 
    add_submenu_page( 'bambule_admin', 'Bambule Contact Form', 'Contact Form', 'manage_options', 'bambule_contact', 'bambule_contact_form_page' ); 
    //CSS
    add_submenu_page( 'bambule_admin', 'Bambule CSS Options', 'Custom CSS', 'manage_options', 'bambule_admin_css', 'bambule_theme_css_page' ); 
}

add_action( 'admin_menu', 'bambule_add_admin_page' );
  
add_action( 'admin_init', 'bambule_custom_settings' );

function bambule_custom_settings() {
    //Sidebar Options
    register_setting( 'bambule-settings-group', 'profile_picture' );
    register_setting( 'bambule-settings-group', 'first_name' );
    register_setting( 'bambule-settings-group', 'last_name' );
    register_setting( 'bambule-settings-group', 'user_description' );
    register_setting( 'bambule-settings-group', 'twitter_handler', 'bambule_sanitize_twitter_handler' );
    register_setting( 'bambule-settings-group', 'facebook_handler' );
    register_setting( 'bambule-settings-group', 'youtube_handler' );

    add_settings_section( 'bambule-sidebar-options', 'Sidebar Options', 'bambule_sidebar_options', 'bambule_admin' );

    add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'bambule_sidebar_profile', 'bambule_admin', 'bambule-sidebar-options' );
    add_settings_field( 'sidebar-name', 'Full Name', 'bambule_sidebar_name', 'bambule_admin', 'bambule-sidebar-options' );
    add_settings_field( 'sidebar-description', 'Description', 'bambule_sidebar_description', 'bambule_admin', 'bambule-sidebar-options' );
    add_settings_field( 'sidebar-twitter', 'Twitter', 'bambule_sidebar_twitter', 'bambule_admin', 'bambule-sidebar-options' );
    add_settings_field( 'sidebar-facebook', 'Facebook', 'bambule_sidebar_facebook', 'bambule_admin', 'bambule-sidebar-options' );
    add_settings_field( 'sidebar-youtube', 'Youtube', 'bambule_sidebar_youtube', 'bambule_admin', 'bambule-sidebar-options' );

    //Theme Support Options
    register_setting( 'bambule-theme-support', 'post_formats' );
    register_setting( 'bambule-theme-support', 'custom_header' );
    register_setting( 'bambule-theme-support', 'custom_background' );

    add_settings_section( 'bambule-theme-options', 'Theme Support Options', 'bambule_theme_options', 'bambule_admin_theme' );

    add_settings_field( 'post-formats', 'Post Formats', 'bambule_post_formats', 'bambule_admin_theme', 'bambule-theme-options' );
    add_settings_field( 'custom-header', 'Custom Header', 'bambule_custom_header', 'bambule_admin_theme', 'bambule-theme-options' );
    add_settings_field( 'custom-background', 'Custom Background', 'bambule_custom_background', 'bambule_admin_theme', 'bambule-theme-options' );

    //Contact Form Options
    register_setting( 'bambule-contact-options', 'activate_contact' );

    add_settings_section( 'bambule-contact-section', 'Contact Form', 'bambule_contact_section', 'bambule_contact' );

    add_settings_field( 'activate-form', 'Activate Contact Form', 'bambule_activate_contact', 'bambule_contact', 'bambule-contact-section' );

    //Custom CSS Options
    register_setting( 'bambule-custom-css-options', 'bambule_css', 'bambule_sanitize_custom_css' );

    add_settings_section( 'bambule-custom-css-section', 'Custom CSS', 'bambule_custom_css_section_callback', 'bambule_admin_css' );

    add_settings_field( 'custom-css', 'Insert your custom CSS', 'bambule_custom_css_callback', 'bambule_admin_css', 'bambule-custom-css-section' );
}

/*
============================================================
Custom CSS Subpage
============================================================
*/

function bambule_custom_css_section_callback() {
    echo 'Customize Bambule with your own CSS';
}

function bambule_custom_css_callback() {
    $css = get_option( 'bambule_css' );
    $css = ( empty($css) ? '/* Bambule Custom CSS */' : $css );
    echo '<div id="customCss">'.$css.'</div><textarea id="bambule_css" name="bambule_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}

/*
============================================================
Contact Form Subpage
============================================================
*/

function bambule_contact_section() {
    echo 'Activate an Deactivate the built-in Contact Form';
}

//Activate Contact Form Checkbox
function bambule_activate_contact() {
    $options = get_option( 'activate_contact' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '.$checked.' /></label>';
}

/*
============================================================
Theme Support Subpage
============================================================
*/

function bambule_theme_options() {
    echo 'Activate an Deactivate specific Theme Support Options';
}


//Post Format Checkboxes
function bambule_post_formats() {
    $options = get_option( 'post_formats' );
    $formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
    $output = '';
    foreach ( $formats as $format ){
        $checked = ( @$options[$format] == 1 ? 'checked' : '' );
        $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
    }
    echo $output;
}

//Custom Header
function bambule_custom_header() {
    $options = get_option( 'custom_header' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}

//Custom Background
function bambule_custom_background() {
    $options = get_option( 'custom_background' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}

/*
============================================================
Sidebar Subpage
============================================================
*/

function bambule_sidebar_options() {    
    echo 'Customize the information shown at the top of the sidebar';
}

//Profile Picture Form
function bambule_sidebar_profile() {
    $picture = esc_attr( get_option( 'profile_picture' ) );
    if ( empty($picture) ) {
        echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button" /> <input type="hidden" id="profile-picture" name="profile_picture" value="" />';
    } else {
        echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button" /> <input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Remove" id="remove-picture"/>';
    }
    
}

//Full Name Form
function bambule_sidebar_name() {
    $firstName = esc_attr( get_option( 'first_name' ) );
    $lastName = esc_attr( get_option( 'last_name' ) );
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}

//Description Form
function bambule_sidebar_description() {
    $description = esc_attr( get_option( 'user_description' ) );
    echo '<input type="text" name="user_description" value="'.$description.'" placeholder="User Description" />';
}

//Twitter Form
function bambule_sidebar_twitter() {    
    $twitter = esc_attr( get_option( 'twitter_handler' ) );
    echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter Account" /><p class="description">Insert Twitter username without the @';
}

//Facebook Form
function bambule_sidebar_facebook() {    
    $facebook = esc_attr( get_option( 'facebook_handler' ) );
    echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook Account" />';
}

//Youtube Form
function bambule_sidebar_youtube() {
    $youtube = esc_attr( get_option( 'youtube_handler' ) );
    echo '<input type="text" name="youtube_handler" value="'.$youtube.'" placeholder="Youtube Account" />';
}

//Sanitization Settings
function bambule_sanitize_twitter_handler( $input ) {    
    $output = sanitize_text_field( $input );
    $output = str_replace('@', '', $output);
    return $output;
}

function bambule_sanitize_custom_css( $input ){
    $output = esc_textarea( $input );
    return $output;
}


/*
============================================================
Submenu Functions
============================================================
*/

//Generate Admin Page
function bambule_theme_create_page() {
    require_once(get_template_directory() . '/inc/templates/bambule-admin.php');
}

//Generate Theme Support Page
function bambule_admin_theme_support_page() {    
    require_once(get_template_directory() . '/inc/templates/bambule-theme-support.php');
}

//Generate Contact Form Page
function bambule_contact_form_page() {    
    require_once(get_template_directory() . '/inc/templates/bambule-contact-form.php');
}

//Generate CSS Subpage
function bambule_theme_css_page() {    
    require_once(get_template_directory() . '/inc/templates/bambule-custom-css.php');
}