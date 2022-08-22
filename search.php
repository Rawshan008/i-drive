<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package I_Dive
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<div class="ind-container">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'i-dive' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</div>
			</header><!-- .page-header -->

			<div class="latest-section-wrapper">
				<div class="ind-container">
					<div class="latest-section-content">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				$feature_image = wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()));
          $category = get_the_category(get_the_ID());

          $output_cat = [];
          foreach($category as $cat) {
            $output_cat[] = '<a href="'.esc_url(get_category_link($cat->term_id)).'">'.$cat->name .'</a>';
          }

        	$post_meta = get_post_meta(get_the_ID(), '_i_dive_meta_key',  true);
				?>

				<div class="single-latest-post">
					<div class="single-latest-post-content" style="background-image: url(<?php echo esc_url($feature_image);?>)">
						<div class="single-latest__content">
							<div class="single-latest-meta">
								<span><?php echo $post_meta; ?> | </span>
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

			endwhile;

		else :
		?>
			<div class="ind-container">
				<h1><?php echo esc_html('No Result Found', 'i-dive') ?></h1>
			</div>
		<?php

		endif;
		?>
		</div>
			<?php if ( have_posts() ) : ?>
				<div class="loadmoore-btn"><button class="button loadmore-button">Load More</button></div>
			<?php endif; ?>
		</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
