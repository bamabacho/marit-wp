<?php 

// Include Beans. Do not remove the line below.
require_once( get_template_directory() . '/lib/init.php' );

add_action( 'beans_uikit_enqueue_scripts', 'beans_child_enqueue_uikit_assets' );

function beans_child_enqueue_uikit_assets() {

	beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/style.less', 'less' );

}

// Add widget area for footer section

// Add sub-footer as widget area

add_action( 'widgets_init', 'footer_widgets_init' );

function footer_widgets_init() {

    beans_register_widget_area( array(
        'name' => 'Footer',
        'id' => 'Footer',
        'description' => 'Widgets in this area will be shown in the footer section.',
        'beans_type' => 'stack',
        'before-widget' => 'before',
        'after-widget' => 'after',
    ) );

}

add_action( 'beans_footer_before_markup', 'footer_widget_area' );

function footer_widget_area() {

    echo beans_widget_area( 'Footer' );
        
}

add_action( 'widgets_init', 'banner_widgets_init' );

function banner_widgets_init() {

    beans_register_widget_area( array(
        'name' => 'Banner',
        'id' => 'Banner',
        'description' => 'Banner Image.',
        'beans_type' => 'stack',
        'before-widget' => 'before',
        'after-widget' => 'after',
    ) );

}

add_action( 'beans_header_after_markup', 'banner_widget_area' );

function banner_widget_area() {


    echo beans_widget_area( 'Banner' );
        
}