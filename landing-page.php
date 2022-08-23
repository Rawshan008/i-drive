<?php 
/**
 * Template Name: Landing Page
 */

 get_header();
 ?>
<!-- Banner section Start -->
<div class="banner-slider-wrapper swiper">
  <div class="banner-section-container swiper-wrapper">
    <?php 
      $fb_args = [
        'post_type' => 'post',
        'posts_per_page' => 5,
        'post_status' =>  'publish',
        'orderby' =>  'date',
        'order' => 'DESC',
        'meta_query' => [
          [
            'key' => '_i_dive_meta_key',
            'value' => 'featured',
          ]
        ]
      ];

      $banner_posts = new WP_Query($fb_args);
    ?>
    <?php if($banner_posts->have_posts()): ?>
      <?php 
        while($banner_posts->have_posts()): $banner_posts->the_post(); 
        $feature_image = wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()), 'full');
        $category = get_the_category(get_the_ID());

        $output_cat = [];
        foreach($category as $cat) {
          $output_cat[] = '<a href="'.esc_url(get_category_link($cat->term_id)).'">'.$cat->name .'</a>';
        }

        $post_meta = get_post_meta(get_the_ID(), '_i_dive_meta_key',  true);
      ?>
    <div class="single-banner-section swiper-slide" style="background-image: url(<?php echo esc_url($feature_image);?>)">
      <div class="ind-container">
        <div class="single-post-meta">
          <span><?php echo $post_meta; ?> | </span>
          <?php 
            echo implode(' | ', $output_cat);
          ?>
        </div>
        <h2><a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title(); ?></a></h2>
        <div class="single-post-footer">
          <span><?php echo estimated_reading_time(get_the_content()); ?> | </span>
          <a href="<?php echo esc_url(get_the_permalink());?>"><?php echo esc_html('Read More', 'i-dive'); ?></a>
        </div>
      </div>
    </div>
    <?php 
      endwhile;
      wp_reset_query(); 
    ?>
  </div>
  <!-- Swiper navigation  -->
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <!-- Swiper pagination  -->
  <div class="swiper-pagination"></div>
</div>
<?php endif; ?>
<!-- Banner section End -->



<!-- Feature Section Start  -->
<div class="feature-section-wrapper">
  <div class="ind-container">
    <div class="feature-section-content">
    <?php 
      $f_args = [
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' =>  'publish',
        'orderby' =>  'date',
        'order' => 'DESC',
        'meta_query' => [
          [
            'key' => '_i_dive_meta_key',
            'value' => 'featured',
          ]
        ]
      ];

      $feature_posts = new WP_Query($f_args);
    ?>

    <?php 
      if($feature_posts->have_posts()):
        $count = 1;
        while($feature_posts->have_posts()):
          $feature_posts->the_post();
          $feature_image = wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()), 'full');
          $category = get_the_category(get_the_ID());
          
          $output_slug = [];
          $output_cat = [];
          foreach($category as $cat) {
            $output_cat[] = '<a href="'.esc_url(get_category_link($cat->term_id)).'">'.$cat->name .'</a>';
            $output_slug[] = $cat->slug;
          }

        $post_meta = get_post_meta(get_the_ID(), '_i_dive_meta_key',  true);

    ?>
      
    <div class="single-feature-post <?php  echo implode(' ', $output_slug) ;?> post-count-<?php echo $count;?>" style="background-image: url(<?php echo esc_url($feature_image);?>)">
      <div class="single-feature-post-content">
        <div class="single-feature-meta">
          <span><?php echo $post_meta; ?> | </span>
          <?php 
            echo implode(' | ', $output_cat);
          ?>
        </div>
        <h2><a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title(); ?></a></h2>
        <div class="single-feature-footer">
          <span><?php echo estimated_reading_time(get_the_content()); ?> | </span>
          <a href="<?php echo esc_url(get_the_permalink());?>"><?php echo esc_html('Read More', 'i-dive'); ?></a>
        </div>
      </div>
    </div>

    <?php
        $count++;
        endwhile;
        wp_reset_postdata();
      endif; 
    ?>
    </div>
  </div>
</div>
<!-- Feature Section End  -->


<!-- Trading Section Start  -->
<div class="trading-section-wrapper">
  <div class="ind-container">
    <h2 class="section-title"><?php echo esc_html('Tranding Now', 'i-dive'); ?></h2>
    <div class="trading-section-content">
    <?php 
      $t_args = [
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' =>  'publish',
        'orderby' =>  'date',
        'order' => 'DESC',
        'meta_query' => [
          [
            'key' => '_i_dive_meta_key',
            'value' => 'trending',
          ]
        ]
      ];

      $tranding_posts = new WP_Query($t_args);
    ?>

    <?php 
      if($tranding_posts->have_posts()):
        $count = 1;
        while($tranding_posts->have_posts()):
          $tranding_posts->the_post();
          $feature_image = wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()), 'full');
          $category = get_the_category(get_the_ID());

          $output_slug = [];
          $output_cat = [];
          foreach($category as $cat) {
            $output_cat[] = '<a href="'.esc_url(get_category_link($cat->term_id)).'">'.$cat->name .'</a>';
            $output_slug[] = $cat->slug;
          }

        $post_meta = get_post_meta(get_the_ID(), '_i_dive_meta_key',  true);

    ?>
      
    <div class="single-trading-post <?php echo implode(' ', $output_slug); ?> post-count-<?php echo $count;?>" style="background-image: url(<?php echo esc_url($feature_image);?>)">
      <div class="single-trading-post-content">
        <div class="single-trading-meta">
          <span><?php echo $post_meta; ?> | </span>
          <?php 
            echo implode(' | ', $output_cat);
          ?>
        </div>
        <h2><a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title(); ?></a></h2>
        <div class="single-trading-footer">
          <span><?php echo estimated_reading_time(get_the_content()); ?> | </span>
          <a href="<?php echo esc_url(get_the_permalink());?>"><?php echo esc_html('Read More', 'i-dive'); ?></a>
        </div>
      </div>
    </div>

    <?php
        $count++;
        endwhile;
        wp_reset_postdata();
      endif; 
    ?>
    </div>
  </div>
</div>
<!-- Feature Section End  -->


<!-- Latest Article Start  -->
<div class="latest-section-wrapper">
  <div class="ind-container">
    <h2 class="section-title"><?php echo esc_html('Latest Article', 'i-dive'); ?></h2>
    <div class="latest-section-content">
    <?php 
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $l_args = [
        'post_type' => 'post',
        'posts_per_page' => 6,
        'post_status' =>  'publish',
        'orderby' =>  'date',
        'order' => 'DESC',
        'paged' => $paged,
      ];

      $latest_posts = new WP_Query($l_args);
    
    ?>

    <?php 
      if($latest_posts->have_posts()):
        $count = 1;
        while($latest_posts->have_posts()):
          $latest_posts->the_post();
          $feature_image = wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()), 'full');
          $category = get_the_category(get_the_ID());

          $output_cat = [];
          $output_slug = [];
          foreach($category as $cat) {
            $output_cat[] = '<a href="'.esc_url(get_category_link($cat->term_id)).'">'.$cat->name .'</a>';
            $output_slug[] = $cat->slug;
          }

        $post_meta = get_post_meta(get_the_ID(), '_i_dive_meta_key',  true);
    ?>
      
    <div class="single-latest-post">
      <div class="single-latest-post-content <?php  echo implode(' ', $output_slug) ;?>" style="background-image: url(<?php echo esc_url($feature_image);?>)">
        <div class="single-latest__content">
          <div class="single-latest-meta">
            <span><?php echo esc_html('Latest Article | ', 'i-dive') ?><?php echo $post_meta; ?> | </span>
            <?php 
              echo implode(' | ', $output_cat);
            ?>
          </div>
          <h2><a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title(); ?></a></h2>
          <div class="single-latest-footer">
            <span><?php echo estimated_reading_time(get_the_content()); ?> | </span>
            <a href="<?php echo esc_url(get_the_permalink());?>"><?php echo esc_html('Read More', 'i-dive'); ?></a>
          </div>
        </div>
      </div>
    </div>

    <?php
        $count++;
        endwhile;
        wp_reset_postdata();
      endif; 
    ?>
    </div>
    <div class="loadmoore-btn"><button class="button loadmore-button">Load More</button></div>
  </div>
</div>
<!-- Feature Section End  -->
<?php
 get_footer();