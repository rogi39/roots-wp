<?php get_header(); ?>


<main class="main">
	<section class="first" style="background-image: url('<?php echo get_field('first_bg'); ?>');">
		<div class="container">
			<h1 class="first__title"><?php echo get_field('first_title'); ?></h1>
			<div class="first__text"><?php echo get_field('first_subtitle'); ?></div>
			<form class="booking">
				<div class="booking__row">
					<select class="booking__select">
						<option selected="true" disabled="disabled">Дата заезда и выезда</option>
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
					<select class="booking__select">
						<option selected="true" disabled="disabled">Количество гостей</option>
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
					<button class="btn">Забронировать</button>
				</div>
			</form>
		</div>
	</section>
	<section class="section">
		<div class="container">
			<div class="about">
				<div class="about__row">
					<div class="about__left">
						<h2 class="title title_accent title_roots">Roots</h2>
						<div class="about__text"><?php echo get_field('main_about_text'); ?></div>
						<a href="/about/" class="more">Подробнее</a>
						<div class="about__items">
							<?php
							while (have_rows('main_about_items')) {
								the_row();
								$main_about_items_title = get_sub_field('main_about_items_title');
								$main_about_items_text = get_sub_field('main_about_items_text');
								$main_about_items_img = get_sub_field('main_about_items_img');
							?>
								<div class="about__item">
									<img src="<?php echo $main_about_items_img['sizes']['medium_large']; ?>" alt="<?php echo $main_about_items_title; ?>" class="about__item-img">
									<div class="about__item-title"><?php echo $main_about_items_title; ?></div>
									<div class="about__item-text"><?php echo $main_about_items_text; ?></div>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="about__right">
						<div class="about__widget"><iframe style="width:100%;height:800px;border:1px solid #e6e6e6;border-radius:8px;box-sizing:border-box" src="https://yandex.ru/maps-reviews-widget/165824703570?comments"></iframe></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="main-video">
		<div class="container">
			<div class="main-video__block">
				<div class="main-video__text"><?php echo get_field('main_bg_video_text'); ?></div>
			</div>
		</div>
		<video autoplay muted loop id="myVideo">
			<source src="<?php echo get_field('main_bg_videol'); ?>" type="video/mp4">
			Your browser does not support HTML5 video.
		</video>
	</div>
	<?php
	$rooms_query = new WP_Query([
		'post_type' => 'rooms',
		'posts_per_page' => 1,
	]);
	if ($rooms_query->have_posts()) {
	?>
		<section class="section section_gray">
			<div class="container">
				<div class="cottage">
					<div class="cottage__row">
						<div class="cottage__left">
							<?php while ($rooms_query->have_posts()) {
								$rooms_query->the_post();
							?>
								<div class="cottage__left-column">
									<div>
										<div class="subtitle">РАЗМЕЩЕНИЕ</div>
										<h2 class="title"><?php the_title(); ?></h2>
										<div class="cottage__main-price"><?php echo get_field('price'); ?></div>
										<img src="<?php echo get_template_directory_uri(); ?>/images/dest/cottage.jpg" alt="cottage" class="cottage__img cottage__img_main-mobile">
										<div class="cottage__text"><?php the_excerpt(); ?></div>
										<div class="cottage__items">

											<?php if (get_field('rooms_count')) { ?>
												<div class="cottage__item">
													<svg class="cottage__item-svg">
														<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#people"></use>
													</svg>
													<div class="cottage__item-text"><?php echo get_field('rooms_count'); ?></div>
												</div>
											<?php } ?>
											<?php if (get_field('rooms_area')) { ?>
												<div class="cottage__item">
													<svg class="cottage__item-svg">
														<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#arrow"></use>
													</svg>
													<div class="cottage__item-text"><?php echo get_field('rooms_area'); ?> м²</div>
												</div>
											<?php } ?>
											<?php if (get_field('rooms_air')) { ?>
												<div class="cottage__item">
													<svg class="cottage__item-svg">
														<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#snow"></use>
													</svg>
													<div class="cottage__item-text">Кондиционер</div>
												</div>
											<?php } ?>
											<?php if (get_field('rooms_wifi')) { ?>
												<div class="cottage__item">
													<svg class="cottage__item-svg">
														<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#wifi"></use>
													</svg>
													<div class="cottage__item-text">WI-FI</div>
												</div>
											<?php } ?>
										</div>
									</div>
									<div class="cottage__btn-row">
										<a href="#" class="btn btn_hover-accent">Забронировать</a>
										<a href="<?php the_permalink(); ?>" class="more">Подробнее</a>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="cottage__right">
							<?php the_post_thumbnail("medium_large", array("alt" => get_the_title(), "class" => "cottage__img cottage__img_main")); ?>
						</div>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
				<?php
				$sale_query = new WP_Query([
					'post_type' => 'sales',
					'posts_per_page' => -1,
				]);
				if ($sale_query->have_posts()) {
				?>
					<div class="sale">
						<div class="sale__row">
							<?php while ($sale_query->have_posts()) {
								$sale_query->the_post();
							?>
								<div class="sale__col">
									<div class="sale-item" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'large'); ?>');">
										<div class="sale-item__block">
											<div class="sale-item__label">-<?php echo get_field('sale_sale'); ?>%</div>
											<div class="sale-item__title"><?php the_title(); ?></div>
											<div class="sale-item__text"><?php echo get_field('sale_text'); ?></div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</section>
	<?php } ?>

	<?php echo get_template_part("template_parts/memories"); ?>

	<?php
	if (have_rows('main_gallery')) { ?>
		<section class="section section_p0">
			<div class="container">
				<h2 class="title title_gallery">Фотогалерея</h2>
			</div>
			<div class="gallery lg">
				<div class="gallery__row">
					<?php
					while (have_rows('main_gallery')) {
						the_row();
						$main_gallery_img = get_sub_field('main_gallery_img');
					?>
						<div class="gallery__col">
							<a href="<?php echo $main_gallery_img['url']; ?>" class="gallery__item lg-item">
								<img src="<?php echo $main_gallery_img['sizes']['gallery-item']; ?>" alt="Фотогалерея" class="gallery__img">
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
	<?php } ?>
	<?php echo get_template_part("template_parts/form-section"); ?>
</main>

<?php get_footer(); ?>