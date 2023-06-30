<?php
/*     The purpose of this file is to provide behavior for WP to enact when it loads your pages
    things like adding the right css and javascript can be automated here */

// Adds dynamic title tags using wp
function aaroe_theme_support() {
    add_theme_support("title-tag");
    add_theme_support("custom-logo");
    add_theme_support("post-thumbnails");
}

add_action("after_setup_theme", "aaroe_theme_support");

function aaroe_menus() {

    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        "footer" => "Footer Menu Items",
    );

    register_nav_menus($locations);
}

add_action('init', 'aaroe_menus');





// registers and adds stylesheets to the webpage
function aaroe_register_styles(){

    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('aaroe_bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), $version, 'all');
    wp_enqueue_style('aaroe_fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', array(), $version, 'all');
    wp_enqueue_style('aaroe_vanilla_styles', get_template_directory_uri() . '/assets/css/style.css', array('aaroe_bootstrap'), $version, 'all');
}

add_action('wp_enqueue_scripts', 'aaroe_register_styles');

// Adds scripts dynamically
function aaroe_register_scripts() {

    $version = wp_get_theme()->get('Version');
    wp_enqueue_script('aaroe-js', get_template_directory_uri() . '/assets/js/main.js', array(), $version, true);
    wp_enqueue_script('aaroe-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('aaroe-bootstrap-popper', 'aaroe-bootstrap-jquery'), '4.4.1', true);
    wp_enqueue_script('aaroe-bootstrap-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
    wp_enqueue_script('aaroe-bootstrap-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
}

add_action('wp_enqueue_scripts', 'aaroe_register_scripts');


?>