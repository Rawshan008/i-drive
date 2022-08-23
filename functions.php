<?php
/**
 * I Dive functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package I_Dive
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function i_dive_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on I Dive, use a find and replace
		* to change 'i-dive' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'i-dive', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'i-dive' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'i-dive' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'i_dive_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'i_dive_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function i_dive_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'i_dive_content_width', 640 );
}
add_action( 'after_setup_theme', 'i_dive_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function i_dive_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'i-dive' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'i-dive' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'i_dive_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function i_dive_scripts() {
	global $wp_query;

	wp_enqueue_style( 'custom-fonts', get_template_directory_uri() . '/assets/css/custom-fonts.css');
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
	wp_enqueue_style( 'i-dive-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'i-dive-style', 'rtl', 'replace' );

	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'i-dive-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'custom-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), _S_VERSION, true );

	// Load More ajax
	wp_localize_script('custom-scripts', 'ajax_posts', [
		'ajaxurl' => admin_url('admin-ajax.php'),
		'security'     => wp_create_nonce( 'load-more-posts' ),
		'current_page' => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1,
		'max_page' => $wp_query->max_num_pages
	]);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'i_dive_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Metabox
 */
require get_template_directory() . '/inc/custom-metabox.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function estimated_reading_time( $content = '' ) {
	$wpm          = 200;
	$text_content = strip_shortcodes( $content ); 
	$str_content  = strip_tags( $text_content );     
	$word_count   = str_word_count( $str_content );
	$readtime     = ceil( $word_count / $wpm );

	if ( $readtime == 1 ) {
		$postfix = " minute";
	} else {
		$postfix = " minutes";
	}
	$readingtime = $readtime . $postfix;

	return $readingtime;
}

function ind_load_more_posts_callback() {
	check_ajax_referer( 'load-more-posts', 'security' );
  $paged = $_POST['page'] + 1;
	$args = [
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 3,
		'orderby' =>  'date',
    'order' => 'DESC',
		'paged' => $paged,
	];
	
	$latest_posts = new WP_Query( $args );

	if($latest_posts->have_posts()):
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
				wp_reset_postdata();
      endif;
			wp_die();
    ?>
		<?php


}
add_action('wp_ajax_ind_load_more_posts', 'ind_load_more_posts_callback');
add_action('wp_ajax_nopriv_ind_load_more_posts', 'ind_load_more_posts_callback');