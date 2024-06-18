<?php get_header(); /* Template Name: Контакты*/ ?>
<main class="main">

	<section class="section section_pb0">
		<div class="container">
			<?php echo get_template_part("template_parts/breadcrumb-block"); ?>
			<h1 class="title title_single"><?php the_title(); ?></h1>
			<div class="contacts">
				<div class="contacts__row">
					<div class="contacts__col">
						<div class="cards-info cards-info_m0">
							<div class="card-info card-info_1">
								<div class="card-info__title-row">
									<div class="card-info__title card-info__title_contacts">Ресепшн</div>
									<svg class="card-info__title-svg">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#phone-contacts"></use>
									</svg>
								</div>
								<a href="tel:+<?php the_field('phone', 'option'); ?>" class="card-info__text card-info__text_contacts"><?php echo preg_replace("/(\\d{1})(\\d{3}|\\d{4})(\\d{3}|\\d{4})(\\d{2})(\\d{2})$/i", "+7 $2 $3-$4-$5 $6", get_field('phone', 'option')); ?></a>
							</div>
							<div class="card-info card-info_2">
								<div class="card-info__title-row">
									<div class="card-info__title card-info__title_contacts">Мессенджеры</div>
									<svg class="card-info__title-svg">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#telegram-contacts"></use>
									</svg>
								</div>
								<a href="<?php the_field('telegram', 'option'); ?>" class="card-info__text card-info__text_contacts">@rootshotel</a>
							</div>
							<div class="card-info card-info_3">
								<div class="card-info__title-row">
									<div class="card-info__title card-info__title_contacts">Эл. почта</div>
									<svg class="card-info__title-svg">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#mail-contacts"></use>
									</svg>
								</div>
								<a href="<?php the_field('email', 'option'); ?>" class="card-info__text card-info__text_contacts">rootshotel@mail.ru</a>
							</div>
							<div class="card-info card-info_4">
								<div class="card-info__title-row">
									<div class="card-info__title card-info__title_contacts">Маршрут</div>
									<svg class="card-info__title-svg">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#place-contacts"></use>
									</svg>
								</div>
								<a href="#" class="card-info__text card-info__text_contacts">Проложить маршрут</a>
							</div>
						</div>
					</div>
					<div class="contacts__col">
						<?php echo get_template_part("template_parts/form"); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="contacts-map">
			<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aade65979c04ac1408bce9d23135ef3c7215fcf4ce7f60dbc74ba0fd44f740a90&amp;source=constructor" width="100%" height="100%" frameborder="0"></iframe>
		</div>
	</section>

</main>

<?php get_footer(); ?>