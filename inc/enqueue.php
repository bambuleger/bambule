<?php

/*

@package bambuletheme

============================================================
Admin Enqueue Functions
============================================================
*/

function bambule_load_admin_scripts( $hook ) {
    //Detect Admin Page
    //echo $hook;
    if ( 'toplevel_page_bambule_admin' == $hook ) {        
        //css
        wp_register_style( 'bambule_admin', get_template_directory_uri() . '/css/bambule.admin.css', array(), '1.0.0', 'all' );
        wp_enqueue_style( 'bambule_admin' );
        //Media-Uploader
        wp_enqueue_media();
        //js
        wp_register_script( 'bambule-admin-script', get_template_directory_uri() . '/js/bambule.admin.js', array('jquery'), '1.0.0', true );
        wp_enqueue_script( 'bambule-admin-script' );
        
     } else if ('bambule_page_bambule_admin_css' == $hook) {
        //ace editor
        wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/bambule.ace.css', array(), '1.0.0', 'all' );
        wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.1', true );
        wp_enqueue_script( 'bambule-custom-css-script', get_template_directory_uri() . '/js/bambule.custom_css.js', array('jquery'), '1.0.0', true  );
    
    } else {return;}

}

add_action( 'admin_enqueue_scripts', 'bambule_load_admin_scripts' );

/*
============================================================
Frontend Enqueue Functions
============================================================
*/

function bambule_load_scripts(){
   //css
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'bambulecss', get_template_directory_uri() . '/css/bambule.css', array(), '1.0.0', 'all' );
    wp_enqueue_style('raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,200,300,500');
    //js
//    wp_deregister_script('jquery'); // wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.min.css', false, '1.11.3', true ); // wp_enqueue_script('jquery');
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
}

add_action('wp_enqueue_scripts', 'bambule_load_scripts');