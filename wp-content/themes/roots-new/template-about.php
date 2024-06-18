<?php get_header(); /* Template Name: Об отеле*/ ?>
<main class="main">

	<section class="section">
		<div class="container">
			<?php echo get_template_part("template_parts/breadcrumb-block"); ?>
			<div class="title-row">
				<div class="title-row__title-block">
					<h1 class="title">Отель Roots</h1>
					<div class="title-row__about">Наедине с природой </div>
					<div class="title-row__about title-row__about_tar">Наедине с собой</div>
				</div>
				<div class="title-text"><?php echo get_field('about_excrept'); ?></div>
			</div>
			<div class="open-video" id="open-video">
				<div class="open-video__img-block">
					<img src="<?php echo get_template_directory_uri(); ?>/images/dest/video.jpg" class="open-video__img" alt="video">
					<svg class="open-video__icon" width="71" height="84" viewBox="0 0 71 84" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M2.5934 82.9211C3.18088 83.2366 3.83007 83.3934 4.47873 83.3934C5.19507 83.3934 5.91036 83.2017 6.53984 82.8207L68.7621 45.1421C69.8992 44.4536 70.5898 43.2462 70.5898 41.947C70.5898 40.6478 69.8992 39.4404 68.7621 38.7518L6.53984 1.07282C5.34077 0.346625 3.82981 0.308444 2.5934 0.972344C1.35699 1.63649 0.589844 2.89823 0.589844 4.26798V79.6255C0.589844 80.9952 1.35699 82.257 2.5934 82.9211Z" fill="#ffffff"></path>
					</svg>
				</div>

				<div class="open-video__yandex">
					<iframe style="width:100%;height:125px;border:1px solid #e6e6e6;border-radius:8px;box-sizing:border-box" src="https://yandex.ru/maps-reviews-widget/165824703570?comments"></iframe>
				</div>
			</div>
			<?php if (have_rows('about_items')) { ?>
				<div class="cards-info">
					<?php
					$i = 1;
					while (have_rows('about_items')) {
						the_row();
						$about_items_title = get_sub_field('about_items_title');
						$about_items_text = get_sub_field('about_items_text');
					?>
						<div class="card-info card-info_<?php echo $i; ?>">
							<div class="card-info__title-row">
								<div class="card-info__title"><?php echo $about_items_title; ?></div>
							</div>
							<div class="card-info__text"><?php echo $about_items_text; ?></div>
						</div>
						<?php $i++; ?>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</section>

	<div id="modal-video" class="modal">
		<div class="modal-content modal-content_video">
			<span class="modal-content__close"></span>
			<div class="video">
				<video class="modal-video__video" preload="auto" playsinline controls>
					<source src="<?php echo get_field('about_video')['url'] ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
				</video>
			</div>
		</div>
	</div>

	<?php if (have_rows('about_items')) { ?>
		<section class="section section_pt0">
			<div class="container">
				<h2 class="title title_single">Фотогалерея</h2>
			</div>
			<div class="about-slider-block">
				<div class="swiper about-slider lg">
					<div class="swiper-wrapper">
						<?php
						while (have_rows('about_gallery')) {
							the_row();
							$about_gallery_img = get_sub_field('about_gallery_img');
						?>
							<a href="<?php echo $about_gallery_img['url']; ?>" class="swiper-slide lg-item">
								<img src="<?php echo $about_gallery_img['sizes']['gallery-item']; ?>" alt="Фотогалерея" class="cottage-thumbs-slider__img">
							</a>
						<?php } ?>
					</div>
					<div class="swiper-pagination"></div>
				</div>
				<div class="slider-btn">
					<div class="slider-btn__item slider-btn__item_about slider-btn__item_prev">
						<svg class="slider-btn__svg">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#arrow-slider"></use>
						</svg>
					</div>
					<div class="slider-btn__item slider-btn__item_about slider-btn__item_next">
						<svg class="slider-btn__svg">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#arrow-slider"></use>
						</svg>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>

	<?php echo get_template_part("template_parts/memories", null, ['pt0' => 'section_pt0']); ?>
	<?php echo get_template_part("template_parts/form-section", null, ['pt0' => 'section_pt0']); ?>

</main>
<?php get_footer(); ?>