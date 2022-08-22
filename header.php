<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package I_Dive
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="subscribe-form-wrapper">
	<div class="close-btn">X</div>
	<p><?php echo esc_html('Subscribe to our Newsletter', 'i-dive'); ?></p>
	<input type="email" placeholder="Enter Your Email Address">
	<input type="submit" value="Subscribe">
</div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'i-dive' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="ind-container">
			<div class="header-content">
				<!-- header search  -->
				<div class="header-search-form">
					<form action="/" method="get">
						<input placeholder="Search" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
						<input type="hidden" name="post">
					</form>
				</div>

				<!-- header site meta  -->
				<div class="header-site-meta">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="site-description"><?php echo get_bloginfo( 'description' )?></p>
				</div>

				<!-- subscribe button -->
				<div class="header-subscribe-btn">
						<button class="button subscribe">Subscribe</button>
					</div>
			</div>

			<!-- site menu  -->
			<div class="header-menu">
				<nav id="site-navigation" class="main-navigation">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
				?>
			</nav><!-- #site-navigation -->
		</div>
	</div>
	</header><!-- #masthead -->

	<header id="masthead" class="site-header-2">
		<div class="header-2-top-wrapper">
			<div class="ind-container">
				<div class="site-header-2-content">
					<div class="site-header-2-logo">
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					</div>
					<div class="site-header-2-menu">
						<nav id="site-navigation" class="main-navigation">
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
									)
								);
							?>
						</nav><!-- #site-navigation -->
					</div>
				</div>
			</div>
		</div>
		
		<div class="header-2-search">
			<div class="ind-container">
				<form action="/" method="get">
						<input placeholder="Search" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
						<input type="hidden" name="post">
				</form>
			</div>
		</div>
	</header>