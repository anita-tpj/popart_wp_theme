<?php

//Set Up
add_theme_support('menu');
add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'caption' ) );
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('post-formats', array('link', 'quote', 'aside', 'gallery'));
add_theme_support('custom-logo');
add_theme_support('custom-background');
add_theme_support('custom-header');

//Includes
include(get_template_directory() . '/inc/enqueue.php');
include(get_template_directory() . '/inc/pop_setup.php');
require_once(get_template_directory() . '/libs/bs4navwalker.php');
require(get_template_directory() . '/inc/template-tags.php');
require_once(get_template_directory() . '/libs/class-tgm-plugin-activation.php');
include(get_template_directory() . '/inc/register-plugins.php');

//Action and Filter Hooks
add_action('wp_enqueue_scripts', 'pop_enqueue_scripts' );
add_action('after_setup_theme', 'pop_setup_theme');
add_filter( 'excerpt_more', 'pop_excerpt_more' );
add_filter('excerpt_length', 'pop_excerpt_length');
add_action( 'init', 'custom_bootstrap_slider' );
add_action( 'tgmpa_register', 'tap_register_required_plugins' );
