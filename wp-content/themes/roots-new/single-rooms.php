<?php get_header(); ?>
<main class="main">

	<section class="section">
		<div class="container">
			<?php echo get_template_part("template_parts/breadcrumb-block"); ?>
			<div class="cottage">
				<div class="cottage__row">
					<div class="cottage__right">
						<div class="vertical">
							<div class="vertical__row">
								<div class="vertical__thumbs">
									<div class="swiper cottage-thumbs-slider">
										<div class="swiper-wrapper">
											<?php
											while (have_rows('slider')) {
												the_row();
												$img = get_sub_field('img');
											?>
												<div class="swiper-slide cottage-thumbs-slider__slide">
													<img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php the_title(); ?>" class="cottage-thumbs-slider__img">
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="vertical__big">
									<div class="swiper cottage-big-slider lg">
										<div class="swiper-wrapper">
											<?php
											while (have_rows('slider')) {
												the_row();
												$img = get_sub_field('img');
											?>
												<a href="<?php echo $img['url']; ?>" class="swiper-slide cottage-big-slider__slide lg-item">
													<img src="<?php echo $img['sizes']['medium_large']; ?>" alt="<?php the_title(); ?>" class="cottage-big-slider__img">
												</a>
											<?php } ?>
										</div>
									</div>
									<div class="slider-pagination"></div>
									<div class="slider-btn">
										<div class="slider-btn__item slider-btn__item_prev">
											<svg class="slider-btn__svg">
												<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#arrow-slider"></use>
											</svg>
										</div>
										<div class="slider-btn__item slider-btn__item_next">
											<svg class="slider-btn__svg">
												<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#arrow-slider"></use>
											</svg>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="cottage__left">
						<div class="cottage__left-column">
							<div>
								<h1 class="title title_single"><?php the_title(); ?></h1>
								<?php if (get_field('rooms_count')) { ?>
									<div class="cottage__item cottage__item_single">
										<svg class="cottage__item-svg">
											<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#people"></use>
										</svg>
										<div class="cottage__item-text"><?php echo get_field('rooms_count'); ?></div>
									</div>
								<?php } ?>
								<?php if (get_field('rooms_area')) { ?>
									<div class="cottage__item cottage__item_single">
										<svg class="cottage__item-svg">
											<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#arrow"></use>
										</svg>
										<div class="cottage__item-text"><?php echo get_field('rooms_area'); ?> м²</div>
									</div>
								<?php } ?>
								<?php if (get_field('rooms_air')) { ?>
									<div class="cottage__item cottage__item_single">
										<svg class="cottage__item-svg">
											<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#snow"></use>
										</svg>
										<div class="cottage__item-text">Кондиционер</div>
									</div>
								<?php } ?>
								<?php if (get_field('rooms_wifi')) { ?>
									<div class="cottage__item cottage__item_single">
										<svg class="cottage__item-svg">
											<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#wifi"></use>
										</svg>
										<div class="cottage__item-text">WI-FI</div>
									</div>
								<?php } ?>
								<div class="cottage__price"><?php echo get_field('price'); ?></div>
								<div class="cottage__price-text"><?php echo get_field('price_measure'); ?></div>

							</div>
							<div class="cottage__btn-row">
								<a href="#" class="btn btn_hover-accent">Забронировать</a>
							</div>
						</div>
					</div>

				</div>

				<div class="cottage__row cottage__row_mt">
					<div class="cottage__right">
						<div class="cottage__about">
							<div class="cottage__about-title">О номере</div>
							<div class="cottage__about-text content">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
					<?php if (get_field('rooms_transfer')) { ?>
						<div class="cottage__left">
							<div class="cottage__transfer">
								<div class="cottage__transfer-title">Трансфер</div>
								<div class="cottage__transfer-text"><?php echo get_field('rooms_transfer'); ?></div>
								<a href="/transfer/" class="more more_white">Подробнее</a>
							</div>
						</div>
					<?php } ?>
				</div>

			</div>
		</div>
	</section>

	<?php echo get_template_part("template_parts/memories", null, ['pt0' => 'section_pt0']); ?>
	<?php echo get_template_part("template_parts/form-section", null, ['pt0' => 'section_pt0']); ?>

</main>
<?php get_footer(); ?>