<?php get_header();
/*
Template name: Home Page
*/
?>

      <section class="curabitur container wow animated bounceInUp">
        <div class="row">
          <div class="col-md-8 offset-md-2 text-center">
            <?php if( get_field('section_1_title') ): ?>
              <h2><?php the_field('section_1_title'); ?></h2>
            <?php else: ?>
              <h2>Curabitur lacus ipsum</h2>
            <?php endif; ?>

            <?php if( get_field('section_1_subtitle') ): ?>
              <p class="title-line font-italic"><?php the_field('section_1_subtitle'); ?></p>
            <?php else: ?>
              <p class="title-line font-italic">In maximus blandit tortor, ut efficitur tortor suscipit vitae.</p>
            <?php endif; ?>

            <?php if( get_field('section_1_intro') ): ?>
              <p class="intro"><?php the_field('section_1_intro'); ?></p>
            <?php else: ?>
              <p class="intro">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis
                nisl ut aliquip ex ea commodo consequat.
              </p>
            <?php endif; ?>
          </div>
        </div>

        <div class="row">

          <?php
          $cat_slug = get_field('blog_post_category');
          $our_services = new WP_Query(array( 'category_name' => $cat_slug, 'posts_per_page' => 3 ) );
            if($our_services->have_posts()):
              $i=0;
              while($our_services->have_posts()):
                $our_services->the_post(); $i++; ?>
              <div class="col-md-4">
                <div class="card">
                  <?php the_post_thumbnail( 'section-3col-image', array( 'class' => 'card-img-top img-fluid' ) ); ?>
                  <span class="card-numb"><?php echo '0'.$i; ?></span>
                  <div class="card-body">
                    <h3 class="card-title"><?php the_title();?></h3>
                    <p class="card-text"><?php the_excerpt();?></p>
                  </div>
                </div>
              </div>

              <?php endwhile;
                wp_reset_postdata();
              else:
                echo '<p>No content found</p>';

            endif;?>
        </div><!--- end row -->

      </section>

      <section class="lorem text-center">
        <?php if( get_field('section_2_title') ): ?>
          <h2><?php the_field('section_2_title'); ?></h2>
        <?php else: ?>
          <h2 class="title-line">Lorem</h2>
        <?php endif; ?>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <blockquote class="blockquote">
              <?php if( get_field('blockquote') ): ?>
                <p><?php the_field('blockquote'); ?></p>
              <?php else: ?>
                <p>Nullam finibus felis a nisi convallis, condimentum bibendum sapien gravida.</p>
              <?php endif; ?>

              <footer>
                <?php if( get_field('blockquote_source') ): ?>
                  <cite title="Source Title"><?php the_field('blockquote_source'); ?></cite>
                <?php else: ?>
                  <cite title="Source Title">PopArt  1</cite>
                <?php endif; ?>
              </footer>
              </blockquote>
            </div>
            <div class="carousel-item">
              <blockquote class="blockquote">
              <?php if( get_field('blockquote') ): ?>
                <p><?php the_field('blockquote'); ?></p>
              <?php else: ?>
                <p>Nullam finibus felis a nisi convallis, condimentum bibendum sapien gravida.</p>
              <?php endif; ?>

              <footer>
                <?php if( get_field('blockquote_source') ): ?>
                  <cite title="Source Title"><?php the_field('blockquote_source'); ?></cite>
                <?php else: ?>
                  <cite title="Source Title">PopArt Studio 2</cite>
                <?php endif; ?>
              </footer>
              </blockquote>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

      </section>


      <section class="gallery text-center px-3">

        <?php if( get_field('section_3_title') ): ?>
          <h2><?php the_field('section_3_title'); ?></h2>
        <?php else: ?>
          <h2>Gallery</h2>
        <?php endif; ?>

        <?php if( get_field('section_3_subtitle') ): ?>
          <p class="title-line font-italic mb-5"><?php the_field('section_3_subtitle'); ?></p>
        <?php else: ?>
          <p class="title-line font-italic mb-5">Ut sed odio quis sem bibendum tristique</p>
        <?php endif; ?>

        <div class="row">

          <?php
            $args = array( 'post_type' => 'attachment', 'post_status' => 'any', 'post_parent' => 124, 'posts_per_page' => 4 );
            $attachments = get_posts( $args );
            if ( $attachments ):
                foreach ( $attachments as $post ) {
                    setup_postdata( $post );
                    echo '<div class="col-md-6 col-lg-3 nopadding"><div class="view view-first">';

                    $imageThumb = wp_get_attachment_image_src( $attachment->ID, 'full' );
                    echo '<img class="img-fluid" src="'; echo $imageThumb[0]; echo '"/> ';

                    echo '<div class="mask"><a target="blank_" class="info" href="#">Image 1</a></div></div></div>';
                }
                wp_reset_postdata();
            else:
            ?>

          <div class= "col-sm-6 col-lg-3 nopadding">
            <div class="view view-first">
              <img class="img-fluid" src="<?php bloginfo('template_url');?>/images/gallery_thumb_1.jpg" alt="Gallery image 1"/>
              <div class="mask">
                <a target="blank_" class="info" href="#">Image 1</a>
              </div>
            </div>
          </div>

          <div class= "col-sm-6 col-lg-3 nopadding">
            <div class="view view-first">
              <img class="img-fluid" src="<?php bloginfo('template_url');?>/images/gallery_thumb_2.jpg" alt="Gallery image 1"/>
              <div class="mask">
                <a target="blank_" class="info" href="#">Image 2</a>
              </div>
            </div>
          </div>

          <div class= "col-sm-6 col-lg-3 nopadding">
            <div class="view view-first">
              <img class="img-fluid" src="<?php bloginfo('template_url');?>/images/gallery_thumb_3.jpg" alt="Gallery image 1"/>
              <div class="mask">
                <a target="blank_" class="info" href="#">Image 3</a>
              </div>
            </div>
          </div>

          <div class= "col-sm-6 col-lg-3 nopadding">
            <div class="view view-first">
              <img class="img-fluid" src="<?php bloginfo('template_url');?>/images/gallery_thumb_4.jpg" alt="Gallery image 1"/>
              <div class="mask">
                <a target="blank_" class="info" href="#">Image 4</a>
              </div>
            </div>
          </div>
        <?php endif?>
        </div>
      </section>

      <section class="map">
            <div class="box">
              <div class="box-img">
                <?php if( get_field('about_us_image') ): ?>
                  <img class="img-fluid" src="<?php the_field('about_us_image'); ?>">
                <?php else: ?>
                  <img class="img-fluid" src="<?php bloginfo('template_url');?>/images/location_thumb.jpg" />
                <?php endif; ?>

              </div>

              <div class="box-body">

                <?php if( get_field('section_4_title') ): ?>
                  <h2><?php the_field('section_4_title'); ?></h2>
                <?php else: ?>
                  <h2 class="title-line">Lorem Us</h2>
                <?php endif; ?>

                <?php if( get_field('section_4_text') ): ?>
                  <p><?php the_field('section_4_text'); ?></p>
                <?php else: ?>
                  <p>
                    Aenean rutrum eros sed scelerisque posuere. Curabitur dapibus pharetra neque sed ultrices.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                    Aenean viverra et lacus vitae tempus. Aliquam luctus sapien ut dolor eleifend tristique.
                    Vestibulum viverra auctor ex eget porttitor. Morbi imperdiet dolor eget feugiat tincidunt.
                    Donec sagittis nunc lorem, ut faucibus tellus scelerisque mollis. Sed ac sapien gravida,
                    mattis sapien aliquet, dictum leo. Pellentesque sed pellentesque ex, id rhoncus diam.
                  </p>
                <?php endif; ?>

                <div class="box-footer">
                  <div class="box-footer-item">
                    <img class="img-fluid" src="<?php bloginfo('template_url');?>/images/airplane_icon.png" alt="airplane icon" />

                    <?php if( get_field('city') ): ?>
                      <span><?php the_field('city'); ?></span>
                    <?php else: ?>
                      <span>Novi Sad</span>
                    <?php endif; ?>

                    <?php if( get_field('city_distance_plane') ): ?>
                      <span><?php the_field('city_distance_plane'); ?></span>
                    <?php else: ?>
                      <span class="font-italic">2 h 42 min</span>
                    <?php endif; ?>

                  </div>

                  <div class="box-footer-item">
                    <img class="img-fluid" src="<?php bloginfo('template_url');?>/images/airplane_icon.png" alt="airplane icon" />
                    <?php if( get_field('city') ): ?>
                      <span><?php the_field('city'); ?></span>
                    <?php else: ?>
                      <span>Novi Sad</span>
                    <?php endif; ?>

                    <?php if( get_field('city_distance_car') ): ?>
                      <span><?php the_field('city_distance_car'); ?></span>
                    <?php else: ?>
                      <span class="font-italic">2 h 26 min</span>
                    <?php endif; ?>

                  </div>

                  <div class="box-footer-item">
                    <img class="img-fluid" src="<?php bloginfo('template_url');?>/images/airplane_icon.png" alt="airplane icon" />
                    <?php if( get_field('city') ): ?>
                      <span><?php the_field('city'); ?></span>
                    <?php else: ?>
                      <span>Novi Sad</span>
                    <?php endif; ?>

                    <?php if( get_field('city_distance_train') ): ?>
                      <span><?php the_field('city_distance_train'); ?></span>
                    <?php else: ?>
                      <span class="font-italic">1 h 31 min</span>
                    <?php endif; ?>

                  </div>
                </div>
              </div>
            </div><!-- .box -->

          <!--</div>
        </div>-->


      </section>

      <section class="what-we-do">
        <div class="container">

          <?php if( get_field('section_5_title') ): ?>
            <h2><?php the_field('section_5_title'); ?></h2>
          <?php else: ?>
            <h2 class="text-center">Suspendisse sagittis felis non</h2>
          <?php endif; ?>

          <?php if( get_field('section_5_subtitle') ): ?>
            <p class="title-line text-center mb-5"><?php the_field('section_5_subtitle'); ?></p>
          <?php else: ?>
            <p class="title-line text-center mb-5">Phasellus sollicitudin purus sed faucibus hendrerit. Vivamus ultrices lacinia mollis.</p>
          <?php endif; ?>

          <div class="row">

            <?php
            $cat_slug = get_field('special_post_category');
            $what_we_do = new WP_Query(array( 'category_name' => $cat_slug, 'posts_per_page' => 4 ) );
              if($what_we_do->have_posts()):
                while($what_we_do->have_posts()): $what_we_do->the_post();?>
                <div class="col-sm-6 col-lg-3">
                  <div class="card">
                    <?php the_post_thumbnail( 'section-4col-image', array( 'class' => 'card-img-top img-fluid' ) ); ?>
                    <div class="card-body">
                      <h3 class="card-title"><?php the_title();?></h3>
                      <p class="card-text"><?php the_excerpt();?></p>
                    </div>
                  </div>
                </div>

                <?php endwhile;
                  wp_reset_postdata();
                else:
                  echo '<p>No content found</p>';

              endif;?>

          </div><!--- end row -->
        </div>

      </section>

      <section class="news container">

        <?php if( get_field('section_6_title') ): ?>
          <h2><?php the_field('section_6_title'); ?></h2>
        <?php else: ?>
          <h2 class="title-line text-center mb-5">Latest news</h2>
        <?php endif; ?>

        <div class="row">

          <?php $cat_slug = get_field('blog_post_category');
          $news = new WP_Query(array( 'category_name' => 'news', 'posts_per_page' => 3 ) );
            if($news->have_posts()):
              while($news->have_posts()): $news->the_post();?>
              <div class="col-sm-4">
                <div class="card">
                  <h3 class="card-title"><?php the_title();?></h3>
                  <p class="card-meta"><?php echo get_the_time('F j, Y'); ?></p>
                  <?php the_post_thumbnail( 'section-3col-image', array( 'class' => 'card-img-top img-fluid' ) ); ?>
                  <div class="card-body">
                    <p class="card-text"><?php the_excerpt();?></p>
                    <span><a class="post-excerpt-btn" href="<?php echo get_permalink(); ?>">Continue</a></span>
                  </div>
                </div>
              </div>

              <?php endwhile;
                wp_reset_postdata();
              else:
                echo '<p>No content found</p>';

            endif;?>

        </div><!--- end row -->

      </section>

      <section class="subscribe">

        <?php if( get_field('subscribe_text') ): ?>
          <p class="text-center"><?php the_field('subscribe_text'); ?><p>
        <?php else: ?>
          <p class="text-center">
            Quisque vel lectus ac nibh vestibulum lobortis. Donec dignissim eu arcu sed pharetra.
          </p>
        <?php endif; ?>

          <div class="input-group">
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter email">
            <span><button class="btn btn-primary" type="submit">Subscribe</button></span>
          </div>

      </section>


    <?php get_footer();
