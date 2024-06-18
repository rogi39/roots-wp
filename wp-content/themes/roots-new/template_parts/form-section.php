<section class="section <?php if (isset($args['pt0']) && !empty($args['pt0'])) echo  $args['pt0']; ?> ">
	<div class="container">
		<div class="contact-block">
			<div class="contact-block__row">
				<div class="contact-block__left">
					<div class="contact-block__title">Возникли вопросы?</div>
					<div class="contact-block__address-block">
						<div class="contact-block__address-block-text">Если у вас возникли вопросы, вы можете связаться с нами</div>
						<div class="contact-block__address-block-item">
							<svg class="contact-block__address-block-item-svg">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#phone"></use>
							</svg>
							<div>
								<div>Ресепшн</div>
								<a href="tel:+<?php the_field('phone', 'option'); ?>" class="contact-block__address-block-item-text"><?php echo preg_replace("/(\\d{1})(\\d{3}|\\d{4})(\\d{3}|\\d{4})(\\d{2})(\\d{2})$/i", "+7 $2 $3-$4-$5 $6", get_field('phone', 'option')); ?></a>
							</div>
						</div>
						<?php if (get_field('telegram', 'option')) { ?>
							<div class="contact-block__address-block-item">
								<svg class="contact-block__address-block-item-svg">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#telegram"></use>
								</svg>
								<a href="<?php the_field('telegram', 'option'); ?>" class="contact-block__address-block-item-text">@rootshotel</a>
							</div>
						<?php } ?>
						<?php if (get_field('whatsapp', 'option')) { ?>
							<div class="contact-block__address-block-item">
								<svg class="contact-block__address-block-item-svg">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#whatsapp"></use>
								</svg>
								<a href="https://wa.me/<?php the_field('whatsapp', 'option'); ?>" class="contact-block__address-block-item-text"><?php echo preg_replace("/(\\d{1})(\\d{3}|\\d{4})(\\d{3}|\\d{4})(\\d{2})(\\d{2})$/i", "+7 $2 $3-$4-$5 $6", get_field('whatsapp', 'option')); ?></a>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="contact-block__right">
					<?php echo get_template_part("template_parts/form"); ?>
				</div>
			</div>
		</div>
	</div>
</section>