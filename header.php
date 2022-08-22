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
						<button type="submit">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
								<path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/>
							</svg>
						</button>
					</form>
				</div>

				<!-- header site meta  -->
				<div class="header-site-meta">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="site-description"><?php echo get_bloginfo( 'description' )?></p>
				</div>

				<!-- subscribe button -->
				<div class="header-subscribe-btn">
						<button class="button subscribe"> <img src="<?php echo get_template_directory_uri() . '/assets/img/icon-env-white.svg'?>"> <?php echo esc_html('Subscribe', 'i-dive'); ?></button>
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
						<button type="submit">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
								<path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/>
							</svg>
						</button>
				</form>
			</div>
		</div>
	</header>