<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package I_Dive
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="ind-container">
			<div class="footer-wrapper">
			<div class="footer-left">
				<?php 
					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu',
							'menu_id'        => 'footer-menu',
						)
					);
				?>
				<div class="site-info">
					<p><?php echo esc_html('Copyright @ 2022 all Right Reserve', 'i-dive') ?></p>
				</div>
			</div>
			<div class="footer-right">
					<p><?php echo esc_html('Sign up for our Newsletter','i-dive'); ?></p>
					<button  class="button">Subscribe</button>
			</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
