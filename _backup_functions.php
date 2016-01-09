<?php

require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/enqueue.php';



/*
==============================
Include Scripts
==============================
*/

function bambule_script_enqueue() {
    //css
   
    wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/bambule.css', array(), '1.0.0', 'all' );
    //js
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/bambule.js', array(), '1.0.0', true );

}

add_action( 'wp_enqueue_scripts', 'bambule_script_enqueue' );

function my_function_admin_bar(){ return false; }
add_filter( 'show_admin_bar' , 'my_function_admin_bar');
/*
==============================
Menus
==============================
*/
function bambule_theme_setup() {

    add_theme_support( 'menus' );

    register_nav_menu( 'primary', 'Primary Navigation' );
    register_nav_menu( 'secondary', 'Footer Navigation' );

}

add_action( 'init', 'bambule_theme_setup' );

/*
==============================
Theme Support
==============================
*/
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array('search-form') );

add_theme_support( 'post-formats', array('aside','image','video') );

/*
==============================
Sidebar
==============================
*/
function bambule_widget_setup() {

       /**
        * Creates a sidebar
        * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
        */
        $args = array(
            'name'          => __( 'sidebar', 'theme_text_domain' ),
            'id'            => 'sidebar-1',
            'description'   => 'Sidebar Rechts',
            'class'         => 'custom',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        );
    
        register_sidebar( $args );    

}

add_action( 'widgets_init', 'bambule_widget_setup' );
