<?php get_header(); ?>
<main class="main">

	<section class="section">
		<div class="container">
			<?php echo get_template_part("template_parts/breadcrumb-block"); ?>
			<h1 class="title title_single"><?php the_title(); ?></h1>
			<div class="content"><?php the_content(); ?></div>
		</div>
	</section>
</main>
<?php get_footer(); ?>