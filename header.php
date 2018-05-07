<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>

    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php bloginfo('name');?></title>

    <?php wp_head();?>

  </head>

  <body>

    <header class="container">


      <nav class="navbar navbar-expand-md navbar-light">
         <a class="navbar-brand" href="<?php echo get_option("siteurl"); ?>"><img src="<?php bloginfo('template_url')?>/images/logo.png" alt ="logo"></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <button class="btn btn-primary my-2 my-sm-0" type="button">Button</button>


        <?php
          wp_nav_menu([
            'menu'            => 'top',
            'theme_location'  => 'top',
            'container'       => 'div',
            'container_id'    => 'bs4navbar',
            'container_class' => 'collapse navbar-collapse',
            'menu_id'         => false,
            'menu_class'      => 'navbar-nav ml-auto',
            'depth'           => 2,
            'fallback_cb'     => 'bs4navwalker::fallback',
            'walker'          => new bs4navwalker()
          ]);
        ?>
      </nav>
    </header>

    <section id="top-slider">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner" role="listbox">
          <?php $slider = get_posts(array('post_type' => 'slider', 'posts_per_page' => 5)); ?>
            <?php $count = 0; ?>
            <?php foreach($slider as $slide): ?>
              <div class="carousel-item <?php echo ($count == 0) ? 'active' : ''; ?>">
                <img d-block class="d-block w-100" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($slide->ID), 'slider-image') ?>" class="img-fluid"/>
                <div class="slider-caption d-none d-md-flex">
                  <h1 ><?php echo $slide->post_title; ?></h1>
                  <p><?php echo $slide->post_content; ?></p>
                </div>
              </div>
            <?php $count++; ?>
          <?php endforeach; ?>
        </div>

          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

        </div>

        <div class="call-to-action text-center">
          <a class="btn-primary">

              <?php if( get_field('slider_button_text_top') ): ?>
              	<p class="title-line"><?php the_field('slider_button_text_top'); ?></p>
              <?php else:?>
                <p class="title-line">Ut sed odio quis</p>
              <?php endif; ?>

              <?php if( get_field('slider_button_text_bottom') ): ?>
              	<span><?php the_field('slider_button_text_bottom'); ?></span>
                <?php else: ?>
                <span>Ut sed odio quis Suspendisse sagittis felis</span>
              <?php endif; ?>

          </a>
        </div>

      </div>
    </section>

    <main>
    <!--- Here starts main content -->
