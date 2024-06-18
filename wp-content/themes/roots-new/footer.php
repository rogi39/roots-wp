<footer class="footer">
	<div class="container">
		<div class="footer__row">
			<div class="footer__left">
				<?php if (!is_front_page()) { ?>
					<a href="<?php echo get_home_url(); ?>" class="footer__logo">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo-footer.svg" alt="logo" class="footer__logo-img">
					</a>
				<?php  } else { ?>
					<div class="footer__logo">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo-footer.svg" alt="logo" class="footer__logo-img">
					</div>
				<?php } ?>
				<div class="footer__text">Гостиница в цее</div>
				<div class="footer__copy">© <?php echo date("Y"); ?> Roots.</div>
			</div>
			<div class="footer__center">
				<div class="footer__menu">
					<ul class="footer__menu-list">
						<?php
						wp_nav_menu([
							'menu' => 'menu_main_footer',
							'theme_location' => 'menu_main_footer',
							'items_wrap' => '%3$s',
							'container' => false,
							'walker' => new footer_menu_Walker
						]);
						?>
					</ul>
				</div>
			</div>
			<div class="footer__right">
				<div class="footer__info">
					<a href="tel:+<?php the_field('phone', 'option'); ?>" class="phone phone_footer"><?php echo preg_replace("/(\\d{1})(\\d{3}|\\d{4})(\\d{3}|\\d{4})(\\d{2})(\\d{2})$/i", "+7 $2 $3-$4-$5 $6", get_field('phone', 'option')); ?></a>
					<?php if (get_field('telegram', 'option')) { ?>
						<a href="<?php the_field('telegram', 'option'); ?>" class="footer__messanger">
							<svg class="footer__messanger-svg">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#telegram"></use>
							</svg>
							<span class="footer__messanger-text">@rootshotel</span>
						</a>
					<?php } ?>
					<a href="https://abeta.ru/services/razrabotka-korporatinyh-sajtov/" target="_blank" class="footer__dev">Разработка сайта Abeta</a>
					<div class="footer__copy footer__copy_mobile">© <?php echo date("Y"); ?> Roots.</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>

</body>

</html>