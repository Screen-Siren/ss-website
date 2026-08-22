	<footer id="colophon" class="site-footer">
		<div class="site-footer__inner">
			<div class="site-footer__brand">
				<?php echo wp_get_attachment_image( 5659654, 'thumbnail', false, array( 'class' => 'site-footer__logo-img', 'alt' => 'Screen Siren Pictures Inc.' ) ); ?>
				<p class="site-footer__address">
					2021 Columbia Street<br>
					Vancouver, BC V5Y 3V6<br>
					604.687.7591 &middot; <a href="mailto:info@screensiren.ca">info@screensiren.ca</a>
				</p>
			</div>

			<nav class="site-footer__nav" aria-label="Footer">
				<a href="#projects">Projects</a>
				<a href="#story">Story</a>
				<a href="#team">Team</a>
				<a href="#contact">Contact</a>
			</nav>
		</div>

		<div class="site-footer__bottom">
			<p>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
		</div>
	</footer>

<?php wp_footer(); ?>
</body>
</html>
