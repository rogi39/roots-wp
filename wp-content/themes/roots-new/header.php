<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/favicon/manifest.json">
	<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/images/favicon/browserconfig.xml" />
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>

</head>

<body>
	<div class="overlay"></div>

	<nav class="menu menu_modal">
		<ul class="menu__list">
			<?php
			wp_nav_menu([
				'menu' => 'menu_main_header',
				'theme_location' => 'menu_main_header',
				'items_wrap' => '%3$s',
				'container' => false,
				'walker' => new main_nav_menu_Walker
			]);
			?>
		</ul>
	</nav>

	<header class="header">
		<div class="container">
			<div class="header__row">
				<div class="header__left">
					<?php if (!is_front_page()) { ?>
						<a href="<?php echo get_home_url(); ?>" class="logo">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="logo" class="logo__img">
						</a>
					<?php  } else { ?>
						<div class="logo">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="logo" class="logo__img">
						</div>
					<?php } ?>
				</div>
				<div class="header__right">
					<div class="header__menu">
						<nav class="menu">
							<ul class="menu__list">
								<?php
								wp_nav_menu([
									'menu' => 'menu_main_header',
									'theme_location' => 'menu_main_header',
									'items_wrap' => '%3$s',
									'container' => false,
									'walker' => new main_nav_menu_Walker
								]);
								?>
							</ul>
						</nav>
					</div>
					<div class="header__phone">
						<div class="messangers">
							<?php if (get_field('telegram', 'option')) { ?>
								<a href="<?php the_field('telegram', 'option'); ?>" class="messangers__item">
									<svg class="messangers__item-svg">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#telegram"></use>
									</svg>
								</a>
							<?php } ?>
							<?php if (get_field('whatsapp', 'option')) { ?>
								<a href="https://wa.me/<?php the_field('whatsapp', 'option'); ?>" class="messangers__item">
									<svg class="messangers__item-svg">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/images/sprite.svg#whatsapp"></use>
									</svg>
								</a>
							<?php } ?>
						</div>
						<a href="tel:+<?php the_field('phone', 'option'); ?>" class="phone"><?php echo preg_replace("/(\\d{1})(\\d{3}|\\d{4})(\\d{3}|\\d{4})(\\d{2})(\\d{2})$/i", "+7 $2 $3-$4-$5 $6", get_field('phone', 'option')); ?></a>
					</div>
					<div class="header__btn">
						<a href="#" class="btn btn_header">Забронировать</a>
					</div>
					<span class="header__toggle-menu" id="toggle-menu"><span class="header__toggle-line"></span><span class="header__toggle-text">меню</span></span>
				</div>
			</div>
		</div>
	</header>