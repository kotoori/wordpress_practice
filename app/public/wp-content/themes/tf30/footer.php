	<!-- footer-menu -->
	<div id="footer-menu">
		<div class="inner">
			<div class="footer-logo"><a href="<?php home_url('/'); ?>/"><?php bloginfo('name'); ?></a></div><!-- /footer-logo -->
			<div class="footer-sub"><?php bloginfo('description'); ?></div><!-- /footer-sub -->

			<nav class="footer-nav">
        <?php wp_nav_menu(
          array(
            'depth' => 1,
            'theme_location' => 'footer',
            'container' => '',
            'menu_class' => 'footer-list',
          )
        ); ?>
			</nav>

		</div><!-- /inner -->
	</div><!-- /footer-menu -->



	<!-- footer -->
	<footer id="footer">
		<div class="inner">
			<div class="copy">&copy; daily-trial WordPress theme All rights reserved.</div><!-- /copy -->
			<div class="by">Presented by <a href="https://tokyofreelance.jp/" rel="noopener" target="_blank">東京フリーランス</a>
			</div><!-- /by -->

		</div><!-- /inner -->
	</footer><!-- /footer -->

	<?php if(is_single()) : ?>
		<?php get_template_part('template-parts/footer-sns'); ?>
	<?php endif; ?>


	<div class="floating">
		<a href="#"><i class="fas fa-chevron-up"></i></a>
	</div>

	<?php wp_footer(); ?>
</body>

</html>
