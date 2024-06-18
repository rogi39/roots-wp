<section class="section <?php if (isset($args['pt0']) && !empty($args['pt0'])) echo  $args['pt0']; ?>">
	<div class="container">
		<div class="title-row">
			<h2 class="title title_m0">Впечатления</h2>
			<div class="title-text"><?php echo get_field('memories_text', 'option'); ?></div>
		</div>
		<?php
		$memories_query = new WP_Query([
			'post_type' => 'memories',
			'posts_per_page' => -1,
		]);
		if ($memories_query->have_posts()) {
		?>
			<div class="memories">
				<div class="memories__row">
					<?php while ($memories_query->have_posts()) {
						$memories_query->the_post();
					?>
						<div class="memories__col">
							<div class="memories__item">
								<img src="<?php echo get_the_post_thumbnail_url($post->ID, 'gallery-item'); ?>" alt="<?php the_title(); ?>" class="memories__img">
								<div class="memories__text"><?php the_title(); ?></div>
								<div class="memories__modal">
									<div class="memories__modal-block">
										<div class="memories__modal-close"></div>
										<div class="memories__modal-title"><?php the_title(); ?></div>
										<img src="<?php echo get_the_post_thumbnail_url($post->ID, 'gallery-item'); ?>" alt="<?php the_title(); ?>" class="memories__modal-img">
										<div class="memories__modal-content content">
											<?php the_content(); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		<?php } ?>
	</div>
</section>