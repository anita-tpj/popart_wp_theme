<?php

function pop_enqueue_scripts (){

  wp_register_style('pop_bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css');
  wp_register_style('pop_font-awsome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_register_style('pop_font-google', 'https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700"');
  wp_register_style('pop_animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css');
  wp_register_style('pop_style', get_template_directory_uri() . '/style.css');

  wp_enqueue_style('pop_bootstrap');
  wp_enqueue_style('pop_font-awsome');
  wp_enqueue_style('pop_font-google');
  //wp_enqueue_style('animate');
  wp_enqueue_style('pop_style');

  wp_register_script('pop_popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js', array(), false, true);
  wp_register_script('pop_bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js', array(), '', true);
  wp_register_script('pop_wow', get_template_directory_uri() . '/js/wow.min.js', array(), false, true);
  wp_register_script('pop_script', get_template_directory_uri() . '/js/script.js', array(), false, true);


  wp_enqueue_script('jquery');
  wp_enqueue_script('pop_popper');
  wp_enqueue_script('pop_bootstrap');
  //wp_enqueue_script('pop_wow');
  //wp_enqueue_script('pop_script');
}
